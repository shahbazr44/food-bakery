<?php
global $foodzone_options;

$theme_log = get_template_directory_uri().'/libs/images/logo.png';

$logo = isset($foodzone_options['prop_main_logo']['url']) ? $foodzone_options['prop_main_logo']['url'] : $theme_log;
?>
<div class="res-header-3 res-header-2 sb-header header-shadow header-dark">


    <div class="container-fluid">

        <!-- sb header -->

        <div class="sb-header-container">

            <!--Logo-->
            <div class="logo" data-mobile-logo="<?php echo esc_url($logo) ?>"
                 data-sticky-logo="<?php echo esc_url($logo) ?>"><a href="<?php echo home_url('/') ?>"><img
                            src="<?php echo esc_url($logo) ?>" alt="logo"></a></div>

            <!-- Burger menu -->

            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>


            <!--Navigation menu-->
            <nav class="sb-menu separate-line submenu-top-border submenu-scale">
                <ul>
                    <?php echo foodzone_main_menu('main-nav'); ?>

                    <li class="right-space dropdown_menu">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o"
                                                                                    aria-hidden="true"></i><?php echo esc_html__('Choose Location', 'foodzone') ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <li><a class="dropdown-item" href="#">Action<span></span></a></li>
                                <li><a class="dropdown-item" href="#">Another action<span></span></a></li>
                                <li><a class="dropdown-item" href="#">Something else here<span></span></a></li>
                            </ul>
                        </div>
                        <span class="dropdown-plus"></span></li>
                    <li class="border-before"><a href="#">EN</a></li>
                    <li class="btn-style"><a href="#"><i class="fa fa-sign-in"></i>Login</a></li>
                    <li class="color-x"><a href="#" class="btn btn-theme"><i class="fa fa-cutlery"
                                                                             aria-hidden="true"></i><?php echo esc_html__('Restaurant Register', 'foodzone') ?>
                        </a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-shadow-wrapper"></div>
</div>
<div class="clearfix"></div>

