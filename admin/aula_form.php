<?php

session_start();

require_once "../conexao.php";

if ($_SESSION["usuario_tipo"] == "aluno") {
  header("Location: ../meus_cursos.php");
  exit;
}

