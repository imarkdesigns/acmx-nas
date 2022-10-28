<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <?php wp_head(); ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
</head>
<body <?php body_class() . schema() ?>>
<?php
    get_template_part( _nav );
    get_template_part( _hdr );