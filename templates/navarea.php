<nav>
    <ul class = "navbtn">
        <li><a href="./?route=index">Aesais</a></li>
        <li><a href="./?route=ue4andOOP">UE4 and OOP</a></li>
        <li><a href="./?route=ue4andCpp">UE4 and C++</a></li>
        <li><a href="./?route=ue4andBlueprint">UE4 and Blueprint</a></li>
        <li><a href="./?route=projects">Aesais Tower Defense</a></li>
        <?php 
        if (!isset($_SESSION['level']))
        {
            ?>
            <li><a href="./?route=login">Login</a></li>
            <li><a href="./?route=register">Register</a></li>
            <?php
        }
        else
        {
            ?>
            <li style="float: right;"><a href="./?route=index&action=logout">Logout</a></li>
            <?php
            if ($frontController->getEditable())
            {
                echo $_SESSION['username'];
        ?>
            
            <li style="float: right;"><a href="./?route=edit&action=edit&page=<?php echo $_GET['route']; ?>">Edit Page</a></li>
        <?php
            }
        }
        ?>
    </ul>
</nav>
