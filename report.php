<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <script src="functions.js"></script>


  <title>Reports</title>

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
  <div style="overflow-y: hidden;">
<?php
    $todayC = 0; $yestC = 0; $twodaysC = 0; $regC = 0; $guestC = 0;
    include 'dbconnection.php';
 //   mysql_select_db('alice_book_store');
 $today = date("Y-m-d");
 $yestarday = date('Y.m.d',strtotime("-1 days"));
 $ago2 = date('Y.m.d',strtotime("-2 days"));


    $sql = ("SELECT * FROM orders WHERE order_date ='$today'"); //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){ 
        $todayC++;
    }

    $sql = ("SELECT * FROM orders WHERE order_date ='$yestarday'"); //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){ 
        $yestC++;
    }
    $sql = ("SELECT * FROM orders WHERE order_date ='$ago2'"); //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){ 
        $twodaysC++;
    }
    $sql = ("SELECT * FROM user"); //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){ 
        $regC++;
    }

    $sql = ("SELECT * FROM guest"); //You don't need a ; like you do in SQL
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){ 
        $guestC++;
    }
    ?>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
         let today = <?php echo $todayC; ?>;
         let yest = <?php echo $yestC; ?>;
         let ago2 = <?php echo $twodaysC; ?>;


          var data = google.visualization.arrayToDataTable([
            ['Orders', 'Per day'],
            ['Today',     today],
            ['Yesterday',     yest],
            ['2 days ago',     ago2],
          ]);
  
          var options = {
            title: 'Orders per day'
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  
          chart.draw(data, options);
        }
      </script>
      <div id="piechart" style="width: 700px;height: 500px;position: relative; left: -5%;"></div>


      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
         let registered = <?php echo $regC; ?>;
         let guest = <?php echo $guestC; ?>;


          var data = google.visualization.arrayToDataTable([
            ['Users', 'number'],
            ['Registered',    registered],
            ['Guest',     guest],
          ]);
  
          var options = {
            title: 'Register/Guest users in total'
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
  
          chart.draw(data, options);
        }
      </script>
      <div id="piechart1" style="width: 700px;left: 29%;height: 500px; margin-top: -32.5%;position: relative;"></div>
   
  <?php  mysqli_close($conn); ?>

  </div>
  </div>
  <?php include 'footer.php';?>

</body>
</html>