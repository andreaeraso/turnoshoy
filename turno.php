<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $servicio = $_POST["servicio"];

    // Obtener el último turno para el servicio seleccionado
    $sql = "SELECT turno FROM Turnos WHERE servicio='$servicio' ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $ultimo_turno = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ultimo_turno = (int) substr($row["turno"], 1);
    }

    $nuevo_turno = $servicio[0] . ($ultimo_turno + 1);

    // Insertar nuevo turno
    $sql = "INSERT INTO Turnos (cedula_cliente, servicio, turno, estado) VALUES ('$cedula', '$servicio', '$nuevo_turno', 'Pendiente')";
    $conn->query($sql);

    header("Location: ver_turno.php?cedula=$cedula&turno=$nuevo_turno");
    exit();
}
?>
