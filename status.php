<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img\f.png">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\imprint.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	   <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.js"></script>
       <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
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
<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
       <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
	          <script>
       var chart; // global
     
       function requestData() {
           $.ajax({
               url: '/stat/live-server-data.php',
               success: function(point) {
                   var series = chart.series[0],
                       shift = series.data.length > 20; // shift if the series is longer than 20
     
                   // add the point
                   chart.series[0].addPoint(eval(point), true, shift);
                 
                   // call it again after one second
                   setTimeout(requestData, 1000);  
               },
               cache: false
           });
       }
         
       $(document).ready(function() {
           chart = new Highcharts.Chart({
               chart: {
                   renderTo: 'container',
                   defaultSeriesType: 'spline',
                   events: {
                       load: requestData
                   }
               },
               title: {
                   text: 'Clients Online on, the Voice4You Network'
               },
               xAxis: {
                   type: 'datetime',
                   tickPixelInterval: 150,
                   maxZoom: 20 * 1000
               },
               yAxis: {
                   minPadding: 0.2,
                   maxPadding: 0.2,
                   title: {
                       text: 'Value',
                       margin: 80
                   }
               },
               series: [{
                   name: 'Clients online',
                   data: []
               }]
           });      
       });
       </script>
 </head>
       <div id="container" style="width: 1024px; height: 400px; margin: 0 auto"></div>
     
       <div style="width: 1024px; margin: 0 auto">
 </div>
 </div>
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
