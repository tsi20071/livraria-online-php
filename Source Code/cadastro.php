<table border="0" align="center" class="cadastro">
    <form method="post" action="?titulo=cadastroconcluido">
    <tr>
        <td class="label">Nome</td>
        <td><input type="text" name="nome" maxlength="60" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">E-mail</td>
        <td><input type="text" name="email" maxlength="100" /></td>
        <td class="ajuda">usado como login</td>
    </tr>
    <tr>
        <td class="label">Senha</td>
        <td><input type="password" maxlength="20" name="senha" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">CPF</td>
        <td><input type="text" name="cpf" maxlength="11" /></td>
        <td class="ajuda">sem pontos ou tra&ccedil;os</td>
    </tr>
    <tr>
        <td class="label">Nascimento</td>
        <td><input type="text" name="nascimento" maxlength="10" /></td>
        <td class="ajuda">formato: dd/mm/aaaa</td>
    </tr>
    <tr>
        <td class="label">CEP</td>
        <td><input type="text" name="cep" maxlength="8" /></td>
        <td class="ajuda">sem pontos ou tra&ccedil;os</td>
    </tr>
    <tr>
        <td class="label">Endereco</td>
        <td><input type="text" name="endereco" maxlength="100" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">N&uacute;mero</td>
        <td><input type="text" name="numero" maxlength="10" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">Complemento</td>
        <td><input type="text" name="complemento" maxlength="100" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">Bairro</td>
        <td><input type="text" name="bairro" maxlength="30" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">Cidade</td>
        <td><input type="text" name="endereco" maxlength="100" /></td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td class="label">Estado</td>
        <td>
            <select name="estado">
                <?php
                $query = 'SELECT * FROM estados';
                $resultado = mysqli_query($conexao, $query);

                while ($dados = mysqli_fetch_array($resultado))
                    echo '<option value="' . $dados['codigo'] . '">' . $dados['estado'] . '</option>';
                ?>
            </select>
        </td>
        <td class="ajuda"></td>
    </tr>
    <tr>
        <td colspan="2" class="label"><input type="submit" value="Enviar"/></td>
        <td class="ajuda"></td>
    </tr>
    </form>
</table>