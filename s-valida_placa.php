<?php
    require_once("conect.php");

    $letras = isset($_POST['letras']) ? $_POST['letras'] : '';;
    $numeros = isset($_POST['numeros']) ? $_POST['numeros'] : '';;

    $EnviaPlaca = $placa = $letras."-".$numeros;

        if ($letras == "" && $numeros == "") {
            echo "<script> alert('Placa não informada!') </script>";
            echo "<script>location.href='home.php'</script>";
        } else {
            global $conexao;
            $procura = $conexao->query("SELECT placa FROM dados_veiculo WHERE placa = '$placa'");

            if (mysqli_num_rows($procura) > 0) {
                //echo "placa encontrada";
                header("location: envio_mensagem.php?placa={$placa}&letras={$letras}&numeros={$numeros}");
                return $EnviaPlaca;
            } else {
                //placa nao encontrada
                echo "<script> alert('Placa não encontrada em nossos registros!') </script>";
                echo "<script>location.href='home.php'</script>";
            }
        }
?>