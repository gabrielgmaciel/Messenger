<?php require_once "conect.php"; require_once "s-login.php"; protegePagina();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Alterar Dados</title>
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body background="img/FundoNotificacoes.jpg" class="login-background"> <br>
<div class="container">
<?php
//variável que ira receber o cod_usuario da sessão ativa

$user_sess = $_SESSION['userCod'];
//buscando os registros no BD
$sql = "SELECT * FROM usuario WHERE cod_usuario = '{$user_sess}'";
$result = mysqli_query($conexao,$sql);
$return = mysqli_fetch_assoc($result);
?>

 <!-- Função para aceitar somente letras -->
 <script>
    function somenteLetras(letras) {
        var er = /[^a-z-ç.]/;
        er.lastIndex = 0;
        var campo = letras;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
 </script>

<!-- Função para aceitar somente números -->
<script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
 </script>

    <div align="left" class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form class="" novalidate action="s-alterar_dados.php" id="form" method="post" name="form">
            <h2>Alterar Dados Cadastrados</h2>
            <hr class="colorgraph">

            <div class="form-group">
                <input type="text" class="form-control input-lg" id="nome" name="nome" placeholder="<?php echo $return['nome'];?>" maxlength="50"/>
                <span id="nome-message" class="text-danger" hidden></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control input-lg" id="email" style="text-transform:lowercase" readonly="readonly" placeholder="<?php echo $return['email']; ?>" maxlength="50" title="Não é permitindo alterar o campo e-mail!" required />
                <span id="email-message" class="text-danger" hidden></span>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="celular" name="tel_celular" onkeyup="mascaraTel(this, mtel);" placeholder="<?php echo $return['telefone']; ?>" maxlength="15" required />
                        <span id="celular-message" class="number-danger" hidden></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input id="senha" name="senha1" type="password" placeholder="Digite a senha" onkeyup="somenteNumeros(this);" maxlength="8" class="form-control input-lg" title="A senha deve conter apenas números" required="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" id="senha" name="senha2" placeholder="Repita a nova senha" onkeyup="somenteNumeros(this);" maxlength="8" title="A senha deve conter apenas números" />
                        <span id="senha-message" class="text-danger" hidden></span>
                    </div>
                </div>
            </div>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input class="btn btn-primary btn-block btn-lg" onclick="return validaForm();" type="submit" value="ALTERAR"></div>
                <div class="col-xs-12 col-md-6">
                    <a href="configuracao.php">
                        <button type="button" class="btn btn-danger btn-block btn-lg">CANCELAR</button></a>
                </div>
            </div>
        </form>
    </div>


   <!-- <form class="form-horizontal" novalidate action="s-alterar_dados.php" id="form" method="post" name="form">
    <input type="hidden" id="id" name="cod_usuario" value="<?php echo $return['cod_usuario']; ?>" />
     <!-- --------------------------------------------Nome--------------------------------------------------------------- --
    <div class="form-group">
      <label class="col-md-4 control-label" for="nome"><font color="#000000">Nome</font></label>
      <div class="col-md-5">
      <input type="text" class="form-control" id="nome" name="nome" placeholder="<?php echo $return['nome'];?>" maxlength="50"/>
      <span id="nome-message" class="text-danger" hidden></span>
     </div>
    </div>
    <!-- ----------------------------------------------E-mail------------------------------------------------------------ --

    <div class="form-group">
    <label for="email" class="col-md-4 control-label"><font color="#000000">E-mail</font></label>
      <div class="col-md-5">
      <input type="email" class="form-control" id="email" style="text-transform:lowercase" readonly="readonly" placeholder="<?php echo $return['email']; ?>" maxlength="50" title="Não é permitindo alterar o campo e-mail!" required />
      <span id="email-message" class="text-danger" hidden></span>
      </div>
    </div>
    <!-- --------------------------------------------Celular------------------------------------------------------------- --
    <div class="form-group">
        <label for="celular" class="col-md-4 control-label"><font color="#000000">Celular</font></label>
        <div class="col-md-5">
       <input type="text" class="form-control" id="celular" name="tel_celular" onkeyup="mascaraTel(this, mtel);" placeholder="<?php echo $return['telefone']; ?>" maxlength="15" required />
       <span id="celular-message" class="number-danger" hidden></span>
      </div>
    </div>
    <!-- ------------------------------------------- Senhas ------------------------------------------------------------- --
    <div class="form-group">
      <label class="col-md-4 control-label"><font color="#000000">Senha</font></label>
      <div class="col-md-5">
        <input id="senha" name="senha1" type="password" placeholder="Digite a senha" onkeyup="somenteNumeros(this);" maxlength="8" class="form-control input-md" title="A senha deve conter apenas números" required="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label"><font color="#000000">Confirmar Senha</font></label>
        <div class="col-md-5">
        <input type="password" class="form-control" id="senha" name="senha2" placeholder="Repita a nova senha" onkeyup="somenteNumeros(this);" maxlength="8" title="A senha deve conter apenas números" />
        <span id="senha-message" class="text-danger" hidden></span>
      </div>
    </div>
    <!-- ---------------------------------------Buttons ----------------------------------------------------------------  --
    <div class="form-group">
     <label class="col-md-4 control-label"></label>
      <div class="col-md-5">
      <input type="submit" class="btn btn-success btn-block" onclick="return validaForm();" value="ALTERAR" />
       </div>


            <div class="col-md-4 control-label">

                    <a href="configuracao.php">
                        <button type="button" class="btn btn-danger btn-block">CANCELAR</button>
                    </a>
                </div>
            </div>
      </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- --

      </form>
    </div> -->
<script type="text/javascript">
    function validaForm()
    {
        var senha1 = form.senha1.value;
        var senha2 = form.senha2.value;
        var nome = form.nome.value;

        if(nome == "")
        {
            alert("Por favor altere os dados!");
            form.nome.select();
            return false;
        }else if(nome.length < 5)
        {
            alert("Digite o nome completo!");
            form.nome.select();
            return false;
        }else if (senha1 != senha2)
        {
            alert ("Senhas não conferem!");
            form.senha2.select();
            return false;
        }else
        {
            alert("Dados alterados com sucesso!");

        }
    }
</script>
<script language="JavaScript" type="text/javascript">
    function mascaraTel(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
</script>
<!-- Função para aceitar somente letras -->
<script>
    function somenteLetras(letras) {
        var er = /[^a-z-ç.]/;
        er.lastIndex = 0;
        var campo = letras;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }
</script>
<!-- Função para aceitar somente números -->
<script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }
</script>
</body>
</html>