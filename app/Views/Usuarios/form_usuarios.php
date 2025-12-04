<!-- Cabeçalho -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h1 style="margin: 0; color: #333; font-size: 24px;"><?php echo $title; ?></h1>
    
    <!-- Link direto para a Página Inicial (Dashboard) -->
    <a href="../pagina-inicial" style="text-decoration: none; color: #666; border: 1px solid #ccc; padding: 8px 16px; border-radius: 4px; background-color: #fff;">← Voltar</a>
</div>

<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); max-width: 900px; margin: 0 auto;">
    
    <!-- O action será preenchido pelo controller (salvar ou atualizar) -->
    <form action="<?php echo $acao ?? 'salvar'; ?>" method="POST">
        
        <?php $id = $usuario['id_usuario'] ?? $usuario['id'] ?? ''; ?>
        <?php if (!empty($id)): ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php endif; ?>

        <!-- SEÇÃO 1: DADOS PESSOAIS -->
        <h3 style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: #007bff; font-size: 18px;">Dados Pessoais</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Nome Completo</label>
                <input type="text" name="nome" value="<?php echo $usuario['nome'] ?? ''; ?>" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">CPF</label>
                <input type="text" name="cpf" value="<?php echo $usuario['cpf'] ?? ''; ?>" placeholder="000.000.000-00"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Data de Nascimento</label>
                <input type="date" name="data_nascimento" value="<?php echo $usuario['data_nascimento'] ?? ''; ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>
            
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Celular</label>
                <input type="text" name="celular" value="<?php echo $usuario['celular'] ?? ''; ?>" placeholder="(00) 00000-0000"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>
        </div>

        <!-- SEÇÃO 2: ENDEREÇO -->
        <h3 style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: #007bff; font-size: 18px;">Endereço</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">CEP</label>
                <input type="text" name="cep" id="cep" value="<?php echo $usuario['cep'] ?? ''; ?>" placeholder="00000-000"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Rua</label>
                <input type="text" name="rua" id="rua" value="<?php echo $usuario['rua'] ?? ''; ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Número</label>
                <input type="text" name="numero" value="<?php echo $usuario['numero'] ?? ''; ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Complemento</label>
                <input type="text" name="complemento" value="<?php echo $usuario['complemento'] ?? ''; ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="<?php echo $usuario['bairro'] ?? ''; ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Cidade</label>
                <input type="text" name="cidade" id="cidade" value="<?php echo $usuario['cidade'] ?? ''; ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Estado (UF)</label>
                <input type="text" name="estado" id="estado" value="<?php echo $usuario['estado'] ?? ''; ?>" maxlength="2"
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>
        </div>

        <!-- SEÇÃO 3: DADOS DE ACESSO -->
        <h3 style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: #007bff; font-size: 18px;">Dados de Acesso</h3>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">E-mail</label>
                <input type="email" name="email" value="<?php echo $usuario['email'] ?? ''; ?>" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Senha</label>
                <input type="password" name="senha" placeholder="<?php echo !empty($id) ? '(Deixe vazio para manter)' : ''; ?>"
                       <?php echo empty($id) ? 'required' : ''; ?>
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Nível de Acesso</label>
                <select name="nivel_de_acesso" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                    <?php $nivel = $usuario['nivel_de_acesso'] ?? 'Funcionário'; ?>
                    <!-- Valores correspondem ao ENUM do seu banco -->
                    <option value="Administrador" <?php echo $nivel == 'Administrador' ? 'selected' : ''; ?>>Administrador</option>
                    <option value="Funcionário" <?php echo $nivel == 'Funcionário' ? 'selected' : ''; ?>>Funcionário</option>
                    <option value="Cliente" <?php echo $nivel == 'Cliente' ? 'selected' : ''; ?>>Cliente</option>
                </select>
            </div>
        </div>

        <!-- Botão Salvar -->
        <div style="margin-top: 30px;">
            <button type="submit" style="width: 100%; padding: 14px; background-color: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer;">
                <?php echo ($acao ?? 'salvar') == 'salvar' ? 'Cadastrar Usuário' : 'Salvar Alterações'; ?>
            </button>
        </div>
    </form>
</div>

<!-- Script para preencher endereço automaticamente pelo CEP -->
<script>
    document.getElementById('cep').addEventListener('blur', function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                // Preenche com "..." enquanto carrega
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";
                
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                alert("Formato de CEP inválido.");
            }
        }
    });

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } else {
            // CEP não Encontrado.
            alert("CEP não encontrado.");
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
        }
    }
</script>