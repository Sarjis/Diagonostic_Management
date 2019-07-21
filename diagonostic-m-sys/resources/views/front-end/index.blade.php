<!DOCTYPE HTML>
<html>
<head>
    <title>New Shop a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home ::
        w3layouts</title>
    <!--css-->
    <link href="{{asset('/')}}front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('/')}}front-end/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('/')}}front-end/css/font-awesome.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <!--//End-rate-->
</head>
<body>
<div id="app">
    <!--header-->
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="top-left">
                    <a href="#"> Help <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
                </div>
                <div class="top-right">
                    <ul>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="registered.html"> Create Account </a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="heder-bottom">
            <div class="container">
                <div class="logo-nav">
                    <div class="logo-nav-left">
                        <h1><a href="index.html">DIAGNOSTIC CENTER <span>Bill Management System</span></a></h1>
                    </div>
                    <div class="logo-nav-left1">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1"
                                        data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.html" class="act">Home</a></li>
                                    <!-- Mega Menu -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setup<b
                                                    class="caret"></b></a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <div class="col-sm-3  multi-gd-img">
                                                    <ul class="multi-column-dropdown">
                                                        <h6>Test Type</h6>
                                                        <li><router-link :to="{path:'/'}">Test Type Setup</router-link></li>
                                                        <li><router-link :to="{path:'/payment'}">Payment</router-link></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3  multi-gd-img">
                                                    <ul class="multi-column-dropdown">
                                                        <h6>Test Setup</h6>
                                                        <li><router-link :to="{path:'/test'}">Test Setup</router-link></li>
                                                        <li><router-link :to="{path:'/test-request'}">Test Request Setup</router-link></li>
                                                        <li><router-link :to="{path:'/unpaid-bill'}">Unpaid Bill Report</router-link></li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--header-->
    <!--banner-->

    <!--banner-->
    <!--content-->
    <div class="content ">
        <div class="container">
            <div class="well"></div>
            <div class="row">
                <router-view></router-view>
            </div>

        </div>
    </div>
    <!--content-->
    <!---footer--->
    <div class="footer-w3l">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid">
                    <h4>About </h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat.</p>
                    <div class="social-icon">
                        <a href="#"><i class="icon"></i></a>
                        <a href="#"><i class="icon1"></i></a>
                        <a href="#"><i class="icon2"></i></a>
                        <a href="#"><i class="icon3"></i></a>
                    </div>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4>My Account</h4>
                    <ul>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="registered.html"> Create Account </a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="codes.html">Short Codes</a></li>
                        <li><a href="mail.html">Mail Us</a></li>
                        <li><a href="products1.html">products1</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid foot">
                    <h4>Contacts</h4>
                    <ul>
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">E Comertown Rd,
                                Westby, USA</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">1
                                599-033-5036</a></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                    href="mailto:example@mail.com"> example@mail.com</a></li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <!---footer--->
    <!--copy-->
    <div class="copy-section">
        <div class="container">
            <div class="copy-left">
                <p>&copy; 2016 New Shop . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a>
                </p>
            </div>
            <div class="copy-right">
                <img src="{{asset('/')}}front-end/images/card.png" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--copy-->


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.1.1/jspdf.plugin.autotable.js
"></script>
<script src="{{asset('/')}}js/app.js"></script>
</body>
</html>