<?php
	$categoria = $_GET['categoria'];
	
	$query = 'SELECT * FROM livros WHERE categoria = ' . $categoria;
	$resultado = mysqli_query($conexao, $query);
	
	if ($resultado->num_rows > 0)
	  include_once('inserirdados.php'); 
	else
	  echo '<span>N&atilde;o foram encontrados livros nesta categoria.</span>';
?>