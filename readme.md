# Torque
Redis administration for humans.


# Installation Guide

## Prerequisites 

Before running Torque, please make sure you have the following enabled/installed on your machine:

* Redis
* Apache 2.x
* Composer
* Git cli
* PHP v 5.6 or above with the following extensions:
	* mbstring
	* php-xml




### Step 1. Download Torque
This will download the latest version of Torque under the directory */var/www/html/torque.app*
```
> cd /var/www/html
> git clone https://github.com/soubhikchatterjee/torque.git torque.app
```


### Step 2. Run composer update
This will download the required packages for Torque.
 ```
 > cd torque.app
 > composer update
 ```



### Step 3. Create .env file
```
> cp .env.example .env
```


### Step 4. Clear Laravel cache and the compiled classes
```
> php artisan cache:clear
> php artisan clear-compiled
```


### Step 5. Change the storage and cache directories permission

```
> sudo chmod -R 777 storage
> sudo chmod -R 777 bootstrap/cache
```


### Step 6. Generate a new key for Torque
```
> php artisan key:generate
```

### Step 7. Add a virtual host
```
> cd /etc/apache2/sites-available
> sudo cp 000-default.conf torque.conf
```

### Step 8. Edit the torque.conf file 
```
> sudo vi torque.conf
```

and replace the current content with the following:
```
<VirtualHost *:80>
        ServerName torque.app
        ServerAlias www.torque.app
        ServerAdmin admin@torque.app
        DocumentRoot /var/www/html/torque.app/public
        ErrorLog /var/www/html/torque.app/storage/logs/apache_error.log
        CustomLog /var/www/html/torque.app/storage/logs/apache_access.log combined

		<Directory "/var/www/html/torque.app/public">
			Allowoverride All
		</Directory>

</VirtualHost>

```

### Step 9. Enable the new virtual host
```
> sudo a2ensite torque.conf

```

### Step 10. Run configtest
Run the configtest command to check whether there are any errors in the newly added configuration files
```
> sudo apachectl configtest
```



### Step 11. Adding the domain torque.app to the hosts file.

```
> sudo vi /etc/hosts

127.0.0.1       torque.app
```

###  Flush local DNS cache
```
sudo /etc/init.d/dns-clean start
```


### Step 12. Make sure mod_rewrite is enabled
```
> sudo a2enmod rewrite
```


### Step 13. Reload & Restart Apache
```
> sudo service apache2 reload
> service apache2 restart

```


You should be all set now! :+1:

You can access Torque by hitting the link http://torque.app in your web browser.