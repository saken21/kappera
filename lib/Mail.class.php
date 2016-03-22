<?php

class Mail {
	public function __construct(){}
	static function send($to, $subject, $message) {
		jp_saken_php_Mail::init();
		$result = jp_saken_php_Mail::send($to, $subject, $message);
		return Std::string($result);
	}
	function __toString() { return 'Mail'; }
}
