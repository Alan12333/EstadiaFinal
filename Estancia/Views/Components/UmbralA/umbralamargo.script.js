var numero1 = document.getElementById("numero1");
var id = document.getElementById("id");
var numero2=document.getElementById("numero2");
var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var imagen1 = document.getElementById("img1");
var imagen2 = document.getElementById("img2");
var respuesta=document.getElementById("respuesta");
var masalto;
var masbajo;
var videoName="";
var id_numero=document.getElementById("id_numero");
var button=document.getElementById("button");
var arrayInput = [];
var inputsValues = document.getElementsByClassName('name');
var modal = document.getElementById("modal");
var lista = "";

nameValues = [].map.call(inputsValues,function(dataInput){
    arrayInput.push(dataInput.value);
})

var resultado2;

window.addEventListener("load",function(){
    ComprobarVueltas();
    RegistrarPrueba();
    LoadRestrict();
    LoadUmbral();
    IniciarVideo();
})

function ChangeVideoName(numero)
{
    videoName="Umbral-Amargo-Respuesta:"+numero+"-User:"+id.value;
}


imagen1.addEventListener("click",function()
{
    imagen1.style.border="5px solid blue";
    imagen2.style.border="none";
    ChangeVideoName(option1.value);
    resultado2 = option1.value;
    if(masalto==option1.value)
    {
        respuesta.value="true";
    }
    else
    {
        respuesta.value="false";
    }
    
})

 
imagen2.addEventListener("click",function()
{
    
    imagen1.style.border="none";
    imagen2.style.border="5px solid blue";
    ChangeVideoName(option2.value);
    resultado2 = option2.value;
    if(masalto==option2.value)
    {
        respuesta.value="true";
    }
    else
    {
        respuesta.value="false";
    }
   
})



function LoadUmbral()
{

    const url="https://frontera2019.com.mx/Estancia_Api/Umbral/GET/"+id.value;
    fetch(url)
    .then(response=>response.json())
    .then(data=>{
        var random = Math.floor(Math.random() *2);
        masalto=`${data.masAlto}`;
        masbajo=`${data.masBajo}`;
        id_numero.value=`${data.idNumero}`;
        if(random==1)
        {
            option1.value=`${data.masAlto}`;
            option2.value=`${data.masBajo}`;
            numero1.innerText=`${data.masAlto}`;
            numero2.innerText=`${data.masBajo}`;
        }
        else
        {
            option2.value=`${data.masAlto}`;
            option1.value=`${data.masBajo}`;
            numero2.innerText=`${data.masAlto}`;
            numero1.innerText=`${data.masBajo}`;
        }
    })
}

function PostUmbral()
{
    url="https://frontera2019.com.mx/Estancia_Api/Umbral/POSTA";
    var formData = new FormData();
    formData.append("id_usuario",id.value);
    formData.append("action","POSTA");
    formData.append("id_numero",id_numero.value);
    formData.append("respuesta",respuesta.value);
    fetch(url,{
        method:"POST",
        body:formData
    })
    .then(res=>res.json())
    .then(data=>{
        
       console.log("numero de vuelta: "+ data.idNumero)
        if(data.idNumero=="complete")
        {
            modal.style.display="block"; 
        }
        else
        {
            LoadUmbral();
            IngresarRespuesta();
            ComprobarVueltas();
            respuesta.value="";
            imagen1.style.border="none";
            imagen2.style.border="none";
        }
    })
    .catch(err=>{
        console.log(err);
    })
}

function LoadRestrict()
{
    const url="https://frontera2019.com.mx/Estancia_Api/Umbral/GETCANTA/"+id.value;
    fetch(url)
    .then(res=>res.json())
    .then(data=>{
        
        if(data.numero==7)
        {
           window.location="https://frontera2019.com.mx/Estancia/User/Perfil"; 
        }
    })
}


function ComprobarVueltas()
{
    const url="https://frontera2019.com.mx/Estancia_Api/Umbral/SPECIALCASE/"+id.value;
    fetch(url)
    .then(res=>res.json())
    .then(data=>{
        console.log(data);
        if(data==="Complete")
        {
            modal.style.display="block"; 
        }
    })
}

function IniciarVideo(){
    navigator.mediaDevices.getUserMedia({audio:true, video:true})
    .then(record)
    .catch(err => console.log("err"));
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

    button.addEventListener("click",function(){
        mediaRecorder.stop();
        PostUmbral();
        mediaRecorder.start();
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

function RegistrarPrueba()
{
    var form = new FormData();
    form.append("insertar","post");
    form.append("id", id.value);
    var url="https://frontera2019.com.mx/Estancia/Views/Components/UmbralA/umbralamargo.struct.php";
    fetch(url, {
        method:"POST",
        body:form
    })
    .then(res=>res.json())
    .then(data=>{

    })
}

  function confirmExit()
  {
        var form = new FormData();
        form.append("desactivar","post");
        form.append("id", id.value);
        var url="https://frontera2019.com.mx/Estancia/Views/Components/UmbralA/umbralamargo.struct.php";
        fetch(url, {
            method:"POST",
            body:form
        })
        .then(res=>res.json())
        .then(data=>{
            window.location="https://frontera2019.com.mx/Estancia/User/Perfil";
        })
        
  }

  function IngresarRespuesta()
  {
        var form = new FormData();
        form.append("postactiva","post");
        form.append("id", id.value);
        form.append("resultado", resultado2);
        var url="https://frontera2019.com.mx/Estancia/Views/Components/UmbralA/umbralamargo.struct.php";
        fetch(url, {
            method:"POST",
            body:form
        })
        .then(res=>res.json())
        .then(data=>{
            
        })
  }