<?php

class User_Controller
{
    
    
    public function Perfil()
    {
     session_start();   
        ?>
        <link rel="stylesheet" href="../Views/Components/Usuarios/user.style.css">
        <?php
        require_once("Views/Components/Usuarios/user.index.php");
        ?>
        <script src="../Views/Components/Usuarios/user.script.js"></script>
        <?php
        
    }
    public function error()
    {
        require_once("Views/error.php");
    }

    public function Logout()
    {
        
        session_start();
        unset ($_SESSION['log']);

        session_destroy();

        header("location:../");
    }
    
}
?>