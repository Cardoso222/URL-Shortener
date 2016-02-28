# URL-Shortener
Simple URL Shortener

#Requirements
- PHP 5.x
- MySQL

#Configuration

- First execute the script in DB/create.sql on your database, this gonna create the new database who name is 'shortener'.
- Second execute the script in DB/schema.sql on your database, this gonna create one new table who name is 'urls'.

#How to Use

- This application have one simple workflow, you just can use the WebView 'http://localhost/URL-Shortener/views/' who make through ajax one requisition to encode or decode the url.

OR

- You can just use in your application making some requests to 'URLencoder.php' or 'URLdecoder.php' passing the url through POST or GET and he's brings to you the json result. 

***
- The number of decode requests, of all shortened urls, are inside of database column `requests`. 
