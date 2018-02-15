<html>
<head>
    <meta charset="UTF-8">
    <?php
    include "header.php";
    require_once "conect.php";
    require_once "s-login.php";
    protegePagina();
    ?>
    <title>Users</title>
</head>
<body>
<?php
if(isset ($_GET["admin"]) && $_GET["admin"]==0)
{?>
    <p class="alert-success" style="width:100%">
        Nova mensagem cadastrada com sucesso ! !
    </p>
<?php } ?>
<?php
if(isset ($_GET["admin"]) && $_GET["admin"]==1)
{?>
    <p class="alert-success" style="width:100%">
        Mensagem apagada com sucesso ! !
    </p>
<?php } ?>
<form name="form" action="inserir_frases.php" method="post">
    <div class="container">
        <table class="table table-hover" width="80%">
            <thead class="thead-inverse">
                <tr>
                    <th align="left">Frases de Envio</th>
                    <th></th>
                </tr>
            </thead>
                <?php
                function listarMensagens($conexao)
                {
                $sql = "SELECT * FROM mensagens";
                $result = mysqli_query($conexao,$sql);

                while ($array = mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td align="left"><?php echo $array['mensagem'] ?></td>
                <td align='center'><a href="apagar_frases.php?codigo=<?php echo $id = $array['id'];?>
                "onclick="return confirm('Deseja realmente excluir essa frase?')"><img src="img/lixeira.ico" width="25px" height="25px"></a></td>
            </tr>
            <?php } ?>
            <?php }
            listarMensagens($conexao);?>
        </table>
    </div>
    <div class="container">
        <center>
            <input type="text" class="form-control" maxlength="20" placeholder="Adicionar uma nova Frase" name="mensagem">
            <button class="btn btn-success" type="submit" onclick="return validaForm();">Adicionar</button>
        </center>
    </div><br><br><br><br><br><br><br>
</form>
<script  type="text/javascript">
    function validaForm()
    {
        var select = form.mensagem.value;

        if (select == "")
        {
            return false;
        }

    }
</script>
</body>
</html>