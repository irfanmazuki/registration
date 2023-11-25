<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 form-title">Debug Lab Registration Form</h3>
                        <?php
                        if(isset($_GET['message'])){
                            if($_GET['message']=='success'){
                                echo '<p style="color: green;">New record added successfully</p>';
                            }
                            else if($_GET['message']=='error'){
                                echo '<p style="color: red;">Error. Problem encountered!!!</p>';
                            }
                            else if($_GET['message']=='errorage'){
                                echo '<p style="color: red;">Error. Age should be 7-17!!!</p>';
                            }
                            else if($_GET['message']=='errorFirstName'){
                                echo '<p style="color: red;">Error. First name length should be less than 10!!!</p>';
                            }
                            else if($_GET['message']=='errorlastname'){
                                echo '<p style="color: red;">Error. Last name length should be less than 20!!!</p>';
                            }
                            else if($_GET['message']=='errorphNumLength'){
                                echo '<p style="color: red;">Error. Phone number length should be between 10 to 11!!!</p>';
                            }

                        }
                        ?>
                        <form action="connect.php" method="post">

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="firstName" class="form-control form-control-lg" name="firstName" required/>
                                        <label class="form-label" for="firstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="lastName" class="form-control form-control-lg" name="lastName" required/>
                                        <label class="form-label" for="lastName">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <input type="date" class="form-control form-control-lg" id="birthdayDate" name="birthdayDate" required/>
                                        <label for="birthdayDate" class="form-label">Birthday</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="femaleGender"
                                               value="Female" name="gender" checked required/>
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="maleGender"
                                               value="Male" name="gender" required/>
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="otherGender"
                                               value="Other" name="gender" required/>
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="email" id="emailAddress" class="form-control form-control-lg"
                                               name="emailAddress" required/>
                                        <label class="form-label" for="emailAddress" name="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="tel" id="phoneNumber" class="form-control form-control-lg"
                                               name="phoneNumber" required/>
                                        <label class="form-label" for="phoneNumber" name="phoneNumber">Phone Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <select name="course" class="select form-control form-control-lg" required>
                                            <option value="0" disabled>Choose option</option>
                                            <option value="Coding" selected>Coding</option>
                                            <option value="3d Modelling">3d Modelling</option>
                                            <option value="Game Development">Game Development</option>
                                        </select>
                                        <label class="form-label">Course</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit"/>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
