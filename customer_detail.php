<?php
$con= mysqli_connect('localhost', 'root', '', 'banking_system');
$select='SELECT * FROM customer';
$result=mysqli_query($con,$select);
?>
<html>
    <head>
        <title>Customer detail</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
         <nav class="navbar  navbar-fixed-top" style="background-color: skyblue;">
             <div >
            <a href="index.php" style="color:black;border-bottom:2px black solid; margin-left: 50%;padding:10px;"><span class="glyphicon glyphicon-home">Home</span></a>
        </div>
    </nav><br><br><br>
        <?php
        echo "<table class='table' style='text-align:center;background-color:orange;'><tr><th class='col-md-2'>SI No.</th>"
        . "<th class='col-md-2'>Name</th><th class='col-md-2'>E-Mail</th><th class='col-md-2' style='text-align:center;'>Balance</th>"
                . "<th class='col-md-2' style='text-align:center;'>View</th></tr></table>";
        while($row=mysqli_fetch_array($result)){
            
            echo "<table class='table table-striped'><tbody ><tr>"
            . "<td class='col-md-2'>".$row['id']."</td>"
                    . "<td style='text-align:left;'class='col-md-2'>".$row['name']."</td>"
                    
                    . "<td style='text-align:left;'class='col-md-2'>".$row['email']."</td>"
                    . "<td style='text-align:center;'class='col-md-2'>".$row['current_balance']."</td>"
                    ."<td style='text-align:center;'class='col-md-2'><a href='operation.php?id={$row['id']}' class='btn btn-primary'>Action</a></td>"
                    . "</tr></tbody></table>";
        }
        ?>
    </body>
</html>

