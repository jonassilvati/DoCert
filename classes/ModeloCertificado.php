<?php 
	require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

	class ModeloCertificado{
	    private $id;
		private $nome;
		private $fundo;
		private $campos;
		private $texto;
		const UPLOAD_PATH = "uploads".DIRECTORY_SEPARATOR;

		function __construct(){

		}

        /**
         * @return mixed
         */
        public function getId() {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id) {
            $this->id = $id;
        }

		function setNome($nome) {
			$this->nome = $nome;
		}	

		function getNome() {
			return $this->nome;
		}

		function setFundo($fundo) {
            $this->fundo = null;
            if($fundo != null) {
                $ext = strtolower(substr($fundo['name'], -4)); //Pegando extensão do arquivo
                $name_fundo = date("Y.m.d-H.i.s").$ext;
                $uploadFileFundo = self::UPLOAD_PATH . $name_fundo;

                //tratar tamanho da imagem
                if ($fundo['size'] <= (1204 * 1024 * 20)) {
                    move_uploaded_file($_FILES['fundo']['tmp_name'], $uploadFileFundo);
                }

                $this->fundo = $name_fundo;
            }
		}



		function getFundo() {
			return $this->fundo;
		}

		function setTexto($texto) {
			$this->texto = $texto;
		}

		function getTexto() {
			return $this->texto;
		}

		function getCampos() {
			return $this->campos; 
		}

		function setCampos($campos) {
			$this->campos = $campos;
		}


	}

