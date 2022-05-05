<!doctype html>

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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Staff</title>

</head>

<body onload="hidden()" style = "overflow-x: hidden;">

<div class = "staffID">
<h2>Staff registration</h2>

<form method="post" action="proceed.php">

  <label for="first_name">First name:</label><br>
  <input type="text" id="first_name" name="first_name" value=""><br>

  <label for="last_name">Last name:</label><br>
  <input type="text" id="last_name" name="last_name" value=""><br>

  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value=""><br>
  
  <label for="pass">Password:</label><br>
  <input type="password" id="pass" name="pass" value=""><br>

  <label for="possition">Postition:</label><br>
  <input type="text" id="position" name="position" value=""><br>
 
  <br>
  <input type="submit" name="register" value="Register">

</form>
</div>

</body>
</html>