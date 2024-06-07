<?php
    include('config.php');
    if(isset($_POST['daftar'])){
        $no_telepon = $_POST['no_telepon'];
        $sql = "INSERT INTO customer (no_telepon) VALUES ('$no_telepon')";
        $query = mysqli_query($db, $sql);

        $id_customer = mysqli_insert_id($db);

        $sql2 = "INSERT INTO antrian (id_customer) VALUES ('$id_customer')";
        $query2 = mysqli_query($db, $sql2);

        $sql3 = "SELECT no_antrian FROM antrian WHERE id_customer = '$id_customer'";
        $query3 = mysqli_query($db, $sql3);
        $grapara1 = $query3->fetch_assoc();
        $antrian = $grapara1['no_antrian'];

        $sql4 = "UPDATE customer SET no_antrian ='$antrian' WHERE id_customer = '$id_customer'";
        $query4 = mysqli_query($db, $sql4);
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>LAYANAN </title>
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
                     <a class="nav-link" href="signup_cs.php">Sign In</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="pengguna.php">Admin</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="customer.php">Service</a>
                  </li>
                  </li>
               </ul>
            </div>
        </div>
    </nav>
    <div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">LAYANAN CUSTOMER SEVICES
			
			</h1>
		</div>
	</div>
    <div class="container">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active">Layanan</li>
			</ol>
		</div>
</body>
<body>
    <h1>Customer Form</h1>
    <!-- Formulir HTML -->
    <form action="customer.php" method = "POST">
        <label for="no_telepon">No Telepon:</label><br>
        <input type="text" name="no_telepon" required>
        <br><br>

        <button type="submit" name ="daftar">daftar</button>
        <?php
            if(isset($_POST['daftar'])){
                echo"nomor antrian: ".$antrian;
            }
        ?>
    </form>
    <button><a href = "Index.php">kembali</a></button>
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
