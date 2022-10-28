<?php
function nasisBrochure() {

$nasis_brochure = get_field( 'pdf_guide', 'option' );
$nasis_brochure = $nasis_brochure['pdf_guide'];

$brochure_thumb = explode("pdf", $nasis_brochure['url']);
$brochure_thumb = substr($brochure_thumb[0], 0, -1);
$brochure_thumb = $brochure_thumb . '-pdf.jpg';

if ( $nasis_brochure  ) : ?>
<div class="nasis-brochure">
    <div class="uk-card uk-card-secondary uk-card-body uk-card-small uk-grid-collapse uk-flex-middle" uk-grid>
        <div class="uk-card-media-left uk-width-auto">
            <img src="<?php echo $brochure_thumb; ?>" width="90" height="120" alt="<?php echo $nasis_brochure['title']; ?>">
        </div>
        <div class="uk-width-expand">
            <div class="uk-card-title uk-margin-bottom"><?php echo nl2br($nasis_brochure['description']); ?></div>
            <a href="<?php echo $nasis_brochure['url']; ?>" class="uk-link-reset" download><?php echo $nasis_brochure['caption']; ?></a>
        </div>
    </div>
</div>
<?php endif;

}
add_action( 'nasisBrochure', 'nasisBrochure' );