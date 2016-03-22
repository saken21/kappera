<?php

class Main {
	public function __construct(){}
	static function main() {
		$params = php_Web::getParams();
		$key = $params->get("key");
		$result = null;
		switch($key) {
		case "ip":{
			$result = $_SERVER['REMOTE_ADDR'];
		}break;
		case "mail":{
			$result = Main::sendMail($params->get("to"), $params->get("subject"), $params->get("message"));
		}break;
		default:{
			$result = "";
		}break;
		}
		php_Lib::hprint($result);
	}
	static function sendMail($to, $subject, $message) {
		$result = jp_saken_php_Mail::send($to, $subject, $message);
		return Std::string($result);
	}
	function __toString() { return 'Main'; }
}
