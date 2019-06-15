<?php
/**
 * Created by PhpStorm.
 * User: progr
 * Date: 11/11/2018
 * Time: 20:04
 */
header("Content-type: text/html; charset=utf-8");

use Dompdf\Dompdf;
const NAME_ZIP = "certificados.zip";
const TMP_DIRECTORY = "tmp".DIRECTORY_SEPARATOR;
function gerarCertificadosIndividuais($textos, $fundo, $headers, $dados){
    $campoNome = false;
    $arquivos = array();

    foreach ($headers as $header){
        if (strtolower($header) == "nome"){
            $campoNome = true;
            break;
        }
    }

    $path_fundo = "..".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$fundo;

    foreach ($textos as $id => $texto) {
        $html = "<!DOCTYPE html>
        <html>
        <head>
            <title>teste</title>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
            <style type='text/css'>
            @page { margin: 0in; }
            body{
                background-image: url('{$path_fundo}');
                background-position: top left;
                background-repeat: no-repeat;
                background-size: cover;
                padding-top: 40%;
                padding-left: 20%;    
                padding-left: 20%;     
            }
            div.texto{
                width: 800px;
                font-size: 18pt;
            }
            </style>
        </head>";
        $html .= "
        <body>";
        $html .="<div class='texto'>";
        $html .= $texto;
        $html .="</div>";
        $html .="</body>";
        $html .="</html>";
        //salvar pdf
        $dompdf  = new Dompdf();
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper("A4","landscape");
        $dompdf->render();
        $output = $dompdf->output();
        if($campoNome){
            $name_file_tmp = $dados[$id]['nome'].".pdf";
            file_put_contents(TMP_DIRECTORY.$name_file_tmp, $output);
            $arquivos[] = $name_file_tmp;
        }else{
            $name_file_tmp = "certificado-".$id.'.pdf';
            file_put_contents(TMP_DIRECTORY.$name_file_tmp, $output);
            $arquivos[] = $name_file_tmp;
        }
    }
    if (file_exists(NAME_ZIP)) {
        unlink(NAME_ZIP);
    }
    //gerar zip para downlaod
    $zip = new ZipArchive();
    if ($zip->open(NAME_ZIP, ZipArchive::CREATE) == true){
       foreach ($arquivos as $arquivo){
           $zip->addFile(TMP_DIRECTORY.$arquivo, $arquivo);
       }
    }else{
        echo "erro ao criar zip";
    }
    $zip->close();

    //apagar arquivos
    foreach ($arquivos as $arquivo){
        if (file_exists(TMP_DIRECTORY.$arquivo)){
            unlink(TMP_DIRECTORY.$arquivo);
        }
    }
}