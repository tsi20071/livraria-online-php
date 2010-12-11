<?php
$contador = 0;

echo '<table width="620px" border="0" align="center" cellpadding="0" cellspacing="5">';
  
while ($dados = mysqli_fetch_array($resultado)) {
    if ($contador % 3 == 0)
        echo '<tr>';

    echo '<td align="center" valign="top" width="33%">';
    echo '<img src="livros/' . $dados['codigo'] . '.jpg" />';
    echo '<a class="detalhes" href="index.php?visualizalivro=' . $dados['codigo'] . '">&nbsp;</a>';
    echo '<span class="titulo">' . $dados['titulo'] . '</span>';
    echo '<span class="autor">' . $dados['autor'] . '</span>';
    echo '<span class="editora">' . $dados['editora'] . '</span>';
    echo '<span class="preco">R$ ' . number_format($dados['preco'], 2, ',', '.') . '</span>';
    echo '</td>';

    if ($contador % 3 == 2)
        echo '</tr>';

    $contador++; 
}

echo '</table>';
?>