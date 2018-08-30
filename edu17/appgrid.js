 var wikiAppModule = angular.module('wikiApp', ['ngTouch', 'ui.grid', 'ui.grid.resizeColumns', 'ui.grid.moveColumns','ui.grid.autoResize', 'chart.js']);
 
 wikiAppModule.controller('wikiCtrl', ['$scope', '$http', function ($scope, $http) {
		$scope.running=false;
	  $scope.gridOptions = {
			enableSorting: true,
			enableFiltering: true,
			columnDefs: [
			  { field: '#', minWidth: 20, width: 40, enableColumnResizing: false, type:'number' },
			  { field: 'Article', minWidth: 200, width: 250, enableColumnResizing: true, type:'string',
				  cellTemplate:'<div>' +
                       '  <a href="https://ml.wikipedia.org/wiki/{{row.entity.Article}}" target="_blank">{{row.entity.Article}}</a>' +
                       '</div>' },
			  { field: 'Created By', width: 100, maxWidth: 200, minWidth: 70, type:'string' },
			   { field: 'Created Date', width: 150, maxWidth: 200, minWidth: 70, type:'date' },
			  { field: 'Last Edit', width: 100, minWidth: 70, type:'string' },
			  { field: 'Last Edit Date', width: 150, type:'date' },
			  { field: 'Total Size', width: 100, type:'number' },
			  { field: 'Total Edits', width: 100, type:'number' }
					]
				  };
 $http.get('https://tools.wmflabs.org/editathonstat/edu17/stats.php')
       .success(function(data){
			$scope.articles = data.rows;
			$scope.art =[];
			$scope.users =[];
			$scope.datez =[];
			$scope.artnumber = $scope.articles.length;
			var ustat =[];
			var dstat =[];
			$scope.usrnumber=0;
			$scope.editno=0;
			$scope.byteno=0;
			$scope.todayusers =[];
			//var today = new Date('2017-04-06');
			var todayin = new Date();
			var todaystr = todayin.toISOString().substring(0, 10);
			var today = new Date (todaystr);
			for (var i = 0; i < $scope.articles.length; i++) {
							//$scope.labels.push ()
						//	console.log ($scope.articles[i][5].substr(12,8));
					if ($scope.running) {
						mydate =  $scope.articles[i][2];
						//console.log(mydate.replace(/^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/, '$1-$2-$3'));
						dtstrcmp = new Date (mydate.replace(/^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/, '$1-$2-$3'));
						//console.log (dtstrcmp.getTime());
						//console.log (today.getTime());

						if(dtstrcmp.getTime()===today.getTime())
						{
							if($scope.todayusers.indexOf($scope.articles[i][3]) == -1) {
								$scope.todayusers.push( $scope.articles[i][3] );
							}
							//console.log ($scope.articles[i][3] );
						}
					}
						dstat.push ($scope.articles[i][2].substr(0,8));
						dtnew = 	new Date($scope.articles[i][5].replace(    /^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/,    '$4:$5:$6 $2/$3/$1'));
						dtcr = new Date($scope.articles[i][2].replace(    /^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/,    '$4:$5:$6 $2/$3/$1'));
						//	console.log(dtstr);
							$scope.articles[i][2]= dtcr.toDateString();
							$scope.articles[i][5]= dtnew.toDateString();
							$scope.art.push({
													"#": i+1,
													"Article": $scope.articles[i][9],
													"Created By"	:$scope.articles[i][3],
													"Created Date"	:$scope.articles[i][2],
													"Last Edit":$scope.articles[i][6],
													"Last Edit Date":$scope.articles[i][5],
													"Total Edits"	:$scope.articles[i][8],
													"Total Size":$scope.articles[i][7],
												});
								ustat.push ($scope.articles[i][3]);
								$scope.editno = parseInt($scope.editno,0)+parseInt($scope.articles[i][8],0);
								$scope.byteno = parseInt($scope.byteno,0)+parseInt($scope.articles[i][7],0);


						}
						if ($scope.todayusers.length===0) {
							$scope.running=false;
						}
						$scope.gridOptions.data = $scope.art;
						//Options for finding users - articles numbers
						var obj = { };
							for (var i = 0, j = ustat.length; i < j; i++) {
							 	obj[ustat[i]] = (obj[ustat[i]] || 0) + 1;
							}
						//console.log(JSON.parse(JSON.stringify(obj)));

						const orderedobj = {};
							Object.keys(obj).sort().forEach(function(key) {
							  orderedobj[key] = obj[key];
							});

						//console.log(JSON.parse(JSON.stringify(orderedobj)));

						$scope.labels= [];
						$scope.data= [];
							for (var key in orderedobj) {
							     //   users.push({user:key,article:obj[key]});
							        $scope.labels.push(key);
							        $scope.data.push(orderedobj[key]);
							        $scope.users.push({
							        	"User" : key,
							        	"ArticleNo":orderedobj[key]
							        });
							    }
							$scope.usrnumber=$scope.users.length;	
							//console.log(JSON.stringify($scope.data));
							//$scope.labels = ['2006', '2007', '2008', '2009', '2010', '2011', '2012'];
							$scope.series = ['Wiki Users'];
						
						//Options for daily articles numbers
						//console.log(dstat);
						var dtobj = { };
							for (var i = 0, j = dstat.length; i < j; i++) {
							 	dtobj[dstat[i]] = (dtobj[dstat[i]] || 0) + 1;
							}
						//console.log(JSON.parse(JSON.stringify(dtobj)));
						//const ordereddtobj  = {};
							Object.keys(dtobj).sort(function (k1, k2) {
								 //   var dateA = new Date(k1).getTime();
								 //   var dateB = new Date(k2).getTime();
								 //   console.log(dateA); console.log(dateB); console.log(dateA > dateB);
								    return (k1 > k2) ? 1 : -1;  
								  })
						//console.log(JSON.parse(JSON.stringify(dtobj)));
						$scope.dtlabels= [];
						$scope.dtdata= [];
						$scope.dtdatas= [];
							for (var dtkey in dtobj) {
							     //   users.push({user:key,article:obj[key]});
							     //console.log(dtkey);
							     dtcrt = new Date(dtkey.replace(/(\d{4})(\d{2})(\d{2})/g, '$1-$2-$3'));
							   //  console.log(dtcrt);
							        $scope.dtlabels.push(dtcrt.toDateString());
							        $scope.dtdatas.push(dtobj[dtkey]);
							        $scope.datez.push({
							        	"Date" : dtcrt.toDateString(),
							        	"ArticleNo":dtobj[dtkey]
							        });
							    }
						$scope.dtdata = [$scope.dtdatas];
						$scope.dtseries = ['No of Articles'];
						$scope.colors = ['#F7464A','#45b7cd', '#ff6384', '#ff8e72'];
						$scope.onClick = function (points, evt) {
							    console.log(points, evt);
							  };
						$scope.dtdatasetOverride = [{ 
							yAxisID: 'y-axis-1',
							label: "No of Articles",
							borderWidth: 3,
						 }];
						$scope.dtoptions = {
						    scales: {
						      yAxes: [
						        {
						          id: 'y-axis-1',
						          type: 'linear',
						          display: true,
						          position: 'left'
						        },
						      ]
						    },
						  };

		})    
       .error(function(data,status){    
         console.error('Fail to load data', status, data);    
         $scope.myData = { };
         alert("Unable to Load data from Quarry. Please Refresh page");
       });    
}]);
