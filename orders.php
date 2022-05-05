<?php
session_start();

if($_SESSION["staff"] !== "Yes"){
    header("location: staff-login.php");
    exit;
}

?>
<!doctype html>

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
  <title>Order Approvals</title>

</head>

<body>
<div class = "top">
<hr id = "topline" style="height:10px;border-width:0;color:gray;background-color:#A00000;">
<div class = "logo">
<a href="homepage.php">
    <img src="Logo.png" width=" 154" height="60">
</a>
</div>
<div class="navbarAdmin">
<a id = "navA" href = "/addItem.php" id = "add" >Add Item</a>
  <a id = "navA"href = "/orders.php" id = "order" >Awaiting Orders</a>
    <hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray;">
  </div>
  <form action="logout.php" method="POST">
  <input id ="logoutBut" type="submit" name="destroySession" id = "exit" value="Logout" />
  </form>
</div>
<?php
    include 'dbconnection.php';
    require 'C:\xampp\composer\vendor\autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $order=$_POST['orderID'];
    $user_email=$_POST['email'];
    $user_items=$_POST['items'];
    $mail = new PHPMailer; 
             
    $mail->isSMTP();                      // Set mailer to use SMTP 
    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;               // Enable SMTP authentication 
    $mail->Username = 'peporaev123@gmail.com';   // SMTP username 
    $mail->Password = 'Pepomen1';   // SMTP password 
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;                    // TCP port to connect to 
     
    $mail->setFrom('peporaev123@gmail.com'); 
     
    $mail->addAddress($user_email); 
     
    $mail->isHTML(true); 
     
    $mail->Subject = 'Order Conformation - DO NOT REPLAY/'; 
     
    $bodyContent = "Hello, Thanks for choosing Alice Book Store.com. We are happy to inform you that your recent order is placed and its ready to depart.
    If you have any queries about the order, please contact us. 
    Your ordered items  - ". $user_items . "";
    $mail->Body    = $bodyContent; 

    $sql="Update orders set status_order ='Approved' where orderID ='".$order."'";
    $result=mysqli_query($conn,$sql);
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
        echo 'Message has been sent.'; 
    } 
}
    
 //   mysql_select_db('alice_book_store');

    $sql = "SELECT * FROM orders"; //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    echo "<table id = 'table3'>"; // start a table tag in the HTML
    echo "<tr>
      <th>ID</th>
      <th>Email</th>
      <th>Items</th>
      <th>Order date</th> 
      <th>Total</th>
      <th>Status Order</th>
    </tr>";

  while($row = $result->fetch_assoc()){  ?>

   <?php echo " <tr>
    <td>" . $row['orderID'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['items'] . "</td>
    <td>" . $row['order_date'] . "</td>
    <td>" . $row['total'] . "</td>
    <td>" . $row['status_order'] . "</td>"; 
     ?>
    <td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

    <input type='submit' <?php if($row['status_order'] == "Approved") {?> disabled="disabled" <?php } ?>  id='but' name='orderAppr' value="Approve"></td>
    <input type="hidden" id="orderData" name = "orderID" value="<?php echo $row['orderID'] ?>">
    <input type="hidden" id="orderData" name = "email" value="<?php echo $row['email'] ?>">
    <input type="hidden" id="orderData" name = "items" value="<?php echo $row['items'] ?>">

<?php
    
    echo"</form> </tr>";

    }

    
    echo "</table>"; //Close the table in HTML
    

    mysqli_close($conn);

?>

</script>
<?php include 'footer.php';?>

</body>
</html>