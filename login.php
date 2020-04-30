<?php

error_reporting(0);
require('db.php');

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "username or password is empty";
    } else {
    //Save username &password in a variable
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //2,Prepare query
        $query  = "SELECT username, password, level "; 
        $query .= "FROM login ";
        $query .= "WHERE username = '$username' AND password = '$password' ";
        
    //echo $query;
    
    //2. Execute query
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        die ("query is wrong");
    }
    
    
    // Save data to $row
    $row = mysqli_fetch_array($result);
        
    // Check how may answers did we get
    $numrows= mysqli_num_rows($result);
    if ($numrows == 1) {
        //Start to use sessions
        session_start();
        
        // Create session variable
         $_SESSION['login_username'] = $username;
         $_SESSION['login_password'] = $password;   
         $_SESSION['login_level'] = $row['level'];
              
      if ($_SESSION['login_level'] == 3) {
                header('location: homepage.php');
            } else if ($_SESSION['login_level'] == 5) {
                header('location: manager.php');
            } else {
                header('location: homepage.php');
            }
            
        } else {
            echo "Login failed";
        }
              $captcha = $_POST["captcha"];

        if (strtolower($_SESSION["checkkey"]) == strtolower($captcha)){
            echo "captcha is correct!";
            //$_SESSION["captcha"] = "";
        }else{
             header('location: error.php');
            echo "cptcha is incorrect!";
        }
    
    //4.free results
    mysqli_free_result($result);
   }
}

//5.close db connection
mysqli_close($connection);

?>

<?php
if (isset($error)) {
    echo "<span>" . $error . "</span>";
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">                   
                        <img class="align-content" src="images/1.png" alt="">
                    
                </div>
                    <form action="login.php" method="POST">
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label>username</label>
                            <input type="username" class="form-control" name="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                         <div class="form-group">
                              <label>captcha</label>
                             <br>
                             <input type="captcha" name="captcha" placeholder="captcha">
    <img src="ShowKey.php" name="KeyImg" id="KeyImg"  onClick="KeyImg.src='ShowKey.php?'+Math.random()">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="forget.php">Forgotten Password?</a>
                            </label>
                        </div>
                        <button class="btn btn-success btn-flat m-b-30 m-t-30" type="submit" name="submit" value="login">login</button>
                        <div class="social-login-content">
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="addlogin.php"> Sign Up Here</a></p>
                        </div>                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
