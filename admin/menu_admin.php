<?php

session_start();
require_once "../conexao.php";
//Se está logado como aluno, sai

if ($_SESSION["usuario_tipo"] == "aluno") {
    header("Location: ../meus_cursos.php");
    exit;
}



  ?>

<nav>
    <a href="index.php">Dashboard</a>
    <a href="cursos.php">Cursos</a>
    <a href="../logout.php">Sair</a>
</nav>

