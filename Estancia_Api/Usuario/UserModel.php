<?php

class UserModel
{
    public $id;
    public $Nombre;
    public $Peso;
    public $Edad;
    public $Altura;
    public $Genero;
    public $Cintura;
    public $Imc;
    public $Numero;
    private $conection;

    function __construct()
    {
        $this->conection=new Conexion;
    }

    function GET()
    {
        $cmd = "SELECT * FROM usuario";
        return $this->conection->ExecuteQuery($cmd);
    }
    function GETALLVISIT()
    {
        $cmd = "SELECT * FROM visitas WHERE id_usuario='$this->id'";
        return $this->conection->ExecuteQuery($cmd);
    }
    function GETID()
    {
        $cmd = "SELECT  COUNT(visita) as id FROM visitas WHERE id_usuario='$this->id'";
        $resultado=$this->conection->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
         {
            $contador= $a['id'];
         }
        $cmd2="SELECT * FROM visitas WHERE  visita='$contador' AND id_usuario='$this->id'";
        return $this->conection->ExecuteQuery($cmd2);
    }

    function POST()
    {
        $cmd="INSERT INTO usuario(Nombre, Peso, edad, altura, Genero, imc, cintura)VALUES('$this->Nombre', '$this->Peso','$this->Edad','$this->Altura','$this->Genero', '$this->Imc', '$this->Cintura')";
        $cmd2="SELECT MAX(id_usuario) AS id FROM usuario";
        $result=$this->conection->NEWPOST($cmd,$cmd2);
        return $result;
    }

    function PUT()
    {
        $cmd="UPDATE usuario SET nombre='$this->Nombre',peso='$this->Peso',genero='$this->Genero',edad='$this->Edad',altura='$this->Altura', imc='$this->Imc', cintura='$this->Cintura' WHERE id_usuario='$this->id'";
        $cmd2="SELECT id_usuario AS id FROM Usuario WHERE id_usuario='$this->id'";
        $result=$this->conection->NEWPOST($cmd,$cmd2);
        return $result;
    }

    function GETCONCEN($id)
    {
        $cmd = "SELECT * FROM concentimiento WHERE Id_U = '$id'";
        return $this->conection->ExecuteQuery($cmd);
    }

    

    function POSTVISITA($visita)
    {
        $cmd="INSERT INTO visitas(id_usuario, visita, peso, edad, altura, imc, cintura)VALUES('$this->id','$visita','$this->Peso','$this->Edad','$this->Altura','$this->Imc','$this->Cintura')";
        $cmd2="SELECT MAX(id_usuario) AS id FROM usuario";
        $result=$this->conection->NEWPOST($cmd,$cmd2);
        return $result;
    }

    function GETVISIT($id)
    {
        $cmd="SELECT count(id_usuario) as contvi FROM visitas WHERE id_usuario='$id'";
        return $this->conection->ExecuteQuery($cmd);
    }

    function POSTCON()
    {
        $cmd="INSERT INTO concentimiento (Id_U, Respuesta)VALUES('$this->id','Si')";
        $cmd2="SELECT MAX(id_usuario) AS id FROM usuario";
        $result=$this->conection->NEWPOST($cmd,$cmd2);
        return $result;
    }

    function GETCONT($id)
    {
        $cmd="SELECT count(Id_U) as id FROM concentimiento WHERE Id_U='$id'";
        return $this->conection->ExecuteQuery($cmd);
    }
    function GETSESION($id)
    {
        $cmd1 = "SELECT COUNT(id_u) as id FROM sesion WHERE id_u='$this->id'";
        return $this->conection->ExecuteQuery($cmd);
    }
}