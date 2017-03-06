<?php
error_reporting(E_ALL ^ E_NOTICE);
require('connect.php');
$pdoConnect = new PDO("mysql:host=localhost;dbname=bc","root","");
$pdoQuery = "SELECT * FROM hashes";
$pdoRow = $pdoConnect->query($pdoQuery);
$pdoResult = $pdoRow->rowCount();
$max = ($pdoResult);
if($_POST['enc-sub']){
    $string = $_POST['enc-message'];
    if($string == ''){
        echo "";
    }
    
    else{
    $hash = md5($string);
    
    $sql = "INSERT INTO hashes (id, word, hash)
    VALUES(NULL, '$string', '$hash')";
    
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
}
    

if($_POST['dec-sub']){
    $string = $_POST['dec-message'];
    $sql = "SELECT word FROM hashes WHERE hash='$string'";
$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $decdata = $row["word"];
            $status = 1;
        }
    } else {
        echo "";
    }

}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Encrypt, Decrypt</title>
		<meta charset="utf-8" />
        <meta name="author" content="Shivam Shukla, Shivam, Shukla">
        <meta name="keywords" content="encrypt, decrypt, free, online, encryption, decryption, md5">
        <meta name="description" content="Enrypt text, Online free encryptor, online free decryptor, free encryptor, free decryptor, encrypt, decrypt free, md5 decryptor encryptor">
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
        <form  method="post" action="encrypt.php#enc-form" id="enc-form">
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
                        <p><?php echo "Number of words in our database : $max";?></p>
						<h2 style="font-weight: 500;">ENCRYPT(md5)</h2>
				    </header>
					<hr class="major" />

			 <div class="12u$">
				<textarea name="enc-message" id="message" placeholder="Enter some text to encrypt.." rows="3"></textarea>
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
            <div class="res" style="color: black; position: absolute;">
                <?php 
                if($_POST['enc-sub']){
                    if($string == ''){
                        echo "<div style='color:red'>Need some text bruh</div>";
                    }
                    else{
                    echo "<div style='color:white;'>The hash key for text</div>"."<div style='color: green;'>$string</div>". "<div style='color:white;'>is</div>". "<div id='copyTarget2' style='color:green'>$hash</div>"; 
                        
                    
                    }
                }
                ?>
            </div>
                </div>
        </section>
            </form>
        <!--decrypt--> 
        <form action="encrypt.php#dec-form" method="post" id="dec-form">
            <section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2 style="font-weight: 500;">DECRYPT(md5)</h2>
				    </header>
					<hr class="major" />

			 <div class="12u$">
				<textarea name="dec-message" id="message" placeholder="Enter hash key to decrpt.." rows="3"></textarea>
             </div>
            <div class="inner flex">
					<div class="flex">
						<article>
							<footer class="align-center">
								<input type="submit" name="dec-sub" class="button special one" value="Decrypt">
							</footer>
						</article>
					</div>
            </div>
            <div class="res" style="color: black; position: absolute;">
                    <?php 
                if($_POST['dec-sub']){
                    if($status == 1){
                    echo "<div style='color:white;'>Original text for </div>"."<div style='color: green; font-style: bold'; font-weight: 900;>$string</div>". "<div style='color:white;'>is</div>"."<div style='color: green; font-style: bold;'>$decdata</div>"; 
                        
                    
                    }
                    else{
                        echo "<div style='color:red; text-align: center; padding-top: 20px;'>No word found. Make sure the hash is generated on this website.</div>";   
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