<?php

?>
<link rel="stylesheet" href="../public/css/style.css"> 
<!-- <script src="public/js/fucntion.js"></script> Toma el script global-->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuario</title>
<?php

if(isset($_SESSION['log'])==true)
{
    function Init()// Se cargan los funciones o metodos inicialmente
    {
        $id=$_SESSION['id'];
        echo $id;
    }
}
else {
    function Init()
    {
        
    }
}



?>