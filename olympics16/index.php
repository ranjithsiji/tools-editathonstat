<?php //Edit A thon Stat Main Tool  
$name = "Rio Olympics Edit a thon 2016";
$about = "An Edit a thon about sports and olympics related articles in malayalam wikipedia";
$url="http://ml.wikipedia.org/wiki/WP:RIO2016";
?>
<!doctype html>
<html ng-app="wikiApp">
  <head>
	    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?>Statistics - Malayalam Wikipedia - Wikipedia Edit a thon Staticstics App</title>
    <meta name="Description"  content="Wikipedia Edit A Thon statistics app using angular js and quarry">

<link rel="icon" type="image/x-icon" href="../favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="../manifest.json">
<link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">


    <script src="../js/angular.js"></script>
    <script src="../js/angular-touch.js"></script>
    <script src="../js/angular-animate.js"></script>
    <script src="../js/csv.js"></script>
   <script src="../js/pdfmake.js"></script>
    <script src="../js/vfs_fonts.js"></script>
    <script src="../js/ui-grid.js"></script>
   <link rel="stylesheet" href="../css/ui-grid.css" type="text/css">
   <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <script src="../js/Chart.min.js"></script>
   <script src="../js/angular-chart.js"></script>
    <script src="appgrid.js"></script>
    <style>
    body {padding-top: 50px;}
    .page {
      width: 1200px;
      text-align: center;
      margin: 0 auto;
    }
		.grid {
			  width: auto;
			  height: 500px;
			}
			.graph1 {
        width: auto;
        height: auto;
      }
			a {text-decoration:none;} h1{padding-top:50px;}
      #mainBox {height: 250px;}
      #mainHd {background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Olympic_flame_at_opening_ceremony.jpg/1024px-Olympic_flame_at_opening_ceremony.jpg') right bottom fixed; background-size: cover; }
      #mainHd h1 {color: #fff; font-weight: bold; text-shadow: 0px 0px 4px #333;}
      #mainHd p {color: #fff;
            font-size: 1.4em;
            font-weight: bold;
            text-shadow: 0px 0px 4px #333;
      }
       #mainHd a {color: #dfff00;}
      	.big {font-weight: bold; color: #F04C46; font-size: 4em; text-align: center; border: 2px solid #F04C46;}
      .bigstat {
        font-weight: bold;
        font-size: 3.1em;
        text-align: center;
        color: #2780E3;
        line-height: 1;
        padding: 18px 10px;
        border: 2px solid #2780E3;
      }
      .centerp {text-align: center; color: #333; font-size: 1.8em; font-weight: bold;}
	.footer {
          text-align: center;
          padding: 30px 0;
          margin-top: 70px;
          border-top: 1px solid #0048de;
          background-color: #dedede;
      }
.editors {
        font-size: 1.4em; color: #333; border: 1px solid #ccc; padding: 10px 20px; text-align: center; color: #2780E3; font-weight: bold;
      }
      .editorsQ { font-size: 1.8em; font-weight: bold; text-align: center;color: #736713;  }
	</style>
  </head>
  <body ng-app="wikiApp">
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" ng-click="isCollapsed = !isCollapsed">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand visible-xs" href="https://tools.wmflabs.org/editathonstat">Wiki Stats</a>
      </div>
      <nav class="hidden-xs">
        <ul class="nav navbar-nav">
          <li>
            <a href="https://tools.wmflabs.org/editathonstat" role="button" class="navbar-brand">
              Wiki Stats
            </a>
          </li>
          <li><a href="#top">Top</a></li>
          <li><a href="#getting_started">Data</a></li>
          <li><a href="#userwise">Users</a></li>
          <li><a href="#datewise">Date Wise</a></li>
          <li><a href="#userdata">Wiki</a></li>
          <li><a href="#credits">Details</a></li>
        </ul>
      </nav>
    </div>
  </div>
<div class="container-fluid" id="mainHd">
  <div class="text-center aspect-ratio" id="mainBox">
    <div class="header">
        <h1>
          Statistics of <?php echo $name; ?>
        </h1>

        <p>Staticstics of <?php echo $name; ?>in <a href="<?php echo $url; ?>">Malayalam Wikipedia</a></p>

    </div>
  </div>
</div>
<div class="container">
  <div class="page-header">
  <div ng-controller="wikiCtrl">
      <div class="row">
        <div class="col-lg-12 col-sm-12">
            <p class="centerp">From 1st April 2017 to 30th April 2017</p>
            <p class="big">Total {{artnumber}} Articles </p>
        </div>
        <div class="col-lg-4">
          <p class="bigstat">{{usrnumber}} <br/>Users </p>
        </div>
        <div class="col-lg-4">
            <p class="bigstat">{{editno}} <br/>Edits </p>
        </div>
        <div class="col-lg-4">
            <p class="bigstat">{{byteno}} <br/>Bytes </p>
        </div>
      </div>
      <div class="row" ng-if="running">
        <div class="col-lg-12 col-sm-12">
        <h2>Today's Editors</h2>
        <hr/>
          <p class="editors">
          <span  ng-repeat="val in todayusers"> |
            {{val}} | </span>
          </p>
          <p class="editorsQ">Cant Find your Name? <a href="<?php echo $url; ?>">Write an Article to Join Us</a></p>
        </div>
      </div>
      <div class="row" id="getting_started">
        <div class="col-lg-12 col-sm-12">
          <h2>Articles created in this Edit A Thon</h2>
          <div ui-grid="gridOptions" class="grid" ui-grid-resize-columns ui-grid-move-columns ui-grid-auto-resize></div>
        </div>
      </div>
      <span id="userwise">.</span>
      <hr/>
        <h2>User Staticstics </h2>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
          <table class="table table-striped table-bordered">
            <tr>
              <th>No</th>
              <th>User Name</th>
              <th>Number <br/>of <br/>Articles</th>
            </tr>
            <tr ng-repeat="value in users">
              <td>{{$index + 1}}</td>
              <td>{{value.User}}</td>
              <td>{{value.ArticleNo}}</td>
            </tr>
          </table>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12">
          <div class="graph1">
          <canvas id="bar" class="chart chart-bar"
    chart-data="data" chart-labels="labels" chart-series="series"></canvas>
          </div>
        </div>
      </div>
      <span id="datewise">.</span>
      <hr/>
        <h2 >Date Wise Article Staticstics </h2>
      <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12">
          <div class="graph1">
            <canvas id="line" class="chart chart-line" chart-data="dtdata" 
 chart-labels="dtlabels" chart-series="dtseries" chart-options="dtoptions"
 chart-dataset-override="dtdatasetOverride" chart-colors="colors" chart-click="onClick"></canvas>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <table class="table table-striped table-bordered">
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Number <br/>of <br/>Articles</th>
            </tr>
            <tr ng-repeat="value in datez">
              <td>{{$index + 1}}</td>
              <td>{{value.Date}}</td>
              <td>{{value.ArticleNo}}</td>
            </tr>
          </table>
        </div>
      </div>
      <span id="userdata">.</span>
      <hr/>
        <h2 >Users contribution percentage </h2>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div style="width:330px;">
            <canvas id="pie" class="chart chart-pie"
      chart-data="data" chart-labels="labels" chart-options="options"></canvas>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h3>About <?php echo $name; ?></h3>
	<p> <?php echo $about; ?> </p>
	<p><a href="<?php echo $url; ?>"><?php echo $name; ?></a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<span id="credits">.</span>
<footer class="footer">
    <div class="container">
      <p>Designed and built by <a href="https://github.com/ranjithsiji" target="_blank">Ranjithsiji</a></p>
      <p>Code licensed under <a href="https://github.com/jtblin/angular-chart.js/blob/master/LICENSE">BSD License</a>.</p>
      <p>Source Code on <a href="https://github.com/ranjithsiji/tools-editathonstat">Github</a>, <a href="https://github.com/ranjithsiji/tools-edithathonstat/issues?state=open">Issues</a></p>
      <p><strong>Credits</strong>: <a href="https://github.com/jtblin/angular-chart.js">Angular Chart</a>, <a href="http://www.chartjs.org/">Chart.js</a>, <a href="https://angularjs.org/">AngularJS</a> and  <a href="http://getbootstrap.com">Bootstrap</a></p>
      <p><strong>Data</strong>: From Malayalam Wikipedia Labs DB <a href="https://tools.wmflabs.org/">Quarry</a></p>
    </div>
  </footer>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89656074-2', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
