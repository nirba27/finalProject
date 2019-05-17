var app = angular.module('template', ['angularjs-dropdown-multiselect']);

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

    $scope.name = 'World';

    $scope.example14model = [];
    $scope.setting1 = {
        scrollableHeight: '200px',
        scrollable: true,
        enableSearch: true
    };

    $scope.setting2 = {
        scrollableHeight: '200px',
        scrollable: true,
        enableSearch: false
    };

    $scope.example14data = [{
        "label": "Alabama",
        "id": "AL"
    }, {
        "label": "Alaska",
        "id": "AK"
    }, {
        "label": "American Samoa",
        "id": "AS"
    }, {
        "label": "Arizona",
        "id": "AZ"
    }, {
        "label": "Arkansas",
        "id": "AR"
    }, {
        "label": "California",
        "id": "CA"
    }, {
        "label": "Colorado",
        "id": "CO"
    }, {
        "label": "Connecticut",
        "id": "CT"
    }, {
        "label": "Delaware",
        "id": "DE"
    }, {
        "label": "District Of Columbia",
        "id": "DC"
    }, {
        "label": "Florida",
        "id": "FL"
    }, {
        "label": "Georgia",
        "id": "GA"
    }, {
        "label": "Guam",
        "id": "GU"
    }, {
        "label": "Hawaii",
        "id": "HI"
    }, {
        "label": "Idaho",
        "id": "ID"
    }, {
        "label": "Illinois",
        "id": "IL"
    }, {
        "label": "Indiana",
        "id": "IN"
    }, {
        "label": "Iowa",
        "id": "IA"
    }, {
        "label": "Kansas",
        "id": "KS"
    }, {
        "label": "Kentucky",
        "id": "KY"
    }, {
        "label": "Louisiana",
        "id": "LA"
    }, {
        "label": "Maine",
        "id": "ME"
    }, {
        "label": "Marshall Islands",
        "id": "MH"
    }, {
        "label": "Maryland",
        "id": "MD"
    }, {
        "label": "Massachusetts",
        "id": "MA"
    }, {
        "label": "Michigan",
        "id": "MI"
    }, {
        "label": "Minnesota",
        "id": "MN"
    }, {
        "label": "Mississippi",
        "id": "MS"
    }, {
        "label": "Missouri",
        "id": "MO"
    }, {
        "label": "Montana",
        "id": "MT"
    }, {
        "label": "Nebraska",
        "id": "NE"
    }, {
        "label": "Nevada",
        "id": "NV"
    }, {
        "label": "New Hampshire",
        "id": "NH"
    }, {
        "label": "New Jersey",
        "id": "NJ"
    }, {
        "label": "New Mexico",
        "id": "NM"
    }, {
        "label": "New York",
        "id": "NY"
    }, {
        "label": "North Carolina",
        "id": "NC"
    }, {
        "label": "North Dakota",
        "id": "ND"
    }, {
        "label": "Ohio",
        "id": "OH"
    }, {
        "label": "Oklahoma",
        "id": "OK"
    }, {
        "label": "Oregon",
        "id": "OR"
    }, {
        "label": "Palau",
        "id": "PW"
    }, {
        "label": "Pennsylvania",
        "id": "PA"
    }, {
        "label": "Puerto Rico",
        "id": "PR"
    }, {
        "label": "Rhode Island",
        "id": "RI"
    }, {
        "label": "South Carolina",
        "id": "SC"
    }, {
        "label": "South Dakota",
        "id": "SD"
    }, {
        "label": "Tennessee",
        "id": "TN"
    }, {
        "label": "Texas",
        "id": "TX"
    }, {
        "label": "Utah",
        "id": "UT"
    }, {
        "label": "Vermont",
        "id": "VT"
    }, {
        "label": "Virgin Islands",
        "id": "VI"
    }, {
        "label": "Virginia",
        "id": "VA"
    }, {
        "label": "Washington",
        "id": "WA"
    }, {
        "label": "West Virginia",
        "id": "WV"
    }, {
        "label": "Wisconsin",
        "id": "WI"
    }, {
        "label": "Wyoming",
        "id": "WY"
    }];
    $scope.example2settings = {
        displayProp: 'id'
    };

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
    $scope.geners_array = [];
    $scope.dvrs = [];
    $scope.income = 0;
    $scope.cluster = '';
    $scope.selectedGenre = 'Choose';
    $scope.genreView = '';
    $scope.hourView = 0;
    $scope.keywords_array = [];



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
        request.success(function (data) {
            if (data == 1) {
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
        request.success(function (data) {
            if (data != "0") {
                $scope.tags = data;
                console.log('init_cases - success');
                console.log($scope.tags);
            } else {
                console.log('init_case - failed');
            }
        }); //success

        var request = $http({
            method: "POST",
            url: "php/init_geners.php",
            data: $.param({}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.success(function (data) {
            if (data != "0") {
                $scope.genres_array = data;
                console.log('init_cases - success');
            } else {
                console.log('init_case - failed');
            }
        }); //success

    } //the funtion


    $scope.get_audience = function () {
        var genre = $scope.selectedGenre.genre;
        console.log(genre);

        var request = $http({
            method: "POST",
            url: "php/get_audience.php",
            data: $.param({
                gen: genre,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.success(function (data) {
            if (data != "0") {
                $scope.res = 0;
                $scope.loading = 1;
                $scope.cluster = data;

                console.log($scope.cluster);
                $scope.get_prog($scope.cluster);

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
        request.success(function (data) {
            if (data != "0") {
                $scope.geners = data;
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
        request.success(function (data) {
            if (data != "0") {
                $scope.keywords_array = data;
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
        request.success(function (data) {
            if (data != "0") {
                $scope.dvrs = data;
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
        request.success(function (data) {
            if (data != "0") {
                $scope.programs = data;
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
        request.success(function (data) {
            if (data != "0") {
                $scope.hours = data;
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
        request.success(function (data) {
            if (data != "0") {
                $scope.graph = data;
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
                    backgroundColor: "#7189bf",
                    hoverBackgroundColor: "#7189bf"
                }, {
                    label: '1',
                    data: [{
                        x: x[1],
                        y: y[1],
                        r: r[1]*2
                    }],
                    backgroundColor: "#df7599",
                    hoverBackgroundColor: "#df7599"
                }, {
                    label: '2',
                    data: [{
                        x: x[2],
                        y: y[2],
                        r: r[2]*2
                    }],
                    backgroundColor: "#ffc785",
                    hoverBackgroundColor: "#ffc785"
                }, {
                    label: '3',
                    data: [{
                        x: x[3],
                        y: y[3],
                        r: r[3]*2
                    }],
                    backgroundColor: "#ab93c9",
                    hoverBackgroundColor: "#ab93c9"
                }, {
                    label: '4',
                    data: [{
                        x: x[4],
                        y: y[4],
                        r: r[4]*2
                    }],
                    backgroundColor: "#438a7c",
                    hoverBackgroundColor: "#438a7c"
                }
                    , {
                        label: '5',
                        data: [{
                            x: x[5],
                            y: y[5],
                            r: r[5]*2
                        }],
                        backgroundColor: "#ffbea3",
                        hoverBackgroundColor: "#ffbea3"
                    }
                    , {
                        label: '6',
                        data: [{
                            x: x[6],
                            y: y[6],
                            r: r[6]*2
                        }],
                        backgroundColor: "#5588a3",
                        hoverBackgroundColor: "#5588a3"
                    }
                    , {
                        label: '7',
                        data: [{
                            x: x[7],
                            y: y[7],
                            r: r[7]*2
                        }],
                        backgroundColor: "#c8e6f5",
                        hoverBackgroundColor: "#c8e6f5"
                    }
                    , {
                        label: '8',
                        data: [{
                            x: x[8],
                            y: y[8],
                            r: r[8]*2
                        }],
                        backgroundColor: "#00334e",
                        hoverBackgroundColor: "#00334e"
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

