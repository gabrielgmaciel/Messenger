<?php

require_once ("conect.php");

$mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : "";

//inserindo dados na tabela "mensagens"

$inserir ="INSERT INTO mensagens (mensagem) VALUES ('$mensagem')";

$result = mysqli_query($conexao,$inserir);

    if($result == 1){
        echo "<script>location.href='frases.php'</script>";
    }else{
        echo "<script> alert('Erro ao inserir frase') </script>";
        echo "<script>location.href='frases.php'</script>";
    }
?>