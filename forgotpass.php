<?php
session_start();
include "config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webion - Password Recovery</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/logo.png" />
    <link href="styles/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="styles/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="styles/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="styles/assets/css/forms/switches.css">
    <script type="text/javascript">
    function valid()
    {
      if(document.forgot.password.value!= document.forgot.confirmpassword.value)
      {
        alert("Password and Confirm Password field do not match!!");
        document.forgot.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<body class="form no-image-content">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <div class="mb-4"><a href="index.php">
                            <img src="styles/assets/img/webion.png" style="width:20%; height:20%;"></a>
                        </div>
                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">Enter your name & email!</p>
                        
                        <form class="text-left" name="forgot" method="POST">
                            <div class="form">
                                <!-- Username -->
                                <div id="username-field" class="field-wrapper input">
                                    <label for="name">NAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="name" name="name" type="text" class="form-login" placeholder="Name" required>
                                </div>
                                <!-- End Username -->

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" class="form-login" value="" placeholder="Email">
                                </div>

                                <!-- Password -->
                                <div id="password-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">NEW PASSWORD</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-login" placeholder="New Password" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div id="password-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">CONFIRM PASSWORD</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="confirmpassword" name="confirmpassword" type="password" class="form-login" placeholder="Confirm Password" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <!-- End Password -->

                                <div class="d-sm-flex justify-content-between mt-3 mb-3">

                                    <div class="field-wrapper">
                                        <button type="submit" name="change" onclick="return valid();" class="btn btn-primary" value="">Reset</button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="signup-link recovery">Back?
                                        <a href="login.php">Log in</a>
                                    </p>
                                </div>
                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php
    error_reporting(0);
    if(isset($_POST['submit'])) {
        $_SESSION['submit']='';
    }

    if(isset($_POST['change'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $query=$connect->query("SELECT * FROM user WHERE nama='$name' AND email='$email'");
        $totalakun = $query->num_rows;
        if($totalakun>0){
            $sql = "UPDATE USER set password='$password' WHERE nama='$name' AND email='$email'";
            mysqli_query($connect, $sql);
            echo "<script>alert('Password Changed Successfully! Please Login again!'); </script>";
            echo "<script>location='login.php';</script>";
        }
        else
        {
            echo "<script>alert('Invalid Email and Name'); </script>";
        }
    }
    ?>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="styles/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="styles/bootstrap/js/popper.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="styles/assets/js/authentication/form-2.js"></script>

    <script>
        var loaderElement = document.querySelector('#load_screen');
        setTimeout( function() {
            loaderElement.style.display = "none";
        }, 3000);
    </script>

</body>
</html>