<?php
$id = $_GET['id'];
$idUsuario = $_GET['idUsuario'];

$con = mysqli_connect("localhost", "root", "listafy123", "listafy");

if (!$con) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$sql = "DELETE FROM todo WHERE id_nota = $id";

if (mysqli_query($con, $sql)) {
    header("Location: ../pages/dashboard.php?id=" . $idUsuario);
} else {
    echo "Erro ao deletar to-do: " . mysqli_error($con);
}

mysqli_close($con);
?>