<?php

//Se está logado como aluno, sai

//    if ($_SESSION["tipo"] == "usuario") {
//      header("Location: meus_cursos.php");
 //   exit;
//}

//Se está logado como aluno, sai
if (isset($_SESSION["usuario_id"])){ 
    if ($_SESSION["usuario_tipo"] == "usuario") {
      header("Location: ../meus_cursos.php");
    exit;
}
}

  ?>

<nav>
    <a href="index.php">Dashboard</a>
    <a href="cursos.php">Cursos</a>
    <a href="../logout.php">Sair</a>
</nav>

