<?php require_once "conect.php"; require_once "s-login.php"; protegePagina();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Enviar Notificação</title>
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body background="img/FundoNotificacoes.jpg" class="login-background">
<div class="container">
<div>
      <!--  <div>
            <?php
                $placa = $_REQUEST['placa'];
                $letras = $_REQUEST['letras'];
                $numeros = $_REQUEST['numeros'];
            ?>
            <h3 font="#000000">Placa: <?php print strtoupper($placa) ?></h3>
        </div> -->

    <div class="page-header"><br>
        <center><h3><font face="Arial" size="5" color="#000000"><b>Enviar Notificação</b></font></h3></center>
    </div>
</div>
    <div>
        <form name="form" method="post" action="s-envio_mensagem.php">
<!-- -----------------------------------------------------Tabela---------------------------------------------------- -->
        <div>
    <center>
        <h2><font face="Arial" size="5" color="#000000"><b>PLACA</b></font></h2>
    </center>
</div>
    <div><br><center>
    <div class="row">
            <table align="center" >
                <tr>
                    <td><center><input type="text" class="form-control" readonly="readonly" onkeyup="somenteLetras(this);" style="text-transform:uppercase" placeholder="<?php print strtoupper($letras) ?>" size="3" maxlength="3"></center></td>
                    <th><center><img src="img/traco2.png" class="icone"></th>
                    <td><center><input type="text" class="form-control" readonly="readonly" onkeyup="somenteNumeros(this);" placeholder="<?php print strtoupper($numeros) ?>" size="4" maxlength="4"></center></td>
                </tr>
            </table></center>
    </div>
<!-- --------------------------------------------------------------------------------------------------------------- -->
            <h3><font color="#000000">O que deseja informar?</font></h3>
                    <r><b name="form" class="form" action="s-envio_mensagem.php" method="post">
                    <select class="form-control form-control-lg" name="select">
                        <option>*Selecione</option>
                        <?php
            
                        $user_sess = 1;
            
                            function listaMensagem($conexao)
                            {
                                $sql = "SELECT * FROM mensagens ";
                                $resultado = mysqli_query($conexao,$sql);
                                while ($array=mysqli_fetch_assoc($resultado))
                                { ?>
                                    <option><?php echo $array['mensagem']?></option>
            
                               <?php } ?>
                          <?php  }
                        listaMensagem($conexao);
                        ?>
              </select>
              <br><br>
              <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
                                    <div class="form-group">
                                    <a href="home.php">
            
                                        <input type="hidden" name="placa" value="<?php print $placa ?>">
            
                    <input type="submit" class="btn btn-success btn-block" onclick="return Valida()" value="Enviar" />
            
            
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-2 col-sm-offset-4 col-md-offset-5">
                                    <div class="form-group">
                                        <a href="home.php">
                                            <button type="button" class="btn btn-danger btn-block">Cancelar</button>

                                        </a>
                                    </div>
                                </div>
                        </form>
                            </div>
                        </div>
                </body>
            </html>
<script>
    /**
     * @return {boolean}
     */
    function Valida() {
        var select = form.select.value;
        if(select === "*Selecione"){
            alert('Selecione Uma Mensagem Para Ser Enviada');
            return false;
        }
    }
</script>