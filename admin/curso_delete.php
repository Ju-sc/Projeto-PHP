<?php

session_start();

require_once "../conexao.php";

if ($_SESSION["usuario_tipo"] == "aluno") {
    header("Location: ../meus_cursos.php");
    exit;
}

if (isset($_GET['id'])) {
$id = $_GET["id"];

$sql = "DELETE FROM cursos WHERE id = $id";
mysqli_query($conexao, $sql);
//$idVisual -=1;

// 4. Volta para a página que pediu a exclusão
header("Location: ../admin/cursos.php?deletado=1");
exit;
} else {
    echo "Curso não encontrado.";
}
?>  