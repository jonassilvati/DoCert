<?php 
	require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

	class AdoModeloCertificado
    {
        private static $conn = null;


        static function connect()
        {
            self::$conn = Connection::connect();
        }

        static function destroyConnect(){
            self::$conn = null;
        }

        static function editModeloCertificado(ModeloCertificado $modeloCertificado){
            self::connect();
            if($modeloCertificado->getFundo() != null){
                //primeiro apagar fundo anterior
                unlink("..".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$modeloCertificado->getFundo());
                $stmt = self::$conn->prepare("update modelo_certificado set nome=:nome, campos=:campos, texto=:texto, fundo=:fundo where id=:id");
                $stmt->execute(array('nome'=>$modeloCertificado->getNome(),'campos'=>$modeloCertificado->getCampos(), 'texto' => $modeloCertificado->getTexto(), 'fundo'=>$modeloCertificado->getFundo(),'id'=>$modeloCertificado->getId()));
            }else{
                $stmt = self::$conn->prepare("update modelo_certificado set nome=:nome, campos=:campos, texto=:texto where id=:id");
                $stmt->execute(array('nome'=>$modeloCertificado->getNome(),'texto' => $modeloCertificado->getTexto(),'campos'=>$modeloCertificado->getCampos(),'id'=>$modeloCertificado->getId()));
            }


            self::destroyConnect();
        }


		static function salvaModeloCertificado(ModeloCertificado $modeloCertificado){
            self::connect();
			if(self::$conn != null){
				$stmt = self::$conn->prepare("INSERT INTO modelo_certificado(nome, campos, texto, fundo) VALUES (:nome, :campos, :texto, :fundo)");
	    		$stmt->execute(array('nome' => $modeloCertificado->getNome(),'campos' => $modeloCertificado->getCampos(),'texto' => $modeloCertificado->getTexto(), 'fundo' => $modeloCertificado->getFundo()));	
			}else{
				print_r("erro ao pegar variavel conn");
			}
			self::destroyConnect();
			
		}

		static function deleteModeloCertificado($id){
            $modelo = AdoModeloCertificado::getModeloCertificado($id);
            $fundo = "..".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$modelo['fundo'];
            if (file_exists($fundo)){
                unlink($fundo);
            }
            self::connect();
			$stmt = self::$conn->prepare("delete from modelo_certificado where id=:id");
			$stmt->execute(array('id'=>$id));
			self::destroyConnect();
		}

		static function getModeloCertificado($id){
            self::connect();
			$stmt = self::$conn->prepare("select * from modelo_certificado where id=:id");
			$stmt->execute(array('id'=>$id));
			$obj = $stmt->fetch();
			self::destroyConnect();
			$mc = array();
			$mc['id'] = $obj['id'];
			$mc['nome'] = $obj['nome'];
			$mc['fundo'] = $obj['fundo'];
			$mc['campos'] = $obj['campos'];
			$mc['texto'] = $obj['texto'];

			return $mc;
		}

		static function getModelosCertificado(){
            self::connect();
			$stmt = self::$conn->query('select * from modelo_certificado');
            self::destroyConnect();
			return $stmt;
		}
	}
