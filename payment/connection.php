<?php

$servername = "localhost";
$username = "paroshic_paroshic";
$password = "kxmcwQzLTrTR";
$database = "paroshic_matri2018jl";

// Create connection for integration
$conn_integration = mysqli_connect($servername, $username, $password, $database);

// Check connection for integration
if (!$conn_integration) 
{
    die("Connection failed: " . mysqli_connect_error());
} 
else 
{
    echo "Database connected successfully!";
}

