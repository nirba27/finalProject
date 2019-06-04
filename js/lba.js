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
                //console.log(data);

                //console.log("Success");
            })
            .error(function(){
                //console.log("Success");
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
    $scope.sports = [];
    $scope.entertainment = [];
    $scope.intrests = [];
    $scope.genres_array = [];
    $scope.dvrs = [];
    $scope.cluster = '';
    $scope.selectedGenre = 'Choose';
    $scope.genreView = '';
    $scope.hourView = 0;
    $scope.keywords_array = [];
    $scope.selectedGenre2 = '';
    $scope.Gender = '';
    $scope.maritial = '';
    $scope.hh_num ='';
    $scope.source = '';
    $scope.educ = '';
    $scope.occu ='';
    $scope.children = '';
    $scope.ages = '';
    $scope.vehicles = '';
    $scope.education = 'NA';
    $scope.ethnic = 'Mixed';
    $scope.income = 'NA';
    $scope.status = 'Married';
    $scope.NumberAdults = 0;
    $scope.child_p = 'Have children';
    $scope.ctn_btn = 1;
    $scope.json = [];
    $scope.loadMessage = 'Looking for your targeted audience...';

    $scope.tranlated = ['58c','2ad','2 Adults',
        '5ad',
        'no1',
        'no2',
        'no3',
        'no4',
        'no5',
        'h56sz',
        'ho4sz',
        'ho3sz',
        'nt7',
        'edgs_',
        'oc8oc',
        'h02sz',
        '78w',
        '3sz',
        'ho1',
        '3ad',
        '2oc8o']

    $scope.trnaslate = {
        '58c': 'Medium Income',
        '3ad': '3 Adults',
        '2ad': '2 Adults',
        '5ad': '5 Adults',
        'no1': '1 Adults',
        'no2': '2 Adults',
        'no3': '3 Adults',
        'no4': '4 Adults',
        'no5': '5 Adults',
        'h56sz': 'Household size=5-6',
        'ho4sz': 'Household size=4',
        'ho3sz': 'Household size=3',
        'nt7': 'net_worth_mid_high',
        'edgs_':'Grad School',
        'oc8oc' : 'Retired',
        'h02sz' : 'Household size=2',
        '78w': 'net_worth_high',
        '3sz' : 'Household size=3',
        'ho1' : 'Household size=1',
        '3ad' : '3 Adults',
        '2oc8o' : 'retired'
    };

    $scope.translate = function(word)
    {
        if($scope.tranlated .includes(word))
        {
            return $scope.trnaslate[word];
        }
        else
        {
            return word;
        }
    }

    $scope.getClusters = function(id)
    {
        var request = $http({
            method: "POST",
            url: "php/getClusterById.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            ////console.log(data);
            if(data!=0)
            {
                console.log(data['data']);
                return(data['data']);
            }
         });
    }

    $scope.getJson = function(ids)
    {
        var request = $http({
            method: "POST",
            url: "php/getJson.php",
            data: $.param({
                cluster: ids,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            ////console.log(data);
            if(data!=0)
            {
                var data = data['data'];
                records_dict = {};
                for (x in data)
                    {
                        console.log(data);
                        var id = String(data[x]['id']);
                        var records = data[x]['records'];
                        console.log(records);
                        var records = records.split(' ');
                        console.log(records);
                        for(i in records)
                        {
                            console.log(records[i]);
                            if (records[i] in records_dict)
                                {
                                    records_dict[records[i]].push(id)
                                }
                            else
                            {
                                records_dict[records[i]]=[]
                                records_dict[records[i]].push(id)
                            }

                        }

                    }
                console.log(records_dict);
                }

            })
        }

    $scope.getJson = function(ids)
    {
        var request = $http({
            method: "POST",
            url: "php/getJson.php",
            data: $.param({
                cluster: ids,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            console.log(data['data']);
            if(data!=0)
            {
                var soft_clustering = {}
                var ditems = []
                var themes = []
                var data = data['data'];
                records_dict = {};


                for (x in data)
                {
                    //console.log(data);
                    var id = String(data[x]['id']);
                    var records = data[x]['records'];
                    //console.log(records);
                    var records = records.split(' ');
                    //console.log(records);
                    for(i in records)
                    {
                        //console.log(records[i]);
                        if (records[i] in records_dict)
                        {
                            records_dict[records[i]].push(id)
                        }
                        else
                        {
                            records_dict[records[i]]=[]
                            records_dict[records[i]].push(id)
                        }

                    }

                }

                var cnt = 0;
                var array = [];
                var array2 = [];
                var perspectives = []
                for (x in data){
                    var id = String(data[x]['id']);
                    var pres = {
                        "type": "perspective",
                        "name": id,
                        "description": "",
                        "slug": id,
                        "count": "10",
                        "group": ""
                    };
                    perspectives.push(pres);
                    var records = data[x]['records'];
                    var records = records.split(' ');
                    var links = data[x]['key'];
                    var links = links.split(' ');
                    var tran_links = [];
                    var all_links = [];
                    var clusters = [];
                    all_links.push(id);
                    for(k in links)
                    {
                        tran_links.push($scope.translate(links[k]))
                        all_links.push($scope.translate(links[k]))
                    }
                    ////console.log(tran_links);

                    for(i in records)
                    {
                        var obi = (records_dict[records[i]]);
                        var links2 = all_links;
                        for(i in obi)
                        {
                            links2.push(i);
                        }
                        if(array2.includes(records[i])) {}
                        else {
                            var ditem = {
                                'type': 'ditem',
                                'name': records[i],
                                'description': 'desc',
                                'ditem': cnt,
                                'date': '',
                                'slug': records[i],
                                'links': links2
                            }
                            cnt += 1;
                            ditems.push(ditem);
                            array2.push(records[i]);
                        }
                    }
                    for(j in tran_links)
                    {
                        if(array.includes(tran_links[j]))
                        {}
                        else
                        {
                            var theme = {
                                'type':'theme',
                                'name':tran_links[j],
                                'description':'desc',
                                'slug':tran_links[j]
                            }
                            themes.push(theme);
                            array.push(tran_links[j]);
                        }

                    }
                }
                
                //console.log(ditems);
                //console.log(themes);
                //console.log(perspectives);




                var array = {
                    'ditems' : ditems,
                    'themes' : themes,
                    'perspectives' : perspectives
                }

                var request = $http({
                    method: "POST",
                    url: "php/writeJson.php",
                    data: $.param({
                        array: array,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }); //request
                request.then(function (data) {
                    ////console.log(data['data']);

                    d3.json("php/myfile2.json", function(dataJson) {
                        var plot = new ConceptMap("graph", "graph-info", dataJson);
                    });
                })

            }
         })
    }


    $scope.move = function()
    {
        var elem = document.getElementById("myBar");
        elem.style.width = 0 + '%';
        document.getElementById('ctn_btn').style.display='none';

        var width = 1;
        var id = setInterval(frame, 15);
        function frame() {////console.log(width);
            if (width >= 100) {
                width++;
                if(width==180){
                    clearInterval(id);
                    document.getElementById('loadDone').style.display='block';
                    document.getElementById('loadNotDone').style.display='none';
                    document.getElementById('ctn_btn').style.display='block';

                }
            } else {
                width++;
                elem.style.width = width + '%';
            }
        }
    }

    $scope.login = function (item) {
        $("#icon").attr('class', 'fab fa-connectdevelop fa-7x fa-spin');
        //console.log("login_check");
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
                //console.log('success');
                window.location.pathname = 'home.php'

            } else {
                $("#icon").attr('class', 'fas fa-times fa-7x').fadeIn();
                $(".password-row").velocity("callout.shake");
                //console.log('failed');
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
                ////console.log('init_cases - success');
                ////console.log($scope.tags);
            } else {
                ////console.log('init_case - failed');
            }
        }); //success

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
                ////console.log($scope.genres_array);
            } else {
                //console.log('init - failed');
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
                ////console.log($scope.intrests);

            } else {
                //console.log('init - failed');
            }
        }); //success

    } //the funtion

    $scope.get_select = function(subject)
    {
        //console.log(subject);
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
                //console.log('init - failed');
            }
        }); //success
    }

    $scope.get_audience = function () {

        var genre = $scope.selectedGenre2[0];
        //console.log(genre);

        var request = $http({
            method: "POST",
            url: "php/get_audience.php",
            data: $.param({
                gen: genre,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            if (data != "0") {
                $scope.res = 0;
                $scope.loading = 1;
                $scope.cluster = data['data'];

                ////console.log($scope.cluster);
                $scope.get_prog($scope.cluster);

            } else {
                $scope.res = 0;
                $scope.loading = 1;
            }
        }); //success


        $scope.education = 'NA';
        $scope.ethnic = 'Mixed';
        $scope.income = 'NA';
        $scope.status = 'Married And Singles';
        $scope.NumberAdults = 0;
        $scope.child_p = 'Have children';



        var gender = $scope.Gender;
        var maritial = $scope.maritial;
        var race = $scope.race_;
        //(race);
        ////console.log($scope.educ);
        //.log($scope.occu);

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
            //console.log(data['data'])
            var obi = '';
            var hobi = '';
            if (data != "0") {
                $scope.res = 0;
                $scope.loading = 1;
                $scope.cluster = data['data'];
                ////console.log($scope.cluster);
                for (x in $scope.cluster) {
                    obi += ("id='" + $scope.cluster[x]['id'] +"' or ");
                    hobi += ("mfiID='" + $scope.cluster[x]['id'] +"' or ");
                }
                var len = obi.length;
                var len2 = hobi.length;

                obi = obi.substr(0,len-3);
                hobi = hobi.substr(0,len2-3);

                //console.log("hobi:" + hobi);

                $scope.hours = '';
                $scope.obi = [];
                $scope.graph = [];

                var request = $http({
                    method: "POST",
                    url: "php/get_hours_mfi.php",
                    data: $.param({
                        cluster: hobi,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }); //request
                request.then(function (data) {
                    //console.log(data['data']);
                    if (data != "0") {
                        $scope.obi = data['data'][0];
                        //console.log($scope.obi);
                        $scope.linechart($scope.obi);
                    }
                    else {
                        //console.log('init_case - failed');
                    }
                }); //success

                $scope.getJson(obi);
                var request = $http({
                    method: "POST",
                    url: "php/get_attr.php",
                    data: $.param({
                        cluster: obi,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }); //request
                request.then(function (data) {
                    //console.log(data);
                    if (data != "0") {
                        $scope.attr = data['data'];
                        ////console.log('init_cases - success');
                       // //console.log($scope.attr);
                        for (x in $scope.attr) {
                            var key = $scope.attr[x]['key'];
                            if(key=='edhs_')
                            {
                                $scope.education='High School';
                            }
                            else if(key=='edgs_')
                            {
                                $scope.education='Grad';

                            }
                            else if(key=='edco_')
                            {
                                $scope.education='College';
                            }
                            if(key=='in14c' || key=='in1')
                            {
                                $scope.income=39999;
                                $scope.animateValue("el", 39799, 39999, 500);

                            }
                            else if(key=='58c' || key=='in58c')
                            {
                                $scope.income=79999;
                                $scope.animateValue("el", 79799, 79999, 500);


                            }
                            else if(key=='31c' || key=='in31c')
                            {
                                $scope.income=999999;
                                $scope.animateValue("el", 999799, 999999, 500);

                            }
                            else if(key=='92c' || key=='in92c')
                            {
                                $scope.income=499999
                                $scope.animateValue("el", 499799, 499999, 500);
                            }
                            if(key=='singlee')
                            {
                                $scope.status='Singles';

                            }
                            else if(key=='married')
                            {
                                $scope.status='Married';
                            }
                            if(key=='white')
                            {
                                $scope.ethnic='White';

                            }
                            else if(key=='black')
                            {
                                $scope.status+='Afro-americans|';
                            }
                            else if(key=='assia')
                            {
                                $scope.status+='Asians|';
                            }
                            else if(key=='hispa')
                            {
                                $scope.status+='Hispanics|';
                            }
                            if(key=='no1')
                            {
                                $scope.NumberAdults=1;

                            }
                            else if(key=='no2')
                            {
                                $scope.NumberAdults=2;
                            }
                            else if(key=='no3')
                            {
                                $scope.NumberAdults=3;
                            }
                            else if(key=='no4')
                            {
                                $scope.NumberAdults=4;
                            }
                            if(key=='ch0ch')
                            {
                                $scope.children='No children';
                            }
                        }

                    } else {
                        //console.log('init_case - failed');
                    }
                }); //success

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
                //console.log('init_cases - success');
                //console.log($scope.geners);

            } else {
                //console.log('init_case - failed');
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
                //console.log('init_cases - success');

            } else {
                //console.log('init_case - failed');
            }
        }); //success


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

        //console.log(id);
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
                //console.log('init_cases - success');
                //console.log($scope.programs);
            } else {
                //console.log('init_case - failed');
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
                //console.log('init_cases - success');
                //console.log($scope.graph);
                for (i in $scope.graph) {
                    $scope.x.push(parseInt($scope.graph[i]['x']));
                    $scope.y.push(parseInt($scope.graph[i]['y']));
                    $scope.r.push(parseInt($scope.graph[i]['r']));
                    $scope.labels.push(parseInt($scope.graph[i]['label']));
                }
                //console.log($scope.x);
                $scope.bubleChart($scope.x,$scope.y,$scope.r,$scope.labels);
            }
            else {
                //console.log('init_case - failed');
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
                    borderColor: $scope.getColor(1),
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
       // //console.log("obi?");
       // //console.log(obi[0]);
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

