<?php
include 'config.php';

$cedula = $_GET['cedula'];
$sql = "SELECT nombre FROM Clientes WHERE cedula='$cedula'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["nombre" => ""]);
}
?>
