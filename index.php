<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8" content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="css/bootstrap.css" rel="stylesheet" />
    </head>
    <body background="img/FundoLogin.jpg" class="login-background">
        <div width="100%">
            <form action="s-login.php" method="POST" class="logando" name="form">
                <center>
                    <br><br><br><br><br><br>
                    <div id="contentdiv" class="contcustom">
                        <span class="fa fa-spinner bigicon"></span>
                        <h3 class="TituloLogin">Messenger Driver</h3><br>
                        <div>
                            <input class="Login" name="email" type="text" placeholder="E-mail">
                            <input class="Login" name="senha" type="password" placeholder="Senha">
                            <input type="submit" class="btn-danger" value="Entrar" onclick="return validaForm() ">
                        </div>
                    </div>
                    <a href="cadastro.php" class="linkLogin">Não tem uma conta? Crie uma!
            </form>
        </div>
    <script type="text/javascript">
        function validaForm()
        {
            var email = form.email.value;
            var senha = form.senha.value;

            if (email == "" || senha == "")
            {
                alert("Insira email e senha!");
                form.email.select();
                return false;
            }
        }
    </script>
    </body>
</html>