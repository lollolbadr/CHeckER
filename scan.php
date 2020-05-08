<?php

$IP = $argv[1];


$Ports = array( 
"60443" , "20" , "21" , "80" , "81" , "82" , "83" , "84" , "85" , "86" , "87" , "88" , "89" , "90" , "96" , "100" , "150" , "629" , "808" , "818" , "843" , 
"1010" , 
"1080" , "1111" , "1270" , "1337" , "1897" , "1920" , "1998" , "2020" , "2121" , "2124" , "2222" , "2323" , "2345" , "2699" , "3030" , "3076" , "3128" , "3129" 
, "3131" , "4040" , "4433" , "4443" , "4543" , "4624" , "4949" , "5050" , "5218" , "5491" , "5549" , "5551" , "5612" , "6060" , "6133" , "6193" , "6370" , 
"6501" , "6515" , "6588" , "6666" , "6667" , "6673" , "6675" , "6908" , "7070" , "7080" , "7280" , "7484" , "7500" , "7566" , "7777" , "7780" , "7808" , "7889" 
, "7966" , "7992" , "8000" , "8001" , "8002" , "8003" , "8004" , "8005" , "8006" , "8007" , "8008" , "8009" , "8010" , "8080" , "8081" , "8082" , "8083" , 
"8084" , "8085" , "8086" , "8087" , "8088" , "8089" , "8090" , "8091" , "8092" , "8093" , "8094" , "8095" , "8096" , "8097" , "8098" , "8099" , "8118" , "8123" 
, "8181" , "8443" , "8542" , "8742" , "8817" , "8888" , "8909" , "8939" , "8989" , "9000" , "9090" , "9091" , "9092" , "9093" , "9094" , "9095" , "9096" , 
"9097" , "9098" , "9099" , "9100" , "9227" , "9318" , "9501" , "9587" , "9867" , "9999" , "10000", "10001", "10002", "10080", "10100", "10200", "10300", 
"10400", "10443", "10500", "10600", "10700", "10800", "10845", "10900", "11040", "11044", "11443", "12250", "12443", "12735", "12737", "12944", "13253", 
"13374", "13443", "13579", "13627", "13669", "13789", "14443", "14931", "15079", "15443", "16336", "16341", "16443", "16501", "16885", "17183", "17239", 
"17443", "17510", "17656", "17657", "18080", "18186", "18273", "18443", "18847", "18856", "18888", "19049", "19293", "19443", "20000", "20086", "20121", 
"20443", "20767", "20771", "21187", "21233", "21443", "21614", "21666", "21727", "21770", "22443", "23443", "23684", "23685", "23780", "24224", "24377", 
"24378", "24443", "24651", "24692", "25443", "26215", "26443", "27238", "27443", "28193", "28443", "29258", "29443", "29542", "30105", "30443", "30915", 
"31035", "31280", "31443", "32443", "33234", "33443", "33530", "34015", "34100", "34443", "35443", "35520", "35842", "36081", "36443", "36661", "36865", 
"37126", "37443", "37782", "38443", "38551", "39202", "39443", "40443", "41443", "41663", "42443", "42935", "43443", "44433", "44443", "44636", "44809", 
"45443", "46443", "46859", "47443", "48041", "48443", "49443", "49491", "50443", "50634", "51443", "51797", "52443", "53443", "53663", "54321", "54443", 
"54629", "55443", "56142", "56443", "57443", "58443", "59443", "60443", "61443", "62443", "63081", "63443", "64443", "65443");

foreach($Ports as $port){
    
    $x = @fsockopen($IP , $port , $errno, $errstr , 0.5);
    
    if(!$x){
        $ST = "";
    }else{
        $ST = "IP ".$IP." With open port ".$port."\n";
        $fp = fopen("log.txt" , "a+");
        fwrite($fp , $ST);
        fclose($fp);
        echo $ST;
        fclose($x);
        @system("php check.php $IP $port &");
    }
}

?>