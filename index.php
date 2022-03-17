<?php session_start();
$error = "";
?>


<!doctype html>
<html lang="en">
<head>
    <title>Digital Log-book for CITE Department</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/cite_logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<style type="text/css">
		.logo{
			width: 70%;
			height: auto
		}
		h1{
			margin-top: 50px;
            text-align: center;
		}
		.loginpic{
			width: 100%;
			height: auto;
		}
		.jumbotron{
			background:rgba(0, 10, 0, 0.4);
			border-radius: 5px;
		}
		body{
			background-image: url(images/mac.jpg);
			background-repeat: no-repeat;
			background-position: center center;
			background-attachment: fixed;
			background-size: cover;
			margin: 0;
		}
        .error{
            color: #A94442;
            background: #F2DEDE;
            text-align: center;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
        }
	.login-form h2 {
        margin: 0 0 15px;
        color: white;
    }
    .form-control, .login-btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .input-group-addon .fa {
        font-size: 18px;
    }
    .login-btn {
        font-size: 15px;
        font-weight: bold;
    }
    .social-btn .btn {
        border: none;
        margin: 10px 3px 0;
        opacity: 1;
    }
    .social-btn .btn:hover {
        opacity: 0.9;
    }
    .social-btn .btn-primary {
        background: #507cc0;
    }
    .social-btn .btn-info {
        background :#235D3A;
    }
    .social-btn .btn-danger {
        background: #df4930;
    }
    .or-seperator {
        margin-top: 20px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
      h2{
        text-align: center;
    }  
    	footer{
			 width:100%; 
			 position:absolute;
			 left: 0;
			 background-color:black;
			 color: white;
			 padding: 10px;
		}

    a{
        text-decoration: none;
        color: white;
    }

	</style>
</head>

<body>
	<div class="container">
		<header class="row">
			<div class="col-sm-3" align="center">
				 <img class="logo image-responsive" src="images/cite_logo.png">
			</div>
			<div class="col-sm-9">
				<h1>Digital Log-book for CITE Department</h1>
                <br>
			</div>
		</header>
		<section class="row jumbotron">
			<div class="col-sm-6">
				<img class="loginpic" src="images/cart.png">
			</div>
			<div class="col-sm-6"> 
        		<form action="" method="post">
                    <div class="form-group">
                    	<h2>SIGN-IN</h2><br>
<?php
define('BASEPATH', true); //access connection script if you omit this line file will be blank
defined('BASEPATH') OR exit('No direct script access allowed');//prevent direct script access
$host = 'localhost';
$user = 'root'; //replace with your database username
$password = ''; //replace with your database password
$dbname = 'logbook_db'; //replace with your database name
$dsn = '';

try{
    $dsn = 'mysql:host='.$host. ';dbname='.$dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'connection failed: '.$e->getMessage();
}
if(isset($_POST['loginbutton'])){
    // try {
            $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //ensure fields are not empty
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT * FROM tbl_users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $username = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($username === false){
        $error = "Invalid Credentials";?>
        <p class="error"><?php echo $error;?></p>
        <?php
         } else{
         
        //Compare and decrypt passwords.
        $validPassword = password_verify($passwordAttempt, $username['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
             
            $_SESSION['username'] = $username['username'];
            $_SESSION['usertype'] = $username['usertype'];
                if($_SESSION['usertype'] == 'admin'){
                      echo "<script>document.location='admin_dash.php'</script>";
                    }
                elseif($_SESSION['usertype'] == 'teacher'){
                      echo "<script>document.location='users_home.php'</script>";
                    }
                else{
                   $error = "Invalid Credentials";?>
                         <p class="error"><?php echo $error;?></p>
                    <?php
                    }
                     $_SESSION['username'] = $username['username'];
                     $_SESSION['password'] = $username['password'];
                     $_SESSION['first_name'] = $username['first_name'];
                     $_SESSION['last_name'] = $username['last_name'];
                     $_SESSION['email'] = $username['email'];
                     $_SESSION['usertype'] = $username['usertype'];
                     $_SESSION['id'] = $username['id'];
            exit;   
        } 
        else{
            //$validPassword was FALSE. Passwords do not match.
            $error = "Invalid Credentials";?>
             <p class="error"><?php echo $error;?></p>
        <?php
        }
       }
    }
?>
                    	<div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" id="username"required="required">				
                        </div>
                    </div>
            		<div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" id="myPass" required="required">				
                        </div>
                    </div>
                    <script type="text/javascript">
                        function myFunction() {
                          var x = document.getElementById("myPass");
                          if (x.type === "password") {
                            x.type = "text";
                          } else {
                            x.type = "password";
                          }
                        }
                    </script>
                    <div class="form-group" style="color: white;">
                        <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                    </div>
                    <div class="form-group">
                        <div>
                             <input class="btn btn-success form-control" type="submit" name="loginbutton">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>  
	<br><br><br><br>
	<footer style="width: 100%; bottom: 0; height: auto; position: fixed;"> 
			<h6 style="text-align: center;">PHINMA University of Pangasinan &copy; 2020</h6>
	</footer>
</body>

</html>