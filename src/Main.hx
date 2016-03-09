/**
* ================================================================================
*
* Handy API ver 1.00.00
*
* Author : KENTA SAKATA
* Since  : 2016/03/09
* Update : 2016/03/09
*
* Licensed under the MIT License
* Copyright (c) Kenta Sakata
* http://saken.jp/
*
* ================================================================================
*
**/
package;

import php.Web;
import php.Lib;

class Main {
	
	public static function main():Void {
		
		var params:Map<String,String> = Web.getParams();
		
		var key   :String = params['key'];
		var result:String = '';
		
		switch (key) {
			
			case 'ip' : result = Web.getClientIP();
			
		}
		
		Lib.print(result);
		
	}

}