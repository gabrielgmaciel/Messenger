<html>

	<head>
		<title>Login</title>
        <meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet" />
	</head>
	
	<div class="ui-fluid">
		<body class="login-background" background="img/fundo.jpg" bgproperties="fixed">
	</div>

	<!--<div style="background-image:url(images/html.jpg)"><img src="fun.jpg"></div>-->
    <div width="100%">
		<form action="s-login.php" method="POST" class="logando" name="form">
			<center>

			<br><br><br><br><br><br>

                        <div id="contentdiv" class="contcustom">
                            <span class="fa fa-spinner bigicon"></span>
                            <h2>Login</h2>
                            <div>
                                <input name="logon" type="text" placeholder="Usuário" onkeypress="check_values();">
                                <input name="senha" type="password" placeholder="Senha" onkeypress="check_values();">
                                <input type="submit" class="btn-danger" value="Entrar" onclick="return validaForm();">
                            </div>
                        </div>
		</form>
    </div>
    <script type="text/javascript">
        function validaForm()
        {
            var usuario = form.logon.value;
            var senha = form.senha.value;

            if (usuario == "" || senha == "")
            {
                alert("Insira usuario e senha!");
                form.logon.select();
                return false;
            }
        }
    </script>
</body>
</html>
