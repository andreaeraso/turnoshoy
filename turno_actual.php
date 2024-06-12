<!DOCTYPE html>
<html>
<head>
    <title>Turno Actual</title>
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
            max-width: 80%;
            background-color: #fff;
            padding: 40px; /* Aumentar el padding para dar más espacio al contenido */
            border-radius: 20px; /* Aumentar el radio del borde para hacerlo más redondeado */
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2); /* Aumentar la sombra para resaltar más */
            margin-top: 20px; /* Agregar un margen superior */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            width: 100%;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .column-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .column-header i {
            font-size: 36px; /* Aumentar el tamaño del icono */
            color: #78CAD2;
        }
        .column-header h2 {
            margin: 0;
            color: #333;
            font-size: 36px; /* Aumentar el tamaño del título */
        }
        .turno-container {
            width: 100%;
            display: flex;
            justify-content: space-around;
        }
        .turno {
            font-size: 48px; /* Aumentar el tamaño de fuente del turno */
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px; /* Agregar margen inferior para separar los elementos */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="column-header">
                <i class="fas fa-cash-register"></i>
                <h2>Caja</h2>
            </div>
            <div class="column-header">
                <i class="fas fa-file-alt"></i>
                <h2>Trámites</h2>
            </div>
            <div class="column-header">
                <i class="fas fa-user-tie"></i>
                <h2>Asesor</h2>
            </div>
        </div>
        <div class="turno-container">
            <div id="turno_caja" class="turno"></div>
            <div id="turno_tramites" class="turno"></div>
            <div id="turno_asesor" class="turno"></div>
        </div>
    </div>
    <script>
        function cargarTurnoActual() {
            fetch('obtener_turno_actual.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('turno_caja').textContent = data.caja;
                    document.getElementById('turno_tramites').textContent = data.tramites;
                    document.getElementById('turno_asesor').textContent = data.asesor;
                });
        }

        setInterval(cargarTurnoActual, 5000); // Recargar cada 5 segundos
        window.onload = cargarTurnoActual;
    </script>
</body>
</html>

