#!/usr/bin/env bash
#debconf-set-selections <<< "mysql-server-5.6 mysql-server/root_password password \"''\""
#debconf-set-selections <<< "mysql-server-5.6 mysql-server/root_password_again password \"''\""
export DEBIAN_FRONTEND=noninteractive
apt-get  update
apt-get -y upgrade
apt-get -y install mysql-server-5.6
sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
mysql -uroot -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password' WITH GRANT OPTION;"
mysql -uroot -e "GRANT USAGE ON *.* to ''@'localhost';DROP USER ''@'localhost';"
mysql -uroot -e "DROP database IF EXISTS test;"
mysql -uroot -e "FLUSH PRIVILEGES;"
mysql -uroot -e "CREATE database phptest;"
mysql -uroot -e "GRANT ALL PRIVILEGES ON phptest.* TO 'phptestuser'@'%' IDENTIFIED BY 'password' WITH GRANT OPTION;"