<!--
############################################################
## Coded By Manfred Aretz                                 ##
## Date: 12 November 2016                                 ##
############################################################
-->
<?php
error_reporting(0);
$playertag = $_GET['tag'];
$token = "insert your api-key";
$url = "https://api.clashofclans.com/v1/players/" . urlencode($playertag);
$ch = curl_init($url);
$headr = array();
$headr[] = "Accept: application/json";
$headr[] = "Authorization: Bearer ".$token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$res = curl_exec($ch);
$data = json_decode($res, true);
curl_close($ch);
if (isset($data["reason"])) {
  $errormsg = true;
} else if (empty($playertag)) {
	header('location: /');
}
$arch = $data["achievements"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $data["name"]; ?> | Official site</title>
	<meta content='Offical Website Clan <?php echo $data["name"]; ?>' name='description'/>
	<meta content='Offical Website Clan <?php echo $data["name"]; ?>' name='keywords'/>
	<meta content='Manfred Aretz' name='author'/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="codex/cocmemberpro.css" type="text/css"/>
    <link rel="stylesheet" href="MenuDateien/mbcsmbbqc1.css" type="text/css" />
 <link rel="shortcut icon" href="<?php echo $data["badgeUrls"]["medium"]; ?>">
</head>
<body>
    <link rel="stylesheet" href="MenuDateien/mbcsmbbqc1.css" type="text/css" />
 <link rel="shortcut icon" href="<?php echo $data["badgeUrls"]["medium"]; ?>">
<!-- Start Website Tutor Cookie Plugin -->
<script type="text/javascript">
  window.cookieconsent_options = {
  message: 'Diese Website nutzt Cookies, um bestmögliche Funktionalität bieten zu können.',
  dismiss: 'Ok, verstanden',
  theme: 'light-floating'
 };
</script>
<script type="text/javascript" src="//s3.amazonaws.com/valao-cloud/cookie-hinweis/script.js"></script>
<!-- Ende Website Tutor Cookie Plugin --></head>
<body>
<center><img src="banner/banner.png" width="436" height="245" />
<br /><br />
<div id="mbbqc1ebul_wrapper" style="max-width: auto;">
  <ul id="mbbqc1ebul_table" class="mbbqc1ebul_menulist css_menu">
  <li><div class="buttonbg" style="width: 54px;"><a href="index.php">Home</a></div></li>
  <li><div class="buttonbg"><a href="mitglieder.php">Mitglieder</a></div></li>
  <li><div class="arrow buttonbg" style="width: 97px;"><a class="button_3">Statistiken</a></div>
    <ul>
    <li><a title="">Kriegsstatisk</a></li>
    <li><a title="">Kriegsprotokoll</a></li>
    </ul></li>
  <li><div class="buttonbg" style="width: 83px;"><a href="gbook.php">Gästebuch</a></div></li>
    <li><div class="buttonbg" style="width: 57px;"><a href="/forum" target="_blank">Forum</a></div></li>
  </ul>
</div></center>
<?php
  if (isset($errormsg)) {
    header('location: /');
    exit;
  }
?>
<center><div class="container-fluid">
<br><br><br>
<div class="row">
  <div class="col-md-3">
    <div class="thumbnail">
      <img src="<?php echo $data["league"]["iconUrls"]["medium"]; ?>" alt="Profil">
      <div class="caption">
      <center><h4>Name : <?php echo $data["name"]; ?> </h4></center>
      <center>Rang : <?php echo $data["role"]; ?></center>
      <center>Tag : <?php echo $data["tag"]; ?></center>
      <center>RH : <?php echo $data["townHallLevel"]; ?></center>
      <center>Exp Level : <?php echo $data["expLevel"]; ?></center>
      <center>Trophäen : <?php echo $data["trophies"]; ?></center>
      <center>Bestes Ergebnis : <?php echo $data["bestTrophies"]; ?></center>
      <center>Gewonnene Kriegssterne : <?php echo $data["warStars"]; ?></center>
      <center>Gewonnene Angriffe : <?php echo $data["attackWins"]; ?></center>
      <center>Gewonnene Verteidigungen : <?php echo $data["defenseWins"]; ?></center>
      <center>Gespendete Truppen : <?php echo $data["donations"]; ?></center>
      <center>Truppen erhalten : <?php echo $data["donationsReceived"]; ?></center>
      <center>Clan Name : <?php echo $data["clan"]["name"]; ?></center>
      </div>
    </div>
</div>
<div class="col-md-9">
  <ul class="list-group">
  <li class="list-group-item">
     Achievements
  </li>
  <?php
  foreach ($arch as $archivment) {
  	$codex = $archivment["stars"];
  ?>
  <li class="list-group-item">
    <?php echo $archivment["name"]?>.
    <br>
    	<?php
    	error_reporting(0); 
    	if ($codex == "1") {
    		$star = '<i span style="font-size:2em;" class="glyphicon glyphicon-star"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star-empty"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star-empty"></i>';
    	} else if ($codex == "2") {
    		$star = '<i span style="font-size:2em;" class="glyphicon glyphicon-star"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star-empty"></i>';
    	} else if ($codex == "3") {
    		$star = '<i span style="font-size:2em;" class="glyphicon glyphicon-star"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star"></i>';
    	} else {
    		$star = '<i span style="font-size:2em;" class="glyphicon glyphicon-star-empty"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star-empty"></i> <i span style="font-size:2em;" class="glyphicon glyphicon-star-empty"></i>';
    	}
    	echo $star;
    	?>
    	<br>
    	<?php echo $archivment["info"]?>.
    <br>
  </li>
  <?php
  }
?>
</ul>
</div>
</div>
</div>
<br><br><br><br><br><br><br>
<script type="text/javascript">
var datum = new Date();
var zeit = datum.getHours();
if (3 <= zeit && zeit < 6 ) {
document.body.style.backgroundImage = 'url("../background_images/3-6-uhr.png")';
}
else if (6 <= zeit && zeit < 9) {
document.body.style.backgroundImage = 'url("../background_images/6-9-uhr.png")';
}
else if (9 <= zeit && zeit < 15) {
document.body.style.backgroundImage = 'url("../background_images/9-15-uhr.png")';
}
else if (15 <= zeit && zeit < 19) {
document.body.style.backgroundImage = 'url("../background_images/15-19-uhr.png")';
}
else if (19 <= zeit && zeit < 22) {
document.body.style.backgroundImage = 'url("../background_images/19-22-uhr.png")';
}
else {
document.body.style.backgroundImage = 'url("../background_images/22-3-uhr.png")';
}
</script>
</body>
</html>