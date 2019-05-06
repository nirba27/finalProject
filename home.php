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
  <script src="js/angular.min.js"></script>
  <script src="js/lba.js"></script>

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
      <a class="navbar-brand" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
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
            <a href="https://www.facebook.com/" class="nav-link" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/" class="nav-link" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
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

            <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white">Target Audiences
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

          <p>
            <strong>400+</strong> material UI elements,
            <strong>600+</strong> material icons,
            <strong>74</strong> CSS animations, SASS files, templates, tutorials and many more.
            <strong>Free for personal and commercial use.</strong>
          </p>

          <!-- CTA -->
          <a target="_blank" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" class="btn btn-indigo btn-md">Download
            <i class="fas fa-download ml-1"></i>
          </a>
          <a target="_blank" href="https://mdbootstrap.com/docs/jquery/components/" class="btn btn-indigo btn-md">Live
            demo
            <i class="far fa-image ml-1"></i>
          </a>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Main info-->

    <hr class="my-5">

    <!--Section: Main features & Quick Start-->
    <section id="about" ng-hide="about">

      <h3 class="h3 text-center mb-5">About LBA</h3>
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

          <p class="h5 text-center mb-4">Watch our demo</p>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0B6Q4I8Ingg" allowfullscreen></iframe>
          </div>
        </div>
        <!--/Grid column-->

      </div>
      <!--/Grid row-->

    </section>
    <!--Section: Main features & Quick Start-->

    <hr class="mb-5">

    <!--Section: More-->
    <section ng-hide="info">

      <h2 class="my-5 h3 text-center">...and even more</h2>

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
          <hr class="mb-5">

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


          <!--Grid row-->
          <div class="row wow fadeIn">

              <!--Grid column-->
              <div class="col-md-12 mb-4">

                  <!--Card-->
                  <div class="card">

                      <!-- Card header -->
                      <div class="card-header">Google map</div>



                  </div>
                  <!--/.Card-->

              </div>
              <!--Grid column-->

      </section>

      <!--Section: Data-->
      <section id="data" ng-hide="data">

          <hr class="mb-5">

          <h3 class="h3 text-center mb-5">Audience Targeting</h3>
          <p class="grey-text">Please insert the information about the audience you are looking for.</p>


          <!-- Material form group -->
          <form>
              <label for="customRange3">Choose your targeting level</label>
              <input type="range" class="custom-range" min="1" max="3" step="1" id="customRange3">

              <!-- Material input -->
              <div class="md-form form-group mt-5">
                  <input type="text" class="form-control" id="formGroupExampleInputMD" placeholder="Example input">
                  <label for="formGroupExampleInputMD">Lookalike Audiences</label>
              </div>
              <!-- Material input -->
              <div class="md-form form-group mt-5">

                  <select class="browser-default custom-select">
                      <option value="" disabled selected>Status</option>
                      <option ng-repeat="x in keys" value="1">{{x.key}}</option>
                      <option value="2">Couple</option>
                      <option value="3">Family</option>
                      <option value="3">All</option>
                  </select>

              </div>
              <div class="md-form form-group mt-5">
                  <select class="browser-default custom-select">
                      <option value="" disabled selected>Gender</option>
                      <option value="1">Men</option>
                      <option value="2">Women</option>
                      <option value="2">Both</option>
                  </select>
              </div>
              <!-- Material input -->
              <div class="md-form form-group mt-5">
                  <!-- Grid row -->
                  <div class="row">
                      <!-- Grid column -->
                      <div class="col">
                          <!-- Material input -->
                          <div class="md-form mt-0">
                              <input type="text" class="form-control" placeholder="From">
                              <label for="formGroupExampleInputMD">Age</label>

                          </div>
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col">
                          <!-- Material input -->
                          <div class="md-form mt-0">
                              <input type="text" class="form-control" placeholder="To">

                          </div>

                      </div>
                      <!-- Grid column -->
                  </div>
                  <!-- Grid row -->

              </div>

              <div class="md-form form-group mt-5">
                  <!-- Grid row -->
                  <div class="row">
                      <!-- Grid column -->
                      <div class="col">
                          <!-- Material input -->
                          <div class="md-form mt-0">
                              <input type="text" class="form-control" placeholder="From">
                              <label for="formGroupExampleInputMD">Income</label>

                          </div>
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col">
                          <!-- Material input -->
                          <div class="md-form mt-0">
                              <input type="text" class="form-control" placeholder="To">

                          </div>

                      </div>
                      <!-- Grid column -->
                  </div>
                  <!-- Grid row -->

              </div>


              <div class="md-form form-group mt-5">
                  <select ng-model="attr" class="browser-default custom-select">
                      <option value="" disabled selected>Interests</option>
                      <option value="1">Sport</option>
                      <option value="2">History</option>
                      <option value="3">Children</option>
                      <option value="4">Adventures</option>
                  </select>
              </div>


              <hr class="mb-5">

              <div class="md-form form-group mt-5">
                  <input type="text" class="form-control" id="formGroupExampleInput5MD" placeholder="Another input">
                  <label for="formGroupExampleInput2MD">Detailed Targeting</label>
              </div>

              <!-- Sign in button -->
              <button class="btn btn-info btn-block my-4" type="submit" ng-click="data=1;loading=0;get_audience();">Sumbit</button>

          </form>
          <!-- Material form group -->

      </section>

      <!--Section: Main features & Quick Start-->
      <section id="loading" ng-hide="loading">
          <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
              <span class="sr-only">Loading...</span>
          </div>
      </section>

      <section id="res" ng-hide="res">

          <h3 class="h3 text-center mb-5">Your Targeted Audience</h3>

          <!--Grid row-->
          <div class="row wow fadeIn">

              <!--Grid column-->
              <div class="col-md-12 px-4">

                  <!--First row-->
                  <div class="row">
                      <div class="col-1 ">
                          <i class="fas fa-sun fa-5x indigo-text"></i>
                      </div>
                      <div class="col-3">
                          <h5 class="feature-title">Watching Time</h5>
                          <h2 class="grey-text"> 10AM - 20PM</h2>
                      </div>

                      <div class="col-1 ">
                          <i class="fas fa-tv fa-4x blue-text"></i>
                      </div>
                      <div class="col-3">
                          <h5 class="feature-title">Recommended Channels</h5>
                          <h2 class="grey-text">1011,1028,22,46
                          </h2>
                      </div>

                      <div class="col-1">
                          <i class="fas fa-graduation-cap fa-4x cyan-text"></i>
                      </div>
                      <div class="col-3">
                          <h5 class="feature-title">Audience Age</h5>
                          <h2 class="grey-text">10-22</h2>
                      </div>

                  </div>
                  <!--/First row-->
              </div>

          </div>
          <!--/Grid row-->
          <div style="height:40px"></div>

          <!--Grid row-->
          <div class="row wow fadeIn">

              <!--Grid column-->
              <div class="col-md-12 px-4">

                  <!--First row-->
                  <div class="row">
                      <div class="col-1 ">
                          <i class="fas fa-dollar-sign fa-5x indigo-text"></i>
                      </div>
                      <div class="col-3">
                          <h5 class="feature-title">Average Income</h5>
                          <h2 class="grey-text"> 3000$ </h2>
                      </div>

                      <div class="col-1 ">
                          <i class="fas fa-ring fa-4x blue-text"></i>
                      </div>
                      <div class="col-3">
                          <h5 class="feature-title">Common status</h5>
                          <h2 class="grey-text">Singles
                          </h2>
                      </div>

                      <div class="col-1">
                          <i class="fas fa-video fa-4x cyan-text"></i>
                      </div>
                      <div class="col-3">
                          <h5 class="feature-title">Favourite Genre</h5>
                          <h2 class="grey-text">Sport</h2>
                      </div>

                  </div>
                  <!--/First row-->
              </div>

          </div>
          <!--/Grid row-->
          <hr class="mb-5">

          <!--Grid column-->
          <div class="col-lg-12 col-md-6 mb-4">
          </div>
          <!--Grid column-->
          <hr class="mb-5">

          <img src="https://m.media-amazon.com/images/M/MV5BNTk2NzEyNTQtZTQ5MS00MjAyLTgzMDMtNDNkYTBkM2M2OTU3XkEyXkFqcGdeQXVyODUwNjEzMzg@._V1_SY150_CR0,0,101,150_.jpg" class="wow fadeInUp" data-wow-delay="0.6s">
          <img src="https://m.media-amazon.com/images/M/MV5BNTk2NzEyNTQtZTQ5MS00MjAyLTgzMDMtNDNkYTBkM2M2OTU3XkEyXkFqcGdeQXVyODUwNjEzMzg@._V1_SY150_CR0,0,101,150_.jpg" class="wow fadeInUp" data-wow-delay="0.8s">
          <img src="https://m.media-amazon.com/images/M/MV5BNTk2NzEyNTQtZTQ5MS00MjAyLTgzMDMtNDNkYTBkM2M2OTU3XkEyXkFqcGdeQXVyODUwNjEzMzg@._V1_SY150_CR0,0,101,150_.jpg" class="wow fadeInUp" data-wow-delay="0.99s">

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

<!-- Charts -->
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
    //line
    var ctxL = document.getElementById("lineChart2").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2,
                data: [65, 59, 80, 81, 56, 55, 40]
            },
                {
                    label: "My Second dataset",
                    backgroundColor: [
                        'rgba(0, 137, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 10, 130, .7)',
                    ],
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        },
        options: {
            responsive: true
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
