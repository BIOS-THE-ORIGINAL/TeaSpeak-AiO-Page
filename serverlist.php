<?PHP

/*-------SETTINGS-------*/
$ts3_ip = '5.189.175.107';
$ts3_queryport = 10101;
$ts3_user = 'serveradmin';
$ts3_pass = 'password';
/*----------------------*/

#Include ts3admin.class.php
require("ts3admin.class.php");

#build a new ts3admin object
$tsAdmin = new ts3admin($ts3_ip, $ts3_queryport);

if($tsAdmin->getElement('success', $tsAdmin->connect())) {
	#login as serveradmin
	$tsAdmin->login($ts3_user, $ts3_pass);
	
	#get serverlist
	$servers = $tsAdmin->serverList();
	
	#set output var
	$output = '';
	
	#generate table codes for all servers
	foreach($servers['data'] as $server) {
		$output .= '<tr bgcolor="#ffffff" onmouseover="style.backgroundColor=\'#eeeeee\'" onmouseout="style.backgroundColor=\'#ffffff\'">';
		$output .= '<td width="50px" align="center">#'.$server['virtualserver_id'].'</td>';
		$output .= '<td width="300px">&nbsp;&nbsp;'.htmlspecialchars($server['virtualserver_name']).'</td>';
		$output .= '<td width="100px" align="center">'.$server['virtualserver_port'].'</td>';
		if(isset($server['virtualserver_clientsonline'])) {
			$clients = $server['virtualserver_clientsonline'] . '/' . $server['virtualserver_maxclients'];
		}else{
			$clients = '-';
		}
		$output .= '<td width="200px" align="center">'.$clients.'</td>';
		$output .= '<td width="100px" align="center">'.$server['virtualserver_status'].'</td>';
		if(isset($server['virtualserver_uptime'])) {
			$uptime = $tsAdmin->convertSecondsToStrTime(($server['virtualserver_uptime']));
		}else{
			$uptime = '-';
		}
		$output .= '<td width="150px" align="center">'.$uptime.'</td>';
	}
}else{
	echo 'Connection could not be established.';
}

if(count($tsAdmin->getDebugLog()) > 0) {
	foreach($tsAdmin->getDebugLog() as $logEntry) {
		echo '<script>alert("'.$logEntry.'");</script>';
	}
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img\f.png">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\imprint.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  </head>
  <body>
      <script type="text/javascript" src="js/snowflakes.js"></script>
	  
<header>
<div class="container">
<h1 class="logo">The Website for Teaspeak</h1>

<div class="container">
<nav>
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="creator/index.php">Server Creator</a></li>
<li><a href="serverlist.php">Server List</a></li>
<li><a href="status.php">Server Status</a></li>
<li><a href="banlist.php">Ban List</a></li>
<li><a href="tsdns">Ts-Dns</a></li>

 
</ul>
</nav>
</div>
</div>
</header>

      <!--Navi end-->
       <!--Banner-->
<section>
  <div class="banner-img">
    <div class="containerb">
      <img src="img\logo.png">

      </div>
    </div>
</section>
      <!--Banner end-->

<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>TeaSpeak All in One Page</title>
  </head>
  <body>
                              <center><h3>Here is an overview of all servers in our network</h3></center>
    <body>
    	<table bgcolor="#000000" cellpadding="5" cellspacing="1" width="900px" border="0" align="center">
        	<tr bgcolor="#c0c0c0">
            	<td width="50px" align="center"><b>ID<b></td>
                <td width="300px" align="center"><b>Servername<b></td>
            	<td width="100px" align="center"><b>Port<b></td>
            	<td width="200px" align="center"><b>Online Clients<b></td>
                <td width="100px" align="center"><b>Status<b></td>
                <td width="150px" align="center"><b>Uptime<b></td>
            </tr>
			       <div class="container">

 	   
            <?PHP echo $output; ?>
		
        </table>
    </body>

                        </div>
                    </div>
                 </div>

            </section>
      <!-- privacy area finish -->
        </main>

</section>
      <!--services end-->
      <!--Footer-->
<section>
    <div class="footer-main-div">
        
    <div class="footer-social-icons">
        <ul>
        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#" target="_blank"><i class="fab fa-teamspeak"></i></a></li>
        <li><a href="#" target="_blank"><i class="fab fa-discord"></i></a></li>
        </ul>
        </div>
        
        <div class="footer-menu-one">
        <ul>
            <li><a href="impressum.html">Impressum</a></li>
            <li><a href="datenschutz.html">Datenschutz</a></li>
            
        </ul>
        </div>
        <!--<div class="footer-menu-tow">
        <ul>
            <li><a href="#">Impressum</a></li>
            <li><a href="#">Datenschutz</a></li>
            <li><a href="#">Impressum</a></li>
        </ul>
        </div>-->
        <div class="footer-bottem-copy">
        
        
        <p>Version  <b>( v 3.0.0 [FINAL]) by BIOS </b></p>
            <p>Copyright © Nico B. 2020</p>
        </div>
    </div>

    </section>
      <!--footer end-->  </body>
</body></html>
