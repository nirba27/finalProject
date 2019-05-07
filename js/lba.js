var app = angular.module('template', []);

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


        var request = $http({
            method: "POST",
            url: "php/get_geners.php",
            data: $.param({}),
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

        $scope.animateValue("el", 200, 250, 3000);

    } //the funtion

    $scope.get_prog = function(id)
    {

        var request = $http({
            method: "POST",
            url: "php/get_audience.php",
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
    $scope.moderate = 1;
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

