<?php
include 'index.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);


    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Please enter a valid amount!")'; 
        echo '</script>';
    }


    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry, Insufficient Balance.")';  
        echo '</script>';
    }
    

    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Please enter a higher amount.')";
         echo "</script>";
     }


    else {
        
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE users set Balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE users set Balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful!');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferto</title>
    <link rel="stylesheet" href="style.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body id="transferto">
        <header>
       <div id="header1">
    <nav>
        <span id="vgsf">VGSF Bank</span>
        <a href="contactus.html"><div id="hm">
            <img src="images/contact.png" alt="" width="25">
            <br><span id="hp">Contact</span>
            </div>
        </a>
        <a href="about.html"><div id="hm">
            <img src="images/abt.png" alt="" width="25">
            <br><span id="hp">About</span>
        </div></a>
        <a href="HomePage.html"> <div id="hm">
            <img src="images/home.png" alt="" width="25">
            <br><span id="hp">Home</span>
        </div> </a>
    </nav>
           </div>
       </header>


	    <div class="container">
            <h2 id="texttransfer">Transaction</h2>
            <?php
                include 'index.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table id="customers">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['Name'] ?></td>
                    <td><?php echo $rows['E-Mail'] ?></td>
                    <td><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div id=labdiv>
        <label id=label>Transfer To:</label><br>
        <select id="sel" name="to" class="form-control" required>
            <option value="" disabled selected>--Select--</option>
            <?php
                include 'index.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            </div>
            <div id="labdiv">
        </select>
        <br>
        <br>
            <label id="label">Amount:</label><br>
            <input id="sel" type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="transferbutton">Transfer</button>
            </div>
        </form>
    </div>

<footer><div id="footer1">
        <p id="foot">&copf; Varshini G</p> 
</div></footer>

</body>
</html>