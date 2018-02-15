<?php
include "conect.php";

//criando variaveis para receber dados de cadastro.php
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';;
$email = isset($_POST['email']) ? $_POST['email'] : '';;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';;
$senha1 = isset($_POST['senha1']) ? $_POST['senha1'] : '';;
$veiculo = isset($_POST['tipo']) ? $_POST['tipo'] : '';;
$placa = isset($_POST['placa']) ? $_POST['placa'] : '';;
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';;

if ($email != null) {
    $procura = $conexao->query("SELECT email FROM usuario WHERE email = '$email'");

    if (mysqli_num_rows($procura) > 0) {
        //Email encontrada
        echo "<script> alert(' Email já cadastrado ') </script>";
        echo "<script>location.href='cadastro.php'</script>";
    } elseif ($placa != null) {
        $procura = $conexao->query("SELECT placa FROM dados_veiculo WHERE placa = '$placa'");

        if (mysqli_num_rows($procura) > 0) {
            //echo "placa encontrada";
            echo "<script> alert(' Placa já cadastrada ') </script>";
            echo "<script>location.href='cadastro.php'</script>";
        } else {
            $query1 = $conexao->query("INSERT INTO usuario (cod_usuario, nome, email, senha, telefone)
                                    VALUES (null, '{$nome}', '{$email}', MD5('{$senha1}'), '{$telefone}')");
            $query2 = $conexao->query("INSERT INTO dados_veiculo (cod_usuario, placa, modelo, tipo_veiculo)
                                            VALUES ((select last_insert_id()), upper('{$placa}'), '{$modelo}', '{$veiculo}')");

            $result = mysqli_commit($conexao, $query1, $query2);

            if ($result == 1) {
                echo "<script> alert(' cadastrado realizado! ') </script>";
                echo "<script>location.href='index.php'</script>";
            } else {
                header("location: cadastro.php");
            }
        }
    }
}

?>

