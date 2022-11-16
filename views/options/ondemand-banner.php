<?php
// Fragment: OnDemand Banner
$od_banner = get_field( 'ondemand_bg', 'option' );
$od_visibility = get_field( 'ondemand_visibility', 'option' );

if ( is_page( $od_visibility ) || is_home() || is_archive() || is_search() ) :
?>
<section class="ondemand-banner | uk-section uk-position-relative uk-padding-remove" data-src="<?php echo ( $od_banner ) ? $od_banner : _uri.'/resources/images/img-ondemand_bg.jpg'; ?>" uk-img>
    <div class="uk-overlay uk-position-center-right uk-position-medium uk-width-2-3@s uk-width-1-2@m">
        <h2 class="ondemand-title">On<span>Demand</span> <span>information</span></h2>
        <h3>Anytime. Anywhere.</h3>
        <?php the_field( 'ondemand_details', 'option' ); ?>
    </div>
</section>
<?php endif;