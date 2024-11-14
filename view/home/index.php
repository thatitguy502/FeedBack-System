<?php
require_once '../config/config.php';

if (!defined('BASE_URL')) {
    exit('No direct script access allowed');
}
?>

<div class="bg-orange-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl font-bold mb-4">Ajude outros a fazerem a escolha certa</h1>
                <p class="text-lg mb-6">Compartilhe sua experiência e ajude milhões de pessoas a tomarem melhores decisões.</p>
                <a href="<?php echo BASE_URL; ?>/reviews/create" class="bg-black text-white px-6 py-3 rounded-lg inline-block">
                    Faça sua avaliação
                </a>
            </div>
            <div class="md:w-1/2">
                <img src="/api/placeholder/600/400" alt="Reviews illustration" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold mb-8">Categorias Populares</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="#" class="p-4 bg-white rounded-lg shadow text-center hover:shadow-lg transition">
            <i class="fas fa-store text-2xl mb-2"></i>
            <div>Lojas</div>
        </a>
        <a href="#" class="p-4 bg-white rounded-lg shadow text-center hover:shadow-lg transition">
            <i class="fas fa-utensils text-2xl mb-2"></i>
            <div>Restaurantes</div>
        </a>
        <a href="#" class="p-4 bg-white rounded-lg shadow text-center hover:shadow-lg transition">
            <i class="fas fa-shopping-bag text-2xl mb-2"></i>
            <div>Produtos</div>
        </a>
        <a href="#" class="p-4 bg-white rounded-lg shadow text-center hover:shadow-lg transition">
            <i class="fas fa-briefcase text-2xl mb-2"></i>
            <div>Serviços</div>
        </a>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold mb-8">Avaliações Recentes</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php if (!empty($recentReviews)): ?>
            <!-- Loop para exibir as últimas avaliações -->
            <?php foreach ($recentReviews as $review): ?>
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-yellow-400 mb-2"><?php echo $stars; ?></div>
                    <h3 class="font-bold mb-2"><?php echo htmlspecialchars($review['company_name']); ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo htmlspecialchars(substr($review['review_text'], 0, 150)) . '...'; ?></p>
                    <div class="text-sm text-gray-500">
                        Por <?php echo htmlspecialchars($review['reviewer_name']); ?> em 
                        <?php echo date('d/m/Y', strtotime($review['created_at'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma avaliação recente encontrada.</p>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
?>
