<?php
if($logado)
    $query = 'SELECT * FROM menuprincipal WHERE STATUS = 1 OR STATUS = 2';
else
    $query = 'SELECT * FROM menuprincipal WHERE STATUS = 0 OR STATUS = 2';

$resultado = mysqli_query($conexao, $query);

while($dados = mysqli_fetch_array($resultado))
    echo '<li class="item-menu"><a href="' . $dados['link'] . '" title="' . $dados['alternativo'] . '">' . $dados['descricao'] . '</a></li>';
?>
