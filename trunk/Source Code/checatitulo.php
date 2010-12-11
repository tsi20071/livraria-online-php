<?php
if (isset($_GET['visualizalivro'])) { // VERIFICA SE É PARA VISUALIZAR UM LIVRO DETALHADAMENTE
    $query = 'SELECT * FROM livros WHERE codigo = ' . $_GET['visualizalivro'];
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);
    $titulo = strtoupper($dados['titulo']);
}
elseif ( (isset($_GET['busca'])) && (strlen($_GET['busca']) > 0) ) // SE BUSCA ESTIVER SETADA, ESCREVER O TÍTULO DE BUSCA
    $titulo = 'RESULTADO DA BUSCA POR: ' . strtoupper($_GET['busca']);
elseif (isset($_GET['categoria'])) { // TODO O RESTO DO CÓDIGO DESSE BLOCO PHP SÃO TESTES PARA SETAR O TÍTULO DA PÁGINA VIA GET (URL DA PÁGINA)
    $query = 'SELECT * FROM categorias WHERE codigo = ' . $_GET['categoria'];
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);
    $titulo = 'CATEGORIA: ' . strtoupper($dados['descricao']);
}
elseif (($_GET['titulo'] == 'cadastro') && !$logado)
    $titulo = 'CADASTRO DE USU&Aacute;RIO';
elseif (($_GET['titulo'] == 'cadastroconcluido') && !$logado)
    $titulo = 'CADASTRO CONCLU&Iacute;DO';
elseif (($_GET['titulo'] == 'carrinho') && (isset($_GET['acao'])) && $logado)
    $titulo = 'SEU CARRINHO DE COMPRAS';
else
    $titulo = 'P&Aacute;GINA INICIAL';
?>