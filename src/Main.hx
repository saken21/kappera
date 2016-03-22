/**
* ================================================================================
*
* Handy API ver 1.00.01
*
* Author : KENTA SAKATA
* Since  : 2016/03/09
* Update : 2016/03/22
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
import jp.saken.php.Mail;

class Main {
	
	public static function main():Void {
		
		var params:Map<String,String> = Web.getParams();
		
		var key:String = params['key'];
		
		var result:String = switch (key) {
			
			case 'ip'   : Web.getClientIP();
			case 'mail' : sendMail(params['to'],params['subject'],params['message']);
			default     : '';
			
		}
		
		Lib.print(result);
		
	}
	
	private static function sendMail(to:String,subject:String,message:String):String {
		
		var result:Bool = Mail.send(to,subject,message);
		return Std.string(result);
		
	}

}