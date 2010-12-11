<?php
include_once('sessao.php'); // ARQUIVO QUE INICIA A SESSÃO
include_once('checatitulo.php'); // ARQUIVO QUE CHECA O TÍTULO DA PÁGINA
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Livraria Online</title>
        <link href="fontes.css" rel="stylesheet" type="text/css" />
        <link href="estilos.css" rel="stylesheet" type="text/css" />
        <link href="visualizalivro.css" rel="stylesheet" type="text/css" />
        <link href="inserirdados.css" rel="stylesheet" type="text/css" />
        <link href="cadastro.css" rel="stylesheet" type="text/css" />
        <link href="carrinho.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="cabecalho">
            <div class="cabecalho-esquerdo"><img src="imagens/site-logo.png" width="160" height="80" />&nbsp;<span>Livraria Online</span></div>
            <div class="cabecalho-direito">
                <div id="login" style="display: <?php echo $displaylogin; ?>;"> 
                    <form method="post" action="login.php">
                        <table cellpadding="0" cellspacing="0" width="290px">
                            <tr>
                                <td width="160px">E-mail</td><td width="160px" style="padding-left: 10px;">Senha</td>
                            </tr>
                            <tr>
                                <td width="160px"><input type="text" name="email" id="email" class="campo" /></td><td width="160px" style="padding-left: 10px;"><input type="password" name="senha" id="senha" class="campo" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><input type="submit" value="Acessar" class="botao" /></td>
                            </tr>
                        </table>
                    </form>
                    <span style="font-size: smaller; color: #c03; display: <?php if ($_GET['logado'] == 'false') echo 'block'; else echo 'none'; ?>;">Usuário não existe!</span>
                </div>
                <div id="usuario" style="display: <?php echo $displayusuario; ?>;"><span>Bem vindo, <?php echo $usuario; ?></span><span><a href="logoff.php">Sair</a></span></div>
            </div>
        </div>
        <div class="conteudo">
            <div class="menu">
                <ul class="categorias">
                    <li class="cabecalho-menu">LIVRARIA</li>
                    <?php include_once('menulivraria.php'); // ARQUIVO QUE CRIA O MENU DINÂMICO DA LIVRARIA ?>
                    <li class="cabecalho-menu">CATEGORIAS</li>
                    <?php include_once('menucategorias.php'); // ARQUIVO QUE CRIA O MENU DINÂMICO DE CATEGORIAS ?>
                </ul>
                <span style="display: block; text-align: center;"><br /><img src="imagens/formasdepagamento.gif" /></span>
            </div>
            <div class="menu-aux">
                <span class="busca">BUSCAR LIVROS</span>
                <form method="get" action="index.php">
                    <input name="busca" id="busca" type="text" style="width: 150px;" />
                    <span id="busca">Título, autor ou editora.</span>
                    <input type="submit" value="Buscar" class="botao" />
                </form>
                <span style="display: block; text-align: center;">
                    <br /><img src="http://www.clickcds.com.br/120x600_10X_pagseguro.gif" />
                </span>
            </div>
            <div class="centro">
                <div class="pagina"><?php echo $titulo; ?></div>
                <?php include_once('checaconteudo.php'); // ARQUIVO QUE CHECA QUE CONTEÚDO DEVE SER INCLUSO NO CENTRO DA PÁGINA ?>
            </div>
            <div class="clearer"></div>
        </div>
    </body>
</html>
<?php mysqli_close($conexao); // FECHA A CONEXÃO COM O BANCO DE DADOS ?>