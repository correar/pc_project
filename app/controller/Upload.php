<?php
Class Upload {

	function do_upload($files,$posts)
	{
		$post = key($posts);
		$message = array();
		
		foreach ($files as $key => $value) {
			if(($value["error"]==0) and ($value["type"]=="text/xml"))
			{
				$target_dir = $_SERVER["DOCUMENT_ROOT"]."/unimed/assets/files/".$post."/";
				$target_file = $target_dir . basename($value["name"]);
				//$url_file = "http://".$_SERVER["HTTP_HOST"]."/unimed/assets/files/".$post."/". basename($value["name"]);
				if(move_uploaded_file($value["tmp_name"], $target_file))
				{
					$message[0] = "success-return";
					$message[1] = "O arquivo ".basename($value["name"])." foi enviado com sucesso";
					chmod($target_file, 0777);
					exec('chown padrao:padrao '.$target_file);
					$this->splitXml($target_file,$target_dir);
				}
				else
				{
					$message[0] = "error-return";
					$message[1] = "Não foi possível enviar o arquivo para a pasta ".$post;
				}
			}
			else
			{
				$message[0] = "error-return";
				$message[1] = $this->codeToMessage($value["error"]);
			}	
		}
			
			return $message;
	}

	private function codeToMessage($code) 
    { 
        switch ($code) { 
            case UPLOAD_ERR_INI_SIZE: 
                $message = "O arquivo enviado é maior que o valor definido no upload_max_filesize do php.ini"; 
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "O arquivo enviado é maior que o valor definido no MAX_FILE_SIZE do formulário"; 
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "O arquivo foi parcialmente enviado"; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "Não foi enviado nenhum arquivo"; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "Não foi possível encontrar a pasta temporária"; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "Falha ao salvar o arquivo"; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "Extensão do arquivo não está correta"; 
                break; 

            default: 
                $message = "Erro desconhecido"; 
                break; 
        } 
        return $message; 
    } 

    function splitXml($file,$dir)
    {
    	$model_upload = new Model_upload();
    	$xmls = simplexml_load_file($file);
		$data = array();
		$cnt = 1;
		foreach($xmls as $xml){
			$arquivo = $dir."separados/xml".$cnt.".xml";
			$conteudo = fopen($arquivo,"w+");
			fwrite($conteudo,'<?xml version="1.0" encoding="iso-8859-1"?><COBRANCAS><COBRANCA>');
			foreach($xml as $key=>$value){
				//$resp .= $key." ".$value."<br>";
				switch ($key) {
					case 'CONTADOR':
						$contador = $value;
						$data['CONTADOR'] = (int) $value;
						break;
					case 'BAIRRO':
						$data['BAIRRO'] = (string) $value;
						break;
					case 'CEP':
						$data['CEP'] = (string) $value;
						break;
					case 'MUNICIPIO':
						$data['MUNICIPIO'] = (string) $value;
						break;
					case 'UF':
						$data['UF'] = (string) $value;
						break;
					case 'DATA_VENCIMENTO':
						$DATA_VENCIMENTO = explode("/", (string) $value);
						$DATA_VENCIMENTO = $DATA_VENCIMENTO[2]."-".$DATA_VENCIMENTO[1]."-".$DATA_VENCIMENTO[0];
						$data['DATA_VENCIMENTO'] = $DATA_VENCIMENTO;
						break;
					case 'NOME_BANCO':
						$data['NOME_BANCO'] = (string) $value;
						break;
				}
				fwrite($conteudo,utf8_decode('<'.$key.'>'.(string) $value));
				
				foreach($value as $ke=>$va){
					//$resp .= $ke." ".$va."<br>";
					fwrite($conteudo,utf8_decode('<'.$ke.'>'.(string) $va));
					switch ($ke) {
						case 'COD_BENEFICIARIO_PF':
							$data['COD_BENEFICIARIO_PF'] = (string) $va;
							break;
						case 'CPF':
							$data['CPF'] = (string) $va;
							break;
					}
					foreach($va as $k=>$v){
						//$resp .= $k." ".$v."<br>";
						$v = $this->utf8Fix($v);
						fwrite($conteudo,utf8_decode('<'.$k.'>'.(string) $v.'</'.$k.'>'));
					}
					fwrite($conteudo,'</'.$ke.'>');
				}
				
				
				fwrite($conteudo,'</'.$key.'>');
			}
			fwrite($conteudo,'</COBRANCA></COBRANCAS>');
			$cnt++;
			fclose($conteudo);
			rename($arquivo, $dir."separados/".$contador.".xml");
			$table = 'boletos_pf';
			$model_upload->post($data,$table);
		}
		
		
    }

    function utf8Fix($msg){
	$accents = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç");
	$utf8 = array("Ã¡","Ã ","Ã¢","Ã£","Ã¤","Ã©","Ã¨","Ãª","Ã«","Ã­","Ã¬","Ã®","Ã¯","Ã³","Ã²","Ã´","Ãµ","Ã¶","Ãº","Ã¹","Ã»","Ã¼","Ã§","Ã","Ã€","Ã‚","Ãƒ","Ã„","Ã‰","Ãˆ","ÃŠ","Ã‹","Ã","ÃŒ","ÃŽ","Ã","Ã“","Ã’","Ã”","Ã•","Ã–","Ãš","Ã™","Ã›","Ãœ","Ã‡");
	$fix = str_replace($utf8, $accents, $msg);
	return $fix;
    }

}

?>
