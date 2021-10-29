var prueba1 = document.getElementById('prueba1');
var prueba2 = document.getElementById('prueba2');
var nivel1 = document.getElementById('nivel1');
var nivel2 = document.getElementById('nivel2');
var tipo1 = document.getElementById('tipo1');
var tipo2 = document.getElementById('tipo2');
var masbajo1 = document.getElementById('masbajo1');
var masbajo2 = document.getElementById('masbajo2');
var masalto1 = document.getElementById('masalto1');
var masalto2 = document.getElementById('masalto2');
var button = document.getElementById('updatebtn');


window.addEventListener("load",function()
{
    
    LoadAll();
})

button.addEventListener("click", function(){
    Update();
    DeleteLista();
    LoadAll();
})



function LoadAll()
{
    LoadTableAmarga();
    LoadTableGraso();
}
function Update()
{
    var url='https://frontera2019.com.mx/Estancia_Api/Prueba/UPDATELIST';
    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        console.log("Actualizado");
    })
    .catch(err=>{

    })

}
function LoadTableAmarga()
{
    
    var url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETUMBRALAMARGO';
    var numero =0;
    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        LoadAmargo(data);
    })
    .catch(err=>{
        console.log(err)
    })

}

function LoadTableGraso()
{
    var url='https://frontera2019.com.mx/Estancia_Api/Prueba/GETUMBRALGRASO';

    var numero =0;
    fetch(url)
    .then(Response=>Response.json())
    .then(data=>{
        LoadGraso(data);
    })
    .catch(err=>{
        console.log(err)
    })

}

function LoadGraso(data)
{
    for (item of data)
    {
        prueba2.innerHTML+=`<p>${item.idNumero}</p>`;
        nivel2.innerHTML+=`<p>${item.nivel}</p>`;
        tipo2.innerHTML+=`<p>${item.tipo}</p>`;
        masbajo2.innerHTML+=`<p>${item.masBajo}</p>`;
        masalto2.innerHTML+=`<p>${item.masAlto}</p>`;
    }
}

function LoadAmargo(data)
{
    for (item of data)
    {
        prueba1.innerHTML+=`<p>${item.idNumero}</p>`;
        nivel1.innerHTML+=`<p>${item.nivel}</p>`;
        tipo1.innerHTML+=`<p>${item.tipo}</p>`;
        masbajo1.innerHTML+=`<p>${item.masBajo}</p>`;
        masalto1.innerHTML+=`<p>${item.masAlto}</p>`;
    }
}

function DeleteLista()
{
        prueba1.innerHTML='';
        nivel1.innerHTML='';
        tipo1.innerHTML='';
        masbajo1.innerHTML='';
        masalto1.innerHTML='';

        prueba2.innerHTML='';
        nivel2.innerHTML='';
        tipo2.innerHTML='';
        masbajo2.innerHTML='';
        masalto2.innerHTML='';
}










