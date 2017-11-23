Symfony CRUD
============

A Symfony project created on November 20, 2017, 11:05 am.


Install on your host
=======

```
sudo apt get update
sudo apt install vagrant VirtualBox
```

Go to your vagrant
=====

```
sudo apt-get install --reinstall `dpkg -l | grep 'ii  php7' | sed -e 's/php7.0/php7.1/g' | awk '{ printf($2" "); next}'`
```

Scotch box
==========

VirtualHost with Apache2 must be setup like this : 

1. VHost 

	```
		sudo rm /etc/apache2/sites-available/scotchbox.local.conf 
		sudo nano /etc/apache2/sites-available/scotchbox.local.conf 
	```

	Copy/paste this

	```
		<VirtualHost *:80>
	        # The ServerName directive sets the request scheme, hostname and port that
	        # the server uses to identify itself. This is used when creating
	        # redirection URLs. In the context of virtual hosts, the ServerName
	        # specifies what hostname must appear in the request's Host: header to
	        # match this virtual host. For the default virtual host (this file) this
	        # value is not decisive as it is used as a last resort host regardless.
	        # However, you must set it for any further virtual host explicitly.
	        #ServerName www.example.com

	        ServerAdmin webmaster@localhost
	        DocumentRoot /var/www/public/web

	        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
	        # error, crit, alert, emerg.
	        # It is also possible to configure the loglevel for particular
	        # modules, e.g.
	        #LogLevel info ssl:warn

	        ErrorLog ${APACHE_LOG_DIR}/error.log
	        CustomLog ${APACHE_LOG_DIR}/access.log combined

	        # For most configuration files from conf-available/, which are
	        # enabled or disabled at a global level, it is possible to
	        # include a line for only one particular virtual host. For example the
	        # following line enables the CGI configuration for this host only
	        # after it has been globally disabled with "a2disconf".
	        #Include conf-available/serve-cgi-bin.conf
		</VirtualHost>
	```

	Restart apache service : 

	```
		sudo a2dissite 000-default.conf
		sudo service apache2 reload
		sudo service apache2 restart


	```

2. Install project


	```
		cd /var/www/your-current-dir-project
		php bin/console d:d:c --if-not-exists
	```

3. Upgrade database schema

	```
		php bin/console d:s:u
	```

4. Add a user

	```
		php bin/console f:u:cre
	```

5. Promote user

	```
		php bin/console f:u:pro
	```

	Role should be : ROLE_ADMIN, ROLE_USER and many more.

# Functionals tests

Start server standalone selenium with IE, safari and Edge :

Java JRE and JDK 8 is required.

```
	java -jar var/selenium-server-standalone-3.7.1.jar
```

Then open another window and go to project and do a 

```
	vendor/bin/behat
```