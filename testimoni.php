<?php
require_once("koneksi.php");
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>BLOOMWISE | New Brand Local Original from JAKARTA UTARA</title> 
	<meta name="description" content="Distro, cikarang, terlengkap, information, technology, jababeka, baru, murah"/>
	<meta name="keywords" content="Kaos, Murah, Cikarang, Baru, terlengkap, harga, terjangkau" />
	<meta name="author" content="Hakko Bio Richard"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style type="text/css">

.konten
{
    margin-top: 20px;
    margin-left: 350px;
    margin-right: 15px;
	color: black;
	font-family: calibri;
    font-size: 20px;
    font-weight: none;	
}
.komentar
{
    position: center;
    margin-top: 20px;
    margin-left: 340px;
    margin-right: 15px;
	color: gray;
	font-family: calibri;
    font-size: 14px;
    font-weight: none;	
    border: 1px solid ;
    width: 700px;
    height: 260px;
    overflow: scroll;
}
    </style>
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
	<!--start: Header -->
	<header>
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="navbar navbar-inverse sticky-navbar">
          <div class="navbar-inner text-center">
            <div class="nav-center-logo">

              <ul class="nav nav-left pull-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="tentang.php">About</a></li>
                <li><a href="produk.php">Product</a></li>
              </ul>

              <a class="brand logo-center" href="index.php">
                <img src="img/logo2.png" alt="Logo" style="height: 60px;">
              </a>

              <ul class="nav nav-right pull-right">
                <li><a href="testimoni.php">Testimoni</a></li>
                <li><a href="detail.php">Cart</a></li>
                <?php if (isset($_SESSION['username']) && isset($_SESSION['role'])): ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?= htmlspecialchars($_SESSION['username']); ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <?php if ($_SESSION['role'] === 'admin'): ?>
                        <li><a href="admin/tambah.php">Dashboard Admin</a></li>
                        <li><a href="user2/logout.php">Logout</a></li>
                      <?php else: ?>
                        <li><a href="user2/dashboard.php">Profile</a></li>
                        <li><a href="user2/logout.php">Logout</a></li>
                      <?php endif; ?>
                    </ul>
                  </li>
                <?php else: ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="index.html">👨‍💼Admin</a></li>
                      <li><a href="user2/login.php">👤User</a></li>
                    </ul>
                  </li>
                <?php endif; ?>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

	<!--end: Header-->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-pencil ico-white"></i>Testimoni</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
<div id="wrapper">

<!--start: Container -->
<div class="container"> 
	<center><div class="title"><h3>Berikan masukan untuk kami, agar kami bisa melayani Anda lebih baik lagi...</h3></div></center>
	<form id="formku" method="post" action="proses.php">
  <table class="table">
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><input type="text" name="nama" class="form-control" minlength="3" placeholder="Nama Anda" autocomplete="name" required /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><input type="email" name="email" class="form-control" minlength="3" placeholder="Alamat Email" autocomplete="email" required /></td>
    </tr>
    <tr>
      <td>Komentar</td>
      <td>:</td>
      <td><textarea name="komentar" class="form-control" rows="3" placeholder="Komentar Anda" autocomplete="off" required></textarea></td>
    </tr>
    <tr>
      <td>Rating</td>
      <td>:</td>
      <td>
        <div class="rating">
          <span class="fa-regular fa-star" data-rating="1"></span>
          <span class="fa-regular fa-star" data-rating="2"></span>
          <span class="fa-regular fa-star" data-rating="3"></span>
          <span class="fa-regular fa-star" data-rating="4"></span>
          <span class="fa-regular fa-star" data-rating="5"></span>
          <input type="hidden" name="rating" class="rating-value" value="0">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="text-center">
        <input class="btn btn-primary" type="submit" value="Kirim"/>
      </td>
    </tr>
  </table>
</form>
</div>

<div class="komentar" style="margin: 20px auto; max-width: 800px; color: gray; font-family: Calibri, sans-serif; font-size: 14px; border: 1px solid #ccc; border-radius: 8px; padding: 20px; height: 260px; overflow-y: scroll; background: #f9f9f9;">
	<?php
	$fp = fopen("guestbook.txt","r");
	echo "<table class='table'>";
	while ($isi = fgets($fp,250)) {
		$pisah = explode("|",$isi);
		if (isset($pisah[0]) && isset($pisah[1])) {
			echo "<tr><td><strong>$pisah[0]</strong> ($pisah[1])</td></tr>";
		}
		if (isset($pisah[2])) {
			echo "<tr><td><em>$pisah[2]</em> bilang:</td></tr>";
		}
		if (isset($pisah[4])) {
			echo "<tr><td><p>$pisah[4]</p></td></tr>";
		}
		if (isset($pisah[5])) {
			$stars = intval($pisah[5]);
			echo "<tr><td>Rating: ";
			for ($i = 0; $i < 5; $i++) {
				echo ($i < $stars) ? "<i class='fa-solid fa-star' style='color: gold;'></i>" : "<i class='fa-regular fa-star'></i>";
			}
			echo "</td></tr>";
		}
		echo "<tr><td><hr></td></tr>";
		
		if (isset($pisah[5]) && $pisah[5] !== '') {
			$stars = intval($pisah[5]);
			echo "<tr><td>Rating: ";
			for ($i = 0; $i < 5; $i++) {
				echo ($i < $stars) ? "<i class='fa-solid fa-star' style='color: gold;'></i>" : "<i class='fa-regular fa-star'></i>";
			}
			echo "</td></tr>";
		}
		
		}
		echo "<tr><td><hr></td></tr>";
	
	echo "</table>";
	?>
</div>
</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/logo-footer-menu.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">Flanel</a></li>

							<li><a href="#">T-shirt</a></li>

							<li><a href="#">Hoodie</a></li>

							<li><a href="#">Jacket</a></li>
							
							<li><a href="#">Pants & Jeans</a></li>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">
					
				<h3>BLOOMWISE</h3>
					<p> sebuah merek fashion yang berfokus pada desain kontemporer dengan pendekatan estetika yang kuat. Merek ini dikenal karena koleksi pakaian yang menonjolkan elemen desain yang unik dan berani. Bloomwise Project sering kali menggabungkan elemen-elemen grafis yang mencolok dan desain yang edgy dalam setiap koleksinya.</p>
						
				</div>
				<!-- end: About -->

				<!-- start: ALAMAT -->
				
				<div class="span3">	
					<h3>ALAMAT</h3>
                    Email : <a href="mailto:bloomwiseco@gmail.com">bloomwiseco@gmail.com</a><br />
					Instagran : <a href="https://www.instagram.com/bloomwise_/">@bloomwise_</a>
					<iframe 
       							 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4512678850456!2d106.93942391476906!3d-6.204133795509177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b66e96093b1%3A0x8c8802b73d61463d!2sJl.%20Rorotan%202%2C%20RT.4%2FRW.4%2C%20Rorotan%2C%20Kec.%20Cilincing%2C%20Kota%20Jkt%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2014140!5e0!3m2!1sen!2sid!4v1718890000000!5m2!1sen!2sid" 
       							 width="100%" 
       							 height="150" 
        						 style="border:0;" 
        						 allowfullscreen="" 
       							 loading="lazy" 
    						    referrerpolicy="no-referrer-when-downgrade">
    						</iframe>
				</div>
				<!-- end: ALAMAT -->

				<div class="span6">
				
					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
									<div class="social-info-front social-twitter">
											<a href="https://twitter.com/BloomwiseStore"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="https://twitter.com/BloomwiseStore"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->
				
					<!-- start: Newsletter -->
				<!--	<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form> -->
					<!-- end: Newsletter -->
				
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				Copyright &copy; <a href="https://www.instagram.com/bloomwise_/">BLOOMWISE PROJECT</a> SInce 2020
			</p>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

	<!-- start: Wa flOAT -->
	<a href="https://wa.me/6285930411943" class="wa-float" target="_blank">
  <img src="img/wa-icon.png" alt="Chat WhatsApp">
</a>
<!-- end: wA FLoat -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script src="js/custom.js"></script>

<script>
		document.addEventListener("DOMContentLoaded", function () {
			const navbar = document.querySelector(".sticky-navbar");
			window.addEventListener("scroll", function () {
				if (window.scrollY > 30) {
					navbar.classList.add("scrolled");
				} else {
					navbar.classList.remove("scrolled");
				}
			});
		});
	</script>
<script>
	$(document).ready(function(){
		let $stars = $('.rating span');
		$stars.on('click', function() {
			let rating = $(this).data('rating');
			$('.rating-value').val(rating);
			$stars.removeClass('fa-solid').addClass('fa-regular');
			$stars.each(function(index){
				if(index < rating) {
					$(this).removeClass('fa-regular').addClass('fa-solid');
				}
			});
		});
	});
</script>
<!-- end: Java Script -->

</body>
</html>