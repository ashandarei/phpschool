<?php 
class Project3DB
{
    protected $connection;
    
    // connect to db
    public function __construct()
    {
        try 
        {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_SCHEMA . ";", DB_USERNAME, DB_PASSWORD);
        } 
        catch (PDOException $e) 
        {
            echo ($e->getMessage());
        }
    }
    
    // disconnect from db
    public function Disconnect()
    {
        $this->connection = NULL;
    }
	
    public function register($username, $password, $level)
    {
        try 
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $this->connection->prepare('INSERT INTO accounts (username, password, level) VALUES(:username, :password, :level)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':level', $level, PDO::PARAM_INT);
            
            $success = $stmt->execute();
            
            echo $username . $password . $level;
            echo $success;
            return $success;
       } 
       catch (PDOException $Exception) 
       {
            print ($Exception);
       }
    }
    
    public function login($username, $password)
    {	
        try
        {
           $stmt = $this->connection->prepare('SELECT * FROM accounts WHERE username = :username');
           $stmt->execute(array(
                            ':username' => $username
                                ));
           
            if ($stmt->rowCount() > 0)
            {
                $user = $stmt->fetch();
                if(password_verify($password, $user['password']))
                {
                    $member = new Member($user["username"], $user["level"]);
                    return $member;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
        }	
    }
	
    public function addSection($page, $title, $content, $imagepath = "")
    {
        try
        { 
            $stmt = $this->connection->prepare('INSERT INTO pagecontent (pageid, title, content, imagepath) '
                                            . 'VALUES ((SELECT id FROM pages WHERE displayname = :page), '
                                            . ':title, '
                                            . ':content, '
                                            . ':imagepath)');
            $success = $stmt->execute(array(
                            ':page' => $page,
                            ':title' => $title,
                            ':content' => $content,
                            ':imagepath' => $imagepath
                                ));
           
            return $success;
           
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
        }	
    }
    
    public function getAllSections($page)
    {
        try
        {
           $stmt = $this->connection->prepare('SELECT * FROM pagecontent '
                                                . 'JOIN pages ON pagecontent.pageid = pages.id '
                                                . 'WHERE pages.displayname = :page');
           $stmt->execute(array(
                            ':page' => $page
                                ));
            if ($stmt->rowCount() > 0)
            {
                $data = $stmt->fetchAll();
				
                foreach ($data as $items)
                {
                    
                    $section = new Section($items['pageid'], $items['contentid'], $items['title'], $items['content'], $items['imagepath']);
                    $sections[] = $section;
                }
                
                return $sections;
            }
            else
            {
                return FALSE;
            }
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
        }	
    }
    
    public function updateSection($section, $title, $content, $imagepath = "")
    {
        try 
        {
            $stmt = $this->connection->prepare('UPDATE pagecontent '
                                               . 'SET title = :title, '
                                               . 'content = :content, '
                                               . 'imagepath = :imagepath '
                                               . 'WHERE contentid = :sectionid');
            $success = $stmt->execute(array(
                ':sectionid' => $section,
                ':title' => $title,
                ':content' => $content,
                ':imagepath' => $imagepath
                        ));
            
            return $success;
       } 
       catch (PDOException $Exception) 
       {
            print ($Exception);
            return false;
       }
       return false;
    }

    public function removeSection($sectionID)
    {
        try 
        {
            $stmt = $this->connection->prepare('DELETE FROM pagecontent '
                                               . 'WHERE contentid = :contentid');
            $success = $stmt->execute(array(
                             ':contentid' => $sectionID
                                ));
            return $success;
       } 
       catch (PDOException $Exception) 
       {
            print ($Exception);
            return false;
       }
       return false;
    }
    
    
}

?>