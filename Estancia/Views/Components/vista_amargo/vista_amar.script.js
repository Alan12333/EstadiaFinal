var Id_usuario = document.getElementById('id_usuario');
var Lista = document.getElementById('lista');
var Prueba = document.getElementById('prueba');
var Visita = document.getElementById('visita');
var Respuesta = document.getElementById('respuesta');
var Direccion = document.getElementById('direccion');


window.addEventListener('load', function(){
    var url = "https://frontera2019.com.mx/Estancia_Api/Umbral/GETCANTARES";
    fetch(url)
    .then(arr=>arr.json())
    .then(data=>{
        Cargar(data);
    })
})

function Cargar(data)
{
     
    for(let item of data)
    {
        Id_usuario.innerHTML+=`<p>${item.id_usuario}</p>`;
        Prueba.innerHTML+=`<p>${item.prueba}</p>`;
        Visita.innerHTML+=`<p>${item.visita}</p>`;
        if(item.direccion=="indefinido" || item.direccion=="ninguna")
        {
            Respuesta.innerHTML+=`<p class='gr'>Correcta</p>`;
        }
        else
        {
            Respuesta.innerHTML+=`<p class='r'>Incorrecta</p>`;
        }
        direccion.innerHTML+=`<p>${item.direccion}</p>`;
        Lista.innerHTML+=`<p >${item.lista}</p>`
    }

}