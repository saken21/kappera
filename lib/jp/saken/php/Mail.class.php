<?php

class jp_saken_php_Mail {
	public function __construct(){}
	static $_name;
	static $_from;
	static $_to;
	static $_subject;
	static $_body;
	static $_ccList;
	static $_bccList;
	static $_header;
	static $_param;
	static $_files;
	static $_boundary;
	static $ENCODING = "UTF-8";
	static function init() {
		jp_saken_php_Mail::$_name = "";
		jp_saken_php_Mail::$_from = "";
		jp_saken_php_Mail::$_to = "";
		jp_saken_php_Mail::$_subject = "";
		jp_saken_php_Mail::$_body = "";
		jp_saken_php_Mail::$_ccList = (new _hx_array(array()));
		jp_saken_php_Mail::$_bccList = (new _hx_array(array()));
		jp_saken_php_Mail::$_header = "";
		jp_saken_php_Mail::$_param = "";
		jp_saken_php_Mail::$_files = (new _hx_array(array()));
		jp_saken_php_Mail::$_boundary = haxe_crypto_Md5::encode(Std::string(Std::random(1073741823)));
	}
	static function send($to, $subject, $message) {
		if($to === null || $subject === null) {
			return false;
		}
		return php_Lib::mail($to, $subject, $message, null, null);
	}
	function __toString() { return 'jp.saken.php.Mail'; }
}
