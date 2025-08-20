<?php require_once("cart.php"); ?>
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
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
	<!--start: Header -->
	<header>
		
		<!--start: Container -->
	<div class="container">
			
			<!--start: Row -->
			<div class="row">
					
				<!--start: Logo -->
				<div class="logo span3">
						
				<a class="brand" href="index.php"><img src="img/logo2.png" alt="Logo"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span9">
					
				<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="navbar navbar-inverse sticky-navbar">
    <div class="navbar-inner">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse collapse">
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="tentang.php">About</a></li>
                <li><a href="produk.php">Product</a></li>
                <li><a href="testimoni.php">Testimoni</a></li>
                <li><a href="detail.php">Cart</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "Login";
                        }
                        ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li><a href="profile.php">Profil</a></li>
                            <li><a href="user2/logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a href="admin/index.html">Admin</a></li>
                            <li><a href="user2/login.php">User</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

					
				</div>	
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-usd ico-white"></i>Checkout Keranjang</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><h3>Form Checkout</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
                <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int)$_GET['total']); ?>,-</div> 
    <form id="formku" action="selesai.php" method="post">
    <table class="table table-condensed">
    <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
    <tr>
        <td><label for="nm_usr">Nama</label></td>
        <td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" size="200" /></td>
      </tr>
      <tr>
        <td><label for="log_usr">Username</label></td>
        <td><input name="log_usr" type="text" class="required" minlength="6" id="log_usr" /></td>
      </tr>
      <tr>
        <td><label for="pas_usr">Password</label></td>
        <td><input name="pas_usr" type="password" class="required" minlength="6" id="pas_usr" /></td>
      </tr>
      <tr>
        <td><label for="email_usr">Email</label></td>
        <td><input name="email_usr" type="text" class="email required" id="email_usr" /></td>
      </tr>
      <tr>
        <td><label for="almt_usr">Alamat</label></td>
        <td><input name="almt_usr" type="text" class="required" id="almt_usr" /></td>
      </tr>
      <tr>
        <td><label for="kp_usr">Kode Pos</label></td>
        <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" /></td>
      </tr>
      <tr>
        <td><label for="kota_usr">Kota</label></td>
        <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" /></td>
      </tr>
      <tr>
        <td><label for="tlp">No telepon</label></td>
        <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" /></td>
      </tr>
      <tr>
	  <td><label for="rek">No Rekening</label></td>
        <td><input name="rek" type="text" class="required number" minlength="12" id="rek" /></td>
      </tr>
      <tr>
        <td><label for="nmrek">Nama Rekening</label></td>
        <td><input name="nmrek" type="text" class="required" minlength="6" id="nmrek" /></td>
      </tr>
      <tr>
        <td><label for="bank">Bank</label></td>
        <td><select name="bank" class="required">
        <option></option>
        <option value="Mandiri">Mandiri</option>
        <option value="BNI">BNI</option>
        <option value="CIMB">CIMB</option>
        <option value="BCA">BCA</option>
        <option value="Bank Jabar">Bank Jabar</option>
        <option value="Danamon">Danamon</option>
        <option value="BRI">BRI</option>
        <option value="Permata">Permata</option>
        </select>
        </td>
      </tr>
      <tr>
      <td></td>
		<td>
        	<div><label class="label">Pembayaran Dengan Q-RIS</label></div>
			<img src="img/barcode.jpg" alt=""/>
			<div id="box1"></div>
			</br>
        </td>
      </tr>
      <tr>
      <td></td>
        <td><input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>
</td>
        </tr>
    </table>
    </form>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
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

							<li><a href="#">T-Shirt</a></li>

							<li><a href="#">hoodie</a></li>

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
									<a href="https://www.twitter.com/bloomwise_/"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
										<a href="https://www.twitter.com/bloomwise_/"></a>
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
				Copyright &copy; <a href="https://www.instagram.com/bloomwise_/">BLOOMWISE PROJECT</a> Sience 2020
			</p>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
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
<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
<script def src="js/custom.js"></script>
<!-- end: Java Script -->

<script>
function kirimWhatsapp() {
    const nama = document.getElementById("nm_usr").value;
    const username = document.getElementById("log_usr").value;
    const email = document.getElementById("email_usr").value;
    const alamat = document.getElementById("almt_usr").value;
    const kota = document.getElementById("kota_usr").value;
    const kodepos = document.getElementById("kp_usr").value;
    const telepon = document.getElementById("tlp").value;
    const bank = document.querySelector("select[name='bank']").value;
    const rek = document.getElementById("rek").value;
    const nmrek = document.getElementById("nmrek").value;
    const total = document.querySelector("input[name='total']").value;

    const pesan = 
`Halo Admin BLOOMWISE 👋
Saya ingin melakukan pemesanan dengan detail berikut:

📦 Nama: ${nama}
👤 Username: ${username}
📧 Email: ${email}
🏠 Alamat: ${alamat}, ${kota}, ${kodepos}
📞 Telepon: ${telepon}

🏦 Bank: ${bank}
🔢 No Rekening: ${rek}
👤 Nama Rekening: ${nmrek}

💵 Total Belanja: Rp ${parseInt(total).toLocaleString('id-ID')}

Mohon konfirmasi lanjut ya, terima kasih! 🙏`;

    const url = "https://wa.me/6285930411943?text=" + encodeURIComponent(pesan);
    window.open(url, '_blank');
}
</script>

</body>
</html>