<?php
/**
 * Description of IncidentModel
 *
 * @author Aviendha
 */
class FormView extends View
{
    public function outputTitle()
    {
        return $this->model->title;
    }
    
    public function output()
    {
        $title = $this->model->title;
        
        $register = <<<EOD
                    <section>
                    <form action="?route={$this->route}&action=register" method="post">
                    <h3>$title</h3>
                    <label for="username">Desired Username:</label>
                        <input id="username" type="text" name="username" maxlength="55">
                    <br><br>
                    <label for="password">Desired Password:</label>
                        <input id="password" type="password" name="password" maxlength="55">
                    <br><br>
                    <button type="submit" value="submit">Submit</button>
                    </form>
                </section>
EOD;
        
        $login = <<<EOD
                    <section>
                    <form action="?route={$this->route}&action=login" method="post">
                    <h3>$title</h3>
                    <label for="username">Username:</label>
                        <input id="username" type="text" name="username" maxlength="55">
                    <br><br>
                    <label for="password">Password:</label>
                        <input id="password" type="password" name="password" maxlength="55">
                    <br><br>
                    <button type="submit" value="submit">Submit</button>
                    </form>
                </section>
EOD;
                    
                    
                    if ($this->route == "register")
                        return $register;
                    else
                        return $login;
    }        
}
