<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="transaction">
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
	<div style="font-color:black; font-size:20px;">
        <h2 id="texttransfer">Transaction History</h2>

       <br>
       <div>
    <table id="customers">
        <thead>
            <tr>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'index.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td><?php echo $rows['Sender']; ?></td>
            <td><?php echo $rows['Receiver']; ?></td>
            <td><?php echo $rows['Amount']; ?> </td>

        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<footer><div id="footer1">
        <p id="foot">&copf; Varshini G</p> 
        </div>
</footer>
</body>
</html>
