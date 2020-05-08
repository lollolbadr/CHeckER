<?php

/*
checker ip port
*/
error_reporting(0);

$IPS = $argv[1];
$PORT = $argv[2];

function http($url){
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_COOKIEFILE, '/'); 
curl_setopt($curl, CURLOPT_COOKIEJAR, '/'); 
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_TIMEOUT,5);
curl_setopt($curl, CURLOPT_HEADER, true); 
$exec=curl_exec($curl);
curl_close($curl);
return $exec;
}

function https($url){
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_COOKIEFILE, '/'); 
curl_setopt($curl, CURLOPT_COOKIEJAR, '/'); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_TIMEOUT,4);
curl_setopt($curl, CURLOPT_HEADER, true); 
$exec=curl_exec($curl);
curl_close($curl);
return $exec;
}


preg_match_all("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/" , $IPS , $a);

$ip = $a[0][0];

$CHKhttp = http("http://$ip:$PORT/");
$CHKhttps = https("https://$ip:$PORT/");

preg_match_all("|<[s]*title[s]*>([^<]+)<[s]*/[s]*title[s]*>|Ui" , $CHKhttp , $TestHTTP);
preg_match_all("|<[s]*title[s]*>([^<]+)<[s]*/[s]*title[s]*>|Ui/" , $CHKhttps , $TestHTTPS);
if(strlen($CHKhttp) > 0){
        #echo "     + Found http://$ip/ -> ".  str_replace( "<title>" , "" , str_replace("</title>" , "" ,$TestHTTP[0][0]))."\n";
        $SS = str_replace( "<title>" , "" , str_replace("</title>" , "" ,$TestHTTP[0][0]));
        $SS = str_replace( "<TITLE>" , "" , str_replace("</TITLE>" , "" ,$SS));
        $fp = fopen('Badr-Found.txt', 'a+');
        fwrite($fp, "http://".$ip.":$PORT/     \t $SS \n");
        fclose($fp);
		
		$fp = fopen('Filtered.txt', 'a+');
        fwrite($fp, "http://".$ip.":$PORT/\n");
        fclose($fp);
        
}
if(strlen($CHKhttps) > 0){
        #echo "     + Found https://$ip/ ->  ". str_replace( "<title>" , "" , str_replace("</title>" , "" ,$TestHTTPS[0][0]))."\n";
        $PSS = str_replace( "<title>" , "" , str_replace("</title>" , "" ,$TestHTTPS[0][0]))."\n";
        $PSS = str_replace( "<TITLE>" , "" , str_replace("</TITLE>" , "" ,$PSS))."\n";
        $fp = fopen('Badr-Found.txt', 'a+');
        fwrite($fp, "https://".$ip.":$PORT/     \t $PSS");
        fclose($fp);  

		$fp = fopen('Filtered.txt', 'a+');
        fwrite($fp, "https://".$ip.":$PORT/\n");
        fclose($fp);		

    }
?>
