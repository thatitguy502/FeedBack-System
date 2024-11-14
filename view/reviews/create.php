<?php ob_start(); 
require_once '../config/config.php';
?>

<div class="max-w-2xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8">Escrever Avaliação</h1>
    
    <form action="<?php echo BASE_URL; ?>/reviews/store" method="POST" class="space-y-6">
        <div>
            <label class="block mb-2">Nome da Empresa</label>
            <input type="text" name="company_name" required 
                class="w-full p-2 border rounded">
        </div>
        
        <div>
            <label class="block mb-2">Avaliação</label>
            <textarea name="review_text" required rows="4" 
                class="w-full p-2 border rounded"></textarea>
        </div>
        
        <div>
            <label class="block mb-2">Nota (1-5)</label>
            <select name="rating" required 
                class="w-full p-2 border rounded">
                <option value="1">1 estrela</option>
                <option value="2">2 estrelas</option>
                <option value="3">3 estrelas</option>
                <option value="4">4 estrelas</option>
                <option value="5">5 estrelas</option>
            </select>
        </div>
        
        <div>
            <label class="block mb-2">Seu Nome</label>
            <input type="text" name="reviewer_name" required 
                class="w-full p-2 border rounded">
        </div>
        
        <button type="submit" 
            class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Enviar Avaliação
        </button>
    </form>
</div>

<?php
$content = ob_get_clean();
?>