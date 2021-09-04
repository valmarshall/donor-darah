<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style -->
    <link rel="stylesheet" href="/assets/main/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/main/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/main/css/lightbox.min.css">
    <link rel="stylesheet" href="/assets/main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/main/css/normalize.css">
    <link rel="stylesheet" href="/assets/main/css/slicknav.min.css">
    <link rel="stylesheet" href="/assets/main/css/style.css">
    <link rel="stylesheet" href="/assets/main/css/responsive.css">
    <link rel="stylesheet" href="/assets/main/css/chosen.css">
    <link rel="stylesheet" href="/assets/main/css/datatable.min.css">
    <!-- end style -->

    <title><?= $title; ?></title>
</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div id="status" style="background-image: url(/assets/main/img/preloader/preloader.gif)"></div>
    </div>
    <!-- end preloader -->

    <?= $this->include('layouts/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <!--Footer-Area Start-->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="footer-item footer-service">
                        <h2>Latest News</h2>
                        <ul class="fmain">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, rem!</li>
                            <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                            <li>Lorem ipsum dolor sit amet.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="footer-item footer-service">
                        <h2>Popular News</h2>
                        <ul class="fmain">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, rem!</li>
                            <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                            <li>Lorem ipsum dolor sit amet.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="footer-item footer-service">
                        <h2>Contact</h2>
                        <ul>
                            <li>Address: </li>
                            <li>Email: </li>
                            <li>Phone: </li>
                            <li>Fax: </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="footer-item footer-service">
                        <h2>Social Media</h2>
                        <div class="footer-social-link">
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, rem!</li>
                                <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="copyright">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-Area End-->

    <!-- JS -->
    <script src="/assets/main/js/jquery-2.2.4.min.js"></script>
    <script src="/assets/main/js/jquery-ui.js"></script>
    <script src="/assets/main/js/bootstrap.min.js"></script>
    <script src="/assets/main/js/chosen.jquery.js"></script>
    <script src="/assets/main/js/docsupport/init.js"></script>
    <script src="/assets/main/js/lightbox.min.js"></script>
    <script src="/assets/main/js/jquery.dataTables.min.js"></script>
    <script src="/assets/main/js/owl.carousel.min.js"></script>
    <script src="/assets/main/js/jquery.slicknav.min.js"></script>
    <script src="/assets/main/js/jquery.filterizr.min.js"></script>
    <script src="/assets/main/js/jquery.collapse.js"></script>
    <script src="/assets/main/js/custom.js"></script>
    <!-- end JS -->

    <!-- end footer -->

</body>

</html>