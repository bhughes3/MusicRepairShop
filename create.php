<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE musicRepair";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn = new mysqli($servername, $username, $password, "musicRepair");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE customerTable (
username VARCHAR(16) NOT NULL,
password VARCHAR(16) NOT NULL,
name VARCHAR(80) NOT NULL,
address VARCHAR(200),
PRIMARY KEY (username)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table customerTable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE repairCost (
damageLevel VARCHAR(20) NOT NULL,
instrumentType VARCHAR(20) NOT NULL,
brand VARCHAR(20) NOT NULL,
cost float NOT NULL,
PRIMARY KEY (damageLevel, instrumentType, brand)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table repairCost created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE instrumentTable (
instrumentID int(10) NOT NULL,
musicFamily VARCHAR(20) NOT NULL,
instrumentType VARCHAR(20) NOT NULL,
brand VARCHAR(20) NOT NULL,
PRIMARY KEY (instrumentID)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table InstrumentTable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE repairTable (
repairID int(10) NOT NULL,
instrumentID int(10) NOT NULL,
username VARCHAR(16) NOT NULL,
damageLevel VARCHAR(20) NOT NULL,
PRIMARY KEY (repairID, instrumentID),
FOREIGN KEY (username) REFERENCES customerTable(username),
FOREIGN KEY (damageLevel) REFERENCES repairCost(damageLevel),
FOREIGN KEY (instrumentID) REFERENCES instrumentTable(instrumentID) 
)";

if ($conn->query($sql) === TRUE) {
    echo "Table repairTable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO customertable (username, password, name)
      VALUES ('admin', 'admin', 'admin')";

if ($conn->query($sql) === TRUE) {
    echo "admin created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>