<?php
    header('Content-Type: text/html; charset=UTF-8');
    require_once "../vendor/autoload.php";
    require_once "printIndividual.php";
    require_once "printColetivo.php";
    $sucesso = 1;
    $retorno  = array();
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];

    $fmc = new FactoryModeloCertificado($modelo, $tipo, $_FILES['importacao']);
    $modeloCertificado = AdoModeloCertificado::getModeloCertificado($modelo);

    //gerar textos
    $fmc->setTextos($modeloCertificado);

    if ($_POST['tipo'] == 'lote'){
        gerarCertificadosColetivos($fmc->getTextos(), $modeloCertificado['fundo']);
    }else if($_POST['tipo'] == 'individual'){
        gerarCertificadosIndividuais($fmc->getTextos(), $modeloCertificado['fundo'], $fmc->getHeaders(), $fmc->getDados());
    }

    $data = array("sucesso"=>$sucesso);
    $data = json_encode($data);
    echo $data;
?>

