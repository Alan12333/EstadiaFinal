var formulario = document.getElementById("form");
var alerta = document.getElementById("Ale");
var mensaje = document.getElementById("Mensaje");
var numeros=document.getElementById("numeros");
var numero = document.getElementById("num");
var number2=document.getElementById("numero");
const inputs = document.querySelectorAll( '.fake_placeholder input' );

inputs.forEach( input => {
	//cuando entramos en el input 
	input.onfocus = ( ) => {
		//al elemento anterior (el span) le agregamos la clase que la reubica en top
		input.previousElementSibling.classList.add( 'reubicar' );
	}
	
	//cuando salimos del input
	input.onblur = ( ) => {
		//si no hay texto, le quitamos la clase reubicar, 
		//para que se superponga con el input
		if( input.value.trim( ).length == 0 )
		input.previousElementSibling.classList.remove( 'reubicar' );
	}
} );
numeros.addEventListener('change',function(e){
    var actions = document.getElementById("action");
    number2.style.display=this.checked ? "block" : "none";
    actions.value=this.checked ? "POSTVIS" : "POST";
    console.log(actions.value);
})

formulario.addEventListener('submit',function(e) {
    e.preventDefault();
   if(numeros.checked)
   {
      
        GetUser();
   }
   else
   {
        Registrar();
   }
})


function Registrar()
{
    var datos = new FormData(formulario);
    
    fetch('https://frontera2019.com.mx/Estancia_Api/Usuario/POST',{
            method:"POST",
            body:datos
        })
        .then(res=>res.json())
        .then(data=>{
            if(data=='Error')
            {
                alerta.style.background="red";
                alerta.style.webkitTransform="TranslateX(0%)";
                alerta.style.transition="1s";
                mensaje.innerText="Campos Vacios";
                
            }
            else
            {
                
                alerta.style.background="green";
                alerta.style.webkitTransform="TranslateX(0%)";
                alerta.style.transition="1s";
                mensaje.innerText=`Usuario Registrado!  Tu numero es: ${data.id}`;
                var id = data.id;
                setInterval(Iniciar(id),3000); 
            }
        })
}

function IngresarconNumero()
{
    var datos = new FormData(formulario);
   
    fetch('https://frontera2019.com.mx/Estancia_Api/Usuario/POSTVIS',{
            method:"POST",
            body:datos
        })
        .then(res=>res.json())
        .then(data=>{
            if(data=='Error')
            {
                alerta.style.background="red";
                alerta.style.webkitTransform="TranslateX(0%)";
                alerta.style.transition="1s";
                mensaje.innerText="Campos Vacios";
                
            }
            else
            {
              Iniciar("");
            }
        })
        .catch(err=>{
            console.log(err);
        })
}

function GetUser()
{

    var url='https://frontera2019.com.mx/Estancia_Api/Usuario/GET/'+numero.value;
    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        
        if(data===false)
        {
            alerta.style.background="red";
            alerta.style.webkitTransform="translateX(0%)";
            alerta.style.transition="1s";
            mensaje.innerText="Tu numero no esta Registrado"; 
        }
        else
        {
            IngresarconNumero();
        }
    })
}

function MostrarAlerta()
{
    var alerta = document.getElementById("Ale");
    alerta.style.webkitTransform="TranslateX(100%)";
}




function Iniciar(datosalterno)
{
   
    if(numeros.checked)
    {
        var datos = new FormData(formulario);
        fetch('Views/Components/Registro_Us/Registro_Us.struct.php',{
            method:"POST",
            body:datos
        })
        .then(res=>res.json())
        .then(data=>{
            if(data==="Si")
            {
                window.location="User/Perfil";
            }
        })
    }
    else
    {
        
        numero.value=datosalterno;
        var datos = new FormData(formulario);
        fetch('Views/Components/Registro_Us/Registro_Us.struct.php',{
            method:"POST",
            body:datos,
        })
        .then(res=>res.json())
        .then(data=>{
            if(data==="Si")
            {
                IngresarVisita();
            }
        })
        .catch(err=>{
            console.log(err)
        })
    }
}


function IngresarVisita()
{
    var actions = document.getElementById("action");
    actions.value="POSTVIS";
    var datos = new FormData(formulario);
   
    fetch('https://frontera2019.com.mx/Estancia_Api/Usuario/POSTVIS',{
            method:"POST",
            body:datos
        })
        .then(res=>res.json())
        .then(data=>{
            window.location="User/Perfil";
        })
        .catch(err=>{
            console.log(err);
        })
}