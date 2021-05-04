<html>
    <head>
        <title>user info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar  navbar-fixed-top" style="background-color: skyblue;">
        <div>
            <a href="index.php" style="color:black;border-bottom:2px black solid; margin-left: 50%;padding:10px;"><span class="glyphicon glyphicon-home">Home</span></a>
        </div>
    </nav><br><br><br>
<?php
$con= mysqli_connect('localhost', 'root', '', 'banking_system');

$select="SELECT * FROM customer WHERE id='".$_GET['id']."'";
$result=mysqli_query($con,$select);
$row=mysqli_fetch_array($result);
echo "<table class='table' style='text-align:center;background-color:orange;'><tr><th>Name</th><th style='text-align:center;'>E-Mail</th><th style='text-align:center;'>Balance</th></tr></table>";
echo "<table class='table table-striped'><tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['current_balance']."</td></tr></table>";

?>
    
    <br><br><br><div class="section" style="text-align:center;"><h1>Make Transaction</h1></div>
    
    <?php
 $con= mysqli_connect('localhost', 'root', '', 'banking_system');
 $id=$_GET['id'];
$select="SELECT * FROM customer WHERE id!=$id";
$resul=mysqli_query($con,$select);
echo "<form method='post' action='' style='text-align:center;background: linear-gradient(to bottom, #ffffff 0%, #0033cc 100%);'><h3>Transfer To</h3><br><div class='form-group' ><select name='to' style='width:60%;height:25px;border-color:black;' required>";
echo "<option value='' selected disabled hidden>select</option>";
while($arr=mysqli_fetch_array($resul)){
    echo "<option name='roto' value=".$arr['id'].">".$arr['name']."</option>";
}
echo '</select></div><br>';
echo "<h3>Enter Amount</h3><br>";
echo "<input type='number' name='amt' style='width:60%; border-color:black;' required></br></br></br>";
echo "<button style='' class='btn btn-success' name='submit'>Submit</button></form>";
    ?>
    <?php
    if(isset($_POST['submit'])){
        $id=$_GET['id'];
        $amount=$_POST['amt'];
        $transfer=$_POST['to'];
        $t1="SELECT * FROM customer WHERE id='$id' ";
        $r1=mysqli_query($con,$t1);
        $arr1=mysqli_fetch_array($r1);
        $n1=$arr1['name'];
       
        $t2="SELECT * FROM customer WHERE id=$transfer";
        $r2=mysqli_query($con,$t2);
        $arr2=mysqli_fetch_array($r2);
        $n2=$arr2['name'];
        if($amount<=0){
           echo '<script type="text/javascript">';
         echo 'alert("ZERO BALANCE!!")';
         echo '</script>';
        }
        elseif ($amount>$arr1['current_balance']) {
         echo '<script type="text/javascript">';
         echo 'alert("NOT ENOUGH MONEY TO TRANSACT")';
         echo '</script>';
    }
        elseif($amount<=$arr1['current_balance']){
            $newbalance=$arr1['current_balance'] - $amount;
            $addmoney=$arr2['current_balance'] + $amount;
            $final="UPDATE customer SET current_balance='$newbalance' WHERE id='$id'";
            $f1=mysqli_query($con,$final);
            $final1="UPDATE customer SET current_balance='$addmoney' WHERE id='$transfer'";
            $f2=mysqli_query($con,$final1);
            $th="INSERT INTO transactions (sender,receiver,amount) VALUES ('$n1','$n2','$amount')";
            $ex=mysqli_query($con,$th);
              echo '<script type="text/javascript">';
         echo 'alert("Transaction Successfull")';
         echo '</script>';
         header ('location:transfer_detail.php');
        }
    }
    
    ?>
</body>
</html>