<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        session_start();
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
            function validateForm() {
                //gets the values from the form
                var email = document.forms["signup"]["email"].value;
                var password = document.forms["signup"]["password"].value;
                var confirmPassword = document.forms["signup"]["confirmPassword"].value;

                if (password !== confirmPassword) { //checks if the passwords match
                    alert("Passwords do not match.");
                    return false;
                }

                if (password.length < 8) { //checks if the password is at least 8 characters long
                    alert("Password must be at least 8 characters long.");
                    return false;
                }

                if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(){}[\]-_=+;:'@#~,<.>/?¬`|\\])/.test(password)) { //checks the password meets all the rules - adapted from https://www.codexworld.com/how-to/check-special-characters-using-javascript/
                    alert("Password does not meet the requirements. Passwords must contain at least one uppercase letter, one lowercase letter, one number and one special character.");
                    return false;
                }

                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { //checks if the email is valid - regex from https://stackoverflow.com/a/9204568
                    alert("Email is not valid.");
                    return false;
                }

                return true;
            }
        </script>
    <style>
        body {
            background-color: #7327d7;
        }
    </style>
    <title>Scout System</title>
</head>
<?php

    if ($_GET["method"] == "l") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $lemail = htmlspecialchars(strtolower($_POST["lemail"]));
            $lpassword = htmlspecialchars($_POST["lpassword"]);

            // Redirect to success page
            header("Location: home.php");
            exit();
        }
    }

    if ($_GET["method"] == "r") {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $title = $_POST["title"];
            $firstName = htmlspecialchars(ucwords(strtolower($_POST["firstName"])));
            $middleName = htmlspecialchars(ucwords(strtolower($_POST["middleName"])));
            $lastName = htmlspecialchars(ucwords(strtolower($_POST["lastName"])));
            $dob = $_POST["dob"];
            $email = htmlspecialchars(strtolower($_POST["email"]));
            $telephone = htmlspecialchars($_POST["telephone"]);
            $alternativeTelephone = htmlspecialchars($_POST["alternativeTelephone"]);
            $address1 = htmlspecialchars($_POST["address1"]);
            $address2 = htmlspecialchars($_POST["address2"]);
            $town = htmlspecialchars(ucwords(strtolower($_POST["town"])));
            $postcode = htmlspecialchars($_POST["postcode"]);
            $password = htmlspecialchars($_POST["password"]);
            $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Redirect to success page
            header("Location: usersetup.php");
            exit();
        }
    }
?>
<body>
    <div class="container text-white">
        <div class="row">
            <div class="col-md-12">
                <img src="images/index-logo.png" alt="Scouts Logo" class="img-fluid">
                <h1>Online Scouting System</h1>
                <div class="d-grid gap-3">
                    <button class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#loginForm">Login</button>
                    <div id="loginForm" class="collapse">
                        <form action="index.php?method=l" method="POST" name="login">
                            <div class="mb-3">
                                <label for="lemail" class="form-label">Email Address</label>
                                <input type="lemail" class="form-control" id="lemail" name="lemail">
                            </div>
                            <div class="mb-3">
                                <label for="lpassword" class="form-label">Password</label>
                                <input type="lpassword" class="form-control" id="lpassword" name="lpassword">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <button class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#registerForm">Register</button>
                    <div id="registerForm" class="collapse">
                    <form action="index.php?method=r" method="POST" name="register" autocomplete="on" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title*</label>
                                <select class="form-select" id="title" name="title" required>
                                    <option value="">Select One</option>
                                    <option value="HM">HM</option>
                                    <option value="HRH">HRH</option>
                                    <option value="Sir">Sir</option>
                                    <option value="Lady">Lady</option>
                                    <option value="Lord">Lord</option>
                                    <option value="Rev">Rev</option>
                                    <option value="Hon">Hon</option>
                                    <option value="Prof">Prof</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="mb-3">
                                <label for="middleName" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" name="middleName">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth<span style="color: red">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="mb-3">
                                <label for="remail" class="form-label">Email Address<span style="color: red">*</span></label>
                                <input type="remail" class="form-control" id="remail" name="remail" required>
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Telephone Number<span style="color: red">*</span></label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            <div class="mb-3">
                                <label for="alternativeTelephone" class="form-label">Alternative Telephone Number</label>
                                <input type="tel" class="form-control" id="alternativeTelephone" name="alternativeTelephone">
                            </div>
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address 1<span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="address1" name="address1" required>
                            </div>
                            <div class="mb-3">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="address2" name="address2">
                            </div>
                            <div class="mb-3">
                                <label for="town" class="form-label">Town<span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="town" name="town" required>
                            </div>
                            <div class="mb-3">
                                <label for="postcode" class="form-label">Post Code<span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="postcode" name="postcode" required>
                            </div>
                            <div class="mb-3">
                                <label for="rpassword" class="form-label">Password<span style="color: red">*</span></label>
                                <input type="rpassword" class="form-control" id="rpassword" name="rpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password<span style="color: red">*</span></label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>