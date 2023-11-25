<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>
<body> 
    <div class="container custom-container">
        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 form-title">Debug Lab Registration Form</h3>
        <div class="row">
          <div class="col-12">
            <table class="table table-bordered">
             
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Birthday</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Course</th>
                  <th scope="col">Actions</th>
                </tr>
				
				<?php

	$con = new mysqli("localhost", "root", "", "test");
	
	if ($con->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed: " . $con->connect_error);
	}
	
	$query = "SELECT * FROM student";
	$result = $con->query($query);
	
	if ($result-> num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo "<tr><td>".$row["Id"]."</td><td>".$row["first_Name"]."</td><td>".$row["Last_Name"]."</td><td>".$row["Birthday"]."</td><td>".$row["Gender"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_number"]."</td><td>".$row["Course"]."</td><td>
                  <button type='button' class='m_btn m_btn-primary'><i class='m_far m_fa-eye'></i></button>
                  <button type='button' class='m_btn m_btn-success'><i class='m_fas m_fa-edit'></i></button>
                  <button type='button' class='m_btn m_btn-danger'><i class='m_far m_fa-trash-alt'></i></button>
                  </td></tr>";
		}
		echo "</table>";
	}else{
		echo "0 result";
	}
	
	$con->close();
?>

</tbody>
     
            </table>
          </div>
        </div>
      </div>    
    </div> 
	
</body>
</html>
