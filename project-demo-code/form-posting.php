<?php

$servername = "sql6.freesqldatabase.com";
$username = "sql6135912";
$password = "6Umu2bknNB";
$db_name = "sql6135912";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['fruit-id'])) {
  $fruit_id = $_POST['fruit-id'];
  $sql = "SELECT fruit_name FROM pre_alpha_fruits WHERE id = ". $fruit_id;
  $result = mysqli_query($conn,$sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "You have found " . $row['fruit_name'];
    }
  } else {
    echo "The id entered is not registered yet.";
  }

  echo "
    <div>
      <a href='book.php'>Back</a>
    </div>
  ";

}

if (isset($_POST['fruit-name'])) {
  $fruit_name = $_POST['fruit-name'];
  $sql = "INSERT INTO pre_alpha_fruits (fruit_name) VALUES ('". $fruit_name ."')";
  $response = mysqli_query($conn, $sql);
  if ($response) {
    echo "Fruits has been added successfully!";
  } else {
    echo "Unknown error occur...";
  }
  echo "
    <div>
      <a href='book.php'>Back</a>
    </div>
  ";
}

 ?>
