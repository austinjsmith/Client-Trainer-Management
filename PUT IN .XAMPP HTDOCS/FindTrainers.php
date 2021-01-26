<html>
<head>
<title>Find Client</title>
</head>
<body>
<style>
    h1{text-align:center;}
    .search {
        width: 200px;
    }
    .search a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
    }
    .search a:hover {
        background-color: #ccc;
    }
    .search a.active {
        background-color: #94afff;
        color: white;
    }

    h2{text-align:center;}
    .add{
        width:200px;
    }
    .add a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
    }
    .add a:hover {
        background-color: #ccc;
    }
    .add a.active {
        background-color: #94afff;
        color: white;
    }

    .navbar {
        overflow: hidden;
        background-color: #333; 
        margin-bottom: 15;
    }

    .navbar a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .subnav {
        float: left;
        overflow: hidden;
    }

    .subnav .subnavbtn {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .navbar a:hover, .subnav:hover .subnavbtn {
        background-color: rgb(255, 84, 84);
    }

    .subnav-content {
        display: none;
        position: absolute;
        left: 0;
        background-color: rgb(255, 84, 84);
        width: 100%;
        z-index: 1;
    }

    .subnav-content a {
        float: left;
        color: white;
        text-decoration: none;
    }

    .subnav-content a:hover {
        background-color: #eee;
        color: black;
    }

    .subnav:hover .subnav-content {
        display: block;
    }
    body
    {
        background-image: url('image1.png');
        background-repeat:no-repeat;
        background-attachment: fixed;
        background-size: auto auto;
        background-position: center;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding-top: 30px;
    }
    #logo
    {
        position:fixed;
        top:0;
        left:0;
    }
    table{
        border-collapse: collapse;
    }
    table.center{
        margin-left:auto;
        margin-right:auto;
    }
    th{
        background-color: #ff6666;
        padding:8px;
        text-align:left;
    }
    td{
        padding:8px;
        text-align:left;
        border-bottom: 1px solid #ddd;
        background-color: #f2f2f2;
    }
    tr:hover {background-color: #e1e6f2;}
    form
    {
        text-align: center;
    }
    .center_button
    {
        text-align: center;
    }
</style>
<h1>Welcome, User</h1>
<div id = "logo">
    <img src = "logo.png" width = "180" height = "80">
</div>
<div class = "navbar">
    <div class = "subnav">
        <button class = "subnavbtn">Search Database <i class = "fa fa-caret-down"></i></button>
        <div class = "subnav-content">
            <a href="http://localhost:8080/FindActiveClient.php">Active Clients</a>
            <a href="http://localhost:8080/FindClient.php">Clients</a>
            <!-- <a href="http://localhost:8080/FindTrainers.php">Trainers</a> -->
        </div>
    </div>
    <div class = "subnav">
        <button class = "subnavbtn">Add to Database<i class = "fa fa-caret-down"></i></button>
        <div class = "subnav-content">
            <a href="http://localhost:8080/AddClient.php">Clients</a>
            <a href="http://localhost:8080/AddTrainer.php">Trainers</a>
        </div>
    </div>
    <div class = "subnav">
        <button class = "subnavbtn">Delete<i class = "fa fa-caret-down"></i></button>
        <div class = "subnav-content">
            <a href="http://localhost:8080/DeleteActiveClient.php">Active Clients</a>
            <a href="http://localhost:8080/DeleteClient.php">Clients</a>
            <a href="http://localhost:8080/DeleteTrainer.php">Trainers</a>
        </div>
    </div>
</div>
<form action = "" method = "post">
    Name:
    <input type = text name = 't1'>
    <br>
    <br>
    <input type = submit name = "s">
</form>
<div class = "center_button">
    <button onclick = "window.location.href='http://localhost:8080/main.html';">Back to Home</button>
</div>
</body>
<h1>Results</h1>
<table class="center">
    <tr>
        <th>Name</th><th>License Number</th><th>Address</th><th>Location</th>
    </tr>

</body>
</html>
<?php

//Connecting to database
$host="localhost";
$port=3306;
$user="root";
$password="root";
$dbname="zaycfitnessdatabaseproject";

$conn = new mysqli($host, $user, $password, $dbname, $port) or die("Connection Failed: %s\n". $conn -> error);
//Connection complete/failed
if (isset($_POST['t1']))
{
    $name = $_POST['t1'];
    if ($name == "Show all")
    {
        $result = $conn->query("SELECT * FROM trainer");
    }
    else
    {
        $result = $conn->query("SELECT * FROM trainer WHERE name = '$name'");
    }
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['license']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['location']."</td>";
        echo "</tr>";
    }
}
$conn->close();
?>