<?php
session_start();
include 'dbconnection.php';

if(isset($_POST['guestOrder']))
{	 

    $cart = $_SESSION['array'];
    $email = $_POST['email'];
    $total = $_SESSION['total'];
    $status = "Pending";
    $cart = implode(" , ",$cart);


	 $sql = "INSERT INTO orders (email, items, order_date, total, status_order)
	 VALUES ('$email','$cart','2018-12-05 12:39:16','$total','$status')";
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
}

if(isset($_POST['guestOrder']))
{	 

    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $post_code = $_POST['pcode'];
    $user_address = $_POST['addr'];



	 $sql = "INSERT INTO guest (first_name, sure_name, email, country, city, post_code,user_address)
	 VALUES ('$fname','$sname','$email','$country','$city','$post_code','$user_address')";
	 if (mysqli_query($conn, $sql)) {
     }
    else {
        echo"No";
		echo "Error: " . $sql . "
" . mysqli_error($conn);

	 }
	 mysqli_close($conn);
}

?>

