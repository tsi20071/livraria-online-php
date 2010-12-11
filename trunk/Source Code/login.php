<?php
include_once('conexao.php');

$query = 'SELECT * FROM clientes WHERE email = \'' . $_POST['email'] . '\' AND senha = \'' . $_POST['senha'] . '\'';
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado)>0) {
    session_name('livrariaonline'); // NOME DA SESSÃO DO SITE
    session_start(); // INICIA O USO DE SESSÃO
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['senha'] = $_POST['senha'];
    $sessao = true;
}
else
    $sessao = false;

if ($sessao)
    header('Location: ./');
else
    header('Location: ./index.php?logado=false');
?>