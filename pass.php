<?php
error_reporting(E_ALL ^ E_NOTICE);
if($_POST['enc-sub']){
 $length = 10;
    $randomBytes = openssl_random_pseudo_bytes($length);
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $hash = '';
    for ($i = 0; $i < $length; $i++)
        $hash .= $characters[ord($randomBytes[$i]) % $charactersLength];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Encrypt, Decrypt</title>
		<meta charset="utf-8" />
        <meta name="author" content="Shivam Shukla, Shivam, Shukla">
        <meta name="keywords" content="encrypt, decrypt, free, online, encryption, decryption, md5">
        <meta name="description" content="Enrypt text, Online free encryptor, online free decryptor, free encryptor, free password generator, generate, free, passoword">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/enc.css" />
	</head>
	<body class="subpage" style="background-color: #222;">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo">ANM</a>
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="index.php">Encrypt/Decrypt</a>
						
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Main -->
        <form  method="post" action="pass.php" id="enc-form">
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
                        <ul>
                            <li><a href="encrypt.php">md5</a></li>
                            <li><a href="morse.php">morse code</a></li>
                            <li><a href="base64.php">base64</a></li>
                            <li><a href="crazyhash.php">Crazyhash</a></li>
                           <li><a href="pass.php">Password Generator</a></li>
                        </ul>
                        
						<h2 style="font-weight: 500;">Password Generator</h2>
				    </header>
					<hr class="major" />

            <div class="inner flex">
					<div class="flex">
						<article>
							<footer class="align-center">
								<input type="submit" name="enc-sub" class="button special one" value="Generate">
							</footer>
						</article>
					</div>
            </div>
            <div class="res" style="color: black; position: absolute;">
                <?php 
                if($_POST['enc-sub']){
                    echo "<div style='color:white;'>Random Password : </div>". "<div id='copyTarget2' style='color:green'>$hash</div>"; 
                        
                    
                }
                ?>
            </div>
                </div>
        </section>
            </form>
        <!--decrypt--> 
        
	<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
							&copy;<a href="index.html">Encryptor/Decryptor</a>.<br />
                            <span class="au-th" style="font-size: 20px; font-weight: 900;">Made by : Shivam Shukla</span>
						</div>
						<ul class="icons">
							<li><a href="http://viid.me/qetR37" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="http://viid.me/qetRgV" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="http://viid.me/qetkof" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
						</ul>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script src="assets/js/copy.js"></script>

	</body>
<!--
    <script type="text/javascript">
            $('.res').addClass('.don-dis');
        
            function disp(){
                $('.res').removeClass('.don-dis');
                $('.res').addClass('.dis');
                
            }
        
    
    </script>
-->
</html>