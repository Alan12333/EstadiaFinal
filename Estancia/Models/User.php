<?php

class User
{
    public $nombre;
    public $id;
    public $apellido;
    public $edad;
    public $sexo;

    function __construct($id,$nombre,$apellido,$edad,$sexo)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->edad=$edad;
        $this->sexo=$sexo;
    }

    public static function GET()
    {
        $lista=[];
        $conection = new DB;
        $cmd="SELECT * FROM usuarios";
        $cont=0;
        $query=mysqli_query($conection->Con(),$cmd);
        while ($row=mysqli_fetch_array($query)) 
        {
            $lista[$cont] = new User($row['Id'],$row['Nombre'],$row['Apellido'],$row['Edad'],$row['Sexo']);
            $cont++;
        }
        return $lista;
    }

    public static function POST($usuario)
    {
        require_once("../config/connection.php");
        $conection = new DB;
        $cmd="INSERT INTO usuarios(Nombre,Apellido,Edad,Sexo)VALUES('$usuario->nombre','$usuario->apellido','$usuario->edad','$usuario->sexo')";
        $query=mysqli_query($conection->Con(),$cmd);
        return 1;
    }

    public static function UPDATE($usuario)
    {
        require_once("../config/connection.php");
        $conection = new DB;
        $cmd="UPDATE usuarios SET Nombre='$usuario->nombre', Apellido='$usuario->apellido',Edad='$usuario->edad',Sexo='$usuario->sexo' WHERE Id='$usuario->id'";
        $query=mysqli_query($conection->Con(),$cmd);
        if($query)
        {
            header("location:../");
        }
        else
        {
            echo "Error";
        }
    }
    public static function GETID($id)
    {
        $conection = new DB;
        $cmd="SELECT * FROM usuarios WHERE id='$id'";
        $query=mysqli_query($conection->Con(),$cmd);
        $row=mysqli_fetch_assoc($query);
        $usuario= new User($row['Id'],$row['Nombre'],$row['Apellido'],$row['Edad'],$row['Sexo']);
        return $usuario;
    }

    public static function DELETE($id)
    {
        $conection = new DB;
        $cmd="DELETE FROM usuarios WHERE id='$id'";
        $query=mysqli_query($conection->Con(),$cmd);
        if($query)
        {
            header("location:../");
        }
        else
        {
            echo "Error";
        }
    }
}

?>