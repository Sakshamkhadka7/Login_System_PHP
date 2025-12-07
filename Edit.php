<?php
$server="localhost";
$username="root";
$password="";
$db="user";   // make sure this is the correct database name
$conn=mysqli_connect($server,$username,$password,$db);

// Check if id exists in URL
if (!isset($_GET['id'])) {
    die("ID not provided in URL");
}

$sno = $_GET['id'];

// Fetch user data
$sql = "SELECT * FROM client WHERE sno = $sno";
$result = mysqli_query($conn, $sql);

// Check if query failed
if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

//  UPDATE CODE 
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $update = "UPDATE client 
               SET email='$email', age='$age', gender='$gender'
               WHERE sno=$sno";

    if (mysqli_query($conn, $update)) {
        echo "Record Updated Successfully!";
        header("Location: welcome.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="" method="POST"> <!-- SAME PAGE SUBMIT -->
    
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Age: <input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>
    Gender: <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br><br>

    <button type="submit" name="submit">Update</button>
</form>

</body>
</html>
