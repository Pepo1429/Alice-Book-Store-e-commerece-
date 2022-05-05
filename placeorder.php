<?php
session_start();
include 'dbconnection.php';

if(isset($_POST['order']))
{	 

    $cart = $_SESSION['array'];
    $email = $_SESSION['email'];
    $total = $_SESSION['total'];
    $status = "Pending";
    $cart = implode(" , ",$cart);
   $isDate = date("Y/m/d");

	 $sql = "INSERT INTO orders (email, items, order_date, total, status_order)
	 VALUES ('$email','$cart','$isDate','$total','$status')";
	 if (mysqli_query($conn, $sql)) {
        unset($_SESSION['array']);?>
      <script type="text/javascript">
      alert("Your order is placed. You will recive an email when member of our staff approves it. Thank you.");
      window.location.href = "home.php";
      </script>
  <?php   }
    else {
        echo"No";
		echo "Error: " . $sql . "
" . mysqli_error($conn);

	 }
	 mysqli_close($conn);
}

?>

