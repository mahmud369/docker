### Place all CakePHP files & folders

Inside the '**/docker/basic_docker_cakephp_mysql/cake_app**' folder, keep all your CakePHP files (i.e. All those files & folders located inside the root of a CakePHP project)

### Create & run the web & databse containers

Now navigate to '**/docker/basic_docker_cakephp_mysql**' and run the below command:
```bash
sudo docker-compose up -d
```
_- OR -_
```bash
sudo docker-compose up --build -d
```

### Finally set the MySQL user credentials

In the file, '**/docker/basic_docker_cakephp_mysql/cake_app/config/app_local.php**' set the MySQL database credentials similarly like below:

```php
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'host' => 'db',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',

            'username' => 'devuser',
            'password' => 'devpass',

            'database' => 'db_cake_app',
            /*
             * If not using the default 'public' schema with the PostgreSQL driver
             * set it here.
             */
            //'schema' => 'myapp',
```
