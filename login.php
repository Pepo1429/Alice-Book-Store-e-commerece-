<?php
include 'dbconnection.php';

session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["staff"] == "No"){
    header("location: home.php");
    exit;
}

//$email = $pass = "";
//$email_err = $pass_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = trim($_POST["email"]);
        $pass = trim($_POST["pass"]);
        echo"$pass";
//     // Validate credentials
        // Prepare a select statement
        $sql = "SELECT email, pass, status_user FROM user WHERE email = ?";
      
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){  
                    // Bind result variables

                    mysqli_stmt_bind_result($stmt, $email, $passconf,$userStatus);
                    if(mysqli_stmt_fetch($stmt)){
                     if( $userStatus == 'Active'){
                        if($pass == $passconf){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $email;  
                            $_SESSION["staff"] = "No";   
                          
                        
                            // Redirect user to welcome page
                            header("location: home.php");
                        } 
                      }
                      else{ ?>
                        <script type="text/javascript">
                        alert("Your account is not approved from our staff member, plase wait.");
                        window.location.href = "login.php";
                        </script>
                      <?php 
                      }
                    }
                } 
            }
            // Close statement
            mysqli_stmt_close($stmt);
      }
    // Close connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


  <title>Login</title>

  </head>
<body>
<div class="da">

  <div class = "pictureLog">
  <img src="Logo.png" width=" 200" height="100">
</div>
<div id = "loginCred">

<h2>Login</h2>

<?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
        
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="email">Email:</label><br>
  <input type="text" name="email" value="">  <br><br>
  <label for="pass">Password:</label><br>
  <input type="password" name="pass" value="">
  <input type = "submit" id = "loginBut" class="btn btn-primary" value = "Login"  name="login"><td>
</form>
<h4 style="
    padding-top: 19px;
">Or...</h4>
<a class="btn btn-primary" id = "signUp" href="register.php">Sign Up</a>

      </div>
      <a href = "staff-login.php">Staff login</a>

      </div>



</body>
</html>