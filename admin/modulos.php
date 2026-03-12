<?php

session_start();

require_once "../conexao.php";
require_once "includes/menu_admin.php"; 


//Se está logado como aluno, sai
    if ($_SESSION["usuario_tipo"] == "usuario") {
  header("Location: meus.php");
    exit;
  }
    
