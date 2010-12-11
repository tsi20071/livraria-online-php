<?php
if (!isset($_SESSION['carrinho']))
    $_SESSION['carrinho'] = array(); // ARRAY COM AS INFORMAÇÕES DO CARRINHO DE COMPRAS

if (isset($_GET['acao'])) { // SE EXISTIR ALGUMA AÇÃO, FAZER:
    if ($_GET['acao'] == 'adicionar') { // ADICIONAR NO CARRINHO
        $livro = $_GET['livro'];
        if (!isset($_SESSION['carrinho'][$livro]))
            $_SESSION['carrinho'][$livro] = 1;
        else
            $_SESSION['carrinho'][$livro] += 1;
    }
    if ($_GET['acao'] == 'remover') { // REMOVER DO CARRINHO
        $livro = $_GET['livro'];
        if (isset($_SESSION['carrinho'][$livro]))
            unset($_SESSION['carrinho'][$livro]);
    }
    if ($_GET['acao'] == 'atualizar') // ATUALIZAR CARRINHO
        if (is_array($_POST['produto']))
            foreach ($_POST['produto'] as $livro => $quantidade) {
                $livro = intval($livro);
                $quantidade = intval($quantidade);
                if (!empty($quantidade) || ($quantidade != 0))
                    $_SESSION['carrinho'][$livro] = $quantidade;
                else
                    unset($_SESSION['carrinho'][$livro]);
            }
}
$total = 0;
?>
<form action="?titulo=carrinho&acao=atualizar" method="post">
<table align="center" border="0" class="carrinho" cellpadding="0" cellspacing="5">
    <tr>
        <td width="270">Produto</td>
        <td width="50">Qtd.</td>
        <td width="90">Pre&ccedil;o</td>
        <td width="120">SubTotal</td>
        <td width="80">&nbsp;</td>
    </tr>
    <?php
    if(count($_SESSION['carrinho']) == 0)
        echo '<tr><td colspan="5">Adicione algum livro.</td></tr>';
    else {
        foreach($_SESSION['carrinho'] as $codigo => $quantidade) {
            $query = 'SELECT * FROM livros WHERE codigo = ' . $codigo;
            $resultado = mysqli_query($conexao, $query);
            $dados = mysqli_fetch_array($resultado);

            echo '<tr>';
            echo    '<td width="300">' . $dados['titulo'] . '</td>';
            echo    '<td width="40"><input type="text" size="3" name="produto[' . $codigo . ']" value="' . $quantidade . '" /></td>';
            echo    '<td width="100">R$ ' . number_format($dados['preco'], 2, ',', '.') . '</td>';
            echo    '<td width="120">R$ ' . number_format($dados['preco'] * $quantidade, 2, ',', '.') . '</td>';
            echo    '<td width="80"><a href="?titulo=carrinho&acao=remover&livro='. $codigo . '">Remover</a></td>';
            echo '</tr>';

            $total += ($dados['preco'] * $quantidade);
        }
    }
    ?>

</table>
<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="500px"><input type="submit" value="Atualizar" /></td>
        <td align="right" style="color: #f00; font-size: large;"><?php echo 'Total: R$ ' . number_format($total, 2, ',', '.'); ?></td>
    </tr>
</table>
</form>
<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="right">
            <form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
                <input type="hidden" name="email_cobranca" value="michelrisucci@gmail.com" />
                <input type="hidden" name="tipo" value="CP" />
                <input type="hidden" name="moeda" value="BRL" />
                <?php
                $pagseguroid = 0;
                foreach($_SESSION['carrinho'] as $codigo => $quantidade) {
                    $query = 'SELECT * FROM livros WHERE codigo = ' . $codigo;
                    $resultado = mysqli_query($conexao, $query);
                    $dados = mysqli_fetch_array($resultado);
                    $pagseguroid++;

                    echo '<input type="hidden" name="item_id_' . $pagseguroid . '" value="' . $codigo . '">';
                    echo '<input type="hidden" name="item_descr_' . $pagseguroid . '" value="' . $dados['titulo'] . '">';
                    echo '<input type="hidden" name="item_quant_' . $pagseguroid . '" value="' . $quantidade . '">';
                    echo '<input type="hidden" name="item_valor_' . $pagseguroid . '" value="' . number_format($dados['preco'], 2, '', '') . '">';
                    echo '<input type="hidden" name="item_frete_' . $pagseguroid . '" value="0">';
                    echo '<input type="hidden" name="item_peso_' . $pagseguroid . '" value="0">';
                }
                ?>
                <input type="hidden" name="tipo_frete" value="EN" />
                <input type="image" src="imagens/pagseguro.png" name="submit" />
            </form>
        </td>
    </tr>
</table>