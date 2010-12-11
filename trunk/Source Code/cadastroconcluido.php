<<<<<<< .mine
<?php

//Código que mostra que o cadastro está concluido
$nascimento = explode('/', $_POST['nascimento']);

$query = 'INSERT INTO clientes (nome, email, senha, cpf, nascimento, cep, endereco, numero, complemento, bairro, cidade, estado) VALUES (\'' . $_POST['nome'] . '\', \'' . $_POST['email'] . '\', \'' . $_POST['senha'] . '\', \'' . $_POST['cpf'] . '\', \'' . $nascimento[2] . '-' . $nascimento[1] . '-' . $nascimento[0] . '\', \'' . $_POST['cep'] . '\', \'' . $_POST['endereco'] . '\', \'' . $_POST['numero'] . '\', \'' . $_POST['complemento'] . '\', \'' . $_POST['bairro'] . '\', \'' . $_POST['cidade'] . '\', ' . $_POST['estado'] . ');';
$resultado = mysqli_query($conexao, $query);

if($resultado)
    echo 'Cadastro conclu&iacute;do com sucesso!<br /><a href=".">Clique aqui</a> para voltar &agrave; p&aacute;gina inicial ou fa&ccedil;a o login agora na parte superior do site.';
else
    echo 'Erro nos dados. Tente novamente.'
?>
=======
<?php
$nascimento = explode('/', $_POST['nascimento']);

$query = 'INSERT INTO clientes (nome, email, senha, cpf, nascimento, cep, endereco, numero, complemento, bairro, cidade, estado) VALUES (\'' . $_POST['nome'] . '\', \'' . $_POST['email'] . '\', \'' . $_POST['senha'] . '\', \'' . $_POST['cpf'] . '\', \'' . $nascimento[2] . '-' . $nascimento[1] . '-' . $nascimento[0] . '\', \'' . $_POST['cep'] . '\', \'' . $_POST['endereco'] . '\', \'' . $_POST['numero'] . '\', \'' . $_POST['complemento'] . '\', \'' . $_POST['bairro'] . '\', \'' . $_POST['cidade'] . '\', ' . $_POST['estado'] . ');';
$resultado = mysqli_query($conexao, $query);

if($resultado)
    echo 'Cadastro conclu&iacute;do com sucesso!<br /><a href=".">Clique aqui</a> para voltar &agrave; p&aacute;gina inicial ou fa&ccedil;a o login agora na parte superior do site.';
else
    echo 'Erro nos dados. Tente novamente';
?>
>>>>>>> .r10
