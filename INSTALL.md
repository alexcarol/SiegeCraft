1.Install composer (curl -s https://getcomposer.org/installer | php)
2.php composer.phar install
3.Setup the database:
    Make sure your database config is the same as in config.yml
     (it's the default configuration in most environments,
      so it should be ok)
    php app/console doctrine:database:create
    php app/console doctrine:schema:create
5.Enjoy :)