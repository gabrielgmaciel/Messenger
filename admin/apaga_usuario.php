<?php
    require_once "conect.php";
    include "conect.php";

    $id = $_REQUEST['codigo'];


    if ($id != "") {
        $query = $conexao->query("DELETE FROM usuario WHERE cod_usuario = '{$id}'");
        $result = mysqli_commit($conexao, $query);
        if ($result == 1) {
            echo "<script>location.href='users.php'</script>";
        } else {
            echo "<script> alert('Erro ao apagar o usuário') </script>";
            echo "<script>location.href='users.php'</script>";
        }
    }

?>