<?php
require_once("inputfilter.php");
/*Esta es pagina de carga del nucleo principal*/
class Modules
{
    public $title;
    public $style;
    public $script;
    public $view;

    public function LoadViewPage($vista, $title)
    {
        $style=$vista;
        $scripts=$vista;
        $propose="1";
        require_once('req.php');
        require_once('phis.php');
        try {
            require_once('Views/'.$vista.'/'.$vista.'.struct.php');   
            require_once('Views/'.$vista.'/'.$vista.'.index.php');
        } catch (Exception $err) {
            echo $err;
        }
    }
    public function LoadViewPageGSJ($vista, $title)
    {
        $style=$vista;
        $scripts=$vista;
        $propose="2";
        require_once('req.php');
        include('phis.php');
        
        
    }
    public function LoadViewPageVue($vista, $title)
    {
        $style=$vista;
        $scripts=$vista;
        $propose="3";
        require_once('req.php');
        include('phis.php');
        
    }
    public function LoadPage($vista, $title)
    {
        $style=$vista;
        $scripts=$vista;
        $propose="1";
        require_once('req.php');
        include('phis.php');
        
        
    }
    public function PageView($vista,$titulo,$params)
    {
        $style=$vista;
        $scripts=$vista;
        $title=$titulo;
        $propose='2';
        require_once('req.php');
        include('phis.php');
    }

    public function PageModuleView($vista,$title,$params)
    {
        $style=$vista;
        $scripts=$vista;
        $propose='2';
        require_once('req.php');
        include('phis.php');
        
    }



    //Databases

    public function ExecuteQuery($cmd, $con)
    {
        $mysql = mysqli_query($con, $cmd);
        if($mysql)
        {
            return $mysql;
        }
        else
        {
            echo "<div class='cont-100 bkr wh cen'>Errormessage: ".mysqli_errno($con)." You have an error in your SQL syntax</div>";
        }
    }
    
    public function ExecuteQueryJSON($query, $con)
	{
		$res=array();
		$res_consulta=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($res_consulta))
		{
            array_push($res,$row);
		}
		return $res;
	}

    public function Asociate($cmd, $con)
    {
        $mysql = mysqli_query($con, $cmd);
        $row=mysqli_fetch_assoc($mysql);
        if($mysql)
        {
            return $row;
        }
        else
        {
            echo "error";
        }
    }

    public function AsociateString($string)
    {
        $row=mysqli_fetch_array($string);
        return $row;
    }
    


    //Seguridad
    public function SecureString($con,$string)
    {
        $cadena = $con->real_escape_string($string);
        return $cadena;
    }

    public function Clean_Filters($filters, $atributo)
    {

    }

    public function Clean($atributo)
    {
        $inputfilter = new InputFilter(array('p','scipt','div','a','b','br','i','li','ul','img'), array('src','href'));
        return $inputfilter->process($atributo);
    }

    public function Filters($etiquetas,$atributos)
    {
        $inputfilter = new InputFilter();
    }
}
?>