Tallium test PHP
========================
1. Symfony 3.3
2. PHP 7.1
3. Cache apcu
4. DB - mariaDB
5. web server - nginx


  * RUN entrypoint.sh (for docker)
  * http://172.22.0.2/app_dev.php
  * sql dump in the root dir _tallium-test.sql_
  
  or
  
  * create database (tallium-test)
  * composer install
  * bin/console doctrine:migrations:migrate
  * bin/console assets:install web --symlink
  * chmod -R 777 var