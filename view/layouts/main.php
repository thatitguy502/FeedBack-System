<?php
require_once '../config/config.php';

// /views/layouts/main.php

if (!defined('BASE_URL')) {
    exit('No direct script access allowed');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Avaliações</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="<?php echo BASE_URL; ?>" class="text-xl font-bold">ReviewSite</a>
                <div class="space-x-4">
                    <a href="<?php echo BASE_URL; ?>/review/create" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                        Escrever Avaliação
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php 
        if (isset($content)) {
            echo $content;
        }
        ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> ReviewSite. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>