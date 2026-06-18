<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>
<body>
    <h1>Crear equipo</h1>
    <form id="formEquipo">
        <input type="text" id="nombre" placeholder="Escribe el nombre del equipo" style="width: 200px">
        <button type="submit">Agregar</button>
    </form>

    <h3>Ver los equipos</h3>
    <ul id="lista"></ul>
    <script>
        const api = "http://127.0.0.1:8000/api/equipos";
        const apiPartidos = "http://127.0.0.1:8000/api/partidos";
    //agregar equipos
        document.getElementById("formEquipo").addEventListener("submit", async function(e) {
            e.preventDefault();

            let nombre = document.getElementById("nombre").value;

            let res = await fetch(api, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ nombre: nombre })
            });

            document.getElementById("nombre").value = "";
            cargarEquipos();
        });

    //ver equipos
        async function cargarEquipos() {
            let res = await fetch(api);
            let data = await res.json();

            let lista = document.getElementById("lista");
            lista.innerHTML = "";

            data.forEach(e=> {
                let li = document.createElement("li");
                li.textContent = e.nombre;

                let btn = document.createElement("button");
                btn.textContent = "Borrar";

                btn.onclick = async function () {
                    await fetch(`${api}/${e.id}`,{
                        method: "DELETE"
                    });

                    cargarEquipos();
                };

                li.appendChild(btn);
                lista.appendChild(li);

    //guardar partidos

                document.getElementById("formPartido").addEventListener("submit", async function(e){
                    e.preventDefault();

                    await fetch(apiPartidos, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            equipo_local_id: document.getElementById("local").value,
                            equipo_visitante_id: document.getElementById("visitante").value,
                            goles_local: document.getElementById("goles_local").value,
                            goles_visitante: document.getElementById("goles_visitante").value
                        })

                async function cargarSelects() {
                let res = await fetch(api);
                let data = await res.json();

                let local = document.getElementById("local");
                let visitante = document.getElementById("visitante");

                local.innerHTML = "";
                visitante.innerHTML = "";

                data.forEach(e => {
                    let opt1 = document.createElement("option");
                    opt1.value = e.id;
                    opt1.textContent = e.nombre;

                    let opt2 = document.createElement("option");
                    opt2.value = e.id;
                    opt2.textContent = e.nombre;

                    local.appendChild(opt1);
                    visitante.appendChild(opt2);
            });
        }

        cargarSelects();
    </script>

    <ul id="lista"></ul>

    <hr>

    <h3>Crear partidos</h3>

    <form id="formPartido">
        <select id="local"></select>
        <select id="visitante"></select>

        <input type="number" id="goles_local" placeholder="Goles Local">
        <input type="number" id="goles_visitante" placeholder="Goles Visitante">

        <button type="submit">Guardar</button>
        
    </form>

</body>
</html>