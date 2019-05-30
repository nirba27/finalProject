var app = angular.module('template',  ['angularjs-dropdown-multiselect']);

app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

// We can write our own fileUpload service to reuse it in the controller
app.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('name', name);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined,'Process-Data': false}
        })
            .success(function(data){
                console.log(data);

                console.log("Success");
            })
            .error(function(){
                console.log("Success");
            });
    }
}]);


//myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

app.controller('ng-cases', function ($scope, $http, $interval, fileUpload) {

    $scope.example1model = [];
    $scope.example1data = [ {id: 1, label: "David"}, {id: 2, label: "Jhon"}, {id: 3, label: "Danny"} ];


    $scope.statistics = 1;
    $scope.data = 1;
    $scope.res = 1;
    $scope.loading = 1;
    $scope.user = "";
    $scope.pass = "";
    $scope.about = 0;
    $scope.info = 0;
    $scope.tags = [];
    $scope.programs = [];
    $scope.geners = [];
    $scope.sports = [];
    $scope.entertainment = [];
    $scope.intrests = [];
    $scope.genres_array = [];
    $scope.dvrs = [];
    $scope.income = 0;
    $scope.cluster = '';
    $scope.selectedGenre = 'Choose';
    $scope.genreView = '';
    $scope.hourView = 0;
    $scope.keywords_array = [];
    $scope.selectedGenre2 = '';
    $scope.example1model = [];
    $scope.example1data = [ {id: 1, label: "David"}, {id: 2, label: "Jhon"}, {id: 3, label: "Danny"} ];
    $scope.Gender = '';
    $scope.maritial = '';
    $scope.hh_num ='';

    $scope.login = function (item) {
        $("#icon").attr('class', 'fab fa-connectdevelop fa-7x fa-spin');
        console.log("login_check");
        var request = $http({
            method: "POST",
            url: "php/login.php",
            data: $.param({
                user: $scope.user,
                pass: $scope.pass,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data['data'] == 1) {
                $("#icon").attr('class', 'fas fa-check fa-7x').fadeIn();
                console.log('success');
                window.location.pathname = 'home.php'

            } else {
                $("#icon").attr('class', 'fas fa-times fa-7x').fadeIn();
                $(".password-row").velocity("callout.shake");
                console.log('failed');
            }
        }); //success
    } //the funtion


    $scope.init_case = function (item) {
        var request = $http({
            method: "POST",
            url: "php/init_cases.php",
            data: $.param({
                id: item,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.tags = data['data'];
                console.log('init_cases - success');
                console.log($scope.tags);
            } else {
                console.log('init_case - failed');
            }
        }); //success

        //$scope.sports = $scope.get_select('Sport');
        //$scope.entertainment = $scope.get_select('Entertainment');
        //$scope.intrests = $scope.get_select('Interests');
       // $scope.genres = $scope.get_select('Genre');



        var request = $http({
            method: "POST",
            url: "php/init_geners.php",
            data: $.param({
                subject: 'Genre',
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.genres_array = data['data'];
                //console.log($scope.genres_array);
            } else {
                console.log('init - failed');
            }
        }); //success

        var request = $http({
            method: "POST",
            url: "php/init_geners.php",
            data: $.param({
                subject: 'Interests',
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.intrests = data['data'];
                //console.log($scope.intrests);

            } else {
                console.log('init - failed');
            }
        }); //success



    } //the funtion

    $scope.get_select = function(subject)
    {
        console.log(subject);
        var request = $http({
            method: "POST",
            url: "php/init_geners.php",
            data: $.param({
                subject: subject,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.subject = data;
                return data['data'];
            } else {
                console.log('init - failed');
            }
        }); //success
    }

    $scope.click = function () {
        console.log("get_audience2");
        console.log("GENDER:" + $scope.Gender);
        console.log("M" + $scope.maritial);



    } //the funtion


    $scope.get_audience = function () {

        var gender = $scope.Gender;
        var maritial = $scope.maritial;
        var race = $scope.race_;
        console.log(race);
        console.log($scope.educ);
        console.log($scope.occu);

        var request = $http({
            method: "POST",
            url: "php/get_audience_mfi.php",
            data: $.param({
                gender:$scope.Gender,
                maritial:$scope.maritial,
                source:$scope.source,
                educ:$scope.educ,
                occu:$scope.occu,
                child:$scope.children,
                vechi:$scope.vehicles,
                hh_num:$scope.hh_num
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            console.log(data);
            if (data != "0") {
                $scope.res = 0;
                $scope.loading = 1;
                $scope.cluster = data['data'];

                console.log($scope.cluster);
               // $scope.get_prog($scope.cluster);

            } else {
                $scope.res = 0;
                $scope.loading = 1;
            }
        }); //success


    } //the funtion

    $scope.get_prog = function(id)
    {
        var request = $http({
            method: "POST",
            url: "php/get_geners.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.geners = data['data'];
                console.log('init_cases - success');
                console.log($scope.geners);

            } else {
                console.log('init_case - failed');
            }
        }); //success


        var request = $http({
            method: "POST",
            url: "php/get_keys.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.keywords_array = data['data'];
                console.log('init_cases - success');

            } else {
                console.log('init_case - failed');
            }
        }); //success

        $scope.animateValue("el", 200, 3000, 5000);

        var request = $http({
            method: "POST",
            url: "php/get_dvrs.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.dvrs = data['data'];
            } else {
            }
        }); //success

        console.log(id);
        var request = $http({
            method: "POST",
            url: "php/get_programs.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.programs = data['data'];
                console.log('init_cases - success');
                console.log($scope.programs);
            } else {
                console.log('init_case - failed');
            }
        }); //success

        $scope.hours = '';
        $scope.obi = [];
        $scope.graph = [];

        var request = $http({
            method: "POST",
            url: "php/get_hours.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.hours = data['data'];
                console.log('init_cases - success');
                console.log($scope.hours);
                $scope.hoursView = 0;
                var max = 0;
                var cnt = 0;
                for (x in $scope.hours) {
                    //console.log($scope.hours[x]['cnt']);
                    $scope.obi.push(parseInt($scope.hours[x]['cnt']));
                    cnt += 1;

                    if (parseInt($scope.hours[x]['cnt'])>max)
                    {
                        max = parseInt($scope.hours[x]['cnt'])
                        $scope.hoursView=cnt
                    }
                }

                var ampm ='';
                if (($scope.hoursView)>12)
                {
                    ampm = 'PM';
                }
                else
                {
                    ampm = 'AM';
                }

                var min = parseInt($scope.hoursView)-parseInt(2);
                var max = parseInt($scope.hoursView)+parseInt(2);
                $scope.hoursView =  min+ '-' + max + ' '+ampm;
                console.log($scope.obi);
                $scope.linechart($scope.obi);
            }
            else {
                console.log('init_case - failed');
            }
        }); //success

        $scope.x = []
        $scope.y = []
        $scope.r = []
        $scope.labels = []
        var request = $http({
            method: "POST",
            url: "php/get_graph.php",
            data: $.param({}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.graph = data['data'];
                console.log('init_cases - success');
                console.log($scope.graph);
                for (i in $scope.graph) {
                    $scope.x.push(parseInt($scope.graph[i]['x']));
                    $scope.y.push(parseInt($scope.graph[i]['y']));
                    $scope.r.push(parseInt($scope.graph[i]['r']));
                    $scope.labels.push(parseInt($scope.graph[i]['label']));
                }
                console.log($scope.x);
                $scope.bubleChart($scope.x,$scope.y,$scope.r,$scope.labels);
            }
            else {
                console.log('init_case - failed');
            }
        }); //success

    }


    $scope.getColor = function(cluster)
    {
        if (cluster==$scope.cluster)
        {
            return "#0984e3";
        }
        else
        {
            return "#dfe6e9";
        }

    }

    $scope.bubleChart = function (x,y,r,labels)
    {
        var ctxBc = document.getElementById('bubbleChart').getContext('2d');
        var bubbleChart = new Chart(ctxBc, {
            type: 'bubble',
            data: {
                datasets: [{
                    label: '0',
                    data: [{
                        x: x[0],
                        y: y[0],
                        r: r[0]*2
                    }],
                    backgroundColor: $scope.getColor(0),
                    hoverBackgroundColor:$scope.getColor(0),
                }, {
                    label: '1',
                    data: [{
                        x: x[1],
                        y: y[1],
                        r: r[1]*2
                    }],
                    borderWidth: 7,
                    borderColor: "#0984e3",
                    hoverBackgroundColor: $scope.getColor(1),
                    label: '2',
                    data: [{
                        x: x[2],
                        y: y[2],
                        r: r[2]*2
                    }],
                    backgroundColor: $scope.getColor(2),
                    hoverBackgroundColor: $scope.getColor(2),
                }, {
                    label: '3',
                    data: [{
                        x: x[3],
                        y: y[3],
                        r: r[3]*2
                    }],
                    backgroundColor: $scope.getColor(3),
                    hoverBackgroundColor: $scope.getColor(3),
                }, {
                    label: '4',
                    data: [{
                        x: x[4],
                        y: y[4],
                        r: r[4]*2
                    }],
                    backgroundColor: $scope.getColor(4),
                    hoverBackgroundColor: $scope.getColor(4),
                }
                    , {
                        label: '5',
                        data: [{
                            x: x[5],
                            y: y[5],
                            r: r[5]*2
                        }],
                        backgroundColor:$scope.getColor(5),
                        hoverBackgroundColor: $scope.getColor(5),
                    }
                    , {
                        label: '6',
                        data: [{
                            x: x[6],
                            y: y[6],
                            r: r[6]*2
                        }],
                        backgroundColor: $scope.getColor(6),
                        hoverBackgroundColor: $scope.getColor(6),
                    }
                    , {
                        label: '7',
                        data: [{
                            x: x[7],
                            y: y[7],
                            r: r[7]*2
                        }],
                        backgroundColor:$scope.getColor(7),
                        hoverBackgroundColor: $scope.getColor(7),
                    }
                    , {
                        label: '8',
                        data: [{
                            x: x[8],
                            y: y[8],
                            r: r[8]*2
                        }],
                        backgroundColor: $scope.getColor(8),
                        hoverBackgroundColor: $scope.getColor(8),
                    }]
            }
        })

    }

    $scope.linechart = function (obi)
    {
        var ctxL = document.getElementById("lineChart2").getContext('2d');
        console.log("obi?");
        console.log(obi[0]);
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10","11","12","13", "14", "15", "16", "17", "18", "19","20","21","22","23","24"],
                datasets: [{
                    label: "My First dataset",
                    data:  obi,
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                }
                ]
            },
            options: {
                responsive: true
            }
        });
    }

    $scope.animateValue = function(id, start, end, duration) {
        var range = end - start;
        var current = start;
        var increment = end > start? 1 : -1;
        var stepTime = Math.abs(Math.floor(duration / range));
        var obj = document.getElementById(id);
        var timer = setInterval(function() {
            current += increment;
            obj.innerHTML = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }


    $scope.level = 'Choose your targeting level';
    $scope.moderate = 0;
    $scope.deep = 1;
    $scope.change = function ()
    {
        if ($scope.slider == 1)
        {
            $scope.level = "Flat - Demographic data only";
            $scope.moderate = 1;
            $scope.deep = 1;
        }
        else if($scope.slider==2)
        {
            $scope.level = "Moderate - Including watching patterns";
            $scope.moderate = 0;
            $scope.deep = 1;
        }
        else
        {
            $scope.level = "Deep - Including specific programs analyzing";
            $scope.deep = 0;
            $scope.moderate = 0;
        }
    }

    $scope.show_statistics = function()
    {
        $scope.myValue = 0;
    }

});	 //app.controller

