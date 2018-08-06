<?php
    header("Access-Control-Allow-Origin: *");

    //$con = new PDO("mysql:host=localhost;port=3306;dbname=passaporte","root", "admin");
    $con = new PDO("mysql:host=localhost;port=3306;dbname=id3123018_passaporte",
        "id3123018_tadeuclasse", "@TadeuClasse28");

    $sql = "SELECT * FROM pontuacao s where s.id_jogo = :id_jogo order by s.ponto desc limit 10;";

    $rs = $con->prepare($sql);
	$rs->bindValue(":id_jogo", $_GET['id_jogo']);
    $rs->execute();

    $ds = $rs->fetchAll(PDO::FETCH_ASSOC);

    foreach($ds as $key => $value ){
        echo $value['nome'] . "|" . $value['ponto'] . "|";
    }