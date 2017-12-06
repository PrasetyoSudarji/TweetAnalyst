<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Tweet Analyst</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-modified.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/login_modal.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-switch.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-toggle.css">
	<!--<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-container.css">-->
    <!-- jQuery library -->
    <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/act.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=base_url()?>assets/dataTable/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/dataTable/media/js/dataTables.bootstrap.min.js"></script> 
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap-switch.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap-toggle.js"></script>
    <script src="<?=base_url()?>assets/Highchart/js/highcharts.js"></script>
    <script src="<?=base_url()?>assets/Highchart/js/highcharts-3d.js"></script>
    <script src="<?=base_url()?>assets/Highchart/js/modules/exporting.js"></script>
    <!-- Other Library -->  
    <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dataTable/media/css/dataTables.bootstrap.min.css">
    <link rel="shortcut icon" href="<?=base_url()?>assets/logo%20itera%20oke.png">    
    
    <!-- library map --> 
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="http://matchingnotes.com/javascripts/leaflet-google.js"></script>

    <!-- <link rel="stylesheet" href="<?=base_url()?>assets/leaflet/leaflet.css" />
    <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
    <script src="<?=base_url()?>assets/leaflet/leaflet-google.js"></script>
     -->
    
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCoAb8o3GtIpexSuCkN6yYDRh9FTMDL6Hc"></script>
    

    
    <style type="text/css">
      #container {
        min-width: 310px;
        max-width: 800px;
        height: 400px;
        margin: 0 auto
      }

        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
        .leaflet-google-layer {
        z-index: inherit;
        }
    </style>

  </head>
  <body >
<div class="container" style="background:#fff;margin-top:0px; padding-top:30px; padding-bottom:15px; border-bottom:solid thin #e8e8e8; box-shadow:         0px -6px 22px 0px rgba(0, 0, 0, 0.2); border-radius: 0px;">

      <div class="container">
      <div class="row ">
        <div class="col-md-1">
            <a href="<?=base_url()?>">
              <img src="<?=base_url()?>assets/logo%20itera%20oke.png" width="70px" style="margin-bottom:10px; "/>
              
            </a>
            
        </div>
        <div class="col-md-5">
          <h3>Tweet Analyst</h3>
          <p><em>"Teknik Informatika Institut Teknologi Sumatera"</em></p>
        </div>
        <div class="col-md-6">
            <p class="text-right" >
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://twitter.com/itera_PTN" style="color: #000;" ><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.facebook.com/itera.official/" style="color: #000;"><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.instagram.com/iteraofficial/" style="color: #000;"><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.youtube.com/results?search_query=itera" style="color: #000;"><i class="fa fa-youtube fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            </p>
        </div>
      </div>
    </div>
    </div>
