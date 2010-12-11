<?php
if (isset($_GET['categoria']))
    include_once('categorias.php');
elseif (isset($_GET['busca']) && (strlen($_GET['busca']) > 0))
    include_once('buscar.php');
elseif (isset($_GET['visualizalivro']))
    include_once('visualizalivro.php');
elseif (($_GET['titulo'] == 'cadastro') && !$logado)
    include_once('cadastro.php');
elseif (($_GET['titulo'] == 'cadastroconcluido') && !$logado)
    include_once('cadastroconcluido.php');
elseif (($_GET['titulo'] == 'carrinho') && (isset($_GET['acao'])) && $logado)
    include_once('carrinho.php');
else
    include_once('destaques.php'); 
?>