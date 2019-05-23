<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
table{
  width: 100%;
}
</style>
<?php
#Create Connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "php_connection";

$conn = mysqli_connect($host, $user, $pass, $db);

#connection test
if (!$conn) {
  die("Can't connect to the database".mysqli_connect_error());
  exit();
}else{
  echo "Database Connection Successful.<br>";
}

// Create database
// $sql = "CREATE DATABASE userlist";
// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

// sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
//
// if (mysqli_query($conn, $sql)) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

# Data Insert

// $sql = "INSERT INTO userlist(firstName, lastName, email) VALUES('Arnold', 'Khan', 'arnold@gmail.com')";
//
// # Data Insertion Check
// if (mysqli_query($conn, $sql)) {
//   echo "New record inserted.".mysqli_insert_id($conn);
// }else {
//   echo "Failed".$sql. "<br>".mysqli_error($conn);
// }

#Multiple Data Insert
// $sql = "INSERT INTO userlist (firstName, lastName, email) VALUES ('Tamjid', 'Hasan', 'tamjid@example.com');";
// $sql .= "INSERT INTO userlist (firstName, lastName, email) VALUES ('Azizur', 'Rahman', 'aziz@example.com');";
// $sql .= "INSERT INTO userlist (firstName, lastName, email) VALUES ('Saleh', 'Ahammed', 'saleh@example.com')";
// #Data Insertion check
// if (mysqli_multi_query($conn, $sql)) {
//   echo "New record inserted.";
// }else {
//   echo "Failed".$sql. "<br>".mysqli_error($conn);
// }

# Prepare Statement & Bind
# $query = "INSERT INTO userlist (firstName, lastName, email) VALUES (?, ?, ?)";
# $stmt = mysqli_prepare($conn, $query);
# The argument may be one of four types:
// i - integer
// d - double
// s - string
// b - BLOB
# mysqli_stmt_bind_param($stmt, "sss", $firstName, $lastName, $email);

// set parameters and execute
/*
$firstName = "Mijanur";
$lastName = "Rahman";
$email = "mijanur@gmail.com";
mysqli_execute($stmt);
echo "New record inserted.";
mysqli_stmt_close($stmt);
*/



# Update Data into mysql
// $query = "UPDATE userlist SET lastName='Khan Js' WHERE id=3";
// # Check Updation
// if (mysqli_query($conn, $query)) {
//   echo "Update Record Successfully.";
// }else{
//   echo "Error updating record: " . mysqli_error($conn);
// }

#Delete Record from mysql
// $query = "DELETE FROM userlist WHERE id=2";
// if (mysqli_query($conn, $query)) {
//   echo "Record deleted successfully";
// }else {
//   echo "Error deleting record: " . mysqli_error($conn);
// }

// Mysql Limit Data
// this two query return same result
// $sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
// $sql = "SELECT * FROM Orders LIMIT 15, 10";

# Select Data From Database
$sql = "SELECT * FROM userlist";

# Data store into variable from getting value
$result = mysqli_query($conn, $sql);

#check database value is available or not
?>
<table>
  <tr>
    <td>ID</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Full Name</td>
    <td>Email</td>
  </tr>

<?php
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['firstName']; ?></td>
      <td><?php echo $row['lastName']; ?></td>
      <td><?php echo $row['firstName'].' '.$row['lastName']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <?php
  }
}
?>
</table>
<?php
# Connection Disable/ disconnect
mysqli_close($conn);
?>
