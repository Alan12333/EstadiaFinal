var buscar = document.getElementById("buscar");
var nuevafecha="";
var button = document.getElementById("accion");
var vertiente="1";
var funcionalidad=false;
var alerta = document.getElementById("Ale");
var mensaje = document.getElementById("Mensaje");


window.addEventListener('load', function(){
    Cargar();
 })

button.addEventListener("click", function()
{
    var cadena = buscar.value;
    var arreglocadena=cadena.split("-");
    fechas(arreglocadena);
    Elegir();
})

buscar.addEventListener("keyup", function(e)
{
    if(e.key=="Enter")
    {
        var cadena = buscar.value;
        var arreglocadena=cadena.split("-");
        fechas(arreglocadena);
        Elegir();
    }
})


function Elegir()
{
    if(funcionalidad==true)
    {
        vertiente="2";
        Filtrado();
    }
    else
    {
        vertiente="1";
        Filtrado();
    }
}

function Filtrado()
{
    var datos = new FormData();
    datos.append("action","FILTERPREF");
    datos.append("fecha",nuevafecha);
    var url="https://frontera2019.com.mx/Estancia_Api/Prueba/FILTERPREF";
    fetch(url,{
        method:"POST",
        body:datos
    })
    .then(arr=>arr.json())
    .then(data=>{
         alerta.style.webkitTransform="TranslateX(100%)";
        LoadData(data);
    })
    .catch(err=>{
        alerta.style.background="red";
         alerta.style.webkitTransform="TranslateX(0%)";
         alerta.style.transition="1s";
         mensaje.innerText="No hay conexion a Internet, Reconectando";
    })
}

function Cargar()
{
    var url = "https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREFRES";
    fetch(url)
    .then(arr=>arr.json())
    .then(data=>{
        LoadData(data)
    })
}
function LoadData(data)
{
    console.log(data.id_usuario)
    for(let item of data)
    {
        
        if(vertiente==="1")
        {
            var id_Usuario = document.getElementById('Numero').innerHTML+=`<p class='px20 pad12'>${item.id_usuario}</p>`;
            var lista = document.getElementById('Lista').innerHTML+=`<p class='px20 pad12'>${item.id_lista}</p>`;
            var id_Gusto = document.getElementById('id_gusto').innerHTML+=`<p class='px20 pad12'>${item.id_gusto}</p>`;
            var id_No_gusto = document.getElementById('id_no_gusto').innerHTML+=`<p class='px20 pad12'>${item.id_no_gusto}</p>`;
            funcionalidad=true;
        }
        else if(vertiente==="2")
        {
            var id_Usuario = document.getElementById('Numero').innerHTML='';
            var lista = document.getElementById('Lista').innerHTML='';
            var id_Gusto = document.getElementById('id_gusto').innerHTML='';
            var id_No_gusto = document.getElementById('id_no_gusto').innerHTML='';
            funcionalidad=false;
        }
    }
}

function fechas(arreglo)
{   
    var mes="";
    if(arreglo[1]==="01")
    {
        mes="Enero";
    }
    if(arreglo[1]==="02")
    {
        mes="Febrero";
    }
    if(arreglo[1]==="03")
    {
        mes="Marzo";
    }
    if(arreglo[1]==="04")
    {
        mes="Abril";
    }
    if(arreglo[1]==="05")
    {
        mes="Mayo";
    }
    if(arreglo[1]==="06")
    {
        mes="Junio";
    }
    if(arreglo[1]==="07")
    {
        mes="Julio";
    }
    if(arreglo[1]==="08")
    {
        mes="Agosto";
    }
    if(arreglo[1]==="09")
    {
        mes="Septiembre";
    }
    if(arreglo[1]==="10")
    {
        mes="Octubre";
    }
    if(arreglo[1]==="11")
    {
        mes="Noviembre";
    }
    if(arreglo[1]==="12")
    {
        mes="Diciembre";
    }
    nuevafecha=arreglo[2]+"-"+mes+"-"+arreglo[0];
    
}