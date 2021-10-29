<?php

class Umbral
{
    public $id_u;
    public $prueba;
    public $direccion;
    public $respuesta;
    public $lista;
    public $id_numero;
    public $cambio_lista;
    public $tipo;
    private $con;

    public function __construct()
    {
        $this->con = new Conexion;
    }

    public function GETresultamargo()
    {
        $cmd="SELECT * FROM calificacion_umbrales WHERE tipo='Amargo'";
        return $resultado = $this->con->ExecuteQuery($cmd);
    }
    public function GETresultgraso()
    {
        $cmd="SELECT * FROM calificacion_umbrales WHERE tipo='Graso'";
        return $resultado = $this->con->ExecuteQuery($cmd);
    }
    public function GetCalificacion()
    {
        $visita=$this->GetVisita();
        $cmd="SELECT * FROM calificacion_umbrales WHERE id_usuario='$this->id_u' AND visita='$visita' AND tipo='$this->tipo' ORDER BY prueba DESC LIMIT 1";
        $resultados=$this->con->ExecuteQuery($cmd);
        $a=$resultados->fetchAll(PDO::FETCH_OBJ);
        $posicion=0;
        $this->prueba=1;
        $this->id_numero=0;
        if(isset($a[0])!=null)
        {
            $posicion=$a[0]->lista;
            $posicion = ($a[0]->direccion=="izquierda")?$posicion-1:(($a[0]->direccion=="derecha")?$posicion+1:$posicion);
            $this->prueba=$a[0]->prueba+1;
            $this->id_numero=($a[0]->cambio_lista=='0')? $a[0]->idNumero + 1 : $this->id_numero;
        }
        
       return $this->ResultadosUmbral($visita, $posicion);
    }

    public function ResultadosUmbral($visita, $posicion)
    {
        $cmd="SELECT * FROM calificacion_umbrales WHERE id_usuario = '$this->id_u'  AND visita = '$visita' AND tipo = '$this->tipo' AND lista ='$posicion' ORDER BY prueba DESC LIMIT 1 ";
        $query=$this->con->ExecuteQuery($cmd);
        $cmd2="SELECT * FROM lista_umbrales WHERE tipo = '$this->tipo' AND nivel = '$posicion'";
        $query2=$this->con->ExecuteQuery($cmd2);
        $b=$query->fetchAll(PDO::FETCH_OBJ);
        $c=$query2->fetchAll();
        $this->id_numero=(isset($b[0])!=null)? $b[0]->idNumero + 1: $this->id_numero;
        $this->id_numero=($this->id_numero==count($c))? 0: $this->id_numero;


        $cmd3="SELECT * FROM lista_umbrales WHERE tipo = '$this->tipo' AND idNumero = '$this->id_numero'";
        $query3=$this->con->ExecuteQuery($cmd3);
        $lista=$query3->fetchAll(PDO::FETCH_OBJ);
        $obj=array("masAlto"=>$lista[$posicion]->masAlto,"masBajo"=>$lista[$posicion]->masBajo, "idNumero"=>$this->id_numero);
        return $obj;
    }





    public function Postumbral()
    {
        $visita=$this->GetVisita();
        $this->id_numero=($this->id_numero=="")?0:$this->id_numero;
        $cambio_lista=true;
        $cambio="indefinido";
        $this->respuesta=( $this->respuesta=="false")? "0": "1";
        $cmd="SELECT * FROM calificacion_umbrales WHERE id_usuario = '$this->id_u' AND visita = '$visita' AND tipo = '$this->tipo'";
        $query=$this->con->ExecuteQuery($cmd);
        $cmd2="SELECT DISTINCT nivel FROM lista_umbrales WHERE tipo = '$this->tipo'";
        $query2=$this->con->ExecuteQuery($cmd2);
        $lista=$query2->fetchAll();
        $posicion=0;
        $numvueltas=0;
        $numPrueba=1;
        $row=$query->fetchAll(PDO::FETCH_OBJ);
        $vueltas="";
        if(isset($row[1])!=null)
        {
            $vueltas= ($row[0]->direccion=="indefinido")? $row[1]->direccion: $row[0]->direccion;
            for($i=0; $i<count($row);$i++)
            {
                if($row[$i]->direccion!=$vueltas && $row[$i]->direccion!="ninguna" && $row[$i]->direccion!="indefinido" || $row[$i]->direccion=="ninguna"){
                    $numvueltas++;
                    $vueltas = $row[$i]->direccion;
                }
            }
        }
        if($this->respuesta!=" ")
        {
            $cambio_lista="0";
            $cambio="indefinido";
            if(isset($row[0])==null)
            {
                if($this->respuesta!="1")
                {
                    $cambio_lista = "1";
                    $cambio = "derecha";
                }
            }
            else
            {
                
                $ultimo = (count($row) - 1);
                $numPrueba = ($row[$ultimo]->prueba + 1);
                $posicion = $row[$ultimo]->lista;
                if($row[$ultimo]->cambio_lista)
                {
                    if($row[$ultimo]->direccion=="izquierda")
                    {
                        $posicion = $row[$ultimo]->lista - 1;
                    }
                    else
                    {
                        $posicion = $row[$ultimo]->lista + 1;
                    }
                }

                if($row[$ultimo]->direccion=="indefinido" && $this->respuesta=="1" && $posicion || $this->respuesta!="1" && $posicion != (count($lista)-1))
                {
                    $cambio_lista = "1";
                }
                if($this->respuesta!="1" && $posicion != (count($lista)-1))
                {  
                    $cambio = "derecha";
                }
               
                if($this->respuesta=="1" && $posicion != 0 && $row[$ultimo]->direccion=="indefinido")
                {
                    $cambio = "izquierda";
                }
                
                if($this->respuesta!="1" && $posicion == (count($lista)-1) || $this->respuesta=="1" && $posicion == 0 && $row[$ultimo]->direccion=="indefinido")
                {
                    $cambio = "ninguna";
                }
                if($cambio!=$vueltas && $cambio!="ninguna" && $cambio!="indefinido" && count($row)!=1 || $cambio=="ninguna")
                {
                    $numvueltas++;
                }   
            } 
            if($numvueltas<8)
            {
                $post="INSERT INTO calificacion_umbrales(id_usuario, tipo, prueba, visita, respuesta, direccion, lista, idnumero, cambio_lista)VALUES('$this->id_u','$this->tipo', '$numPrueba', '$visita', '$this->respuesta', '$cambio', '$posicion', '$this->id_numero', '$cambio_lista')";
                $cmd2="SELECT MAX(id_usuario) AS id FROM usuario";
                $result=$this->con->NEWPOST($post,$cmd2);
            }  
            
            if($numvueltas>=8)
            {
                $json = array("idNumero"=>"complete");
                return $json;
            }
            else
            {
                $json = array("idNumero"=>"$numvueltas");
                return $json;
            }
        }
            
    }
    
    public function CountNumber()
    {
        $visita=$this->GetVisita();
        $cmd="SELECT Count(id_usuario) as numero FROM calificacion_umbrales WHERE id_usuario='$this->id_u' AND visita='$visita' AND direccion='indefinido' AND tipo='$this->tipo'";
        $result = $this->con->ExecuteQuery($cmd);
        return $result;
    }
    
    
    public function SpecialCase($id)
    {
        $cmd="SELECT COUNT(id_usuario) id FROM calificacion_umbrales WHERE id_usuario='$id' AND lista='0' AND respuesta='1'";
        $resultados=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultados->fetch(PDO::FETCH_ASSOC)) 
        {
            $contador=$a['id'];   
        }
        if($contador==8)
        {
            return "Complete";
        }
        else
        {
            return $contador;
        }
    }
    
    public function GetVisita()
    {
        $cmd="SELECT MAX(visita) as visita FROM visitas WHERE id_usuario ='$this->id_u'";
        $resultados=$this->con->ExecuteQuery($cmd);
        $contador=0;
        while ($a = $resultados->fetch(PDO::FETCH_ASSOC)) 
        {
            $contador=$a['visita'];   
        }
        return $contador;
    }
}

?>