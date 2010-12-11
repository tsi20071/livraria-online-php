<?php
$query = 'SELECT * FROM categorias ORDER BY descricao ASC';
$resultado = mysqli_query($conexao, $query);

while($dados = mysqli_fetch_array($resultado))
    echo '<li class="item-menu"><a href="index.php?categoria=' . $dados['codigo'] . '&titulo=categorias' . '" title="' . $dados['alternativo'] . '">' . $dados['descricao'] . '</a></li>';
?>
