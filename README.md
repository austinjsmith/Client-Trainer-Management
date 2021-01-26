"# FitnessDatabaseProject" 
This project is a MySQL database management system created for employees for my friend's fitness company. 
This project utilizes MySQL for the management of the database and PHP, HTML, and CSS for the web-based interface

NOTE! Used XAMPP for the development of the interface

HOW-TO set up:
1) Install XAMPP and MySQL workbench
2) Place the following files into .../xampp/htdocs
    image1.png, logo.png
    main.html
    FindClient.php, FindActiveClient.php, FindTrainers.php
    AddClient.php, AddTrainer.php
    DeleteActiveClient.php, DeleteClient.php, DeleteTrainer.php

3) run "Database setup queries.sql" in mysql workbench
4) You should be all set up! Run XAMPP and start the Apache and MySQL services in the    control panel.
5) open your web browser and navigate to localhost:8080/main.html

TODO:
1) Integrate update queries
2) Integrate a login feature
3) Integrate a search to determine which trainer trains which client
4) Integrate sort features
5) Integrate a "Health determinate" which generates a health status for a client based off of parameters given by the client to the administrator