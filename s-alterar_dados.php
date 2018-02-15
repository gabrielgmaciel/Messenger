<?php

    require_once "conect.php";
    //variavés nescessárias
    $usuario = isset($_POST['cod_usuario']) ? $_POST['cod_usuario'] : '';;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';;
    $email = isset($_POST['email']) ? $_POST['email'] : '';;
    $senha = isset($_POST['senha1']) ? $_POST['senha1'] : '';;
    $conf_senha = isset($_POST['conf_senha']) ? $_POST['conf_senha'] : '';
    $tel_celular = isset($_POST['tel_celular']) ? $_POST['tel_celular'] : '';;
    //função para fazer up-date
    function atualizaDados($conexao,$usuario,$dado,$valor)
    {
        $sql = "UPDATE usuario SET $dado = '$valor' WHERE cod_usuario = $usuario";
        $result = mysqli_query($conexao,$sql);
        return $result;
    }
    function atualizaSenha($conexao,$usuario,$senha)
    {
        $sql = "UPDATE usuario SET senha = MD5('$senha') WHERE cod_usuario = $usuario";
        $result = mysqli_query($conexao,$sql);
        return $result;
    }
    //conjuntos de if's para não deixar que a tabela atualiza com dados em branco
    if (empty($nome))
    {
        //echo "nome vazio";
        header("location:alterar_dados.php");
    }else
    {
        atualizaDados($conexao,$usuario,'nome',$nome);
        header("location:alterar_dados.php");    }
    if (empty($tel_celular))
    {
        //echo "Celular vazio";
        header("location:alterar_dados.php");
    }else
    {
        atualizaDados($conexao,$usuario,'telefone',$tel_celular);
        header("location:alterar_dados.php");    }
    if (empty($senha))
    {
        //echo "Senha vazio";
        header("location:alterar_dados.php");
    }else
    {
        atualizaSenha($conexao,$usuario,$senha);
        header("location:alterar_dados.php");
    }


?>