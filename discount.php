<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <script src="functions.js"></script>


  <title>Discount setting</title>

</head>

<body  style = "overflow-x: hidden;">
<div class = "top">
<hr id = "topline" style="height:10px;border-width:0;color:gray;background-color:#A00000;">
<div class = "logo">
<a href="home.php">
    <img src="Logo.png" width=" 154" height="60">
</a>
</div>
<div class="navbarAdmin">
  <a href = "#approval" id = "navA" onclick = "loadDoc('appr')" >Approval Request</a>
  <a href = "#staff" id = "navA" onclick = "loadDoc('staff')" >Staff registration</a>
  <a href = "/report.php" id = "navA" >Reports</a>
  <a href = "/discount.php" id = "navA" >Users discount</a>
    <hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray;">

  </div>
  <form action="logout.php" method="POST">
  <input id ="logoutBut" type="submit" name="destroySession" id = "exit" value="Logout" />
                    </form>
</div>

<div id="adminOptions" >
  <div style="width: 500;height: 400px;left: -8%;position: relative;overflow-y: scroll;">
<?php
    include 'dbconnection.php';
 //   mysql_select_db('alice_book_store');

    $sql = "SELECT * FROM user WHERE status_user = 'Active' AND NOT (company = '' ) AND disc IS NULL "; //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    echo "<table id = 'table'>"; // start a table tag in the HTML
    echo "<tr id = tableInfo>
      <th>Name   </th>
      <th>Last Name   </th>
      <th>Email   </th> 
      <th>Company account  </th>
      <th>Status  </th>
    </tr>";
    while($row = $result->fetch_assoc()){  
    echo " <tr> ";?>
    <?php $email = $row['email'];
    echo"<td>" . $row['first_name'] . "</td>
    <td>" . $row['surename'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['country'] . "</td>
    <td>" . $row['company'] . "</td>
    <td>" . $row['status_user'] . "</td>"; ?>
    <form  action="/proceed.php" method="GET">
    <td><label for="discount"> Discount:   %</label><br></td>
    <td><input type="number" required="required"  id="discount" name="procent" value=""><br><td>
    <td><input type="hidden" id="email" name="email" value="<?php echo "$email"; ?>"><br><td>

    <input type="submit" id="but"  name="discount" value="Set Discount"></td>
    </form> 
    <?php
    }
    
    echo "</table>"; //Close the table in HTML
    

    mysqli_close($conn);

?>

  </div>
  </div>
  <?php include 'footer.php';?>

</body>
</html>