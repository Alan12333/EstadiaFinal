var modal = document.getElementById("modal");
var campo = document.getElementById("numero");
var step1 = document.getElementById("step1");
var step2 = document.getElementById("step2");
var usuarios = document.getElementById("usuarios");
var resultados = document.getElementById("resultados");
function AbrirModal()
{
    modal.style.display="block";
}

function CerrarModal()
{
    modal.style.display="none";
}

function Validar()
{
    var url = "https://frontera2019.com.mx/Estancia/Views/Components/real/real.struct.php";
    var form = new FormData();
    form.append("numero",campo.value);
    form.append("post","post");
    fetch(url, {
        method:"POST",
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        if(data=="True")
        {
            alert("Usuario verififcado");
            CerrarModal();
            Avanzar();
        }
        else 
        {
            alert("Usuario No identificado");
        }
    })
}

function Avanzar()
{
    step2.style.display="block";
    step1.style.display="none";
    MostarUsuarios();
}

function MostarUsuarios()
{
    var url = "https://frontera2019.com.mx/Estancia/Views/Components/real/real.struct.php";
    var form = new FormData();
    form.append("usuario","post");
    fetch(url, {
        method:"POST",
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(var item of data)
        {
            usuarios.innerHTML+=`
                <div class="campo mr-auto">
                    <p onclick="CargarResultados('${item.id_u}')">${item.id_u}</p>
                </div>
            `;
        }
    })
}

function CargarResultados(id)
{
    var url = "https://frontera2019.com.mx/Estancia/Views/Components/real/real.struct.php";
    var form = new FormData();
    form.append("real","post");
    form.append("id", id);
    fetch(url, {
        method:"POST",
        body:form
    })
    .then(res=>res.json())
    .then(data=>{
        for(item of data)
        {
           if(item.idresultados=="1")
           {
                resultados.innerHTML+=`
                        <div class="flex">
                            <div class="cont-35 mr-auto bkspp">
                                <p class="px22 wh">Numero de prueba: ${item.idNumero}</p>
                            </div>
                            <div class="cont-35 mr-auto flex-f">
                                <p class="px22">Resultado: <p class="gr px22">Correcta</p></p>
                            </div>
                            <div class="cont-35 mr-auto flex-f">
                                <p class="px22">Numero: <p class="gr px22">${item.respuesta}</p></p>
                            </div>
                        </div>
                `;
           }
           else
           {
                        resultados.innerHTML+=`
                        <div class="flex">
                            <div class="cont-35 mr-auto bkspp">
                                <p class="px22 wh">Numero de prueba: ${item.idNumero}</p>
                            </div>
                            <div class="cont-35 mr-auto flex-f">
                                <p class="px22">Resultado: <p class="r px22">Incorrecta</p></p>
                            </div>
                            <div class="cont-35 mr-auto flex-f">
                                <p class="px22">Numero: <p class="gr px22">${item.Resultado}</p></p>
                            </div>
                        </div>
                `;
           }
        }
    })
}