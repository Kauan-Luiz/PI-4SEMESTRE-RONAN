<!-- Cabeçalho com Título e Botões -->
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
    <h1 style="margin: 0; color: #333; font-size: 24px;"><?php echo $title; ?></h1>
    
    <!-- Agrupamento dos botões (Voltar + Novo) -->
    <div>
        <!-- Botão Voltar para Pagina Inicial -->
        <a href="pagina-inicial" style="text-decoration: none; color: #666; border: 1px solid #ccc; padding: 10px 16px; border-radius: 6px; margin-right: 10px; background-color: #fff;">← Voltar</a>

        <!-- Botão Novo Produto -->
        <a href="produtos/inserir" style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold;">+ Novo Produto</a>
    </div>
</div>

<style>
    table { width: 100%; border-collapse: collapse; margin-top: 10px; background: white; }
    th, td { text-align: left; padding: 15px; border-bottom: 1px solid #eee; }
    th { background-color: #f8f9fa; color: #555; font-weight: 600; text-transform: uppercase; font-size: 13px; }
    tr:hover { background-color: #fcfcfc; }
    
    .tag-baixo { background-color: #fff3cd; color: #856404; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
    .tag-ok { background-color: #e3f2fd; color: #0d47a1; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
    
    .btn-editar { color: #007bff; text-decoration: none; font-weight: bold; margin-right: 15px; }
    .btn-excluir { color: #dc3545; text-decoration: none; font-weight: bold; }
</style>

<?php if (!empty($produtos)): ?>
    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th width="150">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $prod): ?>
                <tr>
                    <td><?php echo $prod['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($prod['nome']); ?></strong></td>
                    <td>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                    <td>
                        <?php if ($prod['quantidade'] < 5): ?>
                            <span class="tag-baixo"><?php echo $prod['quantidade']; ?> (Baixo)</span>
                        <?php else: ?>
                            <span class="tag-ok"><?php echo $prod['quantidade']; ?> un.</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Links corrigidos -->
                        <a href="produtos/editar?id=<?php echo $prod['id']; ?>" class="btn-editar">Editar</a>
                        <a href="produtos/excluir?id=<?php echo $prod['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div style="text-align: center; padding: 40px; color: #777;">
        <h3>Nenhum produto encontrado</h3>
        <p>Clique no botão acima para cadastrar o primeiro.</p>
    </div>
<?php endif; ?>