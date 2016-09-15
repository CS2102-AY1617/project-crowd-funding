<?php

$servername = "sql6.freesqldatabase.com";
$username = "sql6135912";
$password = "6Umu2bknNB";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<html>
<head> <title>Pre Alpha Demo</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1> Pre Alpha Demo</h1>
<h5> There are four fruits in the database. We can add more fruits or search exisiting fruits. </h5>

</td> </tr>

<tr>
<td style="background-color:#eeeeee;">
<form action="form-posting.php" method="post">
        Search a fruit by id: <input type="text" name="fruit-id" id="fruit-id">

        <input type="submit" name="formSubmit" value="Search" >
</form>
</td> </tr>

<tr>
<td style="background-color:#eeeeee;">
<form action="form-posting.php" method="post">
        Add a fruit : <input type="text" name="fruit-name" id="fruit-name">

        <input type="submit" name="formSubmit1" value="Insert" >
</form>
</td> </tr>

<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102
</td> </tr>
</table>

</body>
</html>
