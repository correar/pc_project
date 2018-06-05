<?php

	ini_set('memory_limit', '-1');
	set_time_limit(0);
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	//ignore_user_abort(1);	

	$file = "http://192.168.1.6/unimed/assets/files/pf/teste.xml";
	/*$handle = fopen($file,"r");
	$conteudo = fread($handle, filesize($file));
	fclose($handle);
	print_r($conteudo);*/
	//if (file_exists($file)) {
	echo "AQUI ".$file;
	$xmls = simplexml_load_file($file);
	print_r($xmls);
	echo "TESTE";
	$cnt = 1;
	foreach($xmls as $xml){
		$arquivo = "xml".$cnt.".xml";
		$conteudo = fopen($arquivo,"a");
		fwrite($conteudo,'<?xml version="1.0" encoding="iso-8859-1"?><COBRANCAS><COBRANCA>');
		foreach($xml as $key=>$value){
			//echo $key." ".$value."<br>";
			fwrite($conteudo,'<'.$key.'>'.$value);
			//if(is_array($value)){
					foreach($value as $ke=>$va){
						//echo $ke." ".$va."<br>";
						fwrite($conteudo,'<'.$ke.'>'.$va);
						foreach($va as $k=>$v){
							//echo $k." ".$v."<br>";
							fwrite($conteudo,'<'.$k.'>'.$v.'</'.$k.'>');
						}
						fwrite($conteudo,'</'.$ke.'>');
					}
			//}
			
			fwrite($conteudo,'</'.$key.'>');
		}
		fwrite($conteudo,'</COBRANCA></COBRANCAS>');
		$cnt++;
		fclose($conteudo);
	}
?>