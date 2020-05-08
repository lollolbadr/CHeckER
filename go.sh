#!/bin/bash

echo -e "\e[1;32m

 _    _    __    _  _  ____    ____  _____    ____  __      __   _  _ 
( \/\/ )  /__\  ( \( )(_  _)  (_  _)(  _  )  (  _ \(  )    /__\ ( \/ )
 )    (  /(__)\  )  (   )(      )(   )(_)(    )___/ )(__  /(__)\ \  / 
(__/\__)(__)(__)(_)\_) (__)    (__) (_____)  (__)  (____)(__)(__)(__) 

\e[0m"
echo -e "\e[1;35m
    ################################################################
	* checker ip port
	* Coded By BADR
	* https://www.facebook.com/groups/HTLovers/
	* https://www.facebook.com/Waled.Abo.Badr
	* Don't Share! Enjoy ;)
    ################################################################\r\n;


\e[0m"

mkdir .tmp 2>/dev/null
rm -rf ./.tmp/*

split -l 500 ips.txt ./.tmp/

for file in `ls ./.tmp/`; do
gr=`cat ./.tmp/${file} > ips`
mkdir ips 2>/dev/null
sleep 2
for ip in `cat ips`;do
php scan.php $ip &
done
done
