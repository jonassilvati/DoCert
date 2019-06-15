<?php
    //receber dados do formulario de certificados
    //include_once('anti_injection.php');
    // require_once(__DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
    require_once "vendor/autoload.php"; // Quando estiver online deve se usado esse require

    $modeloCertificado = new ModeloCertificado();

    $modeloCertificado->setNome($_POST['nome']);
    $modeloCertificado->setCampos($_POST['campos']);
    $modeloCertificado->setTexto($_POST['texto']);
    
    if(isset($_FILES['fundo'])) {
        $modeloCertificado->setFundo($_FILES['fundo']);
    }

    if(!isset($_POST['id'])) {
        AdoModeloCertificado::salvaModeloCertificado($modeloCertificado);
    }else{
        $modeloCertificado->setId($_POST['id']);
        AdoModeloCertificado::editModeloCertificado($modeloCertificado);
    }

    $resposta['success'] = 'ok';
    echo json_encode($resposta);

