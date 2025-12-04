<!-- Cabeçalho com Título e Voltar -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h1 style="margin: 0; color: #333; font-size: 24px;"><?php echo $title; ?></h1>
    
    <!-- CORREÇÃO: Link direto para a lista de produtos (sobe um nível: de 'inserir' para 'produtos') -->
    <a href="../produtos" style="text-decoration: none; color: #666; border: 1px solid #ccc; padding: 8px 16px; border-radius: 4px;">← Voltar</a>
</div>

<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); max-width: 800px; margin: 0 auto;">
    
    <form action="<?php echo $acao; ?>" method="POST">
        
        <!-- ID Oculto (Apenas para edição) -->
        <?php if (!empty($produto['id'])): ?>
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            
            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Nome do Produto</label>
                <input type="text" name="nome" value="<?php echo $produto['nome'] ?? ''; ?>" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Preço (R$)</label>
                <input type="text" name="preco" id="preco" value="<?php echo $produto['preco'] ?? ''; ?>" required placeholder="0.00"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Quantidade</label>
                <input type="number" name="quantidade" value="<?php echo $produto['quantidade'] ?? ''; ?>" required placeholder="0"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Descrição</label>
                <textarea name="descricao" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-family: sans-serif;"><?php echo $produto['descricao'] ?? ''; ?></textarea>
            </div>

            <div style="grid-column: span 2; margin-top: 10px;">
                <button type="submit" style="width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer;">
                    <?php echo ($acao == 'salvar') ? 'Cadastrar Produto' : 'Salvar Alterações'; ?>
                </button>
            </div>

        </div>
    </form>
</div>

<script>
    const inputPreco = document.getElementById('preco');
    inputPreco.addEventListener('change', function() {
        this.value = this.value.replace(',', '.');
    });
</script>