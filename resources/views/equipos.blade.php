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
            });
        }

        cargarEquipos();
    </script>
</body>
</html>