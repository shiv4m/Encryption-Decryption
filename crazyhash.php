<?php 
error_reporting(E_NOTICE ^ E_ALL);
//crc8 16 24 32 64
//elf 32
//fcs 16
//has160 ripemd128 160 256 320 sha0 224 256 384 512 tiger tiger 2 128 160 sum 8
//sum16 whirlpool 1 0 xor8 gost

if($_POST['enc-sub']){
    $string = $_POST['enc-message'];
    $hash1 = hash('adler32', $string);
    $hash2 = hash('md2', $string);
    $hash3 = hash('md4', $string);
    $hash4 = md5($string);
    $hash5 = sha1($string);
    $hash6 = crc32($string);
    $hash7 = hash('whirlpool',$string);
    $hash8 = hash('ripemd160',$string);
    $hash9 = hash('gost',$string);
    $hash10 = hash('gost-crypto',$string);
    $hash11 = hash('joaat',$string);
    $hash12 = hash('tiger128,3',$string);
    $hash13 = hash('fnv132',$string);
    $hash14 = hash('haval256,5',$string);

}


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Encrypt, Decrypt</title>
		<meta charset="utf-8" />
        <meta name="author" content="Shivam Shukla, Shivam, Shukla">
        <meta name="keywords" content="encrypt, decrypt, free, online, encryption, decryption, base64">
        <meta name="description" content="Enrypt text, Online free encryptor, online free decryptor, free encryptor, free decryptor, encrypt, decrypt free, base64">
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
        <form  method="post" action="crazyhash.php#enc-form" id="enc-form">
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
                        <h2 style="font-weight: 500;">ENCRYPT -crazymode</h2>
				    </header>
					<hr class="major" />

			 <div class="12u$">
				<textarea name="enc-message" id="message" placeholder="Enter some text to encrypt.." rows="1"></textarea>
             </div>
            <div class="inner flex">
					<div class="flex">
						<article>
							<footer class="align-center">
								<input type="submit" name="enc-sub" class="button special one" value="Encrypt">
							</footer>
						</article>
					</div>
            </div>
            <div class="res" style="color: height: auto; width: auto;">
                <?php
            if($_POST['enc-sub']){
                if($_POST['enc-message'] == ''){
                        echo "<div style='color: red;'>Need some text bruh!</div>";
                    }
                    else{
                        echo "<div style='color: white;'>Adler32 :- </div>"."<div style='color: green'>$hash1</div>"
                            ."<br />"."<div style='color: white;'>md2 :- </div>"."<div style='color: green'>$hash2</div>"."<br />"."<div style='color: white;'>md4 :- </div>"."<div style='color: green'>$hash3</div>"."<br />"."<div style='color: white;'>md5 :- </div>"."<div style='color: green'>$hash4</div>"."<br />"."<div style='color: white;'>sha1 :- </div>"."<div style='color: green'>$hash5</div>"."<br />"."<div style='color: white;'>crc32 :- </div>"."<div style='color: green'>$hash6</div>"."<br />"."<div style='color: white;'>Whirlpool :- </div>"."<div style='color: green'>$hash7</div>"."<br />"."<div style='color: white;'>ripemd160 :- </div>"."<div style='color: green'>$hash8</div>"."<br />"."<div style='color: white;'>gost :- </div>"."<div style='color: green'>$hash9</div>"."<br />"."<div style='color: white;'>gost-crypto :- </div>"."<div style='color: green'>$hash10</div>"."<br />"."<div style='color: white;'>joaat :- </div>"."<div style='color: green'>$hash11</div>"."<br />"."<div style='color: white;'>tiger128,3 :- </div>"."<div style='color: green'>$hash12</div>"."<br />"."<div style='color: white;'>fnv132 :- </div>"."<div style='color: green'>$hash13</div>"."<br />"."<div style='color: white;'>haval256,5 :- </div>"."<div style='color: green'>$hash14</div>";
                    }
            }
                ?>
            </div>
                </div>
        </section>
            </form>
        
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