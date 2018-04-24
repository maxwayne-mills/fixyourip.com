#!/bin/bash

sudo apt-get install -y dnstracer
sudo apt-get install -y zonecheck
sudo apt-get install -y whois
sudo apt-get install -y jwhois
sudo apt-get install -y nmap
sudo apt-get install -y traceroute
sudo curl -0 http://www.salesianer.de/util/rblcheck > rblcheck.pl && sudo mv rblcheck.pl /usr/bin/ && sudo chmod +x /usr/bin/rblcheck.pl
