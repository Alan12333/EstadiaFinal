<?php

class PruebasModel
{
    public $id_user;
    public $visita;
    public $calificacion;
    public $fecha;
    public $con;

    public function __construct()
    {
        $this->con = new Conexion;
    }

    public function POSTIntensidad()
    {
        $count=$this->GETInt();
        $visitas=$this->GETVISITA();

        if($count!=false)
        {
            $cmd="INSERT INTO calificacion_intensidad(id_usuario, visita, id_intensidad, calificacion, fecha)VALUES('$this->id_user','$visitas','$count','$this->calificacion', '$this->fecha')";
            $cmd2="SELECT MAX(id_usuario) AS id FROM visitas";
            $result=$this->con->NEWPOST($cmd,$cmd2);
            return $result;
        }
        else
        {
            return false;
        }
    }
    
    public function FilterIntensidad()
    {
        $cmd="SELECT * FROM calificacion_intensidad WHERE fecha='$this->fecha'";
        return $this->con->ExecuteQuery($cmd);
    }
    
    public function GETInt()
    {
        $cmd="SELECT COUNT(id_intensidad) AS id_int FROM calificacion_intensidad WHERE id_usuario='$this->id_user'";
        $resultado=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $contador= $a['id_int']+1;
        }
        if($contador<=8)
        {
            return $contador;
        }
        else
        {
            return false;
        }
    }

    

    public function GETInt2()
    {
        $cmd="SELECT COUNT(id_intensidad) AS id_int FROM calificacion_intensidad WHERE id_usuario='$this->id_user'";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }


    //Dan comienzo las consultas para las estimulaciones
    
    public function FilterEstimulaciones()
    {
        $cmd="SELECT * FROM calificacion_estimulaciones WHERE fecha='$this->fecha'";
        return $this->con->ExecuteQuery($cmd);
    }

    public function POSTEstimulacion()
    {
        
        $globalcont=$this->GETCountEstimulacion();
        if($globalcont<=6)
        {
            return $this->POST1();
        }
        else if($globalcont<=12)
        {
            return $this->POST2();
        }
        else
        {
            return $this->POST3();
        }
       
    }
    private function POST1()
    {
        $sesion="1";
        $count=$this->GETEst1();
        $visitas=$this->GETVISITA();
        if($count>3)
        {
            $tipo="Salada";
        }
        else
        {
            $tipo="Amarga";
        }
        if($count!=false)
        {
            $cmd="INSERT INTO calificacion_estimulaciones(id_usuario, visita, id_estimulacion, tipo,  calificacion, sesion, fecha)VALUES('$this->id_user','$visitas','$count','$tipo','$this->calificacion', '$sesion', '$this->fecha')";
            $cmd2="SELECT MAX(id_usuario) AS id FROM visitas";
            $result=$this->con->NEWPOST($cmd,$cmd2);
            return $result;
        }
        else
        {
            return "false";
        }
    }

    private function POST2()
    {
        $sesion="2";
        $count=$this->GETEstimulacion2();
        $visitas=$this->GETVISITA();
        if($count>3)
        {
            $tipo="Salada";
        }
        else
        {
            $tipo="Amarga";
        }
        
        if($count!=false)
        {
            $cmd="INSERT INTO calificacion_estimulaciones(id_usuario, visita, id_estimulacion, tipo, calificacion, sesion, fecha)VALUES('$this->id_user','$visitas','$count','$tipo','$this->calificacion', '$sesion','$this->fecha')";
            $cmd2="SELECT MAX(id_usuario) AS id FROM visitas";
            $result=$this->con->NEWPOST($cmd,$cmd2);
            
            return $result;
        }
        else
        {
            return $count;
        }
    }

    private function POST3()
    {
        $sesion="3";
        $count=$this->GETEstimulacion3();
        $visitas=$this->GETVISITA();
        if($count>3)
        {
            $tipo="Salada";
        }
        else
        {
            $tipo="Amarga";
        }
        
        if($count!=false)
        {
            $cmd="INSERT INTO calificacion_estimulaciones(id_usuario, visita, id_estimulacion, tipo, calificacion, sesion, fecha)VALUES('$this->id_user','$visitas','$count','$tipo','$this->calificacion', '$sesion','$this->fecha')";
            $cmd2="SELECT MAX(id_usuario) AS id FROM visitas";
            $result=$this->con->NEWPOST($cmd,$cmd2);
            
            return $result;
        }
        else
        {
            return $count;
        }
    }

    public function GETCountEstimulacion()
    {
        $cmd="SELECT COUNT(id_estimulacion) AS id_est FROM calificacion_estimulaciones WHERE id_usuario='$this->id_user'";
        $resultado=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $contador= $a['id_est']+1;
        }
        return $contador;
    }

    public function GETEst1()
    {
        $cmd="SELECT COUNT(id_estimulacion) AS id_est FROM calificacion_estimulaciones WHERE id_usuario='$this->id_user' AND sesion='1'";
        $resultado=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $contador= $a['id_est']+1;
        }
        if($contador<=6)
        {
            return $contador;
        }
        else
        {
            return false;
        }
    }

    public function GETEstimulacion2()
    {
        $cmd="SELECT COUNT(id_estimulacion) AS id_est FROM calificacion_estimulaciones WHERE id_usuario='$this->id_user' AND sesion='2'";
        $resultado=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $contador= $a['id_est']+1;
        }
        if($contador<=6)
        {
            
            return $contador;
        }
        else
        {
            return false;
        }
    }
    public function GETEstimulacion3()
    {
        $cmd="SELECT COUNT(id_estimulacion) AS id_est FROM calificacion_estimulaciones WHERE id_usuario='$this->id_user' AND sesion='3'";
        $resultado=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $contador= $a['id_est']+1;
        }
        if($contador<=12)
        {
            
            return $contador;
        }
        else
        {
            return false;
        }
    }
    public function GETEst2()
    {
        $cmd="SELECT visita, COUNT(id_estimulacion) AS id_est FROM calificacion_estimulaciones WHERE id_usuario='$this->id_user'";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }


    public function GETUMBRALA()
    {
        $cmd="SELECT * FROM lista_umbrales WHERE tipo='Amargo'";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }
    public function GETUMBRALG()
    {
        $cmd="SELECT * FROM lista_umbrales WHERE tipo='Graso'";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }

    public function GETPREFERENCIA()
    {
        $cmd="SELECT * FROM lista_preferencias";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }

    public function UpdateListaUmbral($num,$tipo)
    {
        $result="";
        for($i=0; $i<10; $i++)
        {
            $random = rand(1,1000);
            $random2=rand(1,1000);
            $cmd="UPDATE lista_umbrales SET masBajo='$random', masAlto='$random2' WHERE nivel='$num' AND tipo='$tipo' AND idNumero='$i'";
            $cmd2="SELECT MAX(id_usuario) AS id FROM visitas";
            $result=$this->con->NEWPOST($cmd,$cmd2);
        }
        return $result;
    }



//cOMIENZA PREFERENCIAS
    public function FilterPref()
    {
        $cmd="SELECT * FROM calificacion_preferencias WHERE fecha='$this->fecha'";
        return $this->con->ExecuteQuery($cmd);
    }
    
    public function InsertarPreferencia($gusto, $nogusto, $lista, $fecha, $sesion, $posicion)
    {
        $visita=$this->GETVISITA();
        $cmd="INSERT INTO calificacion_preferencias(id_usuario, visita, id_gusto, id_no_gusto, id_lista, fecha, sesion,posicion)VALUES('$this->id_user', '$visita', '$gusto', '$nogusto', '$lista','$fecha','$sesion', '$posicion')";
        $cmd2="SELECT MAX(id_usuario) AS id FROM visitas";
        $result=$this->con->NEWPOST($cmd,$cmd2);
        return $result;
    }
    
    public function GETVISITA()
    {
        $cmd ="SELECT * FROM visitas WHERE id_usuario='$this->id_user'";
        $resultado=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $contador =  $a['visita'];
        }
        return $contador;
    }

    public function ObtenerPreferencias()
    {
        $cmd="SELECT COUNT(id_lista) AS id_lis FROM calificacion_preferencias WHERE id_usuario='$this->id_user'";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }
    public function GetCaliInt()
    {
        $cmd = "SELECT * FROM calificacion_estimulaciones c";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }

    public function GetCaliAgr()
    {
        $cmd = "SELECT * FROM calificacion_intensidad c";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }

    public function GetCaliPref()
    {
        $cmd = "SELECT * FROM calificacion_preferencias c";
        return $resultado=$this->con->ExecuteQuery($cmd);
    }
}
?>