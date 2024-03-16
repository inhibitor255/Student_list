Project Dependencies

mysql - Ver 15.1 Distrib 10.4.28-MariaDB
PHP - 8.2.4
Composer - version 2.5.8

1. Place project file to this directory xampp > htdocs> here!
2. Import project.sql to mysql Database
3. To connect Database, adjust your data to this directory - project > \_classes > Libs > Database > MySQL.php > in the \_\_construct method
4. browser this link "http://localhost/project"

Features

1. authentication register, login, logout , when login use all of the email in database with password - "password"
2. authorization - 3 roles -> Students, Admins, Manager
3. a list of all students -> After login click manage students button
4. Display them according to relevant categories (such as by Subject or by Classroom) -> you can see two filter types (class or subject)
5. Detailed information for each student -> You can click Details button of the action in students list.
