<!-- Cabeçalho -->
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
    <h1 style="margin: 0; color: #333; font-size: 24px;"><?php echo $title; ?></h1>
    
    <div>
        <!-- Voltar para Pagina Inicial -->
        <a href="pagina-inicial" style="text-decoration: none; color: #666; border: 1px solid #ccc; padding: 10px 16px; border-radius: 6px; margin-right: 10px; background-color: #fff;">← Voltar</a>

        <!-- Novo Usuário -->
        <a href="usuarios/inserir" style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold;">+ Novo Usuário</a>
    </div>
</div>

<style>
    table { width: 100%; border-collapse: collapse; margin-top: 10px; background: white; }
    th, td { text-align: left; padding: 15px; border-bottom: 1px solid #eee; }
    th { background-color: #f8f9fa; color: #555; font-weight: 600; text-transform: uppercase; font-size: 13px; }
    tr:hover { background-color: #fcfcfc; }
    
    .tag-admin { background-color: #e3f2fd; color: #0d47a1; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
    .tag-user { background-color: #f1f3f5; color: #495057; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
    
    .btn-editar { color: #007bff; text-decoration: none; font-weight: bold; margin-right: 15px; }
    .btn-excluir { color: #dc3545; text-decoration: none; font-weight: bold; }
</style>

<?php if (!empty($usuarios)): ?>
    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Nível</th>
                <th width="150">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $user): ?>
                <?php $id = $user['id_usuario'] ?? $user['id']; ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><strong><?php echo htmlspecialchars($user['nome']); ?></strong></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <?php if (($user['nivel_de_acesso'] ?? 'usuario') == 'admin'): ?>
                            <span class="tag-admin">ADMIN</span>
                        <?php else: ?>
                            <span class="tag-user">USUÁRIO</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Links Relativos -->
                        <a href="usuarios/editar?id=<?php echo $id; ?>" class="btn-editar">Editar</a>
                        <a href="usuarios/excluir?id=<?php echo $id; ?>" class="btn-excluir" onclick="return confirm('Tem certeza?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div style="text-align: center; padding: 40px; color: #777;">
        <h3>Nenhum usuário encontrado</h3>
    </div>
<?php endif; ?>