<?php

    include "conect.php";
    include "s-login.php";

    $PK = $_REQUEST['codigo'];

        if ($PK != "") {
            $query = $conexao->query("DELETE FROM usuario WHERE cod_usuario = '{$PK}'");

            $result = mysqli_commit($conexao, $query);

            if ($result == 1) {
                echo "<script> alert('Conta apagada com sucesso!') </script>";
                echo "<script>location.href='index.php'</script>";
                logoff();
            } else {
                echo "<script> alert('Erro ao apagar sua conta!') </script>";
                echo "<script>location.href='apagar_conta.php'</script>";
            }
        }
?>