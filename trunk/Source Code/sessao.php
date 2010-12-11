<?php
//Criação da sessão
include_once('conexao.php');
session_name('livrariaonline'); // NOME DA SESSÃO DO SITE
session_start(); // CHAMA A SESSÃO SE CRIADA PELO LOGIN.PHP

if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {
    $logado = true;
    $displaylogin = 'none';
    $displayusuario = 'block';

    $query = 'SELECT * FROM clientes WHERE email = \'' . $_SESSION['email'] . '\' AND senha = \'' . $_SESSION['senha'] . '\'';
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);
    $arraynome = explode(' ', $dados['nome']);
    if(sizeof($arraynome) > 1)
        $usuario = $arraynome[0] . ' ' . $arraynome[(sizeof($arraynome) - 1)];
    else
        $usuario = $arraynome[0];
}
else {
    $logado = false;
    $displaylogin = 'block';
    $displayusuario = 'none';
}
?>
