<?php

	$folder = 'http://saken.jp/kappera/';
	
	$post = $_POST['data'];
	$post = preg_replace('/data:[^,]+,/i','',$post);
	$post = base64_decode($post);

	$image = imagecreatefromstring($post);
	
	imagejpeg($image,'img.jpg');
	
	$url  = 'http://detectface.com/api/detect?m=0&f=2&url='.$folder.'files/php/img.jpg';
	$curl = curl_init();
	
	//$data = ['m'=>'1','f'=>'2','url'=>'http://iwiz-talent.c.yimg.jp/d/iwiz-talent/talent/201607/14/w00-0621-160711.jpg'];
	
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_HEADER,false);
	//curl_setopt($curl,CURLOPT_POST,true);
	//curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($_POST));
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_TIMEOUT,5);
	
	$contents = curl_exec($curl);
	
	curl_close($curl);

	$xml      = simplexml_load_string($contents);
	$features = $xml->face->features;
	$result   = [];
	
	for ($i = 1; $i < 9; $i++) {
		array_push($result,$features->xpath('point[@id="M'.$i.'"]')[0]);
	}
	
	echo(json_encode($result));

?>