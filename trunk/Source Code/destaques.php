<?php
$query = 'SELECT * FROM livros ORDER BY codigo DESC LIMIT 0 , 15'; // BUSCA PADRÃO PARA DESTAQUES COM RANDOM PARA MOSTRAR CONTEÚDO ALEATÓRIO
$resultado = mysqli_query($conexao, $query);

include_once('inserirdados.php');
?>