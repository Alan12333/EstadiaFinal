var contador = document.getElementById("contador");
var rango = document.getElementById("rango");
var btn1 = document.getElementById("btn1");
var texto=document.getElementById('texto_principal');
var id=document.getElementById('id');
var pruebas=document.getElementById('Pruebas');
var formulario=document.getElementById('form');
var visitas=document.getElementById("Realizado");
var comienzo=document.getElementById("btnComenzarGrabacion");
var arrayInput = [];
var videoName="";
var datess= document.getElementById("fecha");
var inputsValues = document.getElementsByClassName('name');
nameValues = [].map.call(inputsValues,function(dataInput){
    arrayInput.push(dataInput.value);
})
var nuevafecha="";
var alerta = document.getElementById("Ale");
var mensaje = document.getElementById("Mensaje");
                
function MostrarAlerta()
{
    alerta.style.webkitTransform="TranslateX(100%)";
}


window.addEventListener("load", function()
{
    GETINT();
    ObtenerFecha();
})

rango.addEventListener("input", function(){
    contador.innerText=rango.value;
})

comienzo.addEventListener("click",function(){
    btn1.style.display="block";
    pruebas.style.display="block";
    comienzo.style.display="none";
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
    datess.value=nuevafecha;
}

function ChangeVideoName(numero)
{
    videoName="Agrado-Sustancia#:"+numero+"-User:"+id.value;
}


function Enviardatos()
{
    var datos = new FormData(formulario);
    fetch('https://frontera2019.com.mx/Estancia_Api/Prueba/POSTINT',{
        method:"POST",
        body:datos
    })
    .then(res=>res.json())
    .then(data=>{
        rango.value=50;
        contador.innerText="50";
        GETINT();
    })
    .catch(err=>{
        console.log(err);
    })
}

function GETINT()
{
    
    var url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETINT/'+id.value;
    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        if(data.id_int>7)
        {
            window.location="../User/Perfil";
        }
        else
        {
            visitas.value=`${data.id_int}`;
            var numeros=parseInt(visitas.value)+1;
            texto.innerHTML="Sustancia: "+numeros;
            ChangeVideoName(numeros);
        }
    })
    .catch(err=>{
        console.log(err)
    })
}



function IniciarVideo(){
    navigator.mediaDevices.getUserMedia({audio:true, video:true})
    .then(record)
    .catch(err =>{
        alerta.style.background="red";
        alerta.style.webkitTransform="TranslateX(0%)";
        alerta.style.transition="1s";
        mensaje.innerText="No podras realizar la prueba: Camara y audio desactivados";
    });
}

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

    formulario.addEventListener("submit",function(e){
        e.preventDefault();
        console.log(visitas.value)
        if(visitas.value==6)
        {
            btn1.innerText="Finalizar";
        }
        if(visitas.value<=7)
        {
            mediaRecorder.stop();
            Enviardatos();
            mediaRecorder.start();
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










