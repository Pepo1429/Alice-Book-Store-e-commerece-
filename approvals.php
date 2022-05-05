<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <script src="functions.js"></script>


  <title>Approval</title>

</head>

<body>
  <div style="width: 500;height: 400px;left: -8%;position: relative;overflow-y: scroll;">
<?php
    include 'dbconnection.php';
 //   mysql_select_db('alice_book_store');

 $sql = "SELECT * FROM user WHERE  NOT status_user = 'Active' AND NOT (company = '' )"; //You don't need a ; like you do in SQL
 $result = $conn->query($sql);
    echo "<table id = 'table'>"; // start a table tag in the HTML
    echo "<tr id = tableInfo>
      <th>Name   </th>
      <th>Last Name   </th>
      <th>Email   </th> 
      <th>Country  </th>
      <th>City  </th>
      <th>Address  </th>
      <th>Post code  </th> 
      <th>Password  </th>
      <th>Company account  </th>
      <th>Status  </th>
    </tr>";
    while($row = $result->fetch_assoc()){  
    echo " <tr> ";?>
    <?php echo"<td>" . $row['first_name'] . "</td>
    <td>" . $row['surename'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['country'] . "</td>
    <td>" . $row['city'] . "</td>
    <td>" . $row['user_addr'] . "</td>
    <td>" . $row['post_code'] . "</td>
    <td>" . $row['pass'] . "</td>
    <td>" . $row['company'] . "</td>
    <td>" . $row['status_user'] . "</td>
    <td><form action='/proceed.php?email=".$row['email']."' method='POST'>";
    ?>
    
    <input type='submit' <?php if($row['status_user'] == "Active") {?> disabled="disabled" <?php } ?>  id='but' name='approve' value='Approve'></td>
<?php
    echo"</form> </tr>";
    }
    
    echo "</table>"; //Close the table in HTML
    

    mysqli_close($conn);

?>

</script>
  </div>
</body>
</html>