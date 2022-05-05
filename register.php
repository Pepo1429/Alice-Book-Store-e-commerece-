<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="functions.js"></script>
  <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


  <title>Sign Up</title>

</head>

<body onload="hidden()">

<div class = "reg">
  <div class = "userReg">
<div class = "opBut">
<h2>Registration</h2>

<button class="btn btn-primary" id="school" type="button" onclick="mode('educ', 'company')">Education</button>
<button class="btn btn-primary" id="business" type="button" onclick="mode('company', 'educ')">Business</button>
<button class="btn btn-primary" id="reg" type="button" onclick="cleaning()">Regular</button>


</div>
<form method="post" action="proceed.php">

  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>

  <label for="sname">Surname:</label><br>
  <input type="text" id="sname" name="sname" value=""><br>

  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value=""><br>

  <label for="country">Country:</label><br>
  <input type="text" id="country" name="country" value=""><br>
  
  <label for="city">City:</label><br>
  <input type="text" id="city" name="city" value=""><br>

  <label for="pcode">Post code:</label><br>
  <input type="text" id="pcode" name="pcode" value=""><br>
  
  <label for="addr">Address:</label><br>
  <input type="text" id="addr" name="addr" value=""><br>
  
  <label for="pass">Password:</label><br>
  <input type="password" id="pass" name="pass" value=""><br>

  <label for="repass">Confirm password:</label><br>
  <input type="password" id="repass" name="repass" value=""><br>
 
  <div id = "company" name = "company">
  <label id ="company" for="company">Company name:</label><br>
  <input type="text" id="company" name="comp" value=""><br>
  </div>
  <div id = "educ" name = "educ" >
  <label id ="educ" for="educ">School/University name:</label><br>
  <input type="text" id="eudc" name = "educ" value=""><br>
  </div>
  <br>
  <input type = "submit" id = "regBut" class="btn btn-primary" value = "Sign Up"  name="create"><td><br><br>
  <a href = "login.php">Sign In</a>

</form>
</div>
</div>
<?php include 'footer.php';?>

</body>
</html>