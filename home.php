<!--?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: https://lba.azurewebsites.net");
}
?>-->


<html lang="en" ng-app="template" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LBA</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src="node_modules/angular/angular.js"></script>
    <script src="js/lba.js"></script>
    <script src="node_modules/angularjs-dropdown-multiselect/dist/src/angularjs-dropdown-multiselect.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

</head>




<!-- Central Modal Small -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-sm" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="file-upload-wrapper">
                    <input type="file" id="input-file-now" class="file-upload" />
                </div>            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Central Modal Small -->


<body id="allBody" style="text-align: center" ng-controller='ng-cases' ng-init="init_case();">

<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" target="_blank">
                <strong>LBA</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" target="_self" ng-click="statistics=1;about=0;info=0;;data=1;res=1;loading=1">About LBA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#statistics" target="_self" ng-click="statistics=0;about=1;info=1;data=1;res=1;loading=1">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#data" target="_self" ng-click="statistics=1;about=1;info=1;data=0;res=1;loading=1">Data</a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://github.com/nirba27/finalProject" class="nav-link" target="_blank">
                            <i class="fab fa-github mr-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded"
                           target="_blank">
                            <i class="fas fa-user mr-2"></i>Sign Up
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Full Page Intro -->
    <div class="view full-page-intro">

        <!--Video source-->
        <video class="video-intro" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
        </video>

        <!-- Mask & flexbox options-->
        <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="container">

                <!--Grid row-->
                <div class="row d-flex h-100 justify-content-center align-items-center wow fadeIn">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4 white-text text-center text-md-left">

                        <h1 class="display-4 font-weight-bold">Learning Based Advertising</h1>

                        <hr class="hr-light">

                        <p>
                            <strong>Best & free guide of responsive web design</strong>
                        </p>

                        <p class="mb-4 d-none d-md-block">
                            <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                                written versions
                                available. Create your own, stunning website.</strong>
                        </p>

                        <a target="_blank" ng-click="getJson();" class="btn btn-outline-white">Target Audiences
                            <i class="fas fa-graduation-cap ml-2"></i>
                        </a>
                        <a class="btn btn-outline-white" ng-click="show_group();" data-toggle="modal" data-target="#basicExampleModal">Insert New Data
                            <i class="fas fa-download ml-2"></i>
                        </a>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 col-xl-5 mb-4">

                        <img src="img/icons-02.png" alt="" class="img-fluid">

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </div>
            <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

    </div>
    <!-- Full Page Intro -->

</header>

<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Main info-->
        <section ng-hide="about" class="mt-5 wow fadeIn">

            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <img src="https://storage.googleapis.com/twg-content/images/are-people-watching-my-tv-ads-australian-adve.width-1200.jpg" class="img-fluid z-depth-1-half"
                         alt="">

                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-6 mb-4">


                    <!-- Main heading -->
                    <h3 class="h3 mb-3">Advertising Based On Watching Patterns</h3>
                    <p>This template is created with Material Design for Bootstrap (
                        <strong>MDB</strong> ) framework.</p>
                    <p>Read details below to learn more about MDB.</p>
                    <!-- Main heading -->

                    <hr>

                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->

        </section>
        <!--Section: Main info-->
        <hr class="my-5">
        <!--Section: Main features & Quick Start-->
        <section id="about" ng-hide="about">

            <h3 class="h3 text-center mb-5">What we do</h3>
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 px-4">

                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fas fa-code fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Watching Based Clustering</h5>
                            <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>
                        </div>
                    </div>
                    <!--/First row-->

                    <div style="height:30px"></div>

                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fas fa-book fa-2x blue-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Entity Resolution</h5>
                            <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will help
                                you to implement your ideas
                                easily.
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->

                    <div style="height:30px"></div>

                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fas fa-graduation-cap fa-2x cyan-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">User Customized Advertising</h5>
                            <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials,
                                which allow you to learn
                                how to use MDB as well as other technologies.</p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">

                    <p class="h5 text-center mb-4">Targeted Advertising</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0B6Q4I8Ingg" allowfullscreen></iframe>
                    </div>
                </div>
                <!--/Grid column-->

            </div>
            <!--/Grid row-->
        </section>
        <!--Section: Main features & Quick Start-->
        <!--Section: More-->
        <section ng-hide="info">

            <h2 class="my-5 h3 text-center">What makes us unique</h2>

            <!--First row-->
            <div class="row features-small mt-5 wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fab fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2 pl-3">
                            <h5 class="feature-title font-bold mb-1">Natural Language Processing</h5>
                            <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - MDB loves all browsers;
                                all browsers love MDB.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-level-up-alt fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Language Models Retrieving</h5>
                            <p class="grey-text mt-2">MDB becomes better every month. We love the project and enhance as much as
                                possible.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-comments fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Entity Resolution</h5>
                            <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is to be a
                                part of our family.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Clustering Algorithms</h5>
                            <p class="grey-text mt-2">MDB is integrated with newest jQuery. Therefore you can use all the latest
                                features which come along with
                                it.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row features-small mt-4 wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Data Enrichment</h5>
                            <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to use
                                libraries including all features as
                                well as modules for CSS (SASS files) and JS.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Ads Database</h5>
                            <p class="grey-text mt-2">We care about reliability. If you have any questions - do not hesitate to
                                contact us.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Flexibility</h5>
                            <p class="grey-text mt-2">MDB fully supports Flex Box. You can forget about alignment issues.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="far fa-file-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Cloud Service</h5>
                            <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you compile them.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

            </div>
            <!--/Second row-->

        </section>
        <!--Section: More-->
        <section id="statistics" ng-hide="statistics">

            <h3 class="h3 text-center mb-5">Statistics</h3>
            <!--Grid row-->
            <div class="row wow fadeIn" >

                <!--Grid column-->
                <div class="col-md-9 mb-4" >

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="myChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            Pie chart
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="pieChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- List group links -->
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action waves-effect">Sales
                                    <span class="badge badge-success badge-pill pull-right">22%
                    <i class="fas fa-arrow-up ml-1"></i>
                  </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">Traffic
                                    <span class="badge badge-danger badge-pill pull-right">5%
                    <i class="fas fa-arrow-down ml-1"></i>
                  </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">Orders
                                    <span class="badge badge-primary badge-pill pull-right">14</span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">Issues
                                    <span class="badge badge-primary badge-pill pull-right">123</span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">Messages
                                    <span class="badge badge-primary badge-pill pull-right">8</span>
                                </a>
                            </div>
                            <!-- List group links -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue-grey lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Lorem</th>
                                    <th>Ipsum</th>
                                    <th>Dolor</th>
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Cell 1</td>
                                    <td>Cell 2</td>
                                    <td>Cell 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Cell 4</td>
                                    <td>Cell 5</td>
                                    <td>Cell 6</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell 7</td>
                                    <td>Cell 8</td>
                                    <td>Cell 9</td>
                                </tr>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Lorem</th>
                                    <th>Ipsum</th>
                                    <th>Dolor</th>
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Cell 1</td>
                                    <td>Cell 2</td>
                                    <td>Cell 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Cell 4</td>
                                    <td>Cell 5</td>
                                    <td>Cell 6</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell 7</td>
                                    <td>Cell 8</td>
                                    <td>Cell 9</td>
                                </tr>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-6 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header">Line chart</div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="lineChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header">Radar Chart</div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="radarChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header">Doughnut Chart</div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="doughnutChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header">Horizontal Bar Chart</div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="horizontalBar"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Data-->
        <section id="data" ng-hide="data">
            <h2 class="h2 text-center mb-5">Audience Targeting</h2>
            <p class="lead">Please insert the information about the audience you are looking for</p>


            <!-- Material form group -->
            <form class="text-center border border-light p-5">

                <h2>{{level}}</h2>
                <input ng-model="slider"  ng-change="change()" type="range" class="custom-range" min="1" max="3" step="1" id="customRange3">
                <hr class="mb-5">
                <!-- Grid row -->
                <div class="row" style="margin-bottom: 40px;">
                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="Gender">
                            <option value="" disabled selected>Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="MF">Both</option>
                        </select>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="hh_num">
                            <option value="" disabled selected>Number of Households</option>
                            <option value="ho1">1</option>
                            <option value="ho2">2</option>
                            <option value="ho3">3</option>
                            <option value="ho4">4</option>
                            <option value="h56sz">5-6</option>
                            <option value="9sz">7-9</option>
                        </select>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!-- Grid row -->
                <div class="row" style="margin-bottom: 40px;">
                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="maritial">
                            <option value="" disabled selected>Maritial status</option>
                            <option value="singlee">Single</option>
                            <option value="married">Married</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="source">
                            <option value="" disabled selected>Ethnic group</option>
                            <option value="white">White</option>
                            <option value="black">Afro-american</option>
                            <option value="hispa">Hispanic</option>
                            <option value="assia">Asian</option>
                        </select>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!-- Grid row -->
                <div class="row" style="margin-bottom: 40px;">
                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="vehicles">
                            <option value="" disabled selected>Number of Vehicles</option>
                            <option value="nv0hs">0</option>
                            <option value="nv1hs">1</option>
                            <option value="nv2hs">2</option>
                            <option value="nv3hs">3</option>
                        </select>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="children">
                            <option value="" disabled selected>Presence of children</option>
                            <option value="no_ch">No children</option>
                            <option value="ch_pr">Have children</option>
                        </select>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!-- Grid row -->
                <div class="row" style="margin-bottom: 20px;">
                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="occu">
                            <option value="" disabled selected>Occupation</option>
                            <option value="oc1oc">prof_tech</option>
                            <option value="oc2oc">ad_man</option>
                            <option value="oc3oc">sales_service</option>
                            <option value="oc4oc">white_colar</option>
                            <option value="oc5oc">blue_colar</option>
                            <option value="oc6oc">student</option>
                            <option value="oc7oc">home_maker</option>
                            <option value="oc9oc">farmer</option>
                            <option value="oc8oc">retired</option>
                            <option value="ocAoc">Military</option>
                            <option value="ocBoc">Religious</option>
                            <option value="ocCoc">Self_Employed</option>
                            <option value="ocDoc">Educator</option>
                            <option value="ocEoc">Financial_Professional</option>
                            <option value="ocFoc">Medical_Professional</option>
                            <option value="ocGoc">Legal_Professional</option>
                            <option value="ocHoc">other</option>
                        </select>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col">
                        <!-- Default input -->
                        <select class="browser-default custom-select" ng-model="educ">
                            <option value="" disabled selected>Education</option>
                            <option value="edhs_">High School</option>
                            <option value="edco_">College</option>
                            <option value="edgs_">Graduate School</option>
                            <option value="edte_">Technical</option>
                        </select>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!-- Material input -->
                <div class="md-form form-group mt-5">
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <!-- Material input -->
                            <div class="md-form">
                                <input type="number" id="numberExample" class="form-control">
                                <label for="numberExample">Age Range</label>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <div class="md-form">
                                <input type="number" id="numberExample" class="form-control">
                                <label for="numberExample">To</label>
                            </div>

                        </div>
                        <!-- Grid column -->


                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <div class="md-form">
                                <input ng-model="income_top" type="number" id="numberExample" class="form-control">
                                <label for="numberExample">Income Range</label>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <!-- Material input -->

                            <div class="md-form">
                                <input ng-model="income_low" type="number" id="numberExample" class="form-control">
                                <label for="numberExample">To</label>
                            </div>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->
                    <div class="row">

                    <!-- Grid column -->
                        <div class="col">
                            <!-- Default input -->
                            <select class="browser-default custom-select" ng-model="topic">
                                <option value="" disabled selected>Mainly watching</option>
                                <option value="sports1">Sports</option>
                                <option value="knowledge1">Knowledge</option>
                                <option value="show1">Talk shows</option>
                                <option value="children1">Children</option>
                                <option value="drama1">Drama</option>
                                <option value="action1">Action</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div ng-hide='moderate' class="md-form form-group mt-5">

                    <hr class="mb-5">

                    <div ng-hide='moderate' class="md-form form-group mt-5">

                        <label>Detailed Targeting</label>


                        <div class="row">


                            <div class="col-sm-6" style="margin-top:50px">
                                <select ng-model="selectedGenre2"  data-style="btn-info" data-width="100%" class="selectpicker" data-live-search="true" multiple>
                                    <optgroup data-icon="fas fa-heart" label="News">
                                        <option>News</option>
                                        <option>Newsmagazine</option>
                                        <option>Weather</option>
                                    </optgroup>
                                    <optgroup data-icon="fas fa-futbol" label="Sports">
                                        <option>Sports event</option>
                                        <option>Football</option>
                                        <option>Playoff sports</option>
                                        <option>Sports non-event</option>
                                        <option>Volleyball</option>
                                        <option>Sports talk</option>
                                        <option>Basketball</option>
                                        <option>Mixed martial arts</option>
                                        <option>Hockey</option>
                                        <option>Soccer</option>
                                        <option>Martial arts</option>
                                        <option>Boxing</option>
                                        <option>Baseball</option>
                                        <option>Card games</option>
                                        <option>Poker</option>
                                        <option>Shooting</option>
                                        <option>Action sports</option>
                                        <option>Bowling</option>
                                        <option>Wrestling</option>
                                        <option>Exercise</option>
                                        <option>Golf</option>
                                    </optgroup>
                                    <optgroup data-icon="fas fa-book" label="Intrests">
                                        <option>Anthology</option>
                                        <option>Paranormal</option>
                                        <option>Great Job</option>
                                        <option>Music</option>
                                        <option>Special</option>
                                        <option>Parade</option>
                                        <option>Religious</option>
                                        <option>Travel</option>
                                        <option>Shopping</option>
                                        <option>Consumer</option>
                                        <option>Animals</option>
                                        <option>Relieve Back Pain</option>
                                        <option>Public affairs</option>
                                        <option>Man</option>
                                        <option>Health</option>
                                        <option>Community</option>
                                        <option>Standup</option>
                                        <option>Where Are You!</option>
                                        <option>Technology</option>
                                        <option>Hunting</option>
                                        <option>Texas Ranger</option>
                                        <option>Less Stress</option>
                                        <option>Outdoors</option>
                                        <option>Fashion</option>
                                        <option>Event</option>
                                        <option>Politics</option>
                                        <option>Isle of Wight</option>
                                        <option>Little Anthony</option>
                                        <option>Drive-Ins and Dives</option>
                                        <option>Fishing</option>
                                        <option>Dance</option>
                                        <option>Richard Roberts</option>
                                        <option>Self improvement</option>
                                        <option>Gay/lesbian</option>
                                        <option>Adults only</option>
                                        <option>Computers</option>
                                        <option>Awards</option>
                                        <option>All the Worst 2014: AC360</option>
                                        <option>Collectibles</option>
                                        <option>Gaming</option>
                                        <option>Jr. Show</option>
                                        <option>Horse</option>
                                        <option>Arts/crafts</option>
                                        <option>Rod Stewart</option>
                                        <option>Celine Dion</option>
                                        <option>Environment</option>

                                    </optgroup>
                                    <optgroup data-icon="fas fa-baby" label="Children">
                                        <option>Children</option>
                                        <option>Animated</option>
                                    </optgroup>
                                    <optgroup data-icon="fas fa-video" label="Genre">
                                        <option>Crime drama</option>
                                        <option>Science fiction</option>
                                        <option>Fantasy</option>
                                        <option>Suspense</option>
                                        <option>Action</option>
                                        <option>Adventure</option>
                                        <option>Mystery</option>
                                        <option>Drama</option>
                                        <option>Reality</option>
                                        <option>Documentary</option>
                                        <option>Talk</option>
                                        <option>Comedy</option>
                                        <option>Entertainment</option>
                                        <option>Law</option>
                                        <option>Crime</option>
                                        <option>Historical drama</option>
                                        <option>Horror</option>
                                        <option>Comedy-drama</option>
                                        <option>Romance-comedy</option>
                                        <option>Romance</option>
                                        <option>Soap</option>
                                        <option>Variety</option>
                                        <option>Game show</option>
                                        <option>Western</option>
                                        <option>War</option>
                                        <option>Miniseries</option>
                                        <option>Interview</option>
                                        <option>Musical</option>
                                        <option>Musical comedy</option>
                                        <option>Docudrama</option>

                                    </optgroup>
                                    <optgroup data-icon="fas fa-globe-americas" label="Languahes">
                                        <option>Spanish</option>
                                        <option>English</option>
                                    </optgroup>
                                    <optgroup data-icon="fas fa-hamburger" label="Knowledge">
                                        <option>Nature</option>
                                        <option>Medical</option>
                                        <option>Cooking</option>
                                        <option>Auto</option>
                                        <option>History</option>
                                        <option>House/garden</option>
                                        <option>Bus./financial</option>
                                        <option>How-to</option>
                                        <option>Home improvement</option>
                                        <option>Educational</option>
                                        <option>Military</option>
                                        <option>Parenting</option>
                                        <option>Science</option>
                                        <option>Biography</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>



                    </div>




                </div>


                <!-- Material input -->
                <div ng-hide='deep' class="md-form form-group mt-5">

                    <hr class="mb-5">

                    <!-- Material input -->
                    <div class="md-form form-group mt-5">
                        <input type="text" class="form-control" id="formGroupExampleInputMD" placeholder="INCLUDE people who watch at least ONE of the following">
                        <label for="formGroupExampleInputMD">Programs Topics Targeting</label>
                    </div>

                    <select class="browser-default custom-select" ng-model="selectedName" ng-options="x.kid for x in tags">
                        <option value="" disabled selected>Detailed Targeting</option>
                    </select>

                    <div class="row">


                        <div class="col-sm-6" style="margin-top:50px">

                            <select ng-model="selectedGenre3"  data-style="btn-info" data-width="100%" class="selectpicker" data-live-search="true" multiple>
                                <optgroup data-icon="fas fa-heart" label="Interests">
                                    <option ng-repeat="x in tags">{{x.kid}}</option>
                                </optgroup>
                                <optgroup data-icon="fas fa-futbol" label="Sports">
                                    <option>Baseball</option>
                                    <option>Basketball</option>
                                    <option>Football</option>
                                </optgroup>
                                <optgroup data-icon="fa-heart" label="Hobbies">
                                    <option>Baseball</option>
                                    <option>Basketball</option>
                                    <option>Football</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                </div>


                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" ng-click="data=1;loading=0;move();">Sumbit</button>


            </form>
            <!-- Material form group -->

        </section>
        <!--Section: Main features & Quick Start-->
        <section id="loading" ng-hide="loading">
            <h3 id="loadNotDone">Looking for your targeted audience...</h3>
            <font color="00b200"><h1 id="loadDone" style="display: none">Done <i class="fas fa-check"></i></h1></font>
            <div class="progress">
                <div id='myBar' class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button href='#res' id='ctn_btn' class="btn btn-info btn-block my-4" style="display: none" type="submit" ng-click="get_audience();">Show Results</button>
        </section>

        <section id="res" ng-hide="res">

            <!-- News jumbotron -->
            <div class="jumbotron text-center hoverable p-4">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-4 offset-md-1 mx-3 my-3">

                        <!-- Featured image -->
                        <div class="view overlay">
                            <img src="{{bg}}" class="img-fluid" alt="Sample image for first version of blog listing">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-7 text-md-left ml-3 mt-3">

                        <!-- Excerpt -->
                        <a href="#!" class="green-text">
                            <h3 class="h3 pb-1"><i class="fas fa-{{fa}} pr-1"></i> {{topic}}</h3>
                        </a>

                        <h4 class="h4 mb-4">Your Targeted Cluster is {{Kcluster}}</h4>

                        <h5 class="font-weight-normal">
                            This cluster audience is mainly watching between {{hourView}}
                            <br> Mostyl watching these genres : <label ng-repeat="x in geners|limitTo:3">{{x.genre}},</label>
                            <br> And top watcher of this attributes : <label ng-repeat="x in selectedGenre2">{{x}},</label> </h4>
                        </h5>


                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- News jumbotron -->


            <hr class="mb-5">

            <h3 class="h3 text-center mb-5">Demographic Information</h3>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 px-4">

                    <!--First row-->
                    <div class="row">
                        <div class="col-1 ">
                            <i class="fas fa-globe-europe fa-5x indigo-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Ethnic origin</h5>
                            <h2 class="grey-text"> {{ethnic}}</h2>
                        </div>

                        <div class="col-1 ">
                            <i class="fas fa-baby-carriage fa-4x blue-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Children Presence</h5>
                            <h2 class="grey-text">{{child_p}}
                            </h2>
                        </div>

                        <div class="col-1">
                            <i class="fas fa-user-graduate fa-4x green-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Education</h5>
                            <h2 class="grey-text">{{education}}</h2>
                        </div>

                    </div>
                    <!--/First row-->
                </div>

            </div>
            <!--/Grid row-->
            <div style="height:50px"></div>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 px-4">

                    <!--First row-->
                    <div class="row">
                        <div class="col-1 ">
                            <i class="fas fa-dollar-sign fa-5x teal-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Average Income</h5>
                            <h2 class="grey-text" id="el">0</h2>
                        </div>

                        <div class="col-1 ">
                            <i class="fas fa-ring fa-4x light-blue-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Common Gender,Age</h5>
                            <h2 class="grey-text">{{age}}
                            </h2>
                        </div>

                        <div class="col-1">
                            <i class="fas fa-male fa-4x purple-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Number of Adults</h5>
                            <h2 class="grey-text">{{NumberAdults}}</h2>
                        </div>

                    </div>
                    <!--/First row-->
                </div>

            </div>
            <!--/Grid row-->

            <div style="height:50px"></div>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 px-4">

                    <!--First row-->
                    <div class="row">
                        <div class="col-1 ">
                            <i class="fas fa-car fa-5x indigo-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Vechicles</h5>
                            <h2 class="grey-text" id="el">2</h2>
                        </div>

                        <div class="col-1 ">
                            <i class="fas fa-chart-line fa-4x blue-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">Net Value</h5>
                            <h2 class="grey-text">{{nt}}
                            </h2>
                        </div>

                        <div class="col-1">
                            <i class="fas fa-home fa-4x cyan-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title">House value</h5>
                            <h2 class="grey-text">{{homeVal}}</h2>
                        </div>

                    </div>
                    <!--/First row-->
                </div>

            </div>
            <!--/Grid row-->
            <hr class="mb-5">

            <section id="map" >
                <h3 class="h3 text-center mb-5">Community Detection</h3>
                <!--Grid column-->
                <div class="col-md-12">
                    <!--Card-->
                    <link href="lib/concept-map.css" rel="stylesheet"></link>
                    <script src="lib/d3.min.js" type="text/javascript"></script>
                    <script src="lib/packages.js" type="text/javascript"></script>
                    <script src="lib/concept-map.js" type="text/javascript"></script>
                    <div id="graph" class="conceptmap" ></div>
                    <div id="graph-info"></div>
                </div>
            </section>


            <hr class="mb-5">

            <h3 class="h3 text-center mb-5">Watching Patterns</h3>
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            Watching Hours
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="lineChart2"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>

                <!--Grid row-->
                <div class="row wow fadeIn">

                    <!--Grid column-->
                    <div class="col-md-12 mb-4">

                        <!--Card-->
                        <div class="card mb-4">

                            <!-- Card header -->
                            <div class="card-header text-center">
                                Watching Hours
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <canvas id="lineChart3"></canvas>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Genre</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr ng-repeat="x in geners" >
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{x.genre}}</td>
                                    <td>{{x.cnt}}</td>
                                </tr>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Genre</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr ng-repeat="x in keywords_array" >
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{x.key}}</td>
                                    <td>{{x.cnt}}</td>
                                </tr>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <section id="kmeans" ng-hide="level2">
                <div class="col-md-12 mb-4">

                    <div  id="prog_carousel" class="carousel slide wow fadeIn" data-ride="carousel"  style="margin-top: 20px; width:100%; height: 300px !important;">
                        <div  class="carousel-inner z-depth-2" style=" width:100%; height: 265px !important;">
                            <div ng-repeat="x in programs | limitTo:20" class="carousel-item" ng-class="{active:!$index}" >
                                <div class="card unique-color-dark white-text">
                                    <div class="row no-gutters">
                                        <div class="col-md-2" style="box-shadow: inset 3px 3px 10px 0 #000000">
                                            <img style="opacity:0.7;" src="{{x.cover}}" height="300px">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card-body">
                                                <h1 class="card-title">{{x.pname}}</h1>
                                                <h4 class="card-title text-muted" style="opacity: 0.5;font-family: 'Calibri Light'">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                <button type="button" class="btn btn-secondary btn-md">Read more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" style="height: 300px !important;" href="#prog_carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" style="height: 300px !important;" href="#prog_carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <hr class="mb-5" style="margin-bottom: 20px;">

                <h3 class="h3 text-center mb-5">Clusters Plot</h3>

                <canvas id="bubbleChart" class="z-depth-1-half"></canvas>

                <hr class="mb-5">

                <!-- Card deck -->
                <div class="card-deck wow fadeInUp">
                    <!-- Card -->
                    <div ng-repeat="x in programs | limitTo:5" class="card unique-color-dark white-text mb-4 z-depth-1-half" >
                        <!--Card image-->
                        <div class="view overlay">
                            <img class="card-img-top" src="{{x.cover}}">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!--Card content-->
                        <div class="card-body">
                            <h4><span class="badge badge-pill badge-default ">{{x.views}}</span></h4>

                            <!--Title-->
                            <h4 class="card-title">{{x.pname}}</h4>
                            <!--Text-->
                            <p class="card-text">{{x.genre}}</p>
                            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                            <button type="button" class="btn btn-secondary btn-md">Read more</button>

                        </div>

                    </div>
                    <!-- Card -->
                </div>
                <!-- Card deck -->


            </section>


            <hr class="mb-5">


                <!--Grid column-->
                <div class="col-md-12 mb-4" style="margin-top:50px;">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                <tr>
                                    <th>ID</th>
                                    <th>DVR</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <!-- Table head -->
                                <!-- Table body -->
                                <tbody>
                                <tr ng-repeat="x in dvrs" >
                                    <th scope="row">{{x.id}}</th>
                                    <td>{{x.DVR}}</td>
                                    <td><input type="checkbox" name={{x.DVR}} value="checked" /></td>
                                </tr>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->
                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <button  id='ctn_btn_2' class="btn btn-primary btn-block my-4" type="submit">Export</button>


        </section>
        <!--Section: Main features & Quick Start-->
    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">
    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">

        <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
            <i class="fab fa-github mr-3"></i>
        </a>


    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright:LBA Corp.
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
<!-- SCRIPTS -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>
<!-- Initializations -->
<script>
    $(function(){
        plotConceptMap();
    });
    function plotConceptMap()
    {

    }
</script>
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $('.my-select').selectpicker();
</script>

<script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true,
            legend: false
        }
    });
    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
        type: 'radar',
        data: {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [{
                label: "My First dataset",
                data: [65, 59, 90, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            }, {
                label: "My Second dataset",
                data: [28, 48, 40, 19, 96, 27, 100],
                backgroundColor: [
                    'rgba(0, 250, 220, .2)',
                ],
                borderColor: [
                    'rgba(0, 213, 132, .7)',
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true
        }
    });
    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
        type: 'doughnut',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>


<style type="text/css">
    html,
    body,
    header,
    .view {
        height: 100%;
    }
    @media (max-width: 740px) {
        html,
        body,
        header,
        .view {
            height: 1050px;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        header,
        .view {
            height: 700px;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {
            background: #1C2331 !important;
        }
    }
</style>


</body>

</html>