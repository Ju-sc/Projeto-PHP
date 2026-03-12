<?php

session_start();

require_once "../conexao.php";
require_once "includes/menu_admin.php"; 

//Se está logado como aluno, sai
    if ($_SESSION["usuario_tipo"] == "usuario") {
      header("Location: meus_cursos.php");
    exit;
  }
  
$sqlCursos = "SELECT * FROM cursos";
$resultadoCursos = mysqli_query($conexao, $sqlCursos);


?>

<!DOCTYPE html>

<!-- Lista de Cursos -->
<div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Cursos Cadastrados</h3>
            <table class="w-full text-sm">  
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-3 text-left rounded-tl-lg">ID</th>
                        <th class="px-4 py-3 text-left">Curso</th>
                        
                        <th class="px-4 py-3 text-left rounded-tr-lg">Capa</th>
                        <th class="px-4 py-3 text-left">Ativo</th>
                        <th class="px-4 py-3 text-left">Criado em</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = mysqli_fetch_assoc($resultadoCursos)): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3"><?php echo $linha ["id"]; ?></td>
                            <td class="px-4 py-3"><?php echo $linha['titulo']; ?><br><?php echo $linha['descricao']; ?></td>
                            
                            <td class="px-4 py-3 "><?php echo $linha['capa']; ?></td>
                            <td class="px-4 py-3"><?php echo $linha['ativo'] == 1 ? "Sim" : "Não"; ?></td>
                            <td class="px-4 py-3"><?php echo $linha['criado_em']; ?></td>
                            <td class="px-4 py-3 ">
                             
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>