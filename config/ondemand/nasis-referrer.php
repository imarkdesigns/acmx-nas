<?php
function nasisReferrer() {

$nasis_referrer = get_field( 'refer_link', 'option' );

?>
<div class="nasis-referrer">
    <figure class="uk-inline uk-margin-remove uk-width-1-1">
        <picture class="uk-width-expand uk-margin-remove">
            <?php if ( $nasis_referrer['referrer_photo'] ) {
                echo wp_get_attachment_image( $nasis_referrer['referrer_photo']['ID'], 'full', '', [ 'uk-cover' => '' ] );
            } ?>
        </picture>
        <canvas width="960" height="360"></canvas>
        <?php if ( !empty( $nasis_referrer['referrer_description'] ) ) : ?>
        <figcaption class="uk-overlay uk-overlay-primary uk-position-cover">
            <?php echo $nasis_referrer['referrer_description']; ?>
            <span><?php echo $nasis_referrer['referrer_label']; ?></span>
        </figcaption>
        <a href="<?php echo $nasis_referrer['referrer_link']; ?>" rel="follow" aria-label="Refer a Friend Now!" title="Refer a Friend Now!" class="uk-position-cover" role="link"></a>
        <?php endif; ?>
    </figure>
</div>
<?php 

} 
add_action( 'nasisReferrer', 'nasisReferrer' );