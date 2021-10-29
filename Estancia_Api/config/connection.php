<?php
class Conexion
{
    private $con;

   
    private function Conection()
    {
       
        /* Conectar a una base de datos de MySQL invocando al controlador */
        try {
            $this->con = new PDO(SERVIDOR,USUARIO,PASSWORD);
            return $this->con;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
            return 0;
        }
    }

    private function Disconect()
    {
        $this->con=null;
    }

    //Se crea una fucio publica para ejecutar las consultas en las cuales se obtendran datos
    public function ExecuteQuery($cmd)//Se pasa como parametro el comando a ejecutar en mysql
    {
        try
        {
            $this->Conection();
            $cone = $this->con;
            $sentencia=$cone->prepare($cmd);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $this->Disconect();
            return $sentencia;
        }
        catch(Execption $e)
        {
            die("Error en ->".$e);
        }
        
    }

    public function NEWPOST($query, $queryAutoIncrement){
        try{
            $this->Conection();
            $sentencia=$this->con->prepare($query);
            $sentencia->execute();
            $idAutoIncrement=$this->ExecuteQuery($queryAutoIncrement)->fetch(PDO::FETCH_ASSOC);
            $resultado=array_merge($idAutoIncrement, $_POST);
            $sentencia->closeCursor();
            $this->Disconect();
            return $resultado;
        }catch(Exception $e){
            die("Error: ".$e);
        }
    }

    function DELETES($query){
        try{
            $this->Conection();
            $sentencia=$this->con->prepare($query);
            $result=$sentencia->execute();
            $sentencia->closeCursor();
            $this->Disconect();
            if($result==true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }catch(Exception $e){
            die("Error: ".$e);
        }
    }
}
?>

