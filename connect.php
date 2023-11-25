<?php
// Retrieve data from the form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthdayDate = $_POST['birthdayDate'];
$gender = $_POST['gender'];
$emailAddress = $_POST['emailAddress'];
$phoneNumber = $_POST['phoneNumber'];
$course = $_POST['course'];

// Create a connection to the database
$conn = new mysqli('localhost', 'root', '', 'test');

// Check if the connection was successful
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Prepare the SQL query to insert data into the database
    $sql = "INSERT INTO student (first_Name, Last_Name, Birthday, Gender, Email, Phone_number, Course) VALUES 
            ('".$firstName."', '".$lastName."', '".$birthdayDate."', '".$gender."', '".$emailAddress."', '".$phoneNumber."', '".$course."')";

    // Calculate the age based on the provided birthday
    $dob = new DateTime($birthdayDate);
    $now = new DateTime();
    $diff = $now->diff($dob);
    $age = $diff->y;

    // Get the length of the first name and last name
    $firstnameLength = strlen($firstName);
    $lastnameLength = strlen($lastName);

    // Check first name length
    if ($firstnameLength > 10) {	
        header('Location: index.php?message=errorFirstName');
        return 0;
    }

    // Check last name length
    if ($lastnameLength > 20) {
        header('Location: index.php?message=errorlastname');
        return 0;
    }

    // Get the length of the phone number
    $phNumLength = strlen($phoneNumber);

    // Check phone number length
    if (!($phNumLength == 10 || $phNumLength == 11)) {
        header('Location: index.php?message=errorphNumLength');
        return 0;
    }

    // Validate age
    if (!($age >= 7 && $age <= 17)) {
        header('Location: index.php?message=errorage');
        return 0;
    }

    // Insert data into the database and handle success or error
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
