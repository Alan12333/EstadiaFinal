<?php

class Ejercicios_Controller 
{
    
   
    
    public function Intensidad()
    {
        session_start();
        ?>
        
        <link rel="stylesheet" href="../Views/Components/Intensidad/intensidad.style.css">
        <?php
        
        require_once("Views/Components/Intensidad/intensidad.index.php");
        ?>
        <script src="../Views/Components/Intensidad/intensidad.script.js"></script>
        <?php
    }
    public function Agrado()
    {
         session_start();
        ?>
        
        <link rel="stylesheet" href="../Views/Components/Agrado/Agrado.style.css">
        <?php
        require_once("Views/Components/Agrado/Agrado.index.php");
        ?>
        <script src="../Views/Components/Agrado/Agrado.script.js"></script>
        <?php
    }
    public function Preferencias()
    {
         session_start();
        ?>
        
        <link rel="stylesheet" href="../Views/Components/Preferencias/preferencias.style.css">
        <?php
        require_once("Views/Components/Preferencias/preferencias.index.php");
        ?>
        <script src="../Views/Components/Preferencias/preferencias.script.js"></script>
        <?php
    }

    public function UmbralAmargo()
    {
         session_start();
        ?>
        
        <link rel="stylesheet" href="../Views/Components/UmbralA/umbralamargo.style.css">
        <?php
        require_once("Views/Components/UmbralA/umbralamargo.index.php");
        ?>
        <script src="../Views/Components/UmbralA/umbralamargo.script.js"></script>
        <?php
    }
    public function error()
    {
        require_once("Views/error.php");
    }
    public function UmbralGraso()
    {
         session_start();
        ?>
        
        <link rel="stylesheet" href="../Views/Components/UmbralG/umbralgraso.style.css">
        <?php
        require_once("Views/Components/UmbralG/umbralgraso.index.php");
        ?>
        <script src="../Views/Components/UmbralG/umbralgraso.script.js"></script>
        <?php
    }
}


?>