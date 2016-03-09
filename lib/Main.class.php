<?php

class Main {
	public function __construct(){}
	static function main() {
		$params = php_Web::getParams();
		$key = $params->get("key");
		$result = "";
		switch($key) {
		case "ip":{
			$result = $_SERVER['REMOTE_ADDR'];
		}break;
		}
		php_Lib::hprint($result);
	}
	function __toString() { return 'Main'; }
}
