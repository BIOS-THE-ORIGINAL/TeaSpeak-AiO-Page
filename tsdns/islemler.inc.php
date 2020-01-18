<?php
/* Bütün Hataları Görmezden Gel */
error_reporting(0);

require_once 'fonksiyon.inc.php';

/* Cloudflare.com | APİv4 | Api Ayarları */
require_once 'ayarlar.inc.php';

$dnsadgeldi = strtolower(p('dnsadgeldi'));

/* ***** Girilen adı varmı kontrol et . BAŞLADI ***** */
$datamiz = file("karaliste.abb");
foreach($datamiz AS $skynlexx)
   {
   $zerdi = explode("|", $skynlexx);
	if($zerdi[1] == $dnsadgeldi)
	{
	echo"<meta http-equiv='refresh' content='1;url=index.php?p=zatenmevcut' />";
	exit;
	}
}
/* ***** Girilen adı varmı kontrol et . BİTTİ ***** */

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty(g('islem')) == 'dnsolusturabb'){


	$dnsadgeldi = p('dnsadgeldi');
	$domain = p('domain');
	$dnsipgeldi = p('dnsipgeldi');
	$dnsportgeldi = p('dnsportgeldi');
	
	if(empty($dnsadgeldi)){
		echo '<div class="alert alert-warning">Bitte vergessen Sie nicht, Ihren DNS-Namen einzugeben.</div>';	
	}elseif(!preg_match("/^[a-zA-Z0-9]*$/",$dnsadgeldi)) {
		echo '<div class="alert alert-warning">Es werden nur lateinische Buchstaben unterstützt. Bitte geben Sie keine Sonder- oder türkischen Zeichen ein.</div>';
	}elseif($dnsadgeldi == "ftp" || $dnsadgeldi == "www" || $dnsadgeldi == "A" || $dnsadgeldi == "a" || $dnsadgeldi == "w" || $dnsadgeldi == "W") {
		echo '<div class="alert alert-warning">Dieser DNS-Name ist nicht verfügbar. Bitte versuchen Sie es mit einem anderen DNS-Namen.</div>';
	}elseif(empty($dnsipgeldi)){
		echo '<div class="alert alert-warning">Bitte vergessen Sie nicht, Ihre IP-Adresse einzugeben.</div>';
	}elseif(!preg_match("/^[0-9.]*$/",$dnsipgeldi)) {
		echo '<div class="alert alert-warning">Sie können nur Ihre IP-Adresse in den Bereich IP-Adresse eingeben, bitte geben Sie Ihre IP-Adresse ein.</div>';
	}elseif(empty($dnsportgeldi)){
		echo '<div class="alert alert-warning">Bitte vergessen Sie nicht, Ihre Portnummer einzugeben.</div>';
	}elseif(!preg_match("/^[0-9]*$/",$dnsportgeldi)) {
		echo '<div class="alert alert-warning">Sie können nur einen Port im Bereich "Port" eingeben. Bitte geben Sie Ihre Portnummer ein.</div>';
	}else{
		
		$dnsadgeldi = strtolower(p('dnsadgeldi'));
		
		
		require_once("cloudflare_class.php");
		
		$api = new CloudFlareAPI($bars_mail,$bars_apikey);

        $api -> setZone("$domain");
////////////////////////////////////////////////////////////////		
		
		// A-record oluşturur DNS sistemi için.
		
		$akaydi = $api -> a_kaydi_ekle("$dnsadgeldi","$dnsipgeldi",true);
      
		// SRV oluştur TS3DNS Aktif et.
		
		
		$srv = $api -> srv_ekle("$dnsadgeldi","$domain","$dnsportgeldi",true);
		
		if($srv){
			
			echo '<div class="alert alert-success">Herzlichen Glückwunsch, Ihre DNS-Erstellung war erfolgreich, Ihre DNS-Adresse : '.$dnsadgeldi.'.'.$domain.'</div>'; echo'<meta http-equiv="refresh" content="30" />';
			
			/* ***** Girilen adı karalisteye al. BAŞLADI ***** */
			$datangeldi = "|".$dnsadgeldi."|".$domain."|".intval($dnsportgeldi)."|".$b4r1s_musteri['email']."";
			//  Karaliste Alınır.
			$databankasi = "karaliste.abb";
			$datamiz = fopen($databankasi,"a");
			fwrite($datamiz, $datangeldi."\r\n");
			/* ***** Girilen adı karalisteye al. BİTTİ ***** */

		}else{
			echo '<div class="alert alert-danger">Ihre DNS-Erstellung ist fehlgeschlagen, CloudFlare konnte keine Verbindung herstellen!</div>';
		}
		
		
		
	}		
}


?>