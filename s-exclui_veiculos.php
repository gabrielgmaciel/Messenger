<?php require_once "conect.php";

    include "conect.php";

    $placa = $_REQUEST['codigo'];

    echo $placa;



         if ($placa != "") {
                $query = $conexao->query("DELETE FROM dados_veiculo WHERE placa = '{$placa}'");
                $result = mysqli_commit($conexao, $query);
                if ($result == 1) {
                    echo "<script> alert('Veículo excluído com sucesso!') </script>";
                    echo "<script>location.href='veiculos_cadastrados.php'</script>";
                } else {
                    echo "<script> alert('Erro ao apagar o veículo!') </script>";
                    echo "<script>location.href='veiculos_cadastrados.php'</script>";
                }
            }

?>