.<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <?php wp_head(); ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script async src=https://www.googletagmanager.com/gtag/js?id=UA-55912683-1></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-55912683-1');
    </script>
</head>
<body <?php body_class() . schema() ?>>
<?php
    get_template_part( _nav );
    get_template_part( _hdr );