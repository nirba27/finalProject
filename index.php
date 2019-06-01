<html lang="en" ng-app="template" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,\n initial-scale=1,\n shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LBA</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Comfortaa:400,\n700'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angularjs-dropdown-multiselect/dist/src/angularjs-dropdown-multiselect.js"></script>

    <script src="js/lba.js"></script>
    <link rel="stylesheet" href="login/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-charts/0.2.7/angular-charts.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/style.css">


</head>


<body id="allBody"  ng-controller='ng-cases' ng-init="init_case();">

<div class="container">
    <div id="login" class="login">
        <div class="login-icon-field"><center>
                <i id="icon" style="margin-top:100px" class="fab fa-connectdevelop fa-7x"></i></center>
        </div>
        <div class="login-form">
            <div class="username-row row">
                <label for="username_input">
                    <svg version="1.1" class="user-icon" x="0px" y="0px"
                         viewBox="-255 347 100 100" xml:space="preserve" height="36px" width="30px">
          <path class="user-path" d="
          M-203.7,\n350.3c-6.8,\n0-12.4,\n6.2-12.4,\n13.8c0,\n4.5,\n2.4,\n8.6,\n5.4,\n11.1c0,\n0,\n2.2,\n1.6,\n1.9,\n3.7c-0.2,\n1.3-1.7,\n2.8-2.4,\n2.8c-0.7,\n0-6.2,\n0-6.2,\n0
          c-6.8,\n0-12.3,\n5.6-12.3,\n12.3v2.9v14.6c0,\n0.8,\n0.7,\n1.5,\n1.5,\n1.5h10.5h1h13.1h13.1h1h10.6c0.8,\n0,\n1.5-0.7,\n1.5-1.5v-14.6v-2.9
          c0-6.8-5.6-12.3-12.3-12.3c0,\n0-5.5,\n0-6.2,\n0c-0.8,\n0-2.3-1.6-2.4-2.8c-0.4-2.1,\n1.9-3.7,\n1.9-3.7c2.9-2.5,\n5.4-6.5,\n5.4-11.1
          C-191.3,\n356.5-196.9,\n350.3-203.7,\n350.3L-203.7,\n350.3z"/>
        </svg>
                </label>
                    <input ng-model="user" type="text" id="username_input" class="username-input" placeholder="Username">
            </div>
            <div class="password-row row">
                <label for="password_input">
                    <svg version="1.1" class="password-icon" x="0px" y="0px"
                         viewBox="-255 347 100 100" height="36px" width="30px">
                        <path class="key-path" d="M-191.5,\n347.8c-11.9,\n0-21.6,\n9.7-21.6,\n21.6c0,\n4,\n1.1,\n7.8,\n3.1,\n11.1l-26.5,\n26.2l-0.9,\n10h10.6l3.8-5.7l6.1-1.1
          l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,\n1.3,\n5.8,\n2,\n9.1,\n2c11.9,\n0,\n21.6-9.7,\n21.6-21.6C-169.9,\n357.4-179.6,\n347.8-191.5,\n347.8z"/>
                    </svg>
                </label>
                <input ng-model="pass" type="password" id="password_input" class="password-input" class="input" placeholder="Password"></input>
            </div>
        </div>
        <div class="call-to-action">
            <button id="login-button" type="button" ng-click="login();">Log In</button>
            <p>Don't have an account? <br>
                <a>Sign Up</a></p>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/velocity/1.2.2/velocity.min.js'></script>
<script src='https://cdn.jsdelivr.net/velocity/1.2.2/velocity.ui.min.js'></script>
<script  src="login/js/index.js"></script>





</body>

</html>
