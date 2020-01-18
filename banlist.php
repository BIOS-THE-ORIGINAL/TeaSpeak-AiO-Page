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
                              <center><h3>Here is an overview of the currently banned clients in our network.</h3>
<body>
    <?php
    /**
     * Created by PhpStorm.
     * User: XARON
     * Date: 17.11.2018
     * Time: 19:04
     */
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    define('MAIN', true);
    date_default_timezone_set('Europe/London');
    ini_set('default_charset', 'UTF-8');
    setlocale(LC_ALL, 'UTF-8');
    require_once('ts3admin.class.php');

    $query = new ts3admin('127.0.0.1', 10101);
    if($query->getElement('success', $query->connect())) {
        $query->login('serveradmin', 'password');
        $bans = array();
        foreach($query->serverList()['data'] as $k => $server) {
            $query->selectServer($server['virtualserver_port']);
            $query->setName(urlencode('Swallalala.'.rand(0, 1337)));
            array_push($bans, array('serverId' => $server['virtualserver_id'], 'serverName' => $server['virtualserver_name'], 'serverPort' => $server['virtualserver_port'], 'bans' => array()));
            foreach($query->getElement('data', $query->banList()) as $ban) {
                array_push($bans[$k]['bans'], array('banId' => (isset($ban['banid']) ? $ban['banid'] : null), 'ip' => (isset($ban['ip']) ? $ban['ip'] : null), 'name' => (isset($ban['name']) ? $ban['name'] : null), 'uid' => (isset($ban['uid']) ? $ban['uid'] : null), 'mytsid' => (isset($ban['mytsid']) ? $ban['mytsid'] : null), 'lastnickname' => (isset($ban['lastnickname']) ? $ban['lastnickname'] : null), 'created' => (isset($ban['created']) ? date('d.m.Y H:i:s a', $ban['created']) : null), 'duration' => (isset($ban['duration']) ? $ban['duration'] : null), 'invokername' => (isset($ban['invokername']) ? $ban['invokername'] : null), 'invokercldbid' => (isset($ban['invokercldbid']) ? $ban['lastnickname'] : null), 'invokeruid' => (isset($ban['invokeruid']) ? $ban['invokeruid'] : null), 'reason'  => (isset($ban['reason']) ? $ban['reason'] : null), 'enforcements' => (isset($ban['enforcements']) ? $ban['enforcements'] : null)));
            }
        }
    }
    ?>
    <?php
    foreach($bans as $ban) {
    ?>
        <h4 style="text-align: center !important;">Bann Liste von (#<?=$ban['serverId'].' - '.$ban['serverName'].' - '.$ban['serverPort']?>)</h4>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="text-align: center !important;">ID</th>
                <th scope="col" style="text-align: center !important;">IP</th>
                <th scope="col" style="text-align: center !important;">Name</th>
                <th scope="col" style="text-align: center !important;">Duration</th>
                <th scope="col" style="text-align: center !important;">Created By</th>
                <th scope="col" style="text-align: center !important;">Reason</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($ban['bans'] as $user) { ?>
                <tr>
                    <th scope="row" style="text-align: center !important;"><?=($user['banId'] ? $user['banId'] : '-')?></th>
                    <th scope="row" style="text-align: center !important;"><?=($user['ip'] ? $user['ip'] : '-')?></th>
                    <th scope="row" style="text-align: center !important;"><?=($user['lastnickname'] ? $user['lastnickname'] : '-')?></th>
                    <th scope="row" style="text-align: center !important;"><?=($user['duration'] ? $user['duration'] : '-')?></th>
                    <th scope="row" style="text-align: center !important;"><?=($user['invokername'] ? $user['invokername'] : '-')?></th>
                    <th scope="row" style="text-align: center !important;"><?=($user['reason'] ? $user['reason'] : 'No Reason')?></th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
				
                        </div>
                    </div>
                 </div>

            </section></center>
      <!-- privacy area finish -->
        </main>

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
