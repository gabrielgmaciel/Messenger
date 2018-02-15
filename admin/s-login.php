<?php

	ini_set ('default_charset','UTF-8');

    $_SG['abreSessao'] = true;
    $_SG['validaSempre'] = true;
    //verifica se há uma sessão iniciada
    if ($_SG['abreSessao'] == true)
    { session_start();}

    $logon = isset($_POST['logon']) ? $_POST['logon'] : '';;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';;

	function validaAdmin($logon,$senha)
    {
        $log = "admin";
        $pass = "admin";

        if ($logon == $log && $senha == $pass )
        {
            $_SESSION['admin'] = $log;
            echo "<script>location.href='users.php'</script>";
        }else
        {
            echo "<script> alert('Email/Senha incorreta!') </script>";
            echo "<script>location.href='index.php'</script>";
        }
    }
    //função para proteger paginas que devem ser acessadas somente se tiver um log
    function protegePagina()
    {
        if (!isset($_SESSION['admin']))
        {
            expulsaVisitante();
        }
    }
    //função para expulsar Visitante e redirecionar para a pagina login com erro de não logado
    function expulsaVisitante()
    {
        unset($_SESSION['admin']);
        session_destroy();
        echo "<script> alert('Efetue o login para acessar a página!') </script>";
        echo "<script>location.href='index.php'</script>";
    }
    //função para logoff
    function logoff()
    {
        unset($_SESSION['admin']);
        session_destroy();
        echo "<script>location.href='index.php'</script>";
    }
    if (empty($logon) and empty($senha))
    {
        //echo "<script>location.href='index.php'</script>";
    }else
    {
        validaAdmin($logon,$senha);
    }

    if(isset($_GET['x']) == 1){

        logoff();
    }

?>