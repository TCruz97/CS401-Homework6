<!DOCTYPE html>
<html>
<head>
	<link href="ContactStyle.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      
    <title></title>
</head>
<body>

<?php
session_start();

class tester{
    public function saveRequest($email,$phone,$comm,$date){
     $servername = "127.0.0.1";
     $username = "root";
     $password = "Soccer#40";
     $dbname = "sys";
     
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     } 
     
     $sql = "INSERT INTO ContactRequest (email,phone,comm,dateStamp)
     VALUES ('$email', '$phone', '$comm', STR_TO_DATE('$date','%m/%d/%Y'))";
     
     if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }
  
  }
  
?>
        <div class="Navbar">
            <div class="HeaderText">
                <div class="nav">
                    <a href="Home.php" p class="topText">Matt Vetsch Construction</p>
                    </a>
                    <a href="Login.php" p class="NavElement">Sign in</p>
                    </a>
                    <a href="About.php" p class="NavElement">About Us</p>
                    </a>
                    <a href="ContactPage.php" p class="NavElement">Contact</p>
                    </a>
                    <a href="GalleryPage.php" p class="NavElement">Porfolio</p>
                    </a>
                    <a href = "Account.php" p class = "NavElement" id = "Account">Account</a>
                </div>
                <p class="bottomText">
                    LLC
                </p>
            </div>
        </div>
    
        <div class="AboutPicture">
    
        </div>
        <div class="AboutContainer">
            <h1>Contact</h1>
            <div class="AboutUs">
                <p class="info">Email: MattVetschConstruction@gmail.com</p>
                <p class="info">Phone: 541-999-9999</p>
                <p class="info">
                    Mailing Address: 1111 S Temporary St. 97051 Grants Pass, OR.
                </p>
            </div>
<?php
if(isset($_POST['Request']))
{
    $y = new tester();
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $comm = $_POST["comm"];
    $date = $_POST["date"];
    $y -> saveRequest($email,$phone,$comm,$date);
}
?>
            <div class = calander>
                <p class = "info">Schedule free consulting appointment</p>
    <form class = "signUp" action="ContactPage.php" method = "post">
                <div class="container2" id = "container">
                  <label for="email"><b>Email</b></label>
                  <input type="text" id = "user" placeholder="Email" name="email" required>
              
                  <label for="phone"><b>Phone Number></label>
                  <input type="text" id = "phone" placeholder="Phone Number" name="phone" required>
              
                  <label for="comm"><b>Comment</b></label>
                  <input type="text" id = "comment" placeholder="Comment" name="comm" required>

                  <label for="date"><b>Date</b></label>
                  <input type="text" id = "datepicker" placeholder="Date" name="date" required>
              
                  <div class="clearfix">
                    <button type="submit" class="signupbtn" name = "Request">Request Estimate</button>
                  </div>
              </form>
        </div>
        </div>
        <script>
                $(document).ready(function() {
                  $("#datepicker").datepicker();
                });

                document.getElementById("sub").addEventListener("click", function(){
                alert("Thank you for scheduling a consulting appointment!")
                location.href = 'Home.html'
                });
        </script>
        <script>
var log = '<?=$_SESSION['login'];?>';
if(log == "1")
{
    $("#Account").show();
}
else{
    $("#Account").hide();
}
</script>
    </body>  
</html>