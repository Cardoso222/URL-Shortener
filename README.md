# URL-Shortener
Simple URL Shortener

#Requirements
- PHP 5.x.
- MySQL.
- Apache Server or similar.

#Configuration
Don't have any requirements ?
- sudo apt-get install php5 mysql-server php5-mysql.   This must solve =D
- Execute the script in DB/create.sql on your database, this gonna create the new database who name is 'shortener'.
- Make the same with DB/schema.sql on your database, this gonna create one new table who name is 'urls'.

OR you can just use docker =)
## Docker Container

If you dont have Docker just: 
  - sudo apt-get install docker

Now you can download the container with all configuration running the command:
  - sudo docker pull cardoso222/urlshortener

If you have apache and mysql running locally, is important you stop these local services. So:

  - sudo service apache2 stop
  - sudo service mysql stop

And now

You can get the IMAGE_ID running:
  - sudo docker images 

To start the Container:
  - sudo docker run -t -i -p 80:80 -p 3306:3306 IMAGE_ID /bin/bash

Inside the container, start the script who make the apache and mysql start:

  - ./autostart.sh

and finally in your browser:

  - http://localhost/URL-Shortener/

#How to Use

- This application have one simple workflow, you just can use the WebView 'http://localhost/URL-Shortener/views/' who make through ajax one requisition to encode or decode the url.

OR

- You can just use in your application making some requests to 'URLencoder.php' or 'URLdecoder.php' passing the url through POST or GET and he's brings to you the json result. 

***
- The number of decode requests, of all shortened urls, are inside of database column `requests`. 
