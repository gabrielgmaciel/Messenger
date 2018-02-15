<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Configuração</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(img/teste2.jpg);
            background-attachment:fixed;
            background-size:100%;
            background-repeat: no-repeat;
            background-color: #000;
        }
    </style>
</head>
<body background="img/teste2.jpg" class="login-background">
<div class="container">
    <div class="page-header">
        <center><h3><font face="Arial" size="5" color="#000000"><b>Deseja realmente apagar sua conta?</b></font></h3></center>
    </div>
    <form action="s-apagar_conta.php" method="post" name="form">
    <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
                <div class="form-group">
                   <!-- <input type="text" name="cod_usuario" value="7">
                    <input type="text" name="confirm" value="confirm"> -->
                <input type="submit" class="btn btn-success btn-block" onclick="return validaForm()" value="EXCLUIR"/>
                </div>
            </div>
    </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
                <div class="form-group">
                    <a href="configuracao.php">
                        <button type="button" class="btn btn-danger btn-block">SAIR</button>
                    </a>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function validaForm()
        {
            var resp = confirm("Deseja realmente excluir sua conta ?");

            if (resp == true)
            {
                alert("Conta foi excluida com sucesso !");
                return true;
            }else
            {
                return false;
            }
        }
    </script>
</body>
</html>