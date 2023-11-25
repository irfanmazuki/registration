<?php


// Create a connection to the database
$conn = new mysqli('localhost', 'root', '', 'test');

$query = "SELECT * FROM student;";
$lastId = "SELECT LAST(Id) FROM student;";
//for ($Id = "SELECT FIRST(Id) FROM student;"; $Id < $lastId ; $Id++) { 
  //  if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $id = $Id;
            $firstName = "SELECT first_Name FROM student WHERE Id = ('".$Id."');";
            $lastName = "SELECT Last_Name FROM student WHERE Id = ('".$Id."');";
            $birthdayDate = "SELECT Birthday FROM student WHERE Id = ('".$Id."');";
            $gender = "SELECT first_Name FROM student WHERE Id = ('".$Id."');";
            $emailAddress = "SELECT first_Name FROM student WHERE Id = ('".$Id."');";
            $phoneNumber = "SELECT first_Name FROM student WHERE Id = ('".$Id."');";
            $course = "SELECT first_Name FROM student WHERE Id = ('".$Id."');";
    
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$firstName.'</td>
            <td>'.$lastName.'</td>
            <td>'.$birthdayDate.'</td>
            <td>'.$gender.'</td>
            <td>'.$emailAddress.'</td>
            <td>'.$phoneNumber.'</td>
            <td>'.$course.'</td>
            
          </tr>'
        }
        $result->free();
   // } 
    
//}

