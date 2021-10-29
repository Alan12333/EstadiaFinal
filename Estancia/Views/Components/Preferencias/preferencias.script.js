var imagen1 = document.getElementById("img1");
var imagen2 = document.getElementById("img2");
var num1=document.getElementById("numero1");
var num2=document.getElementById("numero2");
var op1=document.getElementById("option1");
var op2=document.getElementById("option2");
var id=document.getElementById("id");
var button = document.getElementById("button");
var variable="Default";
var numero= document.getElementById("prueba");
var arreglolike;
var arreglodislike;
var arrayInput = [];
var inputsValues = document.getElementsByClassName('name');
var fecha = document.getElementById("fecha");
var nuevafecha;
nameValues = [].map.call(inputsValues,function(dataInput){
    arrayInput.push(dataInput.value);
})
var alerta = document.getElementById("Ale");
var mensaje = document.getElementById("Mensaje");
var visita;
var listas;
var posicion;

function MostrarAlerta()
{
    alerta.style.webkitTransform="TranslateX(100%)";
}

imagen1.addEventListener("click",function()
{
    imagen1.style.border="5px solid blue";
    imagen2.style.border="none";
    variable=op1.value;
    posicion="izquierda";
})

imagen2.addEventListener("click",function()
{
    imagen1.style.border="none";
    imagen2.style.border="5px solid blue";
    variable=op2.value;
    posicion="derecha";
})



window.addEventListener("load", function()
{
    VerificarPrueba();
    LoadPreferencia(numero.value);
    IniciarVideo();
    ObtenerFecha();
})


function InsertPreferencias(valor1, valor2, lista, visita)
{
    
    var formData = new FormData();
    formData.append("id_usuario", id.value);
    formData.append("action", "POSTPREF");
    formData.append("gusto", valor1);
    formData.append("nogusto", valor2);
    formData.append("lista", lista);
    formData.append("fecha", nuevafecha);
    formData.append("sesion", visita);
    formData.append("posicion",posicion);
    console.log(formData.get("lista"));
    fetch("https://frontera2019.com.mx/Estancia_Api/Prueba/POSTPREF",{
         method:"POST",
        body:formData
     })
    .then(res=>res.json())
    .then(data=>{
        // window.location="../User/Perfil";
    })
    .catch(err=>{
        console.log(err);
    })
}



function LoadPreferencia(numero)
{
    var array1=[];
    var array2=[];
    const url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREF';
    fetch(url)
    .then(response=>response.json())
    .then(data=>{
        data.forEach(function(item,index){
            array1.push(item.lista_1);
            array2.push(item.lista_2);
        });
            var random=Math.floor(Math.random()*2);
            if(random==1)
            {
                op1.value=array1[numero];
                op2.value=array2[numero];
                num1.innerText=array1[numero];
                num2.innerText=array2[numero];
            }
            else
            {
                op1.value=array2[numero];
                op2.value=array1[numero];
                num1.innerText=array2[numero];
                num2.innerText=array1[numero];
            }
    })

    
    
}

function VerificarPrueba()
    {
        const url="https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREFCOUNT/"+id.value;
        fetch(url)
        .then(res=>res.json())
        .then(data=>{
            if(data.id_lis>=5)
            {
                window.location="../User/Perfil";
            }
        })
        .catch(err=>{

        })
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



button.addEventListener("click", function()
{
    if(variable==op1.value)
    {
        arreglolike = variable
    }
    else
    {
        arreglodislike = op1.value;
    }
    if(variable==op2.value)
    {
        arreglolike = variable;
    }
    else
    {
        arreglodislike = op2.value;
    }
    listas = parseInt(numero.value)+1;
    GETVIS(arreglolike, arreglodislike,listas);
    mediaRecorder.stop();
    imagen1.style.border="none";
    imagen2.style.border="none";
})
    
        
    }
    
    
    function download(blod)
    {
        var videoName="Preferencias-Total-User:"+id.value;
        var link = document.createElement("a");
        link.href = window.URL.createObjectURL(blod);
        link.setAttribute("download",videoName);
        link.style.display = "none";
        
    
        document.body.appendChild(link);
    
        link.click();
        link.remove();
        arrayInput = [];
    }
    

function ObtenerFecha()
{
    var fechador = [];
    var cadena = fecha.value;
    fechador=cadena.split('-');
    if(fechador[1]=="01")
    {
        nuevafecha = fechador[2] + "-Enero-"+fechador[0];
    }
    else if(fechador[1]=="02")
    {
        nuevafecha = fechador[2] + "-Febrero-"+fechador[0];
    }
    else if(fechador[1]=="03")
    {
        nuevafecha = fechador[2] + "-Marzo-"+fechador[0];
    }
    else if(fechador[1]=="04")
    {
        nuevafecha = fechador[2] + "-Abril-"+fechador[0];
    }
    else if(fechador[1]=="05")
    {
        nuevafecha = fechador[2] + "-Mayo-"+fechador[0];
    }
    else if(fechador[1]=="06")
    {
        nuevafecha = fechador[2] + "-Junio-"+fechador[0];
    }
    else if(fechador[1]=="07")
    {
        nuevafecha = fechador[2] + "-Julio-"+fechador[0];
    }
    else if(fechador[1]=="08")
    {
        nuevafecha = fechador[2] + "-Agosto-"+fechador[0];
    }
    else if(fechador[1]=="09")
    {
        nuevafecha = fechador[2] + "-Septiembre-"+fechador[0];
    }
    else if(fechador[1]=="10")
    {
        nuevafecha = fechador[2] + "-Octubre-"+fechador[0];
    }
    else if(fechador[1]=="11")
    {
        nuevafecha = fechador[2] + "-Noviembre-"+fechador[0];
    }
    else if(fechador[1]=="12")
    {
        nuevafecha = fechador[2] + "-Diciembre-"+fechador[0];
    }
}


function GETVIS(valor1, valor2, lista)
{
    console.log(lista)
    url ="https://frontera2019.com.mx/Estancia_Api/Usuario/GETVIS/"+id.value;
    fetch(url)
    .then(res=>res.json())
    .then(data=>{
        visita = data.contvi;
        InsertPreferencias(valor1, valor2,lista, visita);
    })
}