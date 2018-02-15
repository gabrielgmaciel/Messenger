<?php

    include "conect.php";

    $select = isset($_POST['select']) ? $_POST['select'] : '';;
    $placa = isset($_POST['placa']) ? $_POST['placa'] : '';;


       if ($select == '*Selecione'){
            echo "<script>location.href='home.php'</script>";
        } else
                {
                    $query = $conexao -> query("INSERT INTO mensagem_usuario (cod_usuario, placa, id, mensagens) VALUES
      ((SELECT cod_usuario FROM dados_veiculo WHERE dados_veiculo.placa = '{$placa}'), '{$placa}', NULL , '{$select}')");

                     $result = mysqli_commit($conexao, $query);

                    if($result == 1){
                        echo "<script> alert('Mensagem enviada!') </script>";
                        echo "<script>location.href='home.php'</script>";
                    }else{
                        echo "<script> alert('Erro ao enviar a mensagem!') </script>";
                        echo "<script>location.href='envio_mensagem.php'</script>";
                    }
                }
?>