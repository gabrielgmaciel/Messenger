<?php require_once "conect.php"; require_once "s-login.php"; protegePagina();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="css/jquery.js"></script>
    <script type="text/javascript" src="css/jquery.maskedinput.js"></script>
    <title>Veículos cadastrados</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(img/FundoNotificacoes.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body background="img/teste2.jpg" class="login-background">
<div class="container">
    <div align="left" class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="page-header">
            <center><h3><font face="Arial" size="5" color="#000000"><b>Veículos Cadastrados</b></font></h3></center>
        </div>
    <table class="table table-bordered">
    <thead>
      <tr>
          <th bgcolor="#EEE9E9"><font color="#000000">Veículo</font></th>
          <th bgcolor="#EEE9E9"><font color="#000000">Placa</font></th>
          <th bgcolor="#EEE9E9"><font color="#000000">Modelo</font></th>
          <th bgcolor="#EEE9E9"><font color="#000000">Excluir</font></th>
      </tr>
    </thead>
    <?php

            $user_sess = $_SESSION['userCod'];
            function listaVeiculos($conexao,$user_sess)
        {
            $sql = "SELECT * FROM dados_veiculo WHERE COD_USUARIO = $user_sess";
            $result = mysqli_query($conexao,$sql);
            $cont = 0;
            while ($array=mysqli_fetch_assoc($result))
            { ?>
                <tbody>
      <tr class="bg-info">
        <!--<td scope="row"><?php $cont++; echo $cont;?></td>-->
        <td class""><?php if($array['tipo_veiculo'] == 1)
            {echo "Carro";}else {echo "Moto"; }?></td>
        <td class""><?php echo strtoupper($array['placa'])?></td>
        <td class""><?php echo $array['modelo']?></td>
        <td align='center'><a href="s-exclui_veiculos.php?codigo=<?php echo $placa = strtoupper($array['placa']);?>"onclick="return confirm('Deseja realmente excluir o veículo <?php echo $placa;?>?')"><img src="img/lixeira.ico" width="25px" height="25px"></a></td>

      </tr>
      </tbody>
            <?php } ?>
        <?php }
            listaVeiculos($conexao,$user_sess);
            ?>
  </table>


        <form action="s-veiculos_cadastrados.php" method="post" name="form">
           <hr class="colorgraph">
            <h2>Acicionar Veículo</h2>
            <div class="form-group">
                <label class=" control-label"><h2>Veículo</h2></label>
                <input type="hidden" id="id" name="cod_usuario" value="<?php echo $user_sess; ?>" />
                <div >
                    <input type="radio" id="1" name="tipo" value="1" placeholder="Carro"/> <font color="#000000">Carro </font><br>
                    <input type="radio" id="2" name="tipo" value="2" placeholder="Moto"/> <font color="#000000">Moto</font>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control placa input-lg" name="placa" id="placa" placeholder="Placa do Veículo" maxlength="8"/>
                <span id="placa-message" class="text-danger" hidden></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-lg" id="modelo" name="modelo" placeholder="Modelo do Veículo" maxlength="8"/>
                <span id="modelo-message" class="text-danger" hidden></span>
            </div>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" class="btn btn-success btn-block btn-lg" onclick="return validaForm()" value="CADASTRAR" /></div>
                <div class="col-xs-12 col-md-6">
                    <input type="button" class="btn btn-danger btn-block btn-lg" onclick="location.href='configuracao.php'" value="CANCELAR">
            </div>
        </form>
    </div><br><br>

</div>

    <script src="js/lib/jquery-2.1.3.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("input.placa").mask("aaa-9999");
        });
    </script>
    <script type="text/javascript">
    function validaForm()
    {
        var tipo = form.tipo.value;

        if(tipo < 1)
        {
            alert("Tipo de veículo não selecionado!");
            return false;
        }else if (form.placa.value.length < 8)
        {
            alert("Placa não informada!");
            form.placa.select();
            return false;
        }else if (form.modelo.value.length == "")
        {
            alert("Modelo do veículo não informado!");
            form.modelo.focus();
            return false;
        }
    }
    </script>
</body>
</html>