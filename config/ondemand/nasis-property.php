<?php
function nasisProperty() {

$nasis_dst = get_field( 'dst_info', 'option' ); 

// if ( $nasis_dst['dst_photo']['description'] ) : ?>
<div class="nasis-property">
    <div class="uk-card uk-card-secondary uk-card-small">
        <div class="uk-card-header uk-text-center">
            <img src="<?php echo _uri.'/resources/images/ondemand/nasis-logo.png'; ?>" width="100" height="25" alt="NAS Investment Solutions">
        </div>
        <div class="uk-card-body uk-text-center">
            <?php echo $nasis_dst['dst_description']; ?>
            <figure class="uk-position-relative uk-margin-remove">
                <picture>
                    <?php if ( $nasis_dst['dst_photo'] ) {
                        echo wp_get_attachment_image( $nasis_dst['dst_photo']['ID'], [ 960, 315 ] );
                    } else {
                        echo '<img src="//placem.at/places?w=960&h=315&txt=0&random=10" width="960" height="315" alt="'.( !empty( $nasis_dst['dst_photo']['alt'] ) ? $nasis_dst['dst_photo']['alt'] : 'Featured Photo' ).'">';
                    } ?>
                    
                </picture>
                <?php if ( !empty( $nasis_dst['dst_photo']['description'] ) ) : ?>
                <div class="uk-overlay uk-overlay-primary uk-position-cover">
                    <?php echo $nasis_dst['dst_photo']['description']; ?>
                </div>
                <?php endif; ?>
            </figure>
            <a href="<?php echo $nasis_dst['dst_url']; ?>" class="uk-button uk-button-warning uk-width-1-1" target="_blank"> <?php echo $nasis_dst['dst_btn']; ?> </a>
        </div>
    </div>
</div>
<?php // endif;

}
add_action( 'nasisProperty', 'nasisProperty' );