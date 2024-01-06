<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>
<body> 
  <!-- HIDDEN INPUT -->
  <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
  <form id="varForm" action="manage.php" target="dummyframe" method="POST">
    <input id="selectedViewId" type="text" value="" name="selectedViewId" hidden/>
    <input id="varSubmit" type="submit" hidden/>
  </form>
    <div class="container custom-container">
        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 form-title">Debug Lab Registration Form</h3>
        <div class="table-wrapper">
              <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                    <th style="width: 5%">Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th style="width: 17%">Email</th>
                    <th>Phone Number</th>
                    <th>Course</th>
                    <th style="width: 7%">Actions</th>
                  </tr>
              </thead>
              <tbody>
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
      $date=date_create($row["Birthday"]);

			echo "<tr><td>".$row["Id"]."</td><td>".$row["first_Name"]."</td><td>".$row["Last_Name"]."</td><td>".date_format($date,"d M Y")."</td><td>".$row["Gender"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_number"]."</td><td>".$row["Course"]."</td><td>
                  <i type='button' onClick='view(".$row["Id"].")' data-toggle='modal' data-target='#viewPop' class='fa-solid fa-eye'></i>
                  <i type='button' onClick='edit(".$row["Id"].")' data-toggle='modal' data-target='#editPop' class='fa-solid fa-pen-to-square'></i>
                  <i type='button' onClick='deleteRecord(".$row["Id"].")' data-toggle='modal' data-target='#deletePop' class='fa-solid fa-trash'></i>
                  </td></tr>";
		}
		echo "</table>";
	}else{
		echo "0 result";
	}
	
  function refreshdata(){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      echo '<script>'.$_POST['selectedViewId'].'</script>';
    }
    
  }

	$con->close();
?>


</tbody>
  
          </table>
        </div>
      </div>    
    </div>

    <div class="modal fade" id="viewPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">WARNING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want view data ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="border-width: 0px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="background-color: #ff9d0d; border-width: 0px;" class="btn btn-primary">View</button>
                  </div>
                </div>
              </div>
            </div> 
            <div class="modal fade" id="editPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                

                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">WARNING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="editForm">
                <form>
                  <div class="form-group">
                    <label for="label_edit_first_name">First Name</label>
                    <input   class="form-control" id="edit_first_name" placeholder="First Name">
                    <label for="label_edit_last_name">Last Name</label>
                    <input   class="form-control" id="edit_last_name" placeholder="Last name">
                    <label for="label_edit_birthday">Birthday</label>
                    <input   class="form-control" id="edit_birthday" placeholder="Birthday" type="date">
                    <label for="label_edit_gender">Gender</label>
                    <div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="editCbFemale"
                                value="Female" name="gender" checked required/>
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="editCbMale"
                                  value="Male" name="gender" required/>
                          <label class="form-check-label" for="maleGender">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="editCbOther"
                                  value="Other" name="gender" required/>
                          <label class="form-check-label" for="otherGender">Other</label>
                      </div>
                    </div>
                    <label for="exampleInputEmail1">Email</label>
                    <input   class="form-control" id="edit_email" placeholder="Email">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input   class="form-control" id="edit_phone_number" placeholder="Phone Number">
                    <label for="exampleInputEmail1">Course</label>
                    <select name="course" class="select form-control" id="edit_course" required>
                        <option value="0" disabled>Choose option</option>
                        <option value="Coding" selected>Coding</option>
                        <option value="3d Modelling">3d Modelling</option>
                        <option value="Game Development">Game Development</option>
                    </select>
                  </div>
                  
                </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" style="border-width: 0px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="background-color: #ff9d0d; border-width: 0px;" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div> 
    
    <div class="modal fade" id="deletePop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">WARNING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="border-width: 0px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="background-color: #ff9d0d; border-width: 0px;" class="btn btn-primary" onClick="confirmDeletion()">Delete</button>
                  </div>
                </div>
              </div>
            </div> 
</body>
<script>

  var selectedDeletionId = 0;
  function view(id){
    $("#selectedViewId").attr("value", id);
    $("#varForm").submit();
    <?php
    refreshdata();
    ?>
    }

  function edit(id)
  {
    $.ajax({
        type: "POST",
        url: 'functions.php',
        data: {functionname: 'getRecordById', id: id}, 
        success:function(data) {
          var record = JSON.parse(data);
          $("#edit_first_name").attr("value", record["first_Name"]);
          $("#edit_last_name").attr("value", record["Last_Name"]);
          $("#edit_birthday").attr("value", record["Birthday"]);
          $("#edit_email").attr("value", record["Email"]);
          $("#edit_phone_number").attr("value", record["Phone_number"]);
          if(record["Gender"] == "Female"){
            $("#editCbFemale").prop("checked", true);
          }
          else if(record["Gender"] == "Male"){
            $("#editCbMale").prop("checked", true);
          }
          else{
            $("#editCbOther").prop("checked", true);
          }
          $("#edit_course").val(record["Course"]);
        }
    });
  };

  function deleteRecord(id){
    selectedDeletionId = id;
  }

  function confirmDeletion(){
    $.ajax({
        type: "POST",
        url: 'functions.php',
        data: {functionname: 'deleteById', id: selectedDeletionId},
        success:function(data) {
          $("#deletePop").modal("hide");
          location.reload();
          alert("record successfully deleted!");
        }
    });
  }
  </script>
</html>
