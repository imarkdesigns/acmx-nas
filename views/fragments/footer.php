<footer data-fragment="footer" data-src="<?php echo _uri.'/resources/images/img-footer_bg.jpg'; ?>" uk-img>
    
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
        <img src="<?php echo _uri.'/resources/images/logo-nasassets_footer.png'; ?>" alt="<?php bloginfo(); ?>">
    </div>

    <div class="ff-legal">
        <div class="legal-copyright">
            <span>Copyright <?php echo date('Y'); ?>. <?php bloginfo() ?>.</span> All Rights Reserved.
        </div>
        <div class="legal-links">
            <div class="uk-subnav">
                <li><a href="<?php echo get_permalink( 3 ); ?>">Legal Information</a></li>
                <li><a href="<?php echo get_permalink( 41 ); ?>">Sitemap</a></li>
            </div>
        </div>
    </div>

</footer>