<?php
$busca = explode(' ', strtoupper($_GET['busca'])); // EXPLODE A STRING EM MAIÚSCULA NUM ARRAY PARA FAZER UMA QUERY BEM ABRANGENTE COM "LIKE" E "%"

$query = 'SELECT codigo, titulo, autor, editora, preco FROM livros WHERE '; // INÍCIO DA QUERY
for($i = 0; $i < sizeof($busca); $i++) {
    $query .= 'UPPER(titulo) LIKE \'%' . $busca[$i] . '%\' OR ';
    $query .= 'UPPER(autor) LIKE \'%' . $busca[$i] . '%\' OR ';
    $query .= 'UPPER(editora) LIKE \'%' . $busca[$i] . '%\'';
    if($i != (sizeof($busca) - 1)) // SE NÃO FOR A ÚLTIMA PALAVRA DA BUSCA, ADICIONAR UM "OR" PARA CONCATENAR MAIS COISAS, TERMINA A QUERY
        $query .= ' OR ';
}

$resultado = mysqli_query($conexao, $query);

    if ($resultado->num_rows > 0)
        include_once('inserirdados.php');
    else
        echo '<span>N&atilde;o foram encontrados livros como resultado da sua busca.</span>';
?>