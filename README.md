# addressbook
# Author: Rahul Dhangar
This is a working sample of an Address Book Library using a custom MVC framework

In order to test it on your local server, please follow the following steps
(assuming you are using Ampps or XAMPP or similar application on your localhost) :

1) Create a database on your localhost and put the database credentials in libs/config.php file:
    define("DB_HOST","localhost");
    define("DB_USER","root");
    define("DB_PASS","mysql");
    define("DB_NAME","addressbook");
    
2) Put correct URLs in the same file by changing these two lines:
    define("ROOT_PATH","/addressbook/");
    define("ROOT_URL","http://localhost/addressbook/");
    
3) Export the database file in your MySQL Database (sql dump located at: assets/addressbook.php)

4) Go to your ROOT_URL to get the application started.

