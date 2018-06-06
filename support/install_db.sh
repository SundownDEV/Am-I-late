#!/usr/bin/env bash

checkconn=`pgrep -f mysql`
if [ -z "$checkconn" ]; then
	echo "enabling mysql server :"
	mysql.server start
fi

echo 'What is the database name ?'
read dbname

echo 'What is your database username ? (do not worry, we will not ask about your password)'
read dbuser

echo "MySQL is going to ask you for a password, not us. The purpose is for you not to have your password in your history \n"
echo 'creating database...'

mysql -u"$dbuser" -p -e "CREATE DATABASE \`$dbname\`;"

echo 'importing data for database.'

mysql -u"$dbuser" -p $dbname < database.sql

echo 'Database is now ready ! Enjoy'