#!/bin/sh
set -e
echo "Inicializando el servicio de Apache"
service httpd stop
service httpd start

#echo "Inicializando el servicio de SSH"
#service sshd restart

#echo "Inicializando el servicio de MySQL"
#service mysqld restart

