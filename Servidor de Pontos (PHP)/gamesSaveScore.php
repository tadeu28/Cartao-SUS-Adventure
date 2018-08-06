<?php
/**
 * Created by PhpStorm.
 * User: tadeu
 * Date: 24/07/2018
 * Time: 14:50
 */

    header("Access-Control-Allow-Origin: *");

    //$con = new PDO("mysql:host=localhost;port=3306;dbname=passaporte",
//        "root", "admin");
    $con = new PDO("mysql:host=localhost;port=3306;dbname=id3123018_passaporte",
    "id3123018_tadeuclasse", "@TadeuClasse28");

    if(isset($_GET['nome']) && isset($_GET['ponto']) && isset($_GET['id_jogo'])){

        $sql = "INSERT INTO pontuacao
				(nome,
				ponto,
				id_jogo)
				VALUES
				(:nome,
				:ponto,
				:id_jogo);";

        $rs = $con->prepare($sql);
        $rs->bindValue(":nome", $_GET['nome']);
        $rs->bindValue(":ponto", $_GET['ponto']);
		$rs->bindValue(":id_jogo", $_GET['id_jogo']);

		echo $sql;
		
        $result = $rs->execute();

        var_dump($result);

        if($result){
            echo 'Sua pontuação foi salva com sucesso!';

        }else{

            echo 'Houve um erro ao enviar sua pontuação. Tente novamente mais tarde.';
        }

    }else{
        echo  ('Nome e pontuação não foram enviadas.');
    }
