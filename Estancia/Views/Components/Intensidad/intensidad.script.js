var contador = document.getElementById("contador");
var rango = document.getElementById("rango");
var btn1 = document.getElementById("btn1");
var texto=document.getElementById('texto_principal');
var id=document.getElementById('id');
var pruebas=document.getElementById('Pruebas');
var visitas=document.getElementById("Realizado");
var cuestion=document.getElementById("cuestion");
var start=document.getElementById("btnComenzarGrabacion");
var arrayInput = [];
var videoName = "";
var nuevovalor;
var  nuevafecha="";
var inputsValues = document.getElementsByClassName('name');
nameValues = [].map.call(inputsValues,function(dataInput){
    arrayInput.push(dataInput.value);
})
var alerta = document.getElementById("Ale");
var mensaje = document.getElementById("Mensaje");

var modal1 = document.getElementById("modal1");
var modal2 = document.getElementById("modal2");
var cont=0;

window.addEventListener('load',function(){
    var lasCookies = readCookie("usrbdm_dd");
    if(lasCookies==id.value)
    {
        modal1.style.display="none";
    }
    else
    {
        document.cookie = "usrbdm_dd="+id.value+"; max-age=36009807; path=/";
    }
})

modal2.addEventListener("click",function(){
    modal2.style.display="none";
})



function CloseModal1()
{
    modal1.style.display="none";
    
}

function readCookie(name) {

    var nameEQ = name + "="; 
    var ca = document.cookie.split(';');
  
    for(var i=0;i < ca.length;i++) {
  
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) {
        return decodeURIComponent( c.substring(nameEQ.length,c.length) );
      }
  
    }
  
    return null;
  
  }

function MostrarAlerta()
{
    alerta.style.webkitTransform="TranslateX(100%)";
}


rango.addEventListener("input", function(){

    
    if(rango<100)
    {
        nuevovalor="0."+rango.value;
    }
    else if(rango.value==0)
    {
        nuevovalor=0;
    }
    else
    {
        nuevovalor=((rango.value/10)/10);
        if(nuevovalor==0.13999999999999999)
        {
            nuevovalor=0.14;
        }
    }

    contador.innerText=nuevovalor;
    
})

start.addEventListener("click", function(){

    pruebas.style.display="block";
    start.style.display="none";
    btn1.style.display="block";
    IniciarVideo();
})


function ObtenerFecha()
{
    const f=  Date.now();
    const fecha = new Date(f);
    var dates = fecha.toUTCString();
    var arreglo = dates.split(" ");
    var mes="";
    if(arreglo[2]=="Jan")
    {
        mes="Enero";
    }
    if(arreglo[2]=="Feb")
    {
        mes="Febrero";
    }
    if(arreglo[2]=="Mar")
    {
        mes="Marzo";
    }
    if(arreglo[2]=="Apr")
    {
        mes="Abril";
    }
    if(arreglo[2]=="May")
    {
        mes="Mayo";
    }
    if(arreglo[2]=="Jun")
    {
        mes="Junio";
    }
    if(arreglo[2]=="Jul")
    {
        mes="Julio";
    }
    if(arreglo[2]=="Ago")
    {
        mes="Agosto";
    }
    if(arreglo[2]=="Sep")
    {
        mes="Septiembre";
    }
    if(arreglo[2]=="Oct")
    {
        mes="Octubre";
    }
    if(arreglo[2]=="Nov")
    {
        mes="Noviembre";
    }
    if(arreglo[2]=="Dec")
    {
        mes="Diciembre";
    }
    nuevafecha=arreglo[1]+"-"+mes+"-"+arreglo[3];
   
}

function Enviardatos()
{
    var datos = new FormData();
    datos.append("id_usuario",id.value);
    datos.append("action","POSTEST");
    datos.append("calificacion",nuevovalor);
    datos.append("fecha", nuevafecha);
    fetch('https://frontera2019.com.mx/Estancia_Api/Prueba/POSTEST',{
        method:"POST",
        body:datos
    })
    .then(res=>res.json())
    .then(data=>{
        console.log(data)
        GETINT();
    })
}


window.addEventListener("load",function(){
    rango.value=0;
    GETINT();
})



function ChangeVideoName(numero)
{
    videoName="Intenisdad-SustanciaA-"+numero+"-User:"+id.value;
}



function GETINT()
{
    var url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETTEST/'+id.value;
    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        if(data.id_est>5)
        {
          fetch("https://frontera2019.com.mx/Estancia_Api/Usuario/GETVIS/"+id.value)
          .then(res=>res.json())
          .then(datos=>{
              console.log(data.visita+" "+ data.id_est)
             
              if(parseInt(data.visita)<parseInt(datos.contvi))
              {
                    if(parseInt(data.id_est)===9)
                    {
                        modal2.style.display="block";
                    }
                    else if(parseInt(data.id_est)===15)
                    {
                        modal2.style.display="block";
                    }
                    if(data.id_est>17)
                    {
                        window.location="../User/Perfil";
                    }
                    else
                    {
                        visitas.value=`${data.id_est}`;
                        var numeros=parseInt(visitas.value)+1;
                        texto.innerHTML="Muestra A "+numeros;
                        rango.value="0";
                        contador.innerText="0";
                       
                        ChangeVideoName(numeros);
                        if(data.id_est<=8 && data.id_est>6 || data.id_est<=15 && data.id_est>=12)
                        {
                            cuestion.innerHTML="Que tan amarga te parecio la Muestra?";
                        }
                        else
                        {
                            validaciones();
                            cuestion.innerHTML="Que tan Salada te parecio la Muestra?";
                        }
                    }
              }
              else
              {
                window.location="../User/Perfil";
              }
          })
        }
        else
        {
            visitas.value=`${data.id_est}`;
            var numeros=parseInt(visitas.value)+1;
            texto.innerHTML="Muestra A"+numeros;
            rango.value="0";
            contador.innerText="0";
            if(cont==3)
            {
                modal2.style.display="block";
            }            
            if(data.id_est<=2)
            {
                cuestion.innerHTML="Que tan amarga te parecio la Muestra?";
            }
            else
            {
                validaciones();
                cuestion.innerHTML="Que tan salada te parecio la Muestra?";
            }
            ChangeVideoName(numeros);
        }
        
    })
    .catch(err=>{
        console.log(err)
    })
}

function validaciones()
{
    if(cont==0)
    {
        cont=3;
    }
    else
    {
        cont=1;
    }
}

function validaciones2()
{
    if(cont==0)
    {
        cont=9;
    }
    else
    {
        cont=1;
    }
}


function IniciarVideo(){
    navigator.mediaDevices.getUserMedia({audio:true, video:true})
    .then(record)
    .catch(err => {
        alerta.style.background="red";
        alerta.style.webkitTransform="TranslateX(0%)";
        alerta.style.transition="1s";
        mensaje.innerText="No podras realizar la prueba: Camara y audio desactivados";
    });
};

let chunks = [];

function record(stream){
    video.srcObject = stream;

    let mediaRecorder = new MediaRecorder(stream,{
        mimetype:'video/mp4;condecs=h264'
    });

    mediaRecorder.start();
    mediaRecorder.ondataavailable = function(e){
        //console.log(e.data);
        chunks.push(e.data);
    }

    mediaRecorder.onstop = function(){
        //alert('Finalizo la grabacion');
        let blod = new Blob(chunks,{type:"video/mp4"});
        chunks = [];
        download(blod);
    }
    
    btn1.addEventListener("click",function(e){
        console.log(visitas.value)
        if(visitas.value==4)
        {
            btn1.innerText="Finalizar";
        }
        if(visitas.value<=5)
        {
            mediaRecorder.stop();
            Enviardatos();
            mediaRecorder.start();
            GETINT();
        }
        else if(visitas.value<=11 && visitas.value>=6)
        {
            
            mediaRecorder.stop();
            Enviardatos();
            mediaRecorder.start();
            GETINT();
        } 
        if(visitas.value==10)
        {
            btn1.innerText="Finalizar";
        }

        if(visitas.value==18)
        {
            btn1.innerText="Finalizar";
        }
        else if(visitas.value<=18 && visitas.value>=12)
        {
            
            mediaRecorder.stop();
            Enviardatos();
            
            mediaRecorder.start();
            GETINT();
        }
       
    })
}



function download(blod)
{
    
    var link = document.createElement("a");
    link.href = window.URL.createObjectURL(blod);
    link.setAttribute("download",videoName);
    link.style.display = "none";
    

    document.body.appendChild(link);

    link.click();
    link.remove();
    arrayInput = [];
}