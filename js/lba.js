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
                ////console.log(data);

                ////console.log("Success");
            })
            .error(function(){
                ////console.log("Success");
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
    $scope.level2 = 1;
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
    $scope.Kcluster = '';
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
    $scope.topic = '';
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
    $scope.income_low = '';
    $scope.income_top = '';
    $scope.cluste_ids = '';
    $scope.cluster_id_check = '';
    $scope.hmax = 0;
    $scope.tran = {
        "25f34":"female 25-34",
        "18m24": "male18-24",
        "18f24":"female 18-24" ,
        "18u24":"unknownGender18-24" ,
        "25m34":"male 25-34" ,
        "25f34":"female 25-34" ,
        "25u34":"unknownGender25-34" ,
        "35m44":"male 35-44" ,
        "35f44":"female 35-44" ,
        "35u44":"unknownGender35-44" ,
        "45m54": "male 45-54" ,
        "45f54":"female 45-54" ,
        "45u54":"unknownGender45-54" ,
        "55m64": "male 55-64" ,
        "55f64":"female 55-64" ,
        "55u64":"unknownGender55-64" ,
        "65m74": "male 65-74" ,
        "65f74":"female 65-74" ,
        "65u74": "unknownGender65-74" ,
        "75mpl":"male 75+" ,
        "75fpl":"female 75+" ,
        "75upl":"unknownGender75+" ,
        "nv1hs": "1 Car",
        "nv2hs": "2 Cars",
        "nv3hs": "3 or More Cars",
        "ch0ch": "No Children",
        "c12ch": "Children",
        "c456h": "Many Children",
        "lo03r": "Length of Residence 0-3",
        "46r": "Length of Residence 0-3",
        "lo46r": "Length of Residence 4-6",
        "o03": "Length of Residence 4-6",
        "79r": "Length of Residence 4-6",
        "lo79r": "Length of Residence 7-9",
        "o46": "Length of Residence 7-9",
        "12r": "Length of Residence 7-9",
        "lo12r": "Length of Residence 10-12",
        "o79": "Length of Residence 10-12",
        "15r": "Length of Residence 10-12",
        "lo15r": "Length of Residence 13-15",
        "o12": "Length of Residence 13-15",
        "hmADv": "Low Home Value",
        "ADv": ":Low Home Value ",
        "hmEKv": "Mid Home Value",
        "hmE": "Mid Home Value",
        "EKv": "Mid Home Value",
        "hmLPv": "High Home Value",
        "hmL": "High Home Value",
        "LPv": "High Home Value",
        "hmQSv": "Very High Home Value",
        "hmQ": "Very High Home Value",
        "nt12w": "Low Net Worth",
        "12w": "Low Net Worth",
        "nt34w": "Mid-Low Net",
        "nt1": "Mid-Low Net",
        "56w": "Mid-Low Net",
        "nt56w": "M-H Net",
        "nt3": "M-H Net",
        "78w": "M-H Net",
        "nt78w": "High Net",
        "nt5": "High Net",
        "_9w": "High Net",
        "nt_9w": "Very High Net",
        "nt7": "Very High Net",
        "in14c": "Low Income",
        "58c": "Low Income",
        "in58c": "Mid Income",
        "92c": "Mid Income",
        "in1": "Mid Income",
        "in92c": "High Income",
        "31c": "High Income",
        "in5": "High Income",
        "in31c": "Very High Income",
        "in9": "Very High Income",
        "agYOe": "Young Adult",
        "agMIe": "Adult",
        "agADe": "Middle Aged",
        "agOLe": "Old",
        "agYe2": "2nd Young Adult",
        "agMe2": "2nd Adult",
        "agAe2": "2nd Middle Aged",
        "agOe2": "2nd Old",
        "ho1sz": "1 person",
        "2sz": "1 person",
        "ho2sz": "2 people",
        "3sz": "2 people",
        "ho1": "2 people",
        "ho3sz": "3 people",
        "4sz": "3 people",
        "ho2": "3 people",
        "ho4sz": "4 people",
        "6sz": "4 people",
        "ho3": "4 people ",
        "h56sz": "5-6 people",
        "9sz": "5-6 people",
        "ho4": "5-6 people",
        "h79sz": "7-9 people",
        "h56": "7-9 people",
        "no1ad": "1 Adult",
        "2ad": "1 Adult",
        "no2ad": "2 Adults",
        "3ad": "2 Adults",
        "no1": "2 Adults",
        "no3ad": "3 Adults",
        "4ad": "3 Adults",
        "no2": "3 Adults",
        "no4ad": "4 Adults",
        "5ad": "4 Adults",
        "no3": "4 Adults",
        "no5ad": "5 Adults",
        "6ad": "5 Adults",
        "no4": "5 Adults",
        "no6ad": "5+ Adults",
        "no5": "5+ Adults",
        "ge1ts": "1 Gen",
        "ge2ts": "2 Gen",
        "ge3ts": "3 Gen",
        "18M24": "Males 18-24",
        "18F24": "Females 18-24",
        "18U24": "Unknown Gender 18-24",
        "25M34": "Males 25-34",
        "25F34": "Females 25-34",
        "25U34": "Unknown Gender 25-34",
        "35M44": "Males 35-44",
        "35F44": "Females 35-44",
        "35U44": "Unknown Gender 35-44",
        "45M54": "Males 45-54",
        "45F54": "Females 45-54",
        "45U54": "Unknown Gender 45-54",
        "55M64": "Males 55-64",
        "55F64": "Females 55-64",
        "55U64": "Unknown Gender 55-64",
        "65M74": "Males 65-74",
        "65F74": "Females 65-74",
        "65U74": "Unknown Gender 65-74",
        "75Mpl": "Males 75+",
        "75Fpl": "Females 75+",
        "75Upl": "Unknown Gender 75+",
        "married": "Married",
        "singlee": "Single",
        "assia": "Asian",
        "black": "Black",
        "hispa": "Hispanic",
        "white": "White",
        "no_ch": "No Children present",
        "ch_pr": "Children present",
        "owma_": "Owner is Male",
        "owfe_": "Owner is Female",
        "edhs_": "Completed High School",
        "edco_": "Completed College",
        "edgs_": "Completed Graduate School",
        "edte_": "Attended Vocational/Technical",
        "oc1oc": "Professional/Technical",
        "oc2oc": "Administration/Managerial",
        "oc3oc": "Sales/Service",
        "oc4oc": "Clerical/White Collar",
        "oc5oc": "Craftsman/Blue Collar",
        "oc6oc": "Student",
        "oc7oc": "Homemaker",
        "oc8oc": "Retired",
        "oc9oc": "Farmer",
        "ocAoc": "Military",
        "ocBoc": "Religious",
        "ocCoc": "Self Employed",
        "ocDoc": "Educator",
        "ocEoc": "Financial Professional",
        "ocFoc": "Legal Professional",
        "ocGoc": "Medical Professional",
        "ocHoc": "Other",
        "ed2hs": "Completed High School",
        "ed2co": "Completed College",
        "ed2gs": "Completed Graduate School",
        "ed2te": "Attended Vocational/Technical",
        "2oc1o": "Professional/Technical",
        "2oc2o": "Administration/Managerial",
        "2oc3o": "Sales/Service",
        "2oc4o": "Clerical/White Collar",
        "2oc5o": "Craftsman/Blue Collar",
        "2oc6o": "Student",
        "2oc7o": "Homemaker",
        "2oc8o": "Retired",
        "2oc9o": "Farmer",
        "2ocAo": "Military",
        "2ocBo": "Religious",
        "2ocCo": "Self Employed",
        "2ocDo": "Educator",
        "2ocEo": "Financial Professional",
        "2ocFo": "Legal Professional",
        "2ocGo": "Medical Professional",
        "2ocHo": "Other",
        "voDvo": "Voter Democrat",
        "voRvo": "Voter Republican",
        "voIvo": "Voter Independent",
        "voVvo": "Voter No Party",
        "voUvo": "Voter Unknown",
        "adv":"Home Market Value E-K",
        "hmadv":"Home Market Value E-K",
        "hmE":"Home Market Value A-D",
        "ekv":"Home Market Value L-P",
        "hmhekv":"Home Market Value E-K",


    };
    $scope.dvrs = [];

    $scope.translate = function(word)
    {
        if(word in $scope.tran)
        {
            return $scope.tran[word];
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
            //////console.log(data);
            if(data!=0)
            {
                //console.log(data['data']);
                return(data['data']);
            }
         });
    }
    $scope.getJson_1 = function(ids)
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
            ////console.log(data['data']);
            if(data!=0)
            {
                var theme = [];
                var pres = [];
                var ditems = [];
                var data = data['data'];
                var records_dict = {};
                for(x in data)
               {
                   var id = String(data[x]['id']);
                   var records = data[x]['records'];
                   var records = records.split(' ');
                   var links = data[x]['key'];
                   var links = links.split(' ');
                   for(i in records)
                   {
                       if(!(pres.includes(id)))
                       {
                           pres.push(id);
                       }
                       if(!(records[i] in ditems))
                       {
                           ditems.push(records[i]);
                       }
                       if (records[i] in records_dict)
                       {
                           records_dict[records[i]].push(id);
                       }
                       else
                       {
                           records_dict[records[i]]=[];
                           records_dict[records[i]].push(id);
                       }
                       for(j in links)
                       {
                           var tlink = (links[j]);
                           if(!(theme.includes(tlink)))
                           {
                               theme.push(tlink);
                           }
                           if(!(records_dict[records[i]].includes(tlink)))
                           {
                               records_dict[records[i]].push(tlink);
                           }
                       }


                   }

               }
               //console.log(records_dict);
                //console.log(theme);
                //console.log(pres);
                var ditems = []
                var themes = []
                var perspectives = []
                var cnt = 0;
                for(i in records_dict)
                {
                    var ditem = {
                        'type': 'ditem',
                        'name': i,
                        'description': 'desc',
                        'ditem': cnt,
                        'date': '',
                        'slug': i,
                        'links': records_dict[i],
                    };
                    cnt += 1;
                    ditems.push(ditem);
                }


                pres.forEach(function(entry) {
                    var pres = {
                        "type": "perspective",
                        "name": entry,
                        "description": "",
                        "slug": entry,
                        "count": "10",
                        "group": ""
                    };
                    perspectives.push(pres);
                });


                theme.forEach(function(entry) {
                    var theme = {
                        "type": "perspective",
                        "name": entry,
                        "description": "",
                        "slug": entry,
                        "count": "10",
                        "group": ""
                    };
                    themes.push(theme);
                });

                var array = {
                    'ditems' : ditems,
                    'themes' : themes,
                    'perspectives' : perspectives
                };



                var request = $http({
                    method: "POST",
                    url: "php/writeJson.php",
                    data: $.param({
                        array: array,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }); //request
                request.then(function (data) {
                    //////console.log(data['data']);

                    d3.json("php/myfile2.json", function(dataJson) {
                        var plot = new ConceptMap("graph", "graph-info", dataJson);
                    });
                })

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
            //console.log(data['data']);
            if(data!=0)
            {
                var soft_clustering = {}
                var ditems = []
                var themes = []
                var data = data['data'];
                var cnt = 0;
                var array = [];
                var array2 = [];
                var perspectives = [];



                var records_dict = {};
                for(x in data)
                {
                    var id = String(data[x]['id']);
                    var records = data[x]['records'];
                    var records = records.split(' ');
                    var links = data[x]['key'];
                    var links = links.split(' ');
                    for(i in records)
                    {
                        if (records[i] in records_dict)
                        {
                            records_dict[records[i]].push(id);
                        }
                        else
                        {
                            records_dict[records[i]]=[];
                            records_dict[records[i]].push(id);
                        }
                        for(j in links)
                        {
                            var tlink = $scope.translate(links[j]);
                            if(!(records_dict[records[i]].includes(tlink)))
                            {
                                records_dict[records[i]].push(tlink);
                            }
                        }
                    }

                }
                ////console.log(records_dict);
                var pres = [];

                for (x in data){
                    var id = String(data[x]['id']);
                    if(!(pres.includes(id)))
                    {
                        pres.push(id);
                    }
                    var records = data[x]['records'];
                    var records = records.split(' ');
                    var links = data[x]['key'];
                    var links = links.split(' ');
                    var tran_links = [];
                    var all_links = [];
                    //all_links.push(id);
                    for(k in links)
                    {
                        tran_links.push($scope.translate(links[k]))
                        all_links.push($scope.translate(links[k]))
                    }
                    //////console.log(tran_links);

                    for(i in records)
                    {
                        var clinks = records_dict[records[i]];
                        ////console.log(clinks);
                        var links2 = [];
                        clinks.forEach(function(entry) {
                            if(!(links2.includes(entry)))
                            {
                                if(entry!='0')
                                {
                                    links2.push(entry);
                                }
                            }
                        });
                        if(!(array2.includes(records[i]))) {
                            if(records[i]!='0')
                            {
                                var ditem = {
                                    'type': 'ditem',
                                    'name': records[i],
                                    'description': 'desc',
                                    'ditem': cnt,
                                    'date': '',
                                    'slug': records[i],
                                    'links': links2
                                };
                                array2.push(records[i]);
                                cnt += 1;
                                ditems.push(ditem);
                            }

                        }
                    }
                    for(j in tran_links)
                    {
                        if(array.includes(tran_links[j]))
                        {}
                        else
                        {
                            if(tran_links[j]!='0')
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
                }


                //console.log(ditems);
                var dvr_query = '';
                for(i in ditems)
                {
                    dvr_query += 'C1=' +  ditems[i]['name'] +' or ';
                }
                dvr_query = dvr_query.substr(0,dvr_query.length-3);
                //console.log(dvr_query);

                $scope.getNames(dvr_query);


                pres.forEach(function(entry) {
                    var pres = {
                        "type": "perspective",
                        "name": entry,
                        "description": "",
                        "slug": entry,
                        "count": "10",
                        "group": ""
                    };
                    perspectives.push(pres);
                });

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
                    //////console.log(data['data']);

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
        function frame() {//////console.log(width);
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
        ////console.log("login_check");
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
                ////console.log('success');
                window.location.pathname = 'home.php'

            } else {
                $("#icon").attr('class', 'fas fa-times fa-7x').fadeIn();
                $(".password-row").velocity("callout.shake");
                ////console.log('failed');
            }
        }); //success
    }

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
                //////console.log('init_cases - success');
                //////console.log($scope.tags);
            } else {
                //////console.log('init_case - failed');
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
                //////console.log($scope.genres_array);
            } else {
                ////console.log('init - failed');
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
                //////console.log($scope.intrests);

            } else {
                ////console.log('init - failed');
            }
        }); //success

    }

    $scope.get_select = function(subject)
    {
        ////console.log(subject);
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
                ////console.log('init - failed');
            }
        }); //success
    }
    $scope.getNames = function(ids)
    {
        ////console.log(subject);
        var request = $http({
            method: "POST",
            url: "php/get_dvr_names.php",
            data: $.param({
                cluster:ids,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            //console.log(data);
            if (data != "0") {
                $scope.dvrs = data['data'];
                $scope.get_genres_hist($scope.dvrs);
            } else {
            }
        }); //success
    }

    $scope.topic = 'NA';
    $scope.nt = 'NA';
    $scope.education = 'NA';
    $scope.age = 'NA';
    $scope.numberAdults = 'NA';
    $scope.homeVal = 'NA';
    $scope.fa = 'NA';
    $scope.bg = 'NA';
    $scope.income = 'NA';

    $scope.analyze_cluster = function (keys)
    {
        $scope.topic = 'NA';
        $scope.nt = 'NA';
        $scope.education = 'NA';
        $scope.age = 'NA';
        $scope.numberAdults = 'NA';
        $scope.bg = 'NA';


        // Create items array
        var items = Object.keys(keys).map(function(key) {
            return [key, keys[key]];
        });

        // Sort the array based on the second element
        items.sort(function(first, second) {
            return second[1] - first[1];
        });

        // Create a new array with only the first 5 items
        //console.log(items);

        for(i in items)
        {
            var key = items[i][0];
            console.log(key);
            if(key.includes('nt') && $scope.nt=='NA')
            {
                $scope.nt = $scope.translate(key);
                if ($scope.translate(key).includes('High'))
                {
                    $scope.animateValue('el',599199, 599999, 1000);
                    $scope.homeVal = 'High';

                }
                else if($scope.translate(key).includes('Very'))
                {
                    $scope.animateValue('el',999199, 999999, 1000);
                    $scope.homeVal = 'Very High';

                }
                else if($scope.translate(key).includes('Low'))
                {
                    $scope.animateValue('el',399199, 399999, 1000);
                    $scope.homeVal = 'Low';

                }
                else
                {
                    $scope.animateValue('el',499199, 499999, 10000);
                    $scope.homeVal = 'Medium';

                }
            }
            else if((key.includes('sports') || key.includes('comedy') || key.includes('knowledge') || key.includes('children') || key.includes('action') || key.includes('drama') || key.includes('talk')) && $scope.topic=='NA')
            {
                $scope.topic = key;
                if(key=='sports1')
                {
                    $scope.fa = 'football-ball';
                    $scope.bg = 'https://media2.giphy.com/media/3pBrLqNFnsnwqBn4Yh/source.gif';
                }
                else if(key=='knowledge1')
                {
                    $scope.fa = 'book';
                    $scope.bg = 'https://media2.giphy.com/media/nqtA5obHo3CSelfeKS/source.gif';
                }
                else if(key=='drama')
                {
                    $scope.fa = 'heart-broken';
                    $scope.bg = 'https://media1.giphy.com/media/3ohs4eRA3r65FC4EsU/giphy.gif';
                }
                else if(key=='comedy1')
                {
                    $scope.fa = 'grin-squint-tears';
                    $scope.bg = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKib5DTgZU2E7B0SQgIkLyOvIlmS5bkzdeE9jgUyG0zpcbH_-TtA';
                }
                else if(key=='children1')
                {
                    $scope.fa = 'child';
                    $scope.bg = 'https://media.giphy.com/media/qGm12PYvhCuoU/giphy.gif';
                }
                else if(key=='talk')
                {
                    $scope.fa = 'chair';
                    $scope.bg = 'https://media.giphy.com/media/XFza8e9pHT7Ak/giphy.gif';
                }
                else if(key=='action')
                {
                    $scope.fa = 'gun';
                    $scope.bg = 'https://media3.giphy.com/media/GY2ukNpIJ9JXW/source.gif';
                    $scope.bg = 'https://media3.giphy.com/media/GY2ukNpIJ9JXW/source.gif';
                }
            }
            else if((key.includes('edh')||key.includes('edc')||key.includes('edt')||key.includes('edg')) && $scope.education=='NA')
            {
                $scope.education = $scope.translate(key);
            }
            else if((key.includes('f') || key.includes('m')) && $scope.age=='NA')
            {
                $scope.age = $scope.translate(key);
            }
            else if(key.includes('hm') && $scope.homeVal=='NA')
            {
                $scope.homeVal = $scope.translate(key);
            }
            else if(key.includes('ch') && $scope.child_p=='NA')
            {
                $scope.child_p = $scope.translate(key);
            }
            else if((key.includes('14c')||key.includes('31c')||key.includes('92c')||key.includes('58c')) && $scope.income=='NA')
            {
                if ($scope.translate(key).includes('High'))
                {
                    $scope.animateValue('el',599199, 599999, 1000);
                    $scope.homeVal = 'High';

                }
                else if($scope.translate(key).includes('Very'))
                {
                    $scope.animateValue('el',999199, 999999, 1000);
                    $scope.homeVal = 'Very High';

                }
                else if($scope.translate(key).includes('Low'))
                {
                    $scope.animateValue('el',399199, 399999, 1000);
                    $scope.homeVal = 'Low';

                }
                else
                {
                    $scope.animateValue('el',499199, 499999, 10000);
                    $scope.homeVal = 'Medium';
                }
            }

        }


    }

    $scope.age_low = '';
    $scope.age_top = '';
    $scope.get_audience = function () {
        var genre = $scope.selectedGenre2;
        var query = '';
        for(i in genre) {
            query += "genre='" + genre[i] + "' OR ";
        }
        query = query.substr(0,query.length-3);
        //console.log(query);
        var request = $http({
            method: "POST",
            url: "php/get_audience.php",
            data: $.param({
                gen: query,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            //console.log(data);
            if (data != "0") {
                $scope.res = 0;
                location.href = "#res";
                $scope.loading = 1;
                $scope.Kcluster = data['data'];
                //console.log($scope.Kcluster);
                if($scope.slider == 2)
                {
                    $scope.get_prog($scope.Kcluster);
                }
            } else {
                $scope.res = 0;
                location.href = "#res";
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
        //////console.log($scope.educ);
        //.log($scope.occu);
        var income = '';
        if ($scope.income_low > 400000 && $scope.income_top < 700000)
        {
            income = 'med';
        }
        else if($scope.income_low > 700000)
        {
            income = 'high';
        }
        else
        {
            income = 'low';
        }


        var gender = '';
        if ($scope.Gender == 'F')
        {
            if($scope.age_low>75)
            {
                gender = '75fpl';
            }
            else if($scope.age_low>55 || $scope.age_top<65)
            {
                gender = '55f64';
            }
            else if($scope.age_low>45 || $scope.age_top<55)
            {
                gender ='45f54';
            }
            else if($scope.age_low>35 || $scope.age_top<65)
            {
                gender ='35f44';
            }
            else if($scope.age_low>25 || $scope.age_top<35)
            {
                gender ='25f34';
            }
            else if($scope.age_top<25)
            {
                gender ='18f24';
            }
        }
        else if ($scope.Gender == 'M')
        {
            if($scope.age_low>75)
            {
                gender = '75mpl';
            }
            else if($scope.age_low>55 || $scope.age_top<65)
            {
                gender = '55m64';
            }
            else if($scope.age_low>45 || $scope.age_top<55)
            {
                gender ='45m54';
            }
            else if($scope.age_low>35 || $scope.age_top<65)
            {
                gender ='35m44';
            }
            else if($scope.age_low>25 || $scope.age_top<35)
            {
                gender ='25m34';
            }
            else if($scope.age_top<25)
            {
                gender ='18m24';
            }
        }

        var request = $http({
            method: "POST",
            url: "php/get_audience_mfi.php",
            data: $.param({
                gender:gender,
                maritial:$scope.maritial,
                source:$scope.source,
                educ:$scope.educ,
                occu:$scope.occu,
                child:$scope.children,
                vechi:$scope.vehicles,
                hh_num:$scope.hh_num,
                income:income,
                topic:$scope.topic
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            var temp_data = data['data'];
            console.log(data);
            var keys = {};
            for(i in temp_data)
            {
                var temp_keys = temp_data[i]['mkey'];
                temp_keys = temp_keys.split(' ');
                console.log(temp_keys);
                for(j in temp_keys)
                {
                    if(!(temp_keys[j] in keys))
                    {
                        keys[temp_keys[j]] = 1;
                    }
                    else
                    {
                        keys[temp_keys[j]] += 1;
                    }
                }
            }

            //console.log(keys);
            $scope.analyze_cluster(keys);

            var obi = '';
            var hobi = '';
            if (data != "0") {
                $scope.res = 0;
                location.href = "#res";
                $scope.loading = 1;
                $scope.cluster = data['data'];
                //////console.log($scope.cluster);
                for (x in $scope.cluster) {
                    obi += ("id='" + $scope.cluster[x]['id'] +"' or ");
                    hobi += ("mfiID='" + $scope.cluster[x]['id'] +"' or ");

                }
                var len = obi.length;
                var len2 = hobi.length;
                $scope.cluste_ids = hobi;
                obi = obi.substr(0,len-3);
                hobi = hobi.substr(0,len2-3);

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
                    ////console.log(data['data']);
                    if (data != "0") {
                        $scope.obi = data['data'][0];
                        ////console.log($scope.obi);
                        $scope.linechart($scope.obi);

                        var max = 0;
                        var hour = 0;
                        for(i in $scope.obi)
                        {
                            if($scope.obi[i]>max)
                            {
                                max = $scope.obi[i];
                                hour = i;
                            }
                        }
                        var time = parseInt(hour);
                        var timel = time-1;
                        var time2 = time+1;
                        $scope.hmax = timel + ' To ' + time2;
                    }
                    else {
                        ////console.log('init_case - failed');
                    }
                }); //success
                $scope.getJson(obi);
            }
            else
                {
                $scope.res = 0;
                location.href = "#res";
                $scope.loading = 1;
                }
        }); //success
        event.preventDefault();
    }

    $scope.get_genres_hist = function()
    {
        var News = [];
        var Comedy = [];
        var Drama = [];
        var Entertainment = [];
        var Children = [];
        var Sports = [];
        var Knowledge = [];
        var Other = [];
        var str = '';
        if($scope.topic.includes('child'))
        {
            str = "C2='000000007156' OR ";
        }
        else if($scope.topic.includes('sport'))
        {
            str = "C2='00000000bce6' OR ";
        }
        else
        {
            str = "C2='000000009e6d' OR ";
        }
       // console.log($scope.dvrs);

        for(i in $scope.dvrs)
        {
            str +=  "C2='" +  $scope.dvrs[i]['DVR'] + "' OR ";

        }

        str = str.substr(0,str.length-3)
       // console.log(str);
        var request = $http({
            method: "POST",
            url: "php/get_geners_hist.php",
            data: $.param({
                cluster: str,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            console.log(data['data']);
            if (data != "0") {
                //console.log(data["data"]);
                for(i in data["data"])
                {
                    News.push(data["data"][i]["News"]);
                    Comedy.push(data["data"][i]["Comedy"]);
                    Drama.push(data["data"][i]["Drama"]);
                    Entertainment.push(data["data"][i]["Entertainment"]);
                    Children.push(data["data"][i]["Children"]);
                    Sports.push(data["data"][i]["Sports"]);
                    Knowledge.push(data["data"][i]["Knowledge"]);
                    Other.push(data["data"][i]["Other"]);

                }
                var ctxL = document.getElementById("lineChart3").getContext('2d');
                var myLineChart = new Chart(ctxL, {
                    type: 'line',
                    data: {
                        labels: ["0-3", "3-6", "6-9", "9-12", "12-15", "15-18", "18-21","21-0"],
                        datasets: [
                            {
                                label: "Comedy",
                                data: Comedy,
                                backgroundColor: [
                                    'rgba(105, 0, 132, .2)',
                                ],
                                borderColor: [
                                    'rgba(200, 99, 132, .7)',
                                ],
                                borderWidth: 2
                            },
                            {
                                label: "News",
                                data: News,
                                backgroundColor: [
                                    'rgba(0, 137, 132, .2)',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                            ,
                            {
                                label: "Drama",
                                data: Drama,
                                backgroundColor: [
                                    '#c9d0d7',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                            ,
                            {
                                label: "Entertainment",
                                data: Entertainment,
                                backgroundColor: [
                                    '#ead6d1',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                            ,
                            {
                                label: "Children",
                                data: Children,
                                backgroundColor: [
                                    '#cac6dc',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                            ,
                            {
                                label: "Sports",
                                data: Sports,
                                backgroundColor: [
                                    '#ceb5d4',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                            ,
                            {
                                label: "Knowledge",
                                data: Knowledge,
                                backgroundColor: [
                                    '#ead6d1',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                            ,
                            {
                                label: "Other",
                                data: Other,
                                backgroundColor: [
                                    '#e8cee2',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
                                ],
                                borderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true
                    }
                });
            } else {
                ////console.log('init_case - failed');
            }
        }); //success
        event.preventDefault();

    }

    $scope.prog_modal = [];
    $scope.genres_modal = [];

    $scope.get_dvrs = function()
    {
        console.log($scope.cluster_id_check);
        var id =  $scope.cluster_id_check;
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
                console.log(data['data']);
                $scope.dvrs_modal = data['data'];
            }
            else {

            }
        }); //success


        var request = $http({
            method: "POST",
            url: "php/get_geners.php",
            data: $.param({
                cluster: id,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }); //request
        request.then(function (data) {
            //console.log(data['data']);
            if (data != "0") {
                $scope.geners_modal = data['data'];
                ////console.log('init_cases - success');
               console.log($scope.geners_modal);

            } else {
                ////console.log('init_case - failed');
            }
        }); //success


        ////console.log(id);
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
                $scope.prog_modal= data['data'];
                ////console.log('init_cases - success');
                ///console.log($scope.prog_modal);
            } else {
                ////console.log('init_case - failed');
            }
        }); //success


    }


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
                $scope.genres_tags = data['data'].slice(6, 15);
            } else {
                ////console.log('init_case - failed');
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
                ////console.log('init_cases - success');

            } else {
                ////console.log('init_case - failed');
            }
        }); //success

        ////console.log(id);
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
                ////console.log('init_cases - success');
                ////console.log($scope.programs);
            } else {
                ////console.log('init_case - failed');
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
                ////console.log('init_cases - success');
                ////console.log($scope.graph);
                for (i in $scope.graph) {
                    $scope.x.push(parseInt($scope.graph[i]['x']));
                    $scope.y.push(parseInt($scope.graph[i]['y']));
                    $scope.r.push(parseInt($scope.graph[i]['r']));
                    $scope.labels.push(parseInt($scope.graph[i]['label']));
                }
                ////console.log($scope.x);
                $scope.bubleChart($scope.x,$scope.y,$scope.r,$scope.labels);

            }
            else {
                ////console.log('init_case - failed');
            }
        }); //success
    }

    $scope.getColor = function(cluster)
    {
        if (cluster==$scope.Kcluster)
        {
            return "#0984e3";
        }
        else
        {
            return "#dfe6e9";
        }
        event.preventDefault();


    }

    $scope.bubleChart = function (x,y,r,labels)
    {
        //console.log("cluster:"+ $scope.Kcluster);
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
                        label: '9',
                        data: [{
                            x: x[9],
                            y: y[9],
                            r: r[9]*2
                        }],
                        backgroundColor:$scope.getColor(9),
                        hoverBackgroundColor: $scope.getColor(9),
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
        event.preventDefault();

    }

    $scope.linechart = function (obi)
    {

        var ctxL = document.getElementById("lineChart2").getContext('2d');
       // ////console.log("obi?");
       // ////console.log(obi[0]);
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
        event.preventDefault();

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
        event.preventDefault();

    }

    $scope.level = 'Choose your targeting level';
    $scope.moderate = 0;
    $scope.deep = 1;

    $scope.change = function ()
    {
        if ($scope.slider == 1)
        {
            $scope.level = "Analyze only demographic info";
            $scope.moderate = 1;
            $scope.deep = 1;
            $scope.level2 = 1;

        }
        else if($scope.slider==2)
        {
            $scope.level = "Analyze watching patterns";
            $scope.moderate = 0;
            $scope.deep = 1;
            $scope.level2 = 0;

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

