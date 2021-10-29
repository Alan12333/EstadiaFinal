<?php

class Principal_Controller
{
    
    
    public function index()
    {
        $tipo="";
        ?>
        <link rel="stylesheet" href="Views/index.style.css">
       
        <?php
            require_once("Views/index.php");
            ?>
            <script src="Views/index.script.js"></script>
            <?php
        
    }
    public function error()
    {
        require_once("Views/error.php");
    }
    public function Acerca()
    {
        $tipo="Acerca";
        ?>
        
        <link rel="stylesheet" href="Views/index.style.css">
        <?php
        require_once("Views/index.php");
         ?>
            <script src="Views/index.script.js"></script>
            <?php
        
    }
    public function Registro()
    {
        
        ?>
         <link rel="stylesheet" href="Views/Components/Registro_Us/Registro_Us.style.css">
        <?php
        
        if(isset($_SESSION['log'])!=true)
        {
            $tipo="";
            
            require_once("Views/Components/Registro_Us/Registro_Us.index.php");
        }
        else {
             ?>
                <script>window.location="User/Perfil"</script>
            <?php
        }
        
        ?>
        <script src="Views/Components/Registro_Us/Registro_Us.script.js"></script>
        <?php
    }

    public function Updatelist()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/UdateList/updatelist.style.css">
        <?php
             require_once("Views/Components/UdateList/updatelist.index.php");
        ?>
        <script src="Views/Components/UdateList/updatelist.script.js"></script>
        <?php
    }
    public function AgradoResult()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/vista_agrado/vista_agr.style.css">
        <?php
             require_once("Views/Components/vista_agrado/vista_agr.index.php");
        ?>
        <script src="Views/Components/vista_agrado/vista_agr.script.js"></script>
        <?php
    }
    public function IntensidadResult()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/vista_intensidad/vista_i.style.css">
        <?php
             require_once("Views/Components/vista_intensidad/vista_i.index.php");
        ?>
        <script src="Views/Components/vista_intensidad/vista_i.script.js"></script>
        <?php
    }
    public function PreferenciaResult()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/vista_preferencia/vista_p.style.css">
        <?php
             require_once("Views/Components/vista_preferencia/vista_p.index.php");
        ?>
        <script src="Views/Components/vista_preferencia/vista_p.script.js"></script>
        <?php
    }
    public function AmargoUmbralResult()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/vista_amargo/vista_amar.style.css">
        <?php
            require_once("Views/Components/vista_amargo/vista_amar.index.php");
        ?>
        <script src="Views/Components/vista_amargo/vista_amar.script.js"></script>
        <?php
    }
    public function GrasoUmbralResult()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/vista_graso/vista_g.style.css">
        <?php
            require_once("Views/Components/vista_graso/vista_g.index.php");
        ?>
        <script src="Views/Components/vista_graso/vista_g.script.js"></script>
        <?php
    }

    public function Results()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/Results/Results.style.css">
        <?php
            require_once("Views/Components/Results/Results.index.php");
        ?>
        <script src="Views/Components/Results/Results.script.js"></script>
        <?php
    }

    public function real()
    {
        ?>
        <link rel="stylesheet" href="Views/Components/real/real.style.css">
        <?php
            require_once("Views/Components/real/real.index.php");
        ?>
        <script src="Views/Components/real/real.script.js"></script>
        <?php
    }
}

?>