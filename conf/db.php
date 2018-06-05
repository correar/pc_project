<?php
	class Db extends PDO {

		private $connection;

		public function __construct($file = "conf/conf.ini"){
			if(!$settings = parse_ini_file($file, TRUE)) throw new Exception("Não foi possível abrir as configurações");
			$dns = $settings['db']['driver'] .
			':host=' . $settings['db']['host'] .
			((!empty($settings['db']['port'])) ? (';port=' . $settings['db']['port']) : '') .
			';dbname=' . $settings['db']['schema'];

			parent::__construct($dns, $settings['db']['username'], $settings['db']['password']);
			
		}
		

		
	}
	


	
?>