Implementation of a simple address book library in PHP.
# AddressBook
This is a working sample of an Address Book Library using a custom MVC framework

# Description
(to be added)

# Steps to install
In order to test it on your local server, please download this repository and put it in your www directory on localhost and follow the steps below (assuming that you are using Ampps or XAMPP or similar application on your localhost) :

1) Create a database on your localhost and put the database credentials in libs/config.php file:
    - define("DB_HOST","localhost");
    - define("DB_USER","root");
    - define("DB_PASS","mysql");
    - define("DB_NAME","addressbook");
    
2) Put correct URLs in the same file by changing these two lines:
    - define("ROOT_PATH","/addressbook/");
    - define("ROOT_URL","http://localhost/addressbook/");
    
3) Export the database file in your MySQL Database (sql dump located at: assets/addressbook.php)

4) Go to your ROOT_URL to test the application

# Design-only questions:
Find person by email address (can supply any substring, ie. "comp" should work assuming "alexander@company.com" is an email address in the address book)
- It can be implemented quickly using a REGEXP operator (Regular Expression) in MySQL query to match the substring(s) of 'email' field value
