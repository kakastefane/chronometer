<?php
    date_default_timezone_set('America/Sao_Paulo');

    $con = mysqli_connect("localhost","kaka_cronometro","xPHRObifOH","kaka_cronometro");

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $nome = $_POST['jobName'];
    $inicial = $_POST['inicial'];
    $final = $_POST['final'];

    $insert = mysqli_query($con, "INSERT INTO `tarefas` (`nome`,`inicial`,`final`) VALUES ('$nome','".date('Y-m-d H:i:s',$inicial)."','".date('Y-m-d H:i:s',$final)."')");

    if($insert){
        echo 'alert("O Cronometro parou!");';
    }else {
        echo 'alert("Erro: '.mysqli_error($con).'");';
    }

?>