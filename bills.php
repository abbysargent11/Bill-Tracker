<?php 
    session_start();
    require_once "config.php";
    require_once "signup.php";
    require_once "getpp.php";
    
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bills.css">
    <title>Bill Tracker - Bills</title>
</head>

<body>
    <header>
                <div id="content"></div>
    </header>

    <div class="pp">
    <img src="<?php echo $filepath; ?>">
    </div>
    


    <input type="button" value="Sign Out" id="signOutBtn" class="out">


    <button onclick="myFunction()" class="add">Add Bill</button>
        <form id="form1" method="post" action="addbill.php">
            <label><input type="text" name="name" class="boxes" placeholder="Bill Name" required="required"></label>
            <label><input type="text" name="amount" class="boxes" placeholder="Amount" required="required"></label>
            <input type="submit" class="button" value="Add Bill">
        </form>
    


    <button onclick="myFunction2()" class="add">Delete Bill</button>
    <form id="form2" method="post" action="deletebill.php">
        <label><input type="text" name="nameofdelete" class="boxes" placeholder="Name of Bill" required="required"></label>
        <input type="submit" class="button" value="Delete">
    </form>


    <button onclick="myFunction3()" class="add">Record Payment</button>
    <form id="form3" method="post" action="paybill.php">
        <label><input type="text" name="name" class="boxes" placeholder="Name of Bill" required="required"></label>
        <input type="date" id="date" name="date">
        <input type="submit" class="button" value="Set Payment">
    </form>




    

        <p class="bills"><?php include "getbills.php"; ?> </p>
        <h1 class="paid">Paid</h1>
        <p class="paid2"><?php include "getpaid.php"; ?> </p>

    










        
            <script type="text/javascript">
                var contentDiv = document.getElementById("content");
                var signOutBtn = document.getElementById("signOutBtn");
                var welcome = document.getElementById("welcome");
            
                fetch('verifyAuth.php').then(response => response.json())
                .then(function(data) {
                    console.log(data);
                    if(data.auth) {
                        contentDiv.innerHTML = "Welcome, " + data.username;
                    } else {
                        contentDiv.innerHTML = "Not Authenticated";
                    }
                });
            
                signOutBtn.onclick = function() {
                    fetch('signout.php')
                    .then(function(){
                        window.location.href = "index.php";
                    });
                }

                function myFunction() {
                var x = document.getElementById("form1");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }

                function myFunction2() {
                var x = document.getElementById("form2");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }

                function myFunction3() {
                var x = document.getElementById("form3");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }
            
            </script>

</body>
</html>