
<html>
<title>Sign In/Sign Up</title>
<head>
    <link rel = "stylesheet" type= "text/css" href="signin.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn4.iconfinder.com/data/icons/objects-5/24/Needle-512.png" />
</head>
<body>
<?php
session_start();
class user{
    public function saveUser($email,$pass){
        $host = "localhost";
        $user = "root";
        $password = "root";
        $db = "WebsiteDB";
        
        // Create connection
        $conn = new mysqli($host, $user, $password, $db);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO guest (email,pass)
        VALUES ('$email', '$pass')";
        
        if ($conn->query($sql) === TRUE) {
     }
      else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
     }

public function getUser($email,$pass){
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $db = 'WebsiteDB';
   

// Create connection
$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT email, pass FROM guest where email = '$email' and pass = '$pass'";
$result = $conn->query($sql);

    return $result;
    
 }
}
?>
        <div class="logo">
                <a href="index.html">
                <img border="0" alt="default" src="logo2.png" width="64px" height="64px">
        </div>
           <!-- search bad and other elements -->
            <div class="signIn" style="float:right">   
                    
                 <ul class = "signlist">
                    <!-- <li class = "login" style="float: right">/</li> -->
                    <li class = "login" id="loginButton" style="float:right"><a href="signin.html">Sign-in</a></li>
                  
                
                </ul>
            </div>

            <!-- navagation elements -->
            <div class="navbar">
                <ul class = "navList">
                        
                    <!-- <li class = "navEl" style="float:right"><a href="sale.html">Sale</a></li> -->
                    <li class = "navEl"  style="float:right"><a href="trends.html">Whats Trending</a></li>
                    <li class = "navEl"  style="float:right"><a href="designers.html">Our Designers</a></li>
                    <li class = "navEl"  style="float:right" ><a  href="shop.html">Shop</a></li>
                  
                
                </ul>
            </div>



<?php
if(isset($_POST['up']))
{
    $y = new user();
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $y -> saveUser($email,$pass);
}

if(isset($_POST['in']))
{
    $y = new user();
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $result = $y -> getUser($email,$pass);
    $row = $result->fetch_assoc();
    $e = $row["email"];
    $p = $row["pass"];
    if($email == $e && $pass == $p && $_SESSION != "1"){
        if($email == "t@gmail.com" && $pass == "admin"){
        $_SESSION['login'] = "1"; 
        $_SESSION['admin'] = "1";
        }
        else{
    
        $_SESSION['login'] = "1"; 
        }
        $_SESSION['login'] = "1";
    }
    
    else { 
    
        $_SESSION['login'] = "";
        } 

}


?>

<!-- Sign in -->
<div class = "leftHalf">
        <button onclick="document.getElementById('modal-wrapper1').style.display='block'" id="signIn" >Sign In</button>
</div>
<div id="modal-wrapper1" class="modal">
  
        <form class="modal-content animate" action="signin.php" method="post">
        
              
          <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper1').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <img src="profile.svg" alt="Avatar" class="avatar">
            <h1 style="text-align:center">Sign In</h1>
          </div>
      
          <div class="container">
            <input type="text" placeholder="Enter Username" name="email">
            <input type="password" placeholder="Enter Password" name="pass">        
            <button type="submit" id="upButton" style="margin-left:200px;"name="in">Sign In</button>
          </div>
          
        </form>
        
      </div>
      
      <script>
      // If user clicks anywhere outside of the modal, Modal will close
      
      var modal = document.getElementById('modal-wrapper1');
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>




<!-- Sign-Up -->
<div class = "rightHalf">
    <button onclick="document.getElementById('modal-wrapper2').style.display='block'" id="signUp">Sign Up</button>
</div>
<div id="modal-wrapper2" class="modal">
  
        <form class="modal-content animate" action="signin.php" method = "post">
              
          <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper2').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <img src="profile.svg" alt="Avatar" class="avatar">
            <h1 style="text-align:center">Sign Up</h1>
          </div>
      
          <div class="container">
            <!-- <input type="text" placeholder="Enter First Name" name="fName">
            <input type="text" placeholder="Enter Last Name" name="lName">
            <input type="text" placeholder="Enter Address" name="address">
            <input type="text" placeholder="Enter City" name="city">
            <input type="text" placeholder="Enter State" name="state">
            <input type="text" placeholder="Enter Zip" name="zip"> -->
            <input type="text" placeholder="Enter email" name="email">
            <input type="password" placeholder="Enter Password" name="pass">  
            <input type="password" placeholder="Repeat Password" name="pswd2">     
          
            <button type="submit" id="signButton" style="margin-left:200px;" name="up">Sign Up</button>
            
        </div>

          
        </form>
     
    
        
      </div>
      
      <script>
      // If user clicks anywhere outside of the modal, Modal will close
      
      var modal = document.getElementById('modal-wrapper2');
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>

      <script>
        var log = '<?=$_SESSION['login'];?>';
        if(log == "1")
        {
            console.log("logged in");
        }
    </script>
      
		<footer class="footer-distributed">

                <div class="footer-right">
    
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
    
                </div>
    
                <div class="footer-left">
    
                    <p class="footer-links">
                        <a href="#">Home</a>
                        .
                        <a href="#">Blog</a>
                        .
                        <a href="#">Pricing</a>
                        .
                        <a href="#">About</a>
                        .
                        <a href="#">Faq</a>
                        .
                        <a href="#">Contact</a>
                    </p>
    
                    <p>NicheThreads &copy; 2018</p>
                </div>
    
            </footer>


</body>
</html>
