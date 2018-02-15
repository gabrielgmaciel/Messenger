<?php require_once "conect.php"; require_once "s-login.php"; protegePagina();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Configuração</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(img/FundoConfig.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body >
<div class="container">
    <div class="page-header"><br><br>
        <center><h3><font face="Arial" size="5" color="white"><b>Configuração</h3></center>
    </div>
    <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
                <div class="form-group" Class="Alterar Dados">
                    <a href="alterar_dados.php">
                    <button id="alterar_dados" class="btn btn-info btn-block" type="submit">
                        Alterar Dados
                    </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
            <div class="form-group">
                <a href="veiculos_cadastrados.php">
                <button id="veiculos_cadastrados" class="btn btn-info btn-block" type="submit">
                    Veículos Cadastrados
                </button>
                </a>
            </div>
        </div>
    </div>
       
     <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
                <div class="form-group">
                    <input type="hidden" name="cod_usuario" value="<?php echo $_SESSION['userCod']?>">
                    <a href="s-apagar_conta.php?codigo=<?php echo $_SESSION['userCod']?>"onclick="return confirm('Deseja realmente excluir sua conta?')">
                    <button id="apagar_conta" class="btn btn-info btn-block" type="submit" onclick="return validaForm()">
                        Apagar Conta   
                    </button></a>
                </div>
            </div>
        </div>
     <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
            <div class="form-group">
                <a href="home.php">
                <button id="sair" class="btn btn-info btn-block" type="submit">
                    Voltar
                </button>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
            <div class="form-group">
                <a href ="s-login.php?x=1">
                    <button id="sair" class="btn btn-danger btn-block" type="submit">
                        Sair
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>    
</html>

