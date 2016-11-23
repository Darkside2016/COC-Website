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
    echo "<p>", "Failed: ", $data["reason"], " : ", isset($data["message"]) ? $data["message"] : "", "</p></body></html>";
    exit;
  }
?>
<br /><br />
<center><table class="clantable">
    <tr>
      <td rowspan="11"><span class="clanlevel">Clan Level : <?php echo $data["clanLevel"]; ?></span><br/><img src="<?php echo $data["badgeUrls"]["medium"]; ?>" alt="<?php echo $data["name"]; ?>"/></td>
      <td><?php echo $data["name"]; ?></td><td><?php echo $data["tag"]; ?></td>
      <td rowspan="11"><?php echo $data["description"]; ?></td>
    </tr>
        </tr>
    <tr>
      <td>Gesamtpunkte</td><td><?php echo $data["clanPoints"]; ?></td>
    </tr>
    <tr>
      <td>Gewonnene Kriege</td><td><?php echo $data["warWins"]; ?></td>
    </tr>
    <tr>
      <td>Siegesserie</td><td><?php echo $data["warWinStreak"]; ?></td>
    </tr>
    <tr>
      <td>Unentschieden</td><td><?php echo $data["warTies"]; ?></td>
    </tr>
    <tr>
      <td>Niederlagen</td><td><?php echo $data["warLosses"]; ?></td>
    </tr>
    <tr>
      <td>Mitglieder</td><td><?php echo $data["members"]; ?>/50</td>
    </tr>
    <tr>
      <td>Art</td><td><?php echo $data["type"]; ?></td>
    </tr>
    <tr>
      <td>Benötigte Trophäen</td><td><?php echo $data["requiredTrophies"]; ?></td>
    </tr>
    <tr>
      <td>Kriegshäufigkeit</td><td><?php echo $data["warFrequency"]; ?></td>
    </tr>
    <tr>
      <td>Clanregion</td><td><?php echo $data["location"]["name"]; ?> <?php echo $data["location"]['countryCode']; ?></td>
    </tr>
  </table></center>
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
