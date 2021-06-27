# Setup
Start php my admin.<br>
Create a database project.<br>
Run the schema.<br>
Start mysql server.<br>
Install all dependancies by typing  ```composer install``` in the git repository.<br>
Copy the file `vhost\mvc.slabs.local.conf` to sites-available in your apache or httpd directory and do the appropiate changes to the document root and directory.<br>
Enable it using a2ensite command.<br>
For mac include it in your httpd config file.<br>
Add `127.0.0.1      mvc.sdslabs.local` to your hosts file at `/etc/`.<br>
you can access the file at `http://mvc.sdslabs.local/`.

# Testing
Write the necesarry details on  `config_sample.php` <br>
Run `composer dump-autoload`<br>
Go to the public library and run  `php -S localhost:3000`
