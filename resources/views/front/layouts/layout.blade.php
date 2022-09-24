<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Imagination Factory</title>
    <link rel="icon" href="{{asset('/IF_LOGO.png')}}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Gigaland - NFT Marketplace Website Template" name="description" />
    <meta content="" name="keywords" />
    <meta content="" name="author" />
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link id="bootstrap-grid" href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet" type="text/css" />
    <link id="bootstrap-reboot" href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/owl.transitions.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front//jquery.countdown.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="{{ asset('front/css/colors/scheme-03.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/coloring.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles
</head>

<body class="dark-scheme">
    <div id="wrapper">
            <!-- header begin -->
        <header class="transparent scroll-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="#">
                                            <img alt="" src="{{asset('/logo-header.png')}}"  />
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                                <div class="de-flex-col">
                                    <input id="quick_search" class="xs-hide style-2" name="quick_search" placeholder="search item here..." type="text" />
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                <ul id="mainmenu">
                                    <li>
                                        <a href="#">Home<span></span></a>

                                    </li>
                                    <li>
                                        <a href="dark-explore.html">Museum<span></span></a>

                                    </li>
                                    <li>
                                        <a href="#">Marketplace<span></span></a>

                                    </li>
                                    <li>
                                        <a href="#">Imaginners<span></span></a>
                                    </li>

                                </ul>
                                <div class="menu_side_area">
                                    <a href="dark-wallet.html" class="btn-main"><i class="icon_wallet_alt"></i><span>Contact us</span></a>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->

        @yield('content')
        <a href="#" id="back-to-top"></a>

        <!-- footer begin -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Marketplace</h5>
                            <ul>
                                <li><a href="#">All Tifs</a></li>
                                <li><a href="#">Owners Ranking</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Resources</h5>
                            <ul>
                                <li><a href="#">Discord</a></li>
                                <li><a href="#">About us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Newsletter</h5>
                            <p>Signup for our newsletter to get the latest news in your inbox.</p>
                            <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                                <div class="col text-center">
                                    <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="enter your email" type="text" /> <a href="#" id="btn-subscribe"><i class="arrow_right bg-color-secondary"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="spacer-10"></div>
                            <small>Your email is safe with us. We don't spam.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <a href="index.html">
                                        <img alt="" class="f-logo" src="images/logo-2-light.png" /><span class="copy">&copy; Copyright <script>
                                            document.write(new Date().getFullYear())
                                          </script> - Imagination Factory by Imagineers</span>
                                    </a>
                                </div>
                                <div class="de-flex-col">
                                    <div class="social-icons">
                                        <a href="https://www.facebook.com/ImaginationFactoryTunisia"><i class="fa fa-facebook fa-lg"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->

    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/wow.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('front/js/easing.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/js/validation.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/enquire.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.plugin.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('front/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.lazy.plugins.min.js') }}"></script>
    <script src="{{ asset('front/js/designesia.js') }}"></script>

    @livewireScripts
    @stack('scripts')

</body>

</html>
