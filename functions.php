<?php
    error_reporting(E_ALL ^ E_WARNING); 
    $id = $_POST["id"];

    $con = new mysqli("localhost", "root", "", "test");
	
	if ($con->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed: " . $con->connect_error);
	}

    switch($_POST["functionname"]){ 
        case 'getRecordById': 
            $query = "SELECT * FROM student WHERE id = ".$id;
            $result = $con->query($query);
            if ($result-> num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo json_encode($row);
                }}
            break;
        case 'deleteById':
            // sql to delete a record
            $query = "DELETE FROM student WHERE id=".$id;
            $result = $con->query($query);
            break;
    }
?>