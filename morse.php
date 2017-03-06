<?php
error_reporting(E_ALL ^ E_NOTICE);
$morsetoletter=array();
$lettertomorse=array(
     "A" => ".-",
     "B" => "-...",
     "C" => "-.-.",
     "D" => "-..",
     "E" => ".",
     "F" => "..-.",
     "G" => "--.",
     "H" => "....",
     "I" => "..",
     "J" => ".---",
     "K" => ".-.",
     "L" => ".-..",
     "M" => "--",
     "N" => "-.",
     "O" => "---",
     "P" => ".--.",
     "Q" => "--.-",
     "R" => ".-.",
     "S" => "...",
     "T" => "-",
     "U" => "..-",
     "V" => "...-",
     "W" => ".--",
     "X" => "-..-",
     "Y" => "-.--",
     "Z" => "--..", 
     "a" => ".-",
     "b" => "-...",
     "c" => "-.-.",
     "d" => "-..",
     "e" => ".",
     "f" => "..-.",
     "g" => "--.",
     "h" => "....",
     "i" => "..",
     "j" => ".---",
     "k" => ".-.",
     "l" => ".-..",
     "m" => "--",
     "n" => "-.",
     "o" => "---",
     "p" => ".--.",
     "q" => "--.-",
     "r" => ".-.",
     "s" => "...",
     "t" => "-",
     "u" => "..-",
     "v" => "...-",
     "w" => ".--",
     "x" => "-..-",
     "y" => "-.--",
     "z" => "--..",
     "1" => ".----",
     "2" => "..---",
     "3" => "...--",
     "4" => "....-",
     "5" => ".....",
     "6" => "-....",
     "7" => "--...",
     "8" => "---..",
     "9" => "----.",
     "0" => "-----",
     " " => "   ",
     "." => ".-.-.-",
     "," => "--..--",
     "EOM" => ".-.-."
     );
 
 if($_POST['enc-sub']){
     
 reset($lettertomorse);
 foreach($lettertomorse as $letter => $code) {
     $morsetoletter[$code]=$letter;
 }
 
 function morse_encode($txt) 
 {
     global $lettertomorse;
 
     $line="";
     for ($i=0;$i<strlen($txt);$i++) 
     {
         $letter=substr($txt,$i,1);
 
         // ignore unknown characters
         if (empty($lettertomorse[$letter])) 
             continue;
 
         $line.=$lettertomorse[$letter]." ";
     }
     return $line;
 }
     $txt = $_POST['enc-message'];
     $line = morse_encode("$txt");
 
 
}
    

if($_POST['dec-sub']){
    
    reset($lettertomorse);
    foreach($lettertomorse as $letter => $code) {
        $morsetoletter[$code]=$letter;
    }
    
   function morse_decode($txt) 
 {
     global $morsetoletter;
 
     $line="";
     $letters=array();
     $letters=explode(" ",$txt);
     foreach ($letters as $letter) 
     {
         // ignore unknown characters
         if (empty($letter)) 
             $line.=" ";
         if (empty($morsetoletter[$letter])) 
             continue;
 
         $line.=$morsetoletter[$letter];
     }
     return $line;
 }
     $txt = $_POST['dec-message'];
     $line = morse_decode("$txt");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Encrypt, Decrypt</title>
		<meta charset="utf-8" />
        <meta name="author" content="Shivam Shukla, Shivam, Shukla">
        <meta name="keywords" content="encrypt, decrypt, free, online, encryption, decryption, morse, code">
        <meta name="description" content="Enrypt text, Online free encryptor, online free decryptor, free encryptor, free decryptor, encrypt, decrypt free, morse code">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/enc.css" />
	</head>
	<body class="subpage" style="background-color: #222;">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo">Theory</a>
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="index.php">Encrypt/Decrypt</a>
						
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Main -->
        <form  method="post" action="morse.php#enc-form" id="enc-form">
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
                        <h2 style="font-weight: 500;">ENCRYPT(Morse code)</h2>
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
                    if($txt == ''){
                        echo "<div style='color:red'>Need some text bruh</div>";
                    }
                    else{
                    echo "<div style='color:white;'>The morse code for text</div>"."<div style='color: green;'>$txt</div>". "<div style='color:white;'>is</div>". "<div id='copyTarget2' style='color:green'>$line</div>"; 
                        
                     
                    }
                }
                ?>
            </div>
                </div>
        </section>
            </form>
        <!--decrypt--> 
        <form action="morse.php#dec-form" method="post" id="dec-form">
            <section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2 style="font-weight: 500;">DECRYPT(Morse code)</h2>
				    </header>
					<hr class="major" />

			 <div class="12u$">
				<textarea name="dec-message" id="message" placeholder="Enter hash key to decrpyt.." rows="3"></textarea>
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
                    if($txt == ''){
                        echo "<div style='color: red;'>Enter some value</div>";
                    }
                    else{
                        echo "<div style='color:white;'>Original text for </div>"."<div style='color: green; font-style: bold'; font-weight: 900;>$txt</div>". "<div style='color:white;'>is</div>"."<div style='color: green; font-style: bold;'>$line</div>"; 
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