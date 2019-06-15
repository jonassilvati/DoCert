<?php
/**
 * Created by PhpStorm.
 * User: progr
 * Date: 11/11/2018
 * Time: 20:05
 */
header('Content-Type: text/html; charset=UTF-8');
require_once "../vendor/autoload.php";

use Dompdf\Dompdf;

function gerarCertificadosColetivos($textos, $fundo){
    $html = "";
    $path_fundo = "..".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$fundo;
    foreach ($textos as $texto) {
        $html .= "<!DOCTYPE html>
        <html>
        <head>
            <title>teste</title>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
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
    }

    $dompdf  = new Dompdf();
    $dompdf->loadHtml($html, "UTF-8");
    $dompdf->setPaper("A4","landscape");
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents("download.pdf", $output);
}