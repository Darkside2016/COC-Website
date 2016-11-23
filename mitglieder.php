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
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<link rel="stylesheet" href="codex/cocmember.css" type="text/css"/>
    <link rel="stylesheet" href="MenuDateien/mbcsmbbqc1.css" type="text/css" />
 <link rel="shortcut icon" href="<?php echo $data["badgeUrls"]["medium"]; ?>">
</head>
<body>
<center><table width="90%" border="0" align="center">
  <tr>
    <td align="center"><img src="banner/banner.png" width="436" height="245" /></td>
  </tr>
</table>
<center>
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
</div>
<?php
  if (isset($errormsg)) {
    echo "<p>", "Failed: ", $data["reason"], " : ", isset($data["message"]) ? $data["message"] : "", "</p></body></html>";
    exit;
  }
?>
<br /><br />
  <table style="background-color: rgba(179,179,179,.75)" border="1">
<?php
  foreach ($members as $member) {
    $urlencd = urlencode($member["tag"]);
?>
    <tr>
      <td style ="color: #fff;">Platz : <?php echo $member["clanRank"], " (", $member["previousClanRank"], ")"; ?></td>
      <td style="color:gold"><img src="<?php echo $member["league"]["iconUrls"]["tiny"]; ?>"/><?php echo $member["league"]["name"]; ?></td>
      <td "color: #fff;" width="50" height="50" class="explevel"><?php echo $member["expLevel"]; ?></td>
      <td  class="a" style ="color: #fff;">Name : <font color="#000"><?php echo $member["name"];?></font> <a href="profile.php?tag=<?php echo $urlencd ?>"><?php echo $member["tag"];?></a><br/>Rang : <?php echo $member["role"]; ?>
</td>
      <td>Gespendete Truppen :<br/><center><font color="lightgreen"><?php echo $member["donations"]; ?></font></center></td>
      <td>Truppen erhalten :<br/><center><font color="orangered"><?php echo $member["donationsReceived"]; ?></font></center></td>
      <td class="points"><center><?php echo $member["trophies"]; ?></center></td>
    </tr>
<?php
  }
?>
  </table>
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
