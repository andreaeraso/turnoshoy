<!DOCTYPE html>
<html>
<head>
    <title>Turnos Pendientes y Atendidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Ky4s0rhWup6eBkiTPc7HL4YGBFAwunz15JSfjZpn6BK/yKRFLwBJ3f5t9tQrH7EP5qbuYXAS+3wuDr1r9x/vDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: url('turno6.jpg') no-repeat center center fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }
        .column {
            width: 45%;
            padding: 10px;
            overflow-y: auto; /* Agregamos scroll vertical */
            max-height: 70vh; /* Altura máxima para evitar desbordamiento */
        }
        .column h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .column h2 i {
            margin-right: 10px;
            color: #78CAD2;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #f9f9f9;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        li i {
            margin-right: 15px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="column">
            <h2><i class="fas fa-hourglass-half"></i> Pendientes</h2>
            <ul id="pendientes">
                <!-- Turnos pendientes se cargarán aquí -->
            </ul>
        </div>
        <div class="column">
            <h2><i class="fas fa-check-circle"></i> Atendidos</h2>
            <ul id="atendidos">
                <!-- Turnos atendidos se cargarán aquí -->
            </ul>
        </div>
    </div>
    <script>
        function cargarTurnos() {
            fetch('obtener_turnos.php')
                .then(response => response.json())
                .then(data => {
                    const pendientes = document.getElementById('pendientes');
                    const atendidos = document.getElementById('atendidos');

                    pendientes.innerHTML = '';
                    atendidos.innerHTML = '';

                    data.pendientes.forEach(turno => {
                        const li = document.createElement('li');
                        li.innerHTML = `<i class="fas fa-hourglass-start"></i>${turno.turno} - ${turno.nombre}`;
                        pendientes.appendChild(li);
                    });

                    data.atendidos.forEach(turno => {
                        const li = document.createElement('li');
                        li.innerHTML = `<i class="fas fa-check"></i>${turno.turno} - ${turno.nombre}`;
                        atendidos.appendChild(li);
                    });
                });
        }

        setInterval(cargarTurnos, 5000); // Recargar cada 5 segundos
        window.onload = cargarTurnos;
    </script>
</body>
</html>
