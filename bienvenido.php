<?php
include 'config.php';

$cedula = $_GET['cedula'];
$sql = "SELECT nombre FROM Clientes WHERE cedula='$cedula'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row["nombre"];
} else {
    die("Cliente no encontrado");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: url('turno6.jpg') no-repeat center center fixed; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 60px;
            border-radius: 30px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            margin: 100px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        .button {
            width: 250px;
            height: 250px;
            background-color: #78CAD2;
            border: none;
            color: white;
            font-size: 72px;
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button:hover {
            background-color: #A1D2CE;
        }
        .button-label {
            margin-top: 30px;
            font-size: 30px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido <?php echo $nombre; ?>, ¿Qué deseas hacer hoy?</h2>
        <form action="turno.php" method="POST">
            <input type="hidden" name="cedula" value="<?php echo $cedula; ?>">
            <div class="button-container">
                <div>
                    <button class="button" name="servicio" value="Caja"><i class="fa fa-cash-register"></i></button>
                    <div class="button-label">Caja</div>
                </div>
                <div>
                    <button class="button" name="servicio" value="Tramites"><i class="fa fa-file-alt"></i></button>
                    <div class="button-label">Trámites</div>
                </div>
                <div>
                    <button class="button" name="servicio" value="Asesor"><i class="fa fa-user-tie"></i></button>
                    <div class="button-label">Asesor</div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
