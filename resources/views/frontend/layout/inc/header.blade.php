<div class="full-width-header header-style2">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        <!-- Topbar Area Start -->
        <div class="topbar-area">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-md-7">
                        <ul class="topbar-contact">
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:info@globaluniversity.edu.bd">info@globaluniversity.edu.bd</a>
                            </li>
                            <li>
                                <i class="flaticon-call"></i>
                                <a href="tel:+8801700-569030">+8801700-569030</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 text-right ">
                        <ul class="topbar-right text-white">
                            <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-4">
                        <div class="logo-cat-wrap">
                            <div class="logo-part pr-90">
                                <a class="dark-logo" href="{{ route('homepage') }}">
                                    <img src="{{ asset('assets/frontend') }}/images/logo-dark.png" alt="">
                                </a>
                                <a class="light-logo" href="{{ route('homepage') }}">
                                    <img src="{{ asset('assets/frontend') }}/images/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-center">
                        <div class="rs-menu-area">
                            <div class="main-menu pr-90">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <li class="rs-mega-menu mega-rs current-menu-item"> <a
                                                href="{{ route('homepage') }}">Home</a>
                                        </li>
                                        <li class="menu-item-has-children ">
                                            <a href="#">Admission</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children">
                                                    <a href="{{ route('index.admission',['type'=>'Undergraduate Admission']) }}">Undergraduate Admission</a>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="{{ route('index.admission',['type'=>'Postgraduate Admission']) }}">Postgraduate Admission</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Authorities</a>
                                            <ul class="sub-menu">
                                                <li><a
                                                        href="{{ route('index.authority', ['type' => 'Board of Trustees']) }}">Board
                                                        of Trustees</a></li>
                                                <li class="menu-item-has-children">
                                                    <a
                                                        href="{{ route('index.authority', ['type' => 'Syndicate Members']) }}">Syndicate
                                                        Members</a>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a
                                                        href="{{ route('index.authority', ['type' => 'Academic Members']) }}">Academic
                                                        Members</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Faculty</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children right">
                                                    <a href="#">Science & Technology</a>
                                                    <ul class="sub-menu right">
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Computer Science and Engineering']) }}">Computer
                                                                Science And
                                                                Engineering (CSE)</a></li>
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Electrical and Electronics Engineering']) }}">Electrical
                                                                and Electronic
                                                                Engineering(EEE)</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">Business Adminstration</a>
                                                    <ul class="sub-menu right">
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Bachelor of Business Administration']) }}">Bachelor
                                                                of Business
                                                                Administration (BBA)</a></li>
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Master of Business Administration']) }}">Master
                                                                of Business
                                                                Administration (MBA)</a></li>
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Executive MBA']) }}">Executive
                                                                MBA (EMBA)</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">LAW</a>
                                                    <ul class="sub-menu right">
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Bachelor of Laws']) }}">Bachelor
                                                                of LAWS (LLB)</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Master of Laws']) }}">Master
                                                                of LLBS (LL.M)</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">Arts & Social Science</a>
                                                    <ul class="sub-menu right">
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'English']) }}">English</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'GUB Center for Language']) }}">Gub
                                                                Center for Language</a></li>
                                                        <li><a
                                                                href="{{ route('index.faculty', ['department' => 'Library & Information Science']) }}">Library
                                                                & Information
                                                                Science</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu">
                                            <a href="{{ route('index.notice') }}">Notices</a>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Results</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('index.result', ['department' => 'CSE']) }}">CSE
                                                        Results</a></li>
                                                <li><a href="{{ route('index.result', ['department' => 'EEE']) }}">EEE
                                                        Results</a></li>
                                                <li><a href="{{ route('index.result', ['department' => 'BBA']) }}">BBA
                                                        Results</a></li>
                                                <li><a href="{{ route('index.result', ['department' => 'MBA']) }}">MBA
                                                        Results</a></li>
                                                <li><a href="{{ route('index.result', ['department' => 'EMBA']) }}">EMBA
                                                        Results</a></li>
                                                <li><a href="{{ route('index.result', ['department' => 'LLB']) }}">LLB
                                                        Results</a></li>
                                                <li><a href="{{ route('index.result', ['department' => 'LLM']) }}">LLM
                                                        Results</a></li>
                                                <li><a
                                                        href="{{ route('index.result', ['department' => 'ENGLISH']) }}">ENGLISH
                                                        Results</a></li>
                                                <li><a
                                                        href="{{ route('index.result', ['department' => 'LIBRARY & INFORMATION SCIENCE']) }}">LIBRARY
                                                        & INFORMATION SCIENCE
                                                        Results</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu">
                                            <a href="{{ route('contact') }}">Contact</a>
                                        </li>
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->


    </header>
    <!--Header End-->
</div>
