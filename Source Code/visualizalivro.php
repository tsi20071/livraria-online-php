<?php
	$query = 'SELECT * FROM livros WHERE codigo = ' . $_GET['visualizalivro'];
	$resultado = mysqli_query($conexao, $query);
	$dados = mysqli_fetch_array($resultado);

	echo '<table class="visualizalivro" width="640px" border="0" align="center" cellspacing="4" cellpadding="0">';
	echo '<tr>';
	echo '<td width="160" align="left" valign="top"><img src="livros/' . $dados['codigo'] . '.jpg" /></td>';
	echo '<td align="left" valign="top" id="texto">';
	echo '<span id="titulo">' . $dados['titulo'] . '</span>';
	echo '<span id="autor">' . $dados['autor'] . '</span>';
	echo '<span id="editora">' . $dados['editora'] . '</span>';
	echo '<span id="descricao">' . $dados['descricao'] . '</span>';
	echo '<span id="preco">R$ ' . number_format($dados['preco'], 2, ',', '.') . '</span>';
	echo '<span id="comprar">';
        if ($logado)
            echo '<a href="?titulo=carrinho&acao=adicionar&livro=' . $dados['codigo'] . '">&nbsp;</a></span></td>';
        else
            echo 'Efetue o login para poder comprar e acessar o carrinho de compras.</span></td>';
	echo '</tr>';
	echo '</table>';
?>