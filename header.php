<!DOCTYPE html>
<!--[if IE 7]>
    <html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
    <html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?=language_attributes(); ?>>
<!--<![endif]-->
    <head>
        <meta charset="<?=CHARSET?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <meta http-equiv="Content-Language" content="<?=SITELANG?>" >
        <meta http-equiv="Content-type"     content="<?=HTMLTYPE?>; charset=<?=CHARSET?>" >
        <meta name="copyright"   content="<?=SITECPRG?>">
        <meta name="author"      content="<?=SITENAME?>">
        <meta name="description" content="<?=SITEDESC?>">
        <meta name="keywords"    content="<?=SITEKEYW?>">
        <meta name="robots"      content="index,follow" />
        <meta property="og:title"       content="<?=get_open_graph_title();?>">
        <meta property="og:site_name"   content="<?=SITENAME?>">
        <meta property="og:locale"      content="<?=SITELANG?>">
        <meta property="og:type"        content="website">
        <meta property="og:image"       content="<?=get_open_graph_image();?>" />
        <meta property="og:url"         content="<?=get_open_graph_url();?>">     
        <meta property="og:description" content="<?=get_open_graph_description()?>">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

                <!-- <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="http://scotch.io/images/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="http://scotch.io/images/icons/favicon-57.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://scotch.io/images/icons/favicon-57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="http://scotch.io/images/icons/favicon-72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="http://scotch.io/images/icons/favicon-114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://scotch.io/images/icons/favicon-120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://scotch.io/images/icons/favicon-152.png"> 
        <meta name="application-name" content="Scotch Scotch scotch">
<meta name="msapplication-TileImage" content="http://scotch.io/images/icons/favicon-144.png">
<meta name="msapplication-TileColor" content="#2A2A2A">
    -->

        
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head()?>
    </head>
    <body <?=body_class()?> >
        <div id="pagina" class="home">
            <header role="navigation" class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?=esc_url(home_url('/'))?>" ><?=bloginfo('name'); ?></a>
                </div>
                <div class="navbar-collapse collapse">
                    <?=get_primary_menu();?>
                </div>
            </header>
            <div id="contenido" class="container-fluid">