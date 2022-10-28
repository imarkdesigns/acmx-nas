<?php
// Check user if current logged-in
$current_user = wp_get_current_user();
$investor_info = get_user_meta($current_user->ID);
$_GET['first_name'] = $investor_info['first_name'][0];
$_GET['last_name'] = $investor_info['last_name'][0];
$_GET['email'] = $current_user->user_email;
$_GET['company'] = $investor_info['od_company'][0];
if ( !empty($investor_info['od_phone_primary'][0]) ) {
    $_GET['phone'] = $investor_info['od_phone_primary'][0];
} else {
    $_GET['phone'] = $investor_info['od_phone_secondary'][0];
}

// Get contact person's email
$cpid = get_posts([ 'post_type' => 'nas-team', 'posts_per_page' => -1 ]);
if ( isset( $_GET['cid'] ) ) {
    foreach ( $cpid as $id ) {
        if ( $_GET['cid'] != md5($id->ID) )
            continue;

        $_GET['odc'] = get_field( 'profile_email', $id->ID );
        $_GET['doc'] = get_the_title( $id->ID );
    }   
}

?>
<main id="main" class="main" role="main">
    <section class="contact-hdr | uk-section uk-position-relative uk-background-norepeat uk-background-cover" data-src="//placem.at/places?w=1920&h=920&txt=0&random=10" uk-height-viewport uk-img>
        <div class="uk-overlay-primary uk-position-cover"></div>
        <div class="uk-overlay uk-position-bottom-center uk-text-center uk-light">
            <h1>Want to know more about <br> National Asset Services?</h1>
        </div>
    </section>

    <section class="contact-map | uk-section uk-padding-remove uk-flex uk-flex-center uk-flex-middle uk-position-z-index-negative" uk-sticky="position: bottom; overflow-flip: true; start: -100%; end: 0">
        <div class="uk-position-relative uk-width-expand uk-height-large">
            <?php echo do_shortcode( '[elfsight_google_maps id="2"]' ); ?>
        </div>
    </section>

    <section id="contact-form" class="contact-form | uk-section uk-section-xlarge">
        <div class="uk-container uk-container-small">
            
            
            <h2>We’d love to hear from you!</h2>
            <?php echo do_shortcode( '[wpforms id="1162" title="false"]' ); ?>            

        </div>
    </section>
</main>