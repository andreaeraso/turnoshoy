<?php
include 'config.php';

$turnos = ['caja' => '', 'tramites' => '', 'asesor' => ''];

$sql = "SELECT turno FROM Turnos WHERE servicio='Caja' AND estado='Pendiente' ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $turnos['caja'] = $row['turno'];
}

$sql = "SELECT turno FROM Turnos WHERE servicio='Tramites' AND estado='Pendiente' ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $turnos['tramites'] = $row['turno'];
}

$sql = "SELECT turno FROM Turnos WHERE servicio='Asesor' AND estado='Pendiente' ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $turnos['asesor'] = $row['turno'];
}

echo json_encode($turnos);
?>
