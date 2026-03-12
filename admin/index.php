<?php

session_start();

require_once "../conexao.php";
require_once "includes/menu_admin.php"; 

//Se está logado como aluno, sai
    if ($_SESSION["usuario_tipo"] == "usuario") {
      header("Location: meus_cursos.php");
    exit;
  }

//Query para contar o total de cursos, módulos, aulas e alunos
$sqlCursos = "SELECT COUNT(*) FROM cursos";
$resultadoCursos = mysqli_query($conexao, $sqlCursos);
$TotalCursos = mysqli_fetch_array($resultadoCursos)[0];

$sqlModulos = "SELECT COUNT(*) FROM modulos";
$resultadoModulos = mysqli_query($conexao, $sqlModulos);
$TotalModulos = mysqli_fetch_array($resultadoModulos)[0];

$sqlAulas = "SELECT COUNT(*) FROM aulas";
$resultadoAulas = mysqli_query($conexao, $sqlAulas);
$TotalAulas = mysqli_fetch_array($resultadoAulas)[0];

$sqlAlunos = "SELECT COUNT(*) FROM usuarios WHERE tipo='aluno'";
$resultadoAlunos = mysqli_query($conexao, $sqlAlunos);
$TotalAlunos = mysqli_fetch_array($resultadoAlunos)[0];

echo "Total de Cursos: " . $TotalCursos . "<br>";
echo "Total de Módulos: " . $TotalModulos . "<br>"; 
echo "Total de Aulas: " . $TotalAulas . "<br>";
echo "Total de Alunos: " . $TotalAlunos . "<br>";



    