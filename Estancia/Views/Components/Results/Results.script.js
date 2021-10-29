var datos = document.getElementById("datos");
var campo = document.getElementById("filtro1");
var estado = document.getElementById("estado");
var opcion;
var buscar = document.getElementById("buscar");
var cargar = document.getElementById("cargar");
var inicio=35;
var final=45;
var numeropagina = 1;
var control = document.getElementById("control");
var paginasmaximo=document.getElementById("paginas");


buscar.addEventListener("keyup", function(e){
    if(campo.value=="Prueba" && estado.value=="Estado")
    {
        if(e.key=="Backspace")
        {
            
        }
        else
        {
            alert("Selecciona un tipo de prueba a filtrar");
        }
    }
    else if(campo.value=="Prueba" && estado.value!="Estado")
    {
        if(e.key=="Backspace")
        {
            
        }
        else
        {
            if(estado.value=="Si")
            {
                ConcentimientoF(buscar.value);
            }
            else if(estado.value=="No")
            {
                ConcentimientoF(buscar.value);
            }
        }
    }
    else if(campo.value!="Prueba" && estado.value=="Estado")
    {
        if(e.key=="Backspace")
        {
            
        }
        else
        {
            if(campo.value=="Intensidad")
            {
                IntensidadFiltro(buscar.value);
            }
            else if(campo.value=="Preferencias")
            {
                PreferenciasFiltro(buscar.value);
            }
            else if(campo.value=="Agrado")
            {
                AgradoFiltro(buscar.value);
            }
            else if(campo.value=="Amargo")
            {
                FiltrarAmargo(buscar.value);
            }
            else if(campo.value=="Graso")
            {
                GrasoFiltro(buscar.value);
            }
        }
    }
})

estado.addEventListener("change", function(e){
    if(e.target.value=="Si")
    {
        opcion="Si";
        Concentimiento();
    }
    else
    {
          opcion="No";
          Concentimiento();
    }
})

campo.addEventListener("change", function(e){
    if(e.target.value==="Agrado")
    {   
        datos.innerHTML="";
        Agrado();
    }
    else if(e.target.value==="Preferencias")
    {   
        datos.innerHTML="";
        Preferencias();
    }
    else if(e.target.value==="Intensidad")
    {   
        datos.innerHTML="";
        Intensidad();
    }
    else if(e.target.value==="Amargo")
    {   
        datos.innerHTML="";
        Amargo();
    }
    else if(e.target.value==="Graso")
    {   
        datos.innerHTML="";
        Graso();
    }
})

window.addEventListener("load", function()
{
    cargar.style.display="block";
    Agrado();
    Cargarpagina();
})

function Cargarpagina()
{
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    var form = new FormData(); 
    form.append("load", "load");
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
       paginasmaximo.value=data;
    })
}

function Intensidad()
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1"  title="Orden Alfabeticoe">Numero Usuario</th>
        <th>Tipo de Prueba</th>
        <th>Calificacion</th>
        <th class="pointer hov-1" title="Orden por fechas" onclick="Filtrar2()">Fecha </th>
        <th >Sesion</th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("intensidad", "ddd");
    form.append("inicio", inicio);
    form.append("final", final);
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        cargar.style.display="none";
        for(item of data)
        {
                datos.innerHTML+=`
                <tr>
                <td>${item.id_usuario}</td>
                <td>${item.tipo}</td>
                <td>${item.calificacion}</td>
                <td>${item.fecha}</td>
                <td class="px12">${item.sesion}</td>
                <td class="px12">${item.visita}</td>
            </tr>
            `;
        }
    })
    if(numeropagina==1)
    {
        
        control.innerHTML=`
            <br>
            <button class="button right bkbb wh" onclick="Avanzar()">siguiente</button>
            <p class="cen px12">No.Pag ${numeropagina}</p>
        `;
    }
    else if(numeropagina>1 && numeropagina<paginasmaximo.value)
    {
        control.innerHTML=`
            <br>
            <button class="button left bkbb wh" onclick="Retroceder()">atras</button>
            <button class="button right bkbb wh" onclick="Avanzar()">siguiente</button>
            <p class="cen px12">No.Pag ${numeropagina}</p>
        `;
    }
    else if(numeropagina<=paginasmaximo.value)
    {
        control.innerHTML=`
            <br>
            <button class="button left bkbb wh" onclick="Retroceder()">atras</button>
            <p class="cen px12">No.Pag ${numeropagina}</p>
        `;
    }
    
}
function Agrado()
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Numero de Prueba</th>
        <th>Calificacion</th>
        <th class="pointer hov-1">Fecha </th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("Agrado", "ddd");
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        cargar.style.display="none";
        for(item of data)
        {
                datos.innerHTML+=`
                <tr>
                <td>${item.id_usuario}</td>
                <td>${item.id_intensidad}</td>
                <td>${item.calificacion}</td>
                <td>${item.fecha}</td>
                <td class="px12">${item.visita}</td>
            </tr>
            `;
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function Preferencias()
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Numero de Lista</th>
        <th>Resultado que Gusto</th>
        <th class="pointer hov-1">Resultado que no Gusto </th>
        <th>Fecha</th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("Preferencias", "ddd");
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        cargar.style.display="none";
        for(item of data)
        {
                datos.innerHTML+=`
                <tr>
                <td>${item.id_usuario}</td>
                <td>${item.id_lista}</td>
                <td>${item.id_gusto}</td>
                <td>${item.id_no_gusto}</td>
                <td class="px12">${item.Fecha}</td>
                <td class="px12">${item.visita}</td>
            </tr>
            `;
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}


function Amargo()
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Tipo de Prueba</th>
        <th>Numero de Prueba</th>
        <th class="pointer hov-1">Respuesta </th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("Amargo", "ddd");
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(item of data)
        {
            cargar.style.display="none";
            if(item.respuesta == "1")
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Acertada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
            else
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Fallada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function Graso()
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Tipo de Prueba</th>
        <th>Numero de Prueba</th>
        <th class="pointer hov-1">Respuesta </th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("Graso", "ddd");
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(item of data)
        {
            cargar.style.display="none";
            if(item.respuesta == "1")
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Acertada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
            else
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Fallada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}


function Concentimiento()
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Concentimiento para realizar Pruebas</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("Concen", "Concen");
    form.append("respuesta", opcion);
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(item of data)
        {
            cargar.style.display="none";
            datos.innerHTML+=`
                <tr>
                    <td>${item.Id_U}</td>
                    <td>${item.Respuesta}</td>
                </tr>
            `;
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function IntensidadFiltro(filtro)
{
    console.log(filtro)
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1"  >Numero Usuario</th>
        <th>Tipo de Prueba</th>
        <th>Calificacion</th>
        <th class="pointer hov-1"  onclick="Filtrar2()">Fecha </th>
        <th >Sesion</th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("intensidadf", "ddd");
    form.append("filtro", filtro);
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        console.log(data)
        for(item of data)
        {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.calificacion}</td>
                    <td>${item.fecha}</td>
                    <td class="px12">${item.sesion}</td>
                    <td class="px12">${item.visita}</td>
                </tr>
            `;
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function PreferenciasFiltro(filtro)
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Numero de Lista</th>
        <th>Resultado que Gusto</th>
        <th class="pointer hov-1">Resultado que no Gusto </th>
        <th>Fecha</th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("filtro", filtro);
    form.append("PreferenciasF", "ddd");
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        cargar.style.display="none";
        for(item of data)
        {
                datos.innerHTML+=`
                <tr>
                <td>${item.id_usuario}</td>
                <td>${item.id_lista}</td>
                <td>${item.id_gusto}</td>
                <td>${item.id_no_gusto}</td>
                <td class="px12">${item.Fecha}</td>
                <td class="px12">${item.visita}</td>
            </tr>
            `;
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function AgradoFiltro(filtro)
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Numero de Prueba</th>
        <th>Calificacion</th>
        <th class="pointer hov-1">Fecha </th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("AgradoF", "ddd");
    form.append("filtro", filtro)
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        cargar.style.display="none";
        for(item of data)
        {
                datos.innerHTML+=`
                <tr>
                <td>${item.id_usuario}</td>
                <td>${item.id_intensidad}</td>
                <td>${item.calificacion}</td>
                <td>${item.fecha}</td>
                <td class="px12">${item.visita}</td>
            </tr>
            `;
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}


function FiltrarAmargo(filtro)
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Tipo de Prueba</th>
        <th>Numero de Prueba</th>
        <th class="pointer hov-1">Respuesta </th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("AmargoF", "ddd");
    form.append("filtro", filtro);
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(item of data)
        {
            cargar.style.display="none";
            if(item.respuesta == "1")
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Acertada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
            else
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Fallada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function GrasoFiltro(filtro)
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Tipo de Prueba</th>
        <th>Numero de Prueba</th>
        <th class="pointer hov-1">Respuesta </th>
        <th>Visita</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("GrasoF", "ddd");
    form.append("filtro", filtro)
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        cargar.style.display="none";
        for(item of data)
        {
            if(item.respuesta == "1")
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Acertada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
            else
            {
                datos.innerHTML+=`
                <tr>
                    <td>${item.id_usuario}</td>
                    <td>${item.tipo}</td>
                    <td>${item.prueba}</td>
                    <td>Fallada</td>
                    <td class="px12">${item.visita}</td>
                </tr>
                `;
            }
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function ConcentimientoF(filtro)
{
    cargar.style.display="block";
    var url ="https://frontera2019.com.mx/Estancia/Views/Components/Results/Results.struct.php";
    datos.innerHTML=`
        <tr>
        <th class="pointer hov-1">Numero Usuario</th>
        <th>Concentimiento para realizar Pruebas</th>
    </tr>
    `;
    var form = new FormData(); 
    form.append("ConcenF", "Concen");
    form.append("respuesta", opcion);
    form.append("filtro", filtro)
    fetch(url,{
        method:"POST", 
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(item of data)
        {
            cargar.style.display="none";
            datos.innerHTML+=`
            <tr>
                <td>${item.Id_U}</td>
                <td>${item.Respuesta}</td>
            </tr>
            `;
            
        }
    })
    .catch(err=>{
        cargar.style.display="none";
    })
}

function Avanzar()
{
    inicio = inicio+10;
    final=final+10;
    numeropagina = numeropagina+1;
    Intensidad();
}

function Retroceder()
{
    inicio = inicio-10;
    final=final-10;
    numeropagina = numeropagina-1;
    Intensidad();
}