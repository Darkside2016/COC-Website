<!--
############################################################
## Coded By Manfred Aretz                                 ##
## Date: 12 November 2016                                 ##
############################################################
-->
<?php
$clantag = "insert your clan-tag";
$token = "insert your api-key";
$url = "https://api.clashofclans.com/v1/clans/" . urlencode($clantag);
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
}
$members = $data["memberList"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $data["name"]; ?> | Official site</title>
	<meta content='Offical Website Clan <?php echo $data["name"]; ?>' name='description'/>
	<meta content='Offical Website Clan <?php echo $data["name"]; ?>' name='keywords'/>
	<meta content='Manfred Aretz' name='author'/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/clan.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<link rel="stylesheet" href="codex/coc.css" type="text/css"/>
	<link rel="stylesheet" href="css/warlog.css" type="text/css"/>    
    <link rel="stylesheet" href="MenuDateien/mbcsmbbqc1.css" type="text/css" />
 <link rel="shortcut icon" href="<?php echo $data["badgeUrls"]["medium"]; ?>">
</head>
<body>
<center><img src="banner/banner.png" width="436" height="245" />
<br /><br />
<div id="mbbqc1ebul_wrapper" style="max-width: auto;">
  <ul id="mbbqc1ebul_table" class="mbbqc1ebul_menulist css_menu">
  <li><div class="buttonbg" style="width: 54px;"><a href="index.php">Home</a></div></li>
  <li><div class="buttonbg"><a href="mitglieder.php">Mitglieder</a></div></li>
  <li><div class="arrow buttonbg"><a class="button_3">Statistik</a></div>
    <ul>
    <li class="first_item last_item"><a href="kriegslog.php" title="">Kriegslog</a></li>
    </ul></li>
  <li><div class="buttonbg" style="width: 83px;"><a href="gbook.php">GÃ¤stebuch</a></div></li>
    <li><div class="buttonbg" style="width: 57px;"><a href="/forum" target="_blank">Forum</a></div></li>
  </ul>
</div></center>
<br /><br />
<center><div class="StatusBackground">
   <table>
    <tbody>
      <tr>
        <td><img src="images/statistik.png"/>
        </td>
        <td><img src="images/ligneverticale.jpg"/>
        </td>
        <td><img src="images/siege.png"><br><b><?php echo $data["warWins"]; ?></b></td>
        <td><img src="images/ligneverticale.jpg"/>
        </td>
        <td><img src="images/niederlagen.png"><br><b><?php echo $data["warLosses"]; ?></b></td>
        <td><img src="images/ligneverticale.jpg"/>
        </td>
        <td><img src="images/unentschieden.png"><br><b><?php echo $data["warTies"]; ?></b></td>
        <td><img src="images/ligneverticale.jpg"/>
        </td>
	<?php $sieg = $data["warWins"];
	$verloren = $data["warLosses"];
	$unentschieden = $data["warTies"];
	$ergebnis = $sieg + $verloren + $unentschieden;
	?>
	<td><img src="images/insgesamt.png"><br><b><?php echo $ergebnis?></b></td>
        <td><img src="images/ligneverticale.jpg"/>
        </td>
        <td><img src="images/siegesserie.png"><br><b><?php echo $data["warWinStreak"]; ?></b></td>

</tr>
</tbody>
</table>
</div>
<br />
<?php
$clantag = "insert your clan-tag";
$token = "insert your api-key";
$url = "https://api.clashofclans.com/v1/clans/" . urlencode($clantag)."/warlog?limit=100";
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
}
$dt = $data["items"];
        date_default_timezone_set("Europe/Berlin");
        $datum = date("d.m.Y",$warlog["endTime"]);
        $uhrzeit = date("H:i",$time);
?>
  <?php
  foreach ($dt as $warlog) {
        $log = $warlog["result"];
  ?>
    <?php
    error_reporting(0);
    if ($log == "win") {
           $log = '<div class="WinBackground">';
    } else if ($log == "lose") {
           $log = '<div class="LoseBackground">';       
    }
    echo $log;
    ?>
<center>
<table>
<tbody>
<tr>
<td><span><?php echo $datum; ?></span></td>
<td><img src="images/experience.gif"><span><b><?php echo $warlog["clan"]["expEarned"]; ?></b></span></td>
<td style="width:160px;text-align: right;border:none"><span style="text-transform :uppercase;font-size:20px;color: white; text-shadow:2px 2px #000;"><b><?php echo $warlog["clan"]["name"]; ?></b></span><br><span style="padding-right:15px;"><b><?php echo $warlog["clan"]["destructionPercentage"]; ?> %</b></span><img src="images/star_white_256.png" style="width: 20px; height: 20px; vertical-align:bottom;margin:0px;padding:0px;"><span style="font-size:18px;color: white; text-shadow:2px 2px #000;"><b><?php echo $warlog["clan"]["stars"]; ?></b></span></td>
<td style="width:100px;text-align: center;border:none;" align="center"><img src="<?php echo $warlog["clan"]["badgeUrls"]["medium"]; ?>" style="width:50px;height:60px;margin:0px;padding:0px;"/> <img src="<?php echo $warlog["opponent"]["badgeUrls"]["medium"]; ?>" style="width:50px;height:60px;margin:0px;padding:0px;"><br><span style="font-size:18px;color: yellow; text-shadow:2px 2px #000;"><b><?php echo $warlog["teamSize"]; ?> vs <?php echo $warlog["teamSize"]; ?></b></span></td>
<td style="width:160px;text-align: left;border:none;"><span style="text-transform :uppercase;font-size:20px;color: white; text-shadow:2px 2px #000;"><b><?php echo $warlog["opponent"]["name"]; ?></b></span><br><img src="images/star_white_256.png" style="width: 20px; height: 20px; vertical-align:bottom;margin:0px;padding:0px;"><span style="font-size:18px;color: white; text-shadow:2px 2px #000;"><b><?php echo $warlog["opponent"]["stars"]; ?></b></span><span style="padding-left:15px;"><b><?php echo $warlog["opponent"]["destructionPercentage"]; ?> %</b></span></td>
</tr>
</tbody>
</table>
</center>
</div>

  <?php
  }
?>

<br><br><br><br><br><br><br>
<script type="text/javascript" src="MenuDateien/mbjsmbbqc1.js"></script>
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
