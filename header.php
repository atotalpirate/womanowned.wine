<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Women_Owned_Wineries_Sonoma
 */

// echo '<pre class="white text">';var_dump(  );echo '</pre>';

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri().'/favicon.ico?v=2'; ?>" />
    <script src="https://jssdk.vinespring.com/v3.js" data-api-key='acct_5aa5aa50123e3b03aca8ea15'></script>
    <script type="text/javascript">
    window.vinespringConfig = vs => {
        vs.theme.typography = {
            fontFamily: 'inherit'
        }
    }
    </script>
    <?php wp_head(); ?>
    <style>
    html {
        margin-top: 0px !important;
    }

    * html body {
        margin-top: 0px !important;
    }

    #wpadminbar {
        display: none !important
    }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118334472-1"></script>
    <script>
    // GA CODE
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-118334472-1');

    // VINE SPRING
    window.vinespringConfig = vs => {
        vs.components.clubSignup = {
            showDob: false,
            showPhone: false,
            source: {
                label: 'How did you hear about us?',
                options: {
                    '': 'Select one...',
                    google: 'Google',
                    social: 'Social Media',
                    wordOfMouth: 'Word of Mouth',
                    Newsarticle: 'News Article',
                    WineIndustry: 'Wine Industry Referral',
                    Supermajority: 'Supermajority',
                },
                required: false,
                type: 'dropdown'
            }
        }
    }
    </script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/e49f49aef80cb79df223052d3/34fa1f37bbe9d391e8823ba08.js");</script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'cohs'); ?></a>

        <header id="masthead" class="site-header">

            <?php echo file_get_contents( get_stylesheet_directory() . '/img/logo-bg.svg' ); ?>

            <nav id="mainNavigation" class="navbar is-transparent is-fixed -top" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/">
                        <span class="logo">
                            <?php echo file_get_contents( get_stylesheet_directory() . '/img/wow-logo-alt.svg' ); ?>
                            <span class="logotype">
                                <?php echo file_get_contents( get_stylesheet_directory() . '/img/wow-logotype-block.svg' ); ?>
                            </span>
                        </span>
                    </a>

                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                        data-target="mainNav">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="mainNav" class="navbar-menu">
                    <div class="navbar-start">
                        <?php wp_nav_menu( array( 'menu' => 'Main' ) ); ?>
                    </div>

                    <div class="navbar-end">
                        <?php wp_nav_menu( array( 'menu' => 'Main' ) ); ?>
                    </div>
                </div>
            </nav>

        </header><!-- #masthead -->