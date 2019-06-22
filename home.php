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


<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sign up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Default form register -->
                <form class="text-center border border-light p-5">

                    <p class="h4 mb-4">Sign up</p>

                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                        </div>
                    </div>

                    <input ng-model='signup_user' type="user" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="User Name">

                    <!-- E-mail -->
                    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

                    <!-- Password -->
                    <input ng-model='signup_pass' type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 8 characters and 1 digit
                    </small>


                    <!-- Newsletter -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                    </div>

                    <p ng-modal="sign_message"></p>
                    <!-- Sign up button -->
                    <button ng-click="signup()" class="btn btn-info my-4 btn-block" type="submit">Sign up</button>


                    <hr>

                    <!-- Terms of service -->

                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
</div>

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



<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand white-text" target="_blank">
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
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home
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
                        <a class="nav-link font-weight-bold" href="#data" target="_self" ng-click="statistics=1;about=1;info=1;data=0;res=1;loading=1">Target Audience</a>
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
                        <a data-toggle="modal" data-target="#signup" class="nav-link border border-light rounded"
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

                        <h3>
                            <strong>Target future customers and buyers.</strong>
                        </h3>

                        <h5 class="mb-4 d-none d-md-block">
                            <strong>
                                LBA provide a simple way to reach your audience.
                                no matter what kind of audience you want to reach, you'll find them here.
                            </strong>
                        </h5>

                        <a href="#data" target="_self" ng-click="statistics=1;about=1;info=1;data=0;res=1;loading=1" class="btn btn-outline-white">Target Audiences
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


<body id="allBody" style="text-align: center" ng-controller='ng-cases' ng-init="init_case();">

<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Main info-->
        <section class="mt-5 wow fadeIn">

            <!--Grid row-->
            <div class="row" ng-hide="about" >
                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <img src="https://storage.googleapis.com/twg-content/images/are-people-watching-my-tv-ads-australian-adve.width-1200.jpg" class="img-fluid z-depth-1-half"
                         alt="">

                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-6 mb-4">


                    <!-- Main heading -->
                    <h3 class="h3 mb-3">Help your ads find the people who will love your business.</h3>
                    <h5>Our powerful audience selection tools let you show ads to the people who are exactly right for your business.</h5>

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

            <h3 class="h3 text-center mb-5">Reach your core target audience.</h3>
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
                            <h5 class="feature-title">Demographics</h5>
                            <p class="grey-text">Select an audience based on age, gender, education, relationship status, job title and more.</p>
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
                            <h5 class="feature-title">Interests</h5>
                            <p class="grey-text">Choose the interests and hobbies of the people you want your ad to reach – from organic food to action films.
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
                            <h5 class="feature-title">Connections</h5>
                            <p class="grey-text">Find people who are similar to your current customers.</p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">

                    <p class="h5 text-center mb-4">Targeted Advertising</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/Yst_dqNCsyg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <!--/Grid column-->

            </div>
            <!--/Grid row-->
        </section>
        <!--Section: Main features & Quick Start-->
        <!--Section: More-->
        <section ng-hide="info">

            <h2 class="my-5 h3 text-center"></h2>

            <!--First row-->
            <div class="row features-small mt-5 wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2 pl-3">
                            <h5 class="feature-title font-bold mb-1">MFI-Blocks</h5>
                            <p class="grey-text mt-2">
                                Using the MFI algorithm which was developed by Professor Avigdor Gal of the Faculty of Industrial Engineering & Management at the Technion to find cluster based on similarity between the DVR records attributes.

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
                            <h5 class="feature-title font-bold mb-1">Data Enrichment</h5>
                            <p class="grey-text mt-2">
                                All of data is being proccesed and enriched in order to get the best results.
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
                            <i class="fas fa-cloud fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Azure DB</h5>
                            <p class="grey-text mt-2">
                                The analyzed data can be reached from anywhere using Azure DB cloud service.
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
                            <i class="fas fa-eye fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Visualizations</h5>
                            <p class="grey-text mt-2">The results are presented in a simple and easy to understand way using top level visualizations.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

            </div>
            <!--/First row-->



            <div class="jumbotron jumbotron-fluid" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLGcpluuQ6g6NzkRWMaUCswVv3nTVRRL5xFy5pK_NBA5gLfSgU); background-size: 100% 100%;">
                <div class="container">
                    <h2 class="display-7 white-text">58,000 Households, More than 70,000 DVRs</h2>
                    <p class="lead grey-text"></p>
                </div>
            </div>


            <h2 class="my-5 h3 text-center">Here's how to target an audience</h2>

            <div class="accordion" id="accordionExample" width="100%">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Select your audience &nbsp           <i class="fas fa-plus grey-text"></i>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            First go to the target audience page and fill in the details of your desired audience &nbsp           <i class="fas fa-plus grey-text"></i>
                        </div>
                        <img src="img\1.png">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Analyze your data &nbsp  <i class="fas fa-plus grey-text"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Next, your query will be analyzed and you will be route to the results page where you could see all the details of your matched audience.
                        </div>
                        <img src="img\2.png">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Export the data to your mail &nbsp  <i class="fas fa-plus grey-text"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Now you can check the names of the DVRs you want to advertise to and the result will be sent to your mail.
                        </div>
                        <img src="img\3.png">
                    </div>
                </div>
            </div>



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
                            Education
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
                                <a class="list-group-item list-group-item-action waves-effect">DVRs
                                    <span class="badge badge-success badge-pill pull-right">78777
                                  </span>
                                 </a>
                                 <a class="list-group-item list-group-item-action waves-effect">Clusters
                                <span class="badge badge-danger badge-pill pull-right">6824
                                  </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">House Holds
                                    <span class="badge badge-primary badge-pill pull-right">58061</span>
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
                                    <th>Hours</th>
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>21:00-22:00</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>20:00-21:00</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>7:00-8:00</td>
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
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>News</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Sports</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Reality</td>
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
                        <div class="card-header">Watching Time</div>

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
                        <div class="card-header">Income</div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="doughnutChart"></canvas>

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
                <input ng-model="slider"  ng-change="change()" type="range" class="custom-range" min="1" max="2" step="1" id="customRange3">
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
                            <option value="" disabled selected>Size of Household</option>
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
                            <option value="" disabled selected>Marital status</option>
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
                                <input ng-model="age_low" type="number" id="numberExample" class="form-control">
                                <label for="numberExample">Age Range</label>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <div class="md-form">
                                <input ng-model="age_top" type="number" id="numberExample" class="form-control">
                                <label for="numberExample">To</label>
                            </div>

                        </div>
                        <!-- Grid column -->


                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <div class="md-form">
                                <input ng-model="income_low" type="number" id="numberExample" class="form-control">
                                <label for="numberExample">Income Range</label>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col">
                            <!-- Material input -->
                            <!-- Material input -->

                            <div class="md-form">
                                <input ng-model="income_top" type="number" id="numberExample" class="form-control">
                                <label for="numberExample">To</label>
                            </div>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <hr class="mb-5">

                </div>


                <div ng-hide='moderate' class="md-form form-group mt-5">
                        <h4 class="h4 text-center mb-5">Detailed Targeting</h4>
                        <p class="lead">INCLUDE people who match at least ONE of the following</p>
                    <hr class="mb-5">

                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                            <div class="col-sm-12"><!-- Default input -->
                                <select class="browser-default custom-select" ng-model="topic">
                                    <option value="" disabled selected>Mainly watching</option>
                                    <option value="sports1">Sports</option>
                                    <option value="knowledge1">Knowledge</option>
                                    <option value="talk">Talk shows</option>
                                    <option value="children1">Children</option>
                                    <option value="drama">Drama-Action</option>
                                    <option value="news">News</option>
                                    <option value="other">Entertainment</option>
                                    <option value="entert">Other</option>
                                </select>
                            </div>
                        <div class="col-sm-12" style="margin-top:25px">
                            <select ng-model="selectedGenre2"  data-style="btn-light" data-width="100%" class="selectpicker" data-live-search="true" multiple>
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

                    <div class="row">
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
                <button style='margin-top:25px;' class="btn btn-primary btn-block my-4" type="submit" ng-click="data=1;loading=0;move();get_audience();">Submit</button>


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
            <button autoscroll="false" id='ctn_btn' class="btn btn-info btn-block my-4" style="display: none" type="submit" ng-click="continue();">Show Results</button>
        </section>

        <section id="res" ng-hide="res">
            <!-- News jumbotron -->
            <div class="card card-image" style="background-size:100%;background-image: url({{jbg}});">
                <div class="text-white text-center rgba-stylish-strong py-5 px-4">
                <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-md-4 offset-md-1 mx-3 my-3">

                            <!-- Featured image -->
                            <div class="view overlay">
                                <img src={{bg}} class="img-fluid" alt="Sample image for first version of blog listing">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-7 text-md-left ml-3 mt-3">

                            <!-- Excerpt -->
                            <a href="#!" class="cyan-text">
                                <h1 class="h1 pb-1"><i class="fas fa-{{fa}} pr-1"></i> {{topic}}</h1>
                            </a>

                            <h4 class="font-weight-normal">
                                Most popular watching time is between <label class="h5 cyan-text font-weight-bold">{{hmax}}</label>
                                <br>Your audience is most likely to watch <span class="badge badge-pill badge-info" ng-repeat="x in geners_top|limitTo:3">#{{x}}</span>
                                <br>And a top viewer of <span class="badge badge-pill badge-info" ng-repeat="x in genres_tags">#{{x.genre}}</span><span class="badge badge-pill badge-info" ng-repeat="x in selectedGenre2">#{{x}}</span></h4>
                            </h4>


                        </div>
                        <!-- Grid column -->

                    </div>
                <!-- Grid row -->
                </div>
            </div>
            <!-- News jumbotron -->


            <hr class="mb-5">

            <h2 class="h2 text-center mb-5 font-weight-bold blue-grey-text">Demographic Information</h2>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 px-4">
                    <!--First row-->
                    <div class="row">
                            <div class="col-1">
                                <i class="fas fa-globe-europe fa-5x indigo-text"></i>
                            </div>
                            <div class="col-3">
                                <h5 class="feature-title font-weight-bold blue-grey-text">Ethnic origin</h5>
                                <h2 class="grey-text"> {{ethnic}}</h2>
                            </div>
                        <div class="col-1 ">
                            <i class="fas fa-baby-carriage fa-4x blue-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title font-weight-bold blue-grey-text">Children Presence</h5>
                            <h2 class="grey-text">{{child_p}}
                            </h2>
                        </div>

                        <div class="col-1">
                            <i class="fas fa-user-graduate fa-4x green-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title font-weight-bold blue-grey-text">Education</h5>
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
                            <h5 class="feature-title font-weight-bold blue-grey-text">Average Income</h5>
                            <h2 class="grey-text" id="el">0</h2>
                        </div>

                        <div class="col-1 ">
                            <i class="fas fa-venus-mars fa-4x light-blue-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title font-weight-bold blue-grey-text">Common Gender,Age</h5>
                            <h2 class="grey-text">{{age}}
                            </h2>
                        </div>

                        <div class="col-1">
                            <i class="fas fa-male fa-4x purple-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title font-weight-bold blue-grey-text">Home residents</h5>
                            <h2 class="grey-text">{{numberAdults}}</h2>
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
                            <h5 class="feature-title font-weight-bold blue-grey-text">Vechicles</h5>
                            <h2 class="grey-text" id="el">{{cars}}</h2>
                        </div>

                        <div class="col-1 ">
                            <i class="fas fa-chart-line fa-4x blue-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title font-weight-bold blue-grey-text">Net Value</h5>
                            <h2 class="grey-text">{{nt}}
                            </h2>
                        </div>

                        <div class="col-1">
                            <i class="fas fa-home fa-4x cyan-text"></i>
                        </div>
                        <div class="col-3">
                            <h5 class="feature-title font-weight-bold blue-grey-text">House value</h5>
                            <h2 class="grey-text">{{homeVal}}</h2>
                        </div>

                    </div>
                    <!--/First row-->
                </div>
            </div>
            <!--/Grid row-->
            <hr class="mb-5">

            <section id="map" >
                <h2 class="h2 text-center mb-5 font-weight-bold blue-grey-text">Community Detection</h2>
                <!--Grid column-->
                <div class="col-md-12">
                    <!--Card-->
                    <link href="lib/concept-map.css" rel="stylesheet"></link>
                    <script src="lib/d3.min.js" type="text/javascript"></script>
                    <script src="lib/packages.js" type="text/javascript"></script>
                    <script src="lib/concept-map.js" type="text/javascript"></script>
                    <div id="plot_div">
                        <div id="graph" class="conceptmap"></div>
                        <div id="graph-info"></div>
                    </div>
                </div>
            </section>


            <hr class="mb-5">

            <h2 class="h2 text-center mb-5 font-weight-bold blue-grey-text">Watching Patterns</h2>
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
                                <canvas id="radarChart2"></canvas>
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
                                <canvas id="pieChart2"></canvas>
                                <!-- Table  -->

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>


                    <hr class="mb-5">

                    <h2 class="h2 text-center mb-5 font-weight-bold blue-grey-text">Recommended Programs,Topics and Genres</h2>
                    <!--Grid row-->
                    <div class="row wow fadeIn">

                    <!-- Card deck -->
                    <div ng-hide='top' class="card-deck wow fadeInUp col-sm-12 mb-4"" style="margin-left:20px">
                        <!-- Card -->
                        <div ng-repeat="x in top_prog | limitTo:5" class="card unique-color-dark white-text col-sm-2 mb-4 z-depth-1-half " >
                            <!--Card image-->
                            <div class="view overlay" style="margin-top: 15px;">
                                <img class="card-img-top" src="{{x.cover}}">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <!--Title-->
                                <h5 class="card-title">{{x.pname}}</h5>
                                <!--Text-->
                                <p class="card-text">{{x.genre}}</p>
                                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->

                            </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <!-- Card deck -->
                </div>
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
                                <tr ng-repeat="x in geners | limitTo:10" >
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{x.genre}}</td>
                                    <td>{{x.cnt}}%</td>
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


                <h2 class="h2 text-center mb-5 font-weight-bold blue-grey-text">Clusters Plot</h2>
                <h5 class="h4 mb-4">Your Targeted Cluster is {{Kcluster}}</h5>

                <canvas id="bubbleChart" class="z-depth-1-half"></canvas>

                <!-- Modal -->
                <div class="modal fade" id="cluster_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cluster {{cluster_id_check}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <!--Grid row-->
                                <div class="row wow fadeIn">
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
                                                <tr ng-repeat="x in geners_modal | limitTo:5" >
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
                                                    <th>Prog</th>
                                                </tr>
                                                </thead>
                                                <!-- Table head -->
                                                <!-- Table body -->
                                                <tbody>
                                                <tr ng-repeat="x in prog_modal | limitTo:5" >
                                                    <th scope="row">{{$index+1}}</th>
                                                    <td>{{x.pname}}</td>
                                                </tr>
                                                </tbody>
                                                <!-- Table body -->
                                            </table>
                                            <!-- Table  -->                                            <!-- Table  -->

                                        </div>

                                    </div>
                                    <!--/.Card-->

                                </div>
                                <!--Grid column-->
                                </div>


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
                                            <tr ng-repeat="x in dvrs_modal" >
                                                <th scope="row">{{$index+1}}</th>
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

                        </div>
                    </div>
                </div>

                <div class="input-group" >
                    <div class="col-sm-6" style="margin-top: 20px;"><!-- Default input -->
                        <select class="browser-default custom-select" ng-model="cluster_id_check">
                            <option value="" disabled selected>Cluster</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <button style="margin-top: 20px;" data-target="#cluster_info" data-toggle="modal" class="btn btn-primary col-sm-6" ng-click="get_dvrs();">Check this cluster</button>

                </div>


                <hr class="mb-5">




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

                <button ng-hide="export_hide"  id='ctn_btn_2' class="btn btn-primary btn-block my-4" type="submit" ng-click="export()">Export</button>
                <div ng-hide='sucess' class="col-sm-12 alert alert-success alert-dismissible fade show" role="alert">
                   Done! Check out your e-mail for the DVR list.
                </div>

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
            labels: ["Comedy", "Knowledge", "Drama-Action", "News", "Sports", "Children","Talk Show"],
            datasets: [{
                label: '# of Hits for each Cateogry',
                data: [859, 620, 834, 834, 838, 933 ,633],
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
            labels: ["College", "High School", "Grad", "Tech"],
            datasets: [{
                data: [1631,1513, 2035, 130],
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
            labels: ["Morning", "Noon", "Evening", "Night"],
            datasets: [{
                label: "Popular watching time",
                data: [100, 59, 120, 39],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
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
            labels: ["Very High", "High", "Medium", "Low"],
            datasets: [{
                data: [2540, 2031 ,2364, 2563],
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