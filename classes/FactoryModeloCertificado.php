<?php
header('Content-Type: text/html; charset=UTF-8');
require_once('../vendor/autoload.php');

class FactoryModeloCertificado
{
    private $fileExt;
    private $fileName;
    private $tipo;
    private $modelo;
    private $file;
    //linhas da importação
    private $dados = array();
    private $textos = array();
    private $realFile;
    private $headers;

    /**
     * FactoryModeloCertificado constructor.
     * @param $modelo id do modelo de certificado
     * @param $tipo o tipo de geração dos dados[unico, lote]
     * @param $file nome do arquivo que contem os dados
     */
    public function __construct($modelo, $tipo, $file)
    {
        $this->modelo = $modelo;
        $this->tipo   = $tipo;
        $this->setFile($file);
    }

    private function setFile($file) {
        $this->file = $file;
        $this->fileName = $file['name'];
        $this->realFile = date("Batata-Y.m.d-H.i.s").$this->fileExt;

        if($this->checkExt()){
            move_uploaded_file($_FILES['importacao']['tmp_name'], '../'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.$this->realFile);

            chmod('../'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.$this->realFile, 777);

            $file = file('../'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.$this->realFile);
            foreach ($file as $line => $content){
               $this->dados[] = explode(",",$content);
            }
            $this->indexData($this->dados);
        }
    }

    private function indexData($dados){
        //pegar cabeçalho
            $this->headers = $dados[0];
            unset($dados[0]);
            $nDados = array();
            foreach ($dados as $d){
                $data = array();
                foreach ($d as $i1 => $dd){
                    foreach ($this->headers as $i2 => $h){
                        if ($i1 == $i2){
                            $data[$h] = $dd;
                        }
                    }
                }
                $nDados[] = $data;
            }
            $this->dados = $nDados;
    }

    private function checkExt(){
        $this->fileExt = strtolower(mb_substr($this->fileName,-4)); //Pegando extensão do arquivo
        if($this->fileExt == '.csv'){
            return true;
        }
        return false;
    }

    public function setTextos($modeloCertificado) {

        $textoModelo = $modeloCertificado['texto'];
        foreach ($this->dados as $dado){
            $txt = $textoModelo;
            foreach ($this->headers as $h){
                $txt = str_replace('%'.trim($h),trim($dado[$h]), $txt);
            }
            $this->textos[] = $txt;
        }
    }

    public function getTextos() {
        return $this->textos;
    }

    public function getDados() {
        return $this->dados;
    }

    public function getHeaders() {
        return $this->headers;
    }



}