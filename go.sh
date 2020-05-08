#!/bin/bash

echo -e "\e[1;32m

 _    _    __    _  _  ____    ____  _____    ____  __      __   _  _ 
( \/\/ )  /__\  ( \( )(_  _)  (_  _)(  _  )  (  _ \(  )    /__\ ( \/ )
 )    (  /(__)\  )  (   )(      )(   )(_)(    )___/ )(__  /(__)\ \  / 
(__/\__)(__)(__)(_)\_) (__)    (__) (_____)  (__)  (____)(__)(__)(__) 


    ################################################################
	* checker ip port
	* Coded By BADR
	* https://www.facebook.com/groups/HTLovers/
	* https://www.facebook.com/Waled.Abo.Badr
	* Don't Share! Enjoy ;)
    ################################################################\r\n";


\e[0m"

for ip in `cat ips.txt`;do
php scan.php $ip &
done
