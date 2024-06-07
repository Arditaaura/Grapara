<?php

    include "config.php";
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $password = $_POST["password"];
        $no_meja = $_POST["no_meja"];

        $sql = "SELECT * FROM customer_service  WHERE nama = '$nama' AND password = '$password'";
        $query = mysqli_query($db, $sql);

        if (mysqli_num_rows($query) > 0)
        {
            $login = mysqli_fetch_assoc($query);
            
            $_SESSION['nama'] = $login['nama'];
            $_SESSION['password'] = $login['password'];
            header("Location: meja_layanan1.php");
           
        }else
        {
            echo "password yang anda masukkan salah!";
        }
    }

else {
    "akses dilarang...";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SIGN IN CS </title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<link href="css/all.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon/lantazula.png">
</head>
<body> 
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
            <img src="images/laga.png" alt="logo" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="signup_cs.php">Sign In</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="pengguna.php">Admin</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="customer.php">Service</a>
                  </li>
                  </li>
               </ul>
            </div>
        </div>
    </nav>
    <div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">SIGN IN CUSTOMER SEVICES
			
			</h1>
		</div>
	</div>
    <div class="container">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active">Sign in</li>
			</ol>
		</div>
</body>
<body>
    <h2>Sign In</h2>
    <form action="signup_cs.php" method="post">
    <ul>
            <li>
                <label for="nama"> Username: </label>
                <input type="text" name="nama" id="nama"
                required>
            </li>
            <li>
                <label for="password"> Password: </label>
                <input type="password" name="password" id="password"
                required>
            </li>
            <li>
                <form method="POST" action=""></form>
                <label for="role"> Masukkan No Meja: </label>
                <select id="role" name="no_meja" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select><br><br>
                <button type="submit" name="submit"> Sign In </button>
            </li>
        </ul>
    </form>
</body>
<footer class="footer">
       
        <div class="container">
            <div class="footer-logo">
			</div>
            <!--foote_bottom_ul_amrc ends here-->
            <p class="copyright text-center">All Rights Reserved. &copy; 2024 <a>GRAPARA</a> Design By : 
				<a>Kelompok 3</a>
            </p>
            
            <!--social_footer_ul ends here-->
        </div>
    </footer>
</html>