<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 13/10/2018
 * Time: 14:00
 */
require_once(__DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
require_once "vendor/autoload.php"; // Quando estiver online deve se usado esse require

$id = $_POST['id'];

$modeloCertificado = AdoModeloCertificado::getModeloCertificado($id);
$path_fundo = "uploads".DIRECTORY_SEPARATOR.$modeloCertificado['fundo'];

echo "<div class='col-md-12'>
<div class=\"row form-alt-modelo\" >
    <div class=\"col-md-2\"></div>
    <div class=\"col-md-8\">
        <!--falta implementar a opcao de fonte. talvez sera apenas uma fonte-->
        <form enctype=\"multipart/form-data\" action=\"javascript: void(0)\" id=\"form-alt-modelo\" method=\"POST\">            
            <div class=\"form-group\">
                <label for=\"nome\">Nome</label>
                <input id=\"nome\" type=\"text\" name=\"nome\" class=\"form-control\" value='{$modeloCertificado['nome']}' />
            </div>
            <div class=\"form-group\">
                <label for=\"campos\">Campos</label>
                <textarea name=\"campos\" id=\"campos\" cols=\"30\" rows=\"4\" class=\"form-control\">{$modeloCertificado['campos']}</textarea>
                <small class=\"form-text text-muted\">Campos de informação que seram usados no texto</small>
            </div>
            <div class=\"form-group\">
                <label for=\"fundo\">Imagem de fundo</label>
                <img src='{$path_fundo}' whidth='200px' height='200px' alt='fundo do certificado'>
                <input id=\"fundo\" type=\"file\" name=\"fundo\" class=\"form-control-file\" />
            </div>
            <div class=\"form-group\">
                <label for=\"texto\">Texto</label>
                <textarea name=\"texto\" id=\"texto\" cols=\"50\" rows=\"10\" class=\"form-control\">{$modeloCertificado['texto']}</textarea>
                <small class=\"form-text text-muted\">Texto modelo com campos antecedidos de \"%\"</small>
            </div>
            <div class=\"form-group\">
                <input class=\"btn btn-primary\" type=\"submit\" value=\"Salvar\">
                <input type='reset' class='btn btn-default' id='cancel-alt-modelo' value='Cancelar'>
            </div>
            <input type='text' id='id' name='id' hidden='hidden' value='{$id}'>
        </form>
    </div>
    <div class=\"col-md-2\"></div>
</div></div>";
