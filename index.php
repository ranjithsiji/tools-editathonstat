<?php //Edit A thon Stat Main Tool  ?>
<!doctype html>
<html ng-app="wikiApp">
  <head>
	    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malayalam Wikipedia - Wikipedia Edit a thon Staticstics App</title>
    <meta name="Description"  content="Wikipedia Edit A Thon statistics app using angular js and quarry">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
      #mainHd {background: url('img/pens.jpg') right bottom fixed; background-size: cover; }
      #mainHd h1 {color: #fff; font-weight: bold; text-shadow: 0px 0px 4px #333;}
      #mainHd p {color: #fff;
            font-size: 1.4em;
            font-weight: bold;
            text-shadow: 0px 0px 4px #333;
      }
       #mainHd a {color: #dfff00;}
      .big {font-weight: bold; color: #2780E3; font-size: 4em; text-align: center; border: 1px solid #2780E3;}
      .centerp {text-align: center; color: #333; font-size: 1.4em;}
      .footer {
          text-align: center;
          padding: 30px 0;
          margin-top: 70px;
          border-top: 1px solid #0048de;
          background-color: #dedede;
      }
      .onHead {
      	font-weight: bold; font-size: 3.4em; color: #2780E3;padding: 10px 5px; border-bottom: 1px solid #aaa; margin-bottom: 20px;
      }
      .itmList {
      	border: 1px solid #2780E3; margin:10px 2px; padding: 25px; font-size: 1.8em; margin:20px 5px; color: #333;
      }
	.run {color:#f99;font-weight:bold;}
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
        <a class="navbar-brand visible-xs" href="#">Wiki Stats</a>
      </div>
      <nav class="hidden-xs">
        <ul class="nav navbar-nav">
          <li>
            <a href="#top" role="button" class="navbar-brand">
              Wiki Stats
            </a>
          </li>
          <li><a href="#getting_started">Malayalam</a></li>
          <li><a href="#userwise">2017</a></li>
          <li><a href="#datewise">2016</a></li>
          <li><a href="#userdata">Odia</a></li>
          <li><a href="#credits">2017</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="container-fluid" id="mainHd">
  <div class="text-center aspect-ratio" id="mainBox">
    <div class="header">
        <h1>
          Edit a thons in Wikipedia - Malayalam, Odia
        </h1>

        <p>Staticstics of Edit a thons in  <a href="http://ml.wikipedia.org/wiki/">Malayalam Wikipedia</a></p>

    </div>
  </div>
</div>
<div class="container">
<div class="row">
        <div class="col-lg-12 col-sm-12 text-center ">
        	<h2 class="onHead">Malayalam Wikipedia 2017</h2>
        	<p class="itmList"><a href="wed17/index.php">World Environment Day Edit a thon 2017</a> <br/> June 2017 - <span class="run">Running</span></p>
        	<p class="itmList"><a href="unesco17/index.php">World Heritage Edit a thon 2017</a> <br/> May 2017</p>
        	<p class="itmList"><a href="books17/index.php">International Books Day Edit a thon 2017</a> <br/> April 2017 - 857 Articles, 26 Users</p>
        	<p class="itmList"><a href="whmin2017/index.php">International Woman's Day Edit a thon 2017</a> <br/> March 2017 - 745 Articles, 34 Users</p>
        </div>	
</div>
<div class="row">
        <div class="col-lg-12 col-sm-12 text-center ">
        <h2 class="onHead">Odia Wikipedia 2017</h2>
        <p class="itmList"><a href="odia">International Woman's Day Edit a thon 2017</a><br/> March 2017 - 200 Articles, 26 Users</p>
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
