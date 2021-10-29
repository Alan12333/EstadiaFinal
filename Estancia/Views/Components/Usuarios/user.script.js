var id = document.getElementById("id");
var peso = document.getElementById("peso");
var imc = document.getElementById("imc");
var edad = document.getElementById("edad");
var visita = document.getElementById("visita");
var altura = document.getElementById("altura");
var alerta = document.getElementById("Ale");
var data=document.getElementById("data");
var datas=document.getElementById("Datas");
var recompensa=document.getElementById("recompensa");
var prueba=document.getElementById("Pruebas");
var historial=document.getElementById("history");
var Historial=document.getElementById("Historial");
var img1=document.getElementById("img1");
var img2=document.getElementById("img2");
var img3=document.getElementById("img3");
var bar1=document.getElementById("progress1");
var bar2=document.getElementById("progress2");
var bar3=document.getElementById("progress3");
var intensidad=document.getElementById("intensidad");
var modal = document.getElementById("modal");
var botonpref = document.getElementById("botonpref");

//Llamada y Creacion de Eventos
CheckAsistencia();
window.addEventListener("load",function(e){
    LoadData();
    LoadImages();
    LoadBars();
    LoadHistorial();
})

botonpref.addEventListener("click", function(){
    DetectVisit();
})

window.addEventListener("keyup", function(e){
    if(e.key=="Enter")
    {
        CloseModal();
    }
})

 

data.addEventListener("click",function(e){
    CargarDatos();
})

recompensa.addEventListener("click",function(){
    CargarPruebas();
})

Historial.addEventListener("click",function(){
    CargarHistorial();
})

function CloseModal()
{
    console.log(id.value)
    var formulario = new FormData();
    formulario.append("id",id.value);
    formulario.append("action","POSTCON");
    fetch("http://localhost/Estancia_Api/Usuario/POSTCON", {
        method:"POST",
        body:formulario
    })
    .then(res=>res.json())
    .then(data=>{
        modal.style.display="none";
    })
}

function CheckAsistencia()
{
    fetch("http://localhost/Estancia_Api/Usuario/GETCONCEN/"+id.value)
    .then(obj=>obj.json())
    .then(data=>{
        console.log("respuesta: "+data.Respuesta+" id: "+id.value);

        if(data.Respuesta === "Si" || data.Respuesta ==="si")
        {
            modal.style.display="none";
        }
        else
        {
            modal.style.display="block";
        }
    })
}
//Funciones para hacer dinamica la pagina
intensidad.addEventListener("click", function()
{
    
    fetch("https://frontera2019.com.mx/Estancia_Api/Usuario/GETVIS/"+id.value)
    .then(obj=>obj.json())
    .then(data=>{
        
        fetch("https://frontera2019.com.mx/Estancia_Api/Prueba/GETTEST/"+id.value)
        .then(obj2=>obj2.json())
        .then(datos=>{
            if(data.contvi==datos.visita && datos.id_est>=6)
            {
               Alerta("Debes iniciar sesion nuevamente");
            }
            else if(data.contvi==parseInt(datos.visita)+1 && datos.id_est>=12)
            {
               
                Alerta("Debes iniciar sesion nuevamente");
            }
            else
            {
                
                window.location="../Exercise/Intensidad"
            }
        })
    })
    .catch(err=>{
        Alerta("Hubo un problema con el servidor, Reconectando");
        console.log(err);
    })
})

function Alerta(mensaje)
{
    alerta.innerText=mensaje;
    alerta.style.background="red";
    alerta.style.webkitTransform="TranslateX(0%)";
    alerta.style.transition="1s";
}
function MostrarAlerta()
{
    var alerta = document.getElementById("Ale");
    alerta.style.webkitTransform="TranslateX(-100%)";
}
function CargarDatos()
{
    prueba.style.display="none";
    recompensa.style.background="rgb(240, 119, 119)";
    data.style.background="white";
    datas.style.display="block";
    Historial.style.background="rgb(240, 119, 119)";
    historial.style.display="none";
    img1.innerHTML=`<img src="../public/image/usrb.png">`;
    img2.innerHTML=`<img src="../public/image/reww.png">`;
    img3.innerHTML=`<img src="../public/image/lsw.png">`;
}

function LoadImages()
{
    img1.innerHTML=`<img src="../public/image/usrb.png">`;
    img2.innerHTML=`<img src="../public/image/reww.png">`;
    img3.innerHTML=`<img src="../public/image/lsw.png">`;
}
function CargarPruebas()
{
    data.style.background="rgb(240, 119, 119)";
    datas.style.display="none";
    prueba.style.display="block";
    recompensa.style.background="white";
    Historial.style.background="rgb(240, 119, 119)";
    historial.style.display="none";
    img1.innerHTML=`<img src="../public/image/usrw.png">`;
    img2.innerHTML=`<img src="../public/image/rewb.png">`;
    img3.innerHTML=`<img src="../public/image/lsw.png">`;
}

function CargarHistorial()
{
    data.style.background="rgb(240, 119, 119)";
    datas.style.display="none";
    prueba.style.display="none";
    recompensa.style.background="rgb(240, 119, 119)";
    Historial.style.background="white";
    historial.style.display="block";
    img1.innerHTML=`<img src="../public/image/usrw.png">`;
    img2.innerHTML=`<img src="../public/image/reww.png">`;
    img3.innerHTML=`<img src="../public/image/lsb.png">`;
}

function LoadData()
{
    var url='https://frontera2019.com.mx/Estancia_Api/Usuario/GET/'+id.value;

    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        imc.innerText=`tu imc es: ${data.imc}`;
    })
    .catch(err=>{
        Alerta("Hubo un problema con el servidor, Reconectando");
        console.log(err)
    })

}

function LoadHistorial()
{
    var url='https://frontera2019.com.mx/Estancia_Api/Usuario/ALLVIS/'+id.value;

    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        data.forEach(function(datos, index){
            var li= document.createElement("p");
            var li2=document.createElement("p");
            var li3=document.createElement("p");
            var li4=document.createElement("p");
            var contenido=document.createTextNode(datos.visita);
            var contenido2=document.createTextNode(datos.edad);
            var contenido3=document.createTextNode(datos.altura);
            var contenido4=document.createTextNode(datos.peso);
            visita.appendChild(li);
            edad.appendChild(li2);
            altura.appendChild(li3);
            peso.appendChild(li4);
            li.appendChild(contenido);
            li2.appendChild(contenido2);
            li3.appendChild(contenido3);
            li4.appendChild(contenido4);
        });
    })
    .catch(err=>{
        Alerta("Hubo un problema con el servidor, Cargnado Datos");
        console.log(err)
    })

}

function Progress1(numero)
{
   if(numero==0)
   {
    bar1.style.width="5%";
   }
   else
   {
    bar1.style.width=numero+"%";
   }
   bar1.innerText=numero+"%";
}
function Progress2(numero)
{
    if(numero==0)
   {
    bar2.style.width="5%";
   }
   else
   {
    bar2.style.width=numero+"%";
   }
    bar2.style.background="green";
    bar2.innerText=numero+"%";
}
function Progress3(numero)
{
    if(numero==0)
    {
        bar3.style.width="5%";
    }
    else
    {
        bar3.style.width=numero+"%";
    }
    bar3.style.background="orange";
    bar3.innerText=numero+"%";
}

function LoadBars()
{
    Progressbar1();
    Progressbar2();
    Progressbar3();
}

function Progressbar2()
{
    
    
    const url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETINT/'+id.value;
    fetch(url)
    .then(respuesta=>respuesta.json())
    .then(data=>{
        if(data.id_int==0)
        {
            Progress2(0);
        }
        else if(data.id_int==1)
        {
            Progress2(17);
        }
        else if(data.id_int==2)
        {
            Progress2(17);
        }
        else if(data.id_int==3)
        {
            Progress2(34);
        }
        else if(data.id_int==4)
        {
            Progress2(50);
        }
        else if(data.id_int==5)
        {
            Progress2(67);
        }
        else if(data.id_int==6)
        {
            Progress2(67);
        }
        else if(data.id_int==7)
        {
            Progress2(85);
        }
        else if(data.id_int==8)
        {
            Progress2(100);
        }
    })
    .catch(err=>{
        Alerta("Hubo un problema con el servidor, Cargnado Datos");
        console.log(err);
    })
}

function Progressbar3()
    {
        const url="https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREFCOUNT/"+id.value;
        fetch(url)
        .then(res=>res.json())
        .then(data=>{
            if(data.id_lis>=5)
            {
                Progress3(100);
            }
            else
            {
                Progress3(0);
            }
        })
        
        .catch(err=>{
            Alerta("Hubo un problema con el servidor, Cargnado Datos");
        })
    }
function Progressbar1()
{
   
    
    const url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETTEST/'+id.value;
    fetch(url)
    .then(respuesta=>respuesta.json())
    .then(data=>{
       
        if(data.id_est==0)
        {
            Progress1(0);
        }
         else if(data.id_est==1)
        {
            Progress1(3);
        }
        else if(data.id_est==2)
        {
            Progress1(10);
        }
        else if(data.id_est==3)
        {
            Progress1(15);
        }
        else if(data.id_est==4)
        {
            Progress1(22);
        }
        else if(data.id_est==5)
        {
            Progress1(28);
        }
        else if(data.id_est==6)
        {
            Progress1(35);
        }
        else if(data.id_est==7)
        {
            Progress1(40);
        }
        else if(data.id_est==8)
        {
            Progress1(45);
        }
        else if(data.id_est==9)
        {
            Progress1(50);
        }
        else if(data.id_est==10)
        {
            Progress1(58);
        }
        else if(data.id_est==11)
        {
            Progress1(62);
        }
        else if(data.id_est==12)
        {
            Progress1(69);
        }
        else if(data.id_est==13)
        {
            Progress1(75);
        }
        else if(data.id_est==14)
        {
            Progress1(80);
        }
        else if(data.id_est==15)
        {
            Progress1(85);
        }
        else if(data.id_est==16)
        {
            Progress1(90);
        }
        else if(data.id_est==17)
        {
            Progress1(95);
        }
        else if(data.id_est==18)
        {
            Progress1(100);
        }
    })
    .catch(err=>{
        Alerta("Hubo un problema con el servidor, Cargnado Datos");
        console.log(err);
    })
}

function DetectVisit()
{
    fetch("https://frontera2019.com.mx/Estancia_Api/Usuario/GETVIS/"+id.value)
    .then(obj=>obj.json())
    .then(data=>{
        const url="https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREFCOUNT/"+id.value;
        fetch(url)
        .then(res=>res.json())
        .then(datas=>{
                if(data.contvi==datas.id_lis)
                {
                    Alerta("Debes iniciar sesion nuevamente para completar la prueba");
                }
                else if(datas.id_lis=="5")
                {
                    Alerta("Pruebas Finalizadas con exito");
                }
                else
                {
                    window.location="../Exercise/Preferencias";
                }
        })
    })
}