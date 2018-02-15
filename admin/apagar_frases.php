<?php
require_once "conect.php";
include "conect.php";

$id = $_REQUEST['codigo'];


if ($id != "") {
    $query = $conexao->query("DELETE FROM mensagens WHERE id = '{$id}'");
    $result = mysqli_commit($conexao, $query);
    if ($result == 1) {
        echo "<script>location.href='frases.php'</script>";
    } else {
        echo "<script> alert('Erro ao apagar a frase') </script>";
        echo "<script>location.href='frases.php'</script>";
    }
}

?>