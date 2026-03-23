<?php

session_start();

require_once "../conexao.php";

//Se está logado como aluno, sai
if ($_SESSION["usuario_tipo"] == "aluno") {
    header("Location: ../meus_cursos.php");
    exit;
}

$id = $_GET['curso_id'];


    $sql = "SELECT * FROM modulos WHERE curso_id = '$id'";
    $result = mysqli_query($conexao, $sql);
    $modulos = mysqli_fetch_assoc($result);

if (isset($_GET["deletado"])) {
    $sucesso = "Módulo excluído com sucesso!";
}
?>

<!-- Lista de Cursos -->               
        
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Módulos — Admin | EAD SENAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { senai: { red:'#C0392B', blue:'#34679A', 'blue-dark':'#2C5A85', orange:'#E67E22', green:'#27AE60' } } } }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .nav-link { display:flex; align-items:center; gap:8px; padding:8px 12px; border-radius:6px; font-size:13px; cursor:pointer; transition:background .15s; color:#cbd5e1; }
        .nav-link:hover { background:rgba(255,255,255,.08); color:#fff; }
        .nav-link.active { background:rgba(255,255,255,.15); color:#fff; font-weight:600; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-56 bg-gray-900 min-h-screen flex flex-col flex-shrink-0">
        <div class="px-4 py-5 border-b border-gray-700">
            <p class="text-white font-extrabold text-base">🎓 EAD SENAI</p>
            <p class="text-gray-500 text-xs mt-0.5">Painel Administrativo</p>
        </div>
        <div class="px-4 py-3 border-b border-gray-700">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-senai-blue rounded-full flex items-center justify-center text-white text-xs font-bold">A</div>
                <div>
                    <p class="text-white text-xs font-semibold">Administrador</p>
                    <p class="text-gray-500 text-xs">admin@ead.com</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 p-3 space-y-1">
            <a href="index.php"      class="nav-link">📊 <span>Dashboard</span></a>
            <a href="cursos.php"     class="nav-link active">📚 <span>Cursos</span></a>
            <a href="modulos.php"    class="nav-link">📦 <span>Módulos</span></a>
            <a href="aulas.php"      class="nav-link">🎬 <span>Aulas</span></a>
            <div class="pt-2 border-t border-gray-700 mt-2">
                <a href="../meus_cursos.php" class="nav-link">👁 <span>Ver site</span></a>
                <a href="../login.php"       class="nav-link text-red-400 hover:text-red-300">🚪 <span>Sair</span></a>
            </div>
        </nav>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-extrabold text-gray-800">Gerenciar Módulos</h1>
                <p class="text-sm text-gray-500">Cadastre, edite e organize os módulos da plataforma</p>
            </div>
            <a href="modulo_form.php?" class="bg-senai-green text-white font-bold px-4 py-2.5 rounded-lg text-sm hover:bg-green-600 transition flex items-center gap-2">
                + Novo Módulo
            </a>
        </div>

        <div class="p-6 flex-1">

            <!-- MENSAGEM DE SUCESSO -->
            <?php if (!empty($sucesso)): ?>
            <div class="bg-green-50 border border-green-300 text-green-700 rounded-lg p-3 mb-5 flex items-center gap-2 text-sm">
                <span class="font-bold text-base">✓</span>
                
                <span>Módulo excluído com sucesso!</span>
                <button class="ml-auto text-green-400 hover:text-green-700 text-lg leading-none">×</button>
            </div>
            <?php endif; ?>
<!-- LISTA DE MÓDULOS -->
                
                <div class="space-y-3">
                    <h2 class="font-bold text-gray-700 text-sm">Módulos do Curso</h2>

                <?php while ($linha = mysqli_fetch_assoc($result)): ?>
                    <!-- Módulo 1 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-senai-blue rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0"><?php echo $linha['ordem']; ?></div>
                            <div class="flex-1">
                                
                                <p class="font-semibold text-gray-800"><?php echo $linha['titulo']; ?></p>
                                <p class="text-xs text-gray-400"><?php echo $linha['descricao']; ?></p>
                            </div>
                            <div class="flex gap-1.5">
                                <a href="aulas.php" class="bg-senai-blue text-white text-xs px-2.5 py-1.5 rounded-md">🎬 Aulas</a>
                                <a href="modulo_form.php?id=<?php echo $linha['id']; ?>" class="bg-yellow-500 text-white text-xs px-2.5 py-1.5 rounded-md">✏</a>
                                <button class="bg-senai-red text-white text-xs px-2.5 py-1.5 rounded-md">🗑</button>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="text-xs text-gray-400 hover:text-gray-600 border border-gray-200 px-2 py-1 rounded">↑ Subir</button>
                            <button class="text-xs text-gray-400 hover:text-gray-600 border border-gray-200 px-2 py-1 rounded">↓ Descer</button>
                        </div>
                    </div>
                    <?php endwhile; ?>


    
                                  

                <!-- RODAPÉ DA TABELA -->

                
                <div class="border-t border-gray-100 px-4 py-3 flex items-center justify-between bg-gray-50">
                    <p class="text-xs text-gray-400">Exibindo <?php echo mysqli_num_rows($result)?> módulos</p>
                    <div class="flex gap-1">
                        <button class="px-3 py-1 text-xs border border-gray-300 rounded bg-white text-gray-500">← Anterior</button>
                        <button class="px-3 py-1 text-xs border border-senai-blue rounded bg-senai-blue text-white font-semibold">1</button>
                        <button class="px-3 py-1 text-xs border border-gray-300 rounded bg-white text-gray-500">Próxima →</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

