<?php
include 'config.php';

$pendientes = [];
$atendidos = [];

$sql = "SELECT t.turno, c.nombre FROM Turnos t JOIN Clientes c ON t.cedula_cliente = c.cedula WHERE t.estado='Pendiente'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $pendientes[] = $row;
}

$sql = "SELECT t.turno, c.nombre FROM Turnos t JOIN Clientes c ON t.cedula_cliente = c.cedula WHERE t.estado='Atendido'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $atendidos[] = $row;
}

echo json_encode(['pendientes' => $pendientes, 'atendidos' => $atendidos]);
?>
