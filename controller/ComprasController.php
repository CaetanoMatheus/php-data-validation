<?php

require_once 'models/Cliente.php';
require_once 'models/Viagem.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $cpfCnpj = $_POST['cpfCnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $dataIda = $_POST['dataIda'];
    $dataRetorno = $_POST['dataRetorno'];
    $classe = $_POST['classe'];
    $adultos = $_POST['adultos'];
    $criancas = $_POST['criancas'];
    $preco = '1.500,00';

    try {
        $cliente = new Cliente(
            $nome,
            $cpfCnpj,
            $telefone,
            $email,
            $cep,
            $rua,
            $bairro,
            $numero,
            $cidade,
            $uf
        );

        $viagem = new Viagem(
            $origem,
            $destino,
            $dataIda,
            $dataRetorno,
            $classe,
            $adultos,
            $criancas,
            $preco
        );
    } catch (Exception $exception) {
        echo "<script>alert({$exception->getMessage()})</script>";
        echo "<script>history.back()</script>";
    }
}
