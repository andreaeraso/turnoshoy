<?php
include 'config.php';

$cedula = $_GET['cedula'];
$turno = $_GET['turno'];

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
    <title>Tu Turno</title>
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
            max-width: 400px;
            width: 100%;
        }
        .icon {
            color: #007bff;
            font-size: 48px;
            margin-bottom: 20px;
        }
        .info {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .info i {
            margin-right: 10px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="fas fa-check-circle icon"></i>
        <h2>Tu turno es:</h2>
        <p class="info"><i class="fas fa-user"></i> Nombre: <?php echo $nombre; ?></p>
        <p class="info"><i class="fas fa-id-card"></i> Cédula: <?php echo $cedula; ?></p>
        <p class="info"><i class="fas fa-clock"></i> Turno: <?php echo $turno; ?></p>
        <a href="registro.php"><i class="fas fa-arrow-circle-left"></i> Volver a Inicio</a>
    </div>
</body>
</html>


