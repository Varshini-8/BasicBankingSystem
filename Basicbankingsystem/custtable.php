<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
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
       <?php
         include 'index.php';
         $sql = "SELECT * FROM users";
         $result = mysqli_query($conn,$sql);
        ?>
       
       <div style="font-color:black; font-size:20px;">
        <h2 id="texttransfer">Customers</h2>
        <br>
            <div class="row" >
                <div class="col">
                    <div>
                    <table id="customers">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Balance</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['Name']?></td>
                        <td><?php echo $rows['E-Mail']?></td>
                        <td><?php echo $rows['Balance']?></td>
                       
                    </tr>
                <?php
                    }
                ?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>
         <footer><div id="footer1">
        <p id="foot">&copf; Varshini G</p> 
        </div>
    </footer>
</body>
</html>