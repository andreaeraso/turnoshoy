<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servicio = $_POST["servicio"];

    $sql = "SELECT id, turno FROM Turnos WHERE servicio='$servicio' AND estado='Pendiente' ORDER BY id ASC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $turno_id = $row["id"];
        $turno = $row["turno"];

        $sql = "UPDATE Turnos SET estado='Atendido' WHERE id='$turno_id'";
        $conn->query($sql);

        // Llamada a la función de síntesis de voz mediante JavaScript
        echo '<script>anunciarTurno("Siguiente turno para ' . $servicio . ': ' . $turno . '");</script>';
    }
    header("Location: administrar_turnos.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrar Turnos</title>
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
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px; /* Espacio entre los botones */
        }
        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            padding: 15px;
            background-color: #78CAD2;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #A1D2CE;
        }
        .button i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Administrar Turnos</h2>
        <form method="POST">
            <div class="button-container">
                <button class="button" name="servicio" value="Caja">
                    <i class="fas fa-cash-register"></i> Siguiente Caja
                </button>
                <button class="button" name="servicio" value="Tramites">
                    <i class="fas fa-file-alt"></i> Siguiente Trámites
                </button>
                <button class="button" name="servicio" value="Asesor">
                    <i class="fas fa-user-tie"></i> Siguiente Asesor
                </button>
            </div>
        </form>
    </div>

    <!-- Script de JavaScript para síntesis de voz -->
    <script>
        function anunciarTurno(mensaje) {
            var synthesis = window.speechSynthesis;
            var utterance = new SpeechSynthesisUtterance(mensaje);
            synthesis.speak(utterance);
        }
    </script>
</body>
</html>



