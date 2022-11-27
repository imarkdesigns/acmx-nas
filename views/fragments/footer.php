<?php 
$ftr_bg = get_field( 'footer_bg', 'option' ); 
$ftr_slogan = get_field( 'NAS_footer_slogan', 'option' );

?>
<footer data-fragment="footer" data-src="<?php echo ( $ftr_bg ) ? $ftr_bg : _uri.'/resources/images/img-footer_bg.jpg'; ?>" uk-img>
    
    <div class="ff-links | uk-grid-collapse uk-child-width-auto uk-flex-between uk-flex-middle" uk-grid>
        <div class="download-brochure">
            <div class="uk-panel">
                <img src="<?php echo _uri.'/resources/images/icon-download_brochure.png' ?>" alt="Download Brochure">
                <?php
                    $pdf = get_field( 'pdf_brochure', 'option' );
                    if ( !is_null($pdf) ) {
                        echo '<a href="'.$pdf['brochure_download']['url'].'" download>Download <br> <span>NAS</span> Brochure</a>';
                    } else {
                        echo '<a href="'. get_permalink( 39 ) .'">Contact Us for <br> <span>NAS</span> Brochure</a>';
                    }
                ?>
            </div>
        </div>
        <div class="call-nas">
            <div class="uk-panel">
                <div>310.943.8171</div>
                <img src="<?php echo _uri.'/resources/images/icon-call_nas.png'; ?>" alt="Call National Asset Services">
            </div>
        </div>
    </div>

    <div class="ff-logo">
        <img src="<?php echo _uri.'/resources/images/logo-nasassets_footer.png'; ?>" width="150" height="45" alt="<?php bloginfo(); ?>">
        <div class="uk-width-xlarge"><?php echo $ftr_slogan; ?></div>
    </div>

    <div class="ff-legal">
        <div class="legal-copyright">
            <span>Copyright <?php echo date('Y'); ?>. <?php bloginfo() ?>.</span> All Rights Reserved.
        </div>
        <div class="legal-links">
            <div class="uk-subnav">
                <li><a href="https://goo.gl/4Tuehz" target="_blank">Twitter</a></li>
                <li><a href="https://goo.gl/RWn92o" target="_blank">Facebook</a></li>
                <li><a href="<?php echo get_permalink( 3 ); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo get_permalink( 41 ); ?>">Sitemap</a></li>
            </div>
        </div>
    </div>

</footer>

<aside class="wave-webaim | uk-background-dark uk-padding-small uk-light uk-flex-between uk-grid-small" uk-grid>
    <span class="uk-link-muted">This site conforms to web accessibility standards using the Web Accessibility Evaluation Tool. <a href="<?php echo 'https://wave.webaim.org/report#/'.site_url(); ?>" class="uk-link-muted" target="_blank">Validate Page Here</a></span>
    <span class="uk-link-muted">Professionally Designed By: <a href="//www.ohwowmarketing.com" class="uk-link-muted" target="_blank">Oh Wow Marketing</a>
</aside>