<?php
// All code done by Wolf Pickens

$servername = "localhost";
$username = "root";
$password = "0808";
$dbname = "chimera";

// create connection

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection)
    die ("couldn't connect".mysqli_connect_error());
else
echo 'connection established';

?>