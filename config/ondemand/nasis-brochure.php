<?php
function nasisBrochure() {

$nasis_brochure = get_field( 'pdf_guide', 'option' );
if ( $nasis_brochure ) : ?>
<div class="nasis-brochure">
    <?php foreach ( $nasis_brochure as $brochure ) :

    $brochure_thumb = explode('pdf', $brochure['guide']['url']);
    $brochure_thumb = substr($brochure_thumb[0], 0, -1);
    $brochure_thumb = $brochure_thumb . '-pdf.jpg';  
    $brochure_thumb_exists = str_replace( site_url('/'), ABSPATH, esc_url( $brochure_thumb) );


    ?>
    <div>
        <div class="uk-card uk-card-secondary uk-card-body uk-card-small uk-grid-collapse uk-flex-middle" uk-grid>
            <div class="uk-card-media-left uk-width-auto">
            <?php
                if ( file_exists($brochure_thumb_exists) ) {
                    echo '<img src="'. $brochure_thumb .'" width="90" height="120" alt="'. $brochure['guide']['title'] .'">';
                } else {
                    echo '';  
                }
            ?>
            </div>
            <div class="uk-width-expand">
                <div class="uk-card-title uk-margin-bottom"><?php echo nl2br($brochure['guide']['description']); ?></div>
                <a href="<?php echo $brochure['guide']['url']; ?>" class="uk-link-reset" download><?php echo $brochure['guide']['caption']; ?></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif;

}
add_action( 'nasisBrochure', 'nasisBrochure' );