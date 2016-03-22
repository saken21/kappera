<?php

class Std {
	public function __construct(){}
	static function string($s) {
		return _hx_string_rec($s, "");
	}
	static function random($x) {
		if($x <= 0) {
			return 0;
		} else {
			return mt_rand(0, $x - 1);
		}
	}
	function __toString() { return 'Std'; }
}
