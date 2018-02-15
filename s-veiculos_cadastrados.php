<?php require_once "s-login.php"; protegePagina();?>
<?php require_once "conect.php";
    $usuario = isset($_POST['cod_usuario']) ? $_POST['cod_usuario'] : '';;
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';;
    $placa = isset($_POST['placa']) ? $_POST['placa'] : '';;
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';;

    $procura = $conexao->query("SELECT placa FROM dados_veiculo WHERE placa = '$placa'");
    
            if (mysqli_num_rows($procura) > 0)
            {
                echo "<script> alert('Veículo já registrado!') </script>";
                echo "<script>location.href='veiculos_cadastrados.php'</script>";
            }
            else
                {    function insereVeiculo($conexao,$usuario,$tipo,$placa,$modelo)
                    {
                        $sql = "INSERT INTO dados_veiculo (tipo_veiculo, placa, modelo, cod_usuario) VALUES ($tipo,'{$placa}','{$modelo}',$usuario)";
                        $result = mysqli_query($conexao,$sql);
                        return $result;
                    }
                    if (empty($usuario) or empty($tipo) or empty($placa) or empty($modelo))
                    {
                        echo "Dados não foram inseridos!";
                    }else
                    {
                        insereVeiculo($conexao,$usuario,$tipo,$placa,$modelo);
                        header("location: veiculos_cadastrados.php");
                      }
                    }

?>