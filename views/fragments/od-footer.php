<?php if ( wp_is_mobile() && is_user_logged_in() ) : ?>
<footer data-ondemand="footer" class="touch">
    <div class="uk-grid-collapse uk-child-width-1-2@s uk-light" uk-grid>
        <div>
            <div class="uk-panel">
                <a href="<?php echo get_permalink( 45 ) ?>"><span uk-icon="icon: thumbnails"></span> dashboard</a>
            </div>
        </div>
        <div>
            <div class="uk-panel">
                <a href="<?php echo get_permalink( 47 ) ?>"><span uk-icon="icon: user"></span> profile</a>
            </div>            
        </div>
    </div>
</footer>
<?php else : ?>
<footer data-ondemand="footer">
    <div class="uk-child-width-auto@s uk-grid-collapse uk-flex-between uk-flex-middle uk-light" uk-grid>
        <div class="od-footer-copyright">
            Copyright <?php echo date('Y'); ?>. <?php bloginfo(); ?>
        </div>
        <div class="od-footer-links">
            <ul class="uk-subnav uk-subnav-divider">
                <li><a href="<?php echo get_permalink( 3 ); ?>" target="_blank">Privacy Policy</a></li>
                <li><a>Do you have questions? 310.943.8171</a></li>
                <li><a href="#nas-help" uk-toggle>Help</a></li>
            </ul>
        </div>
    </div>
</footer>

<div id="nas-help" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-background-secondary">
        <button class="uk-modal-close-default" type="button" aria-label="Close Modal" uk-close></button>

        <img src="<?php echo _uri.'/resources/images/logo-nasassets_footer.png' ?>" width="100" height="30" alt="<?php bloginfo(); ?>">
        <h2>Trouble Viewing OnDemand?</h2>
        <hr class="uk-divider-small">

        <dl class="uk-description-list uk-description-list-divider uk-light">
            <dt>Clear Cache/Cookies in your Browser</dt>
            <dd>Hold the Shift key and Click the Reload button on the navigation toolbar.</dd>
            <dt>Problem viewing this page?</dt>
            <dd><a href="//outdatedbrowser.com/en" target="_blank">Click here</a> to upgrade your browser version</dd>
            <dt>Use the latest version of Adobe Reader plugin to view or download PDF files.</dt>
            <dd><a href="//acrobat.adobe.com/us/en/products/pdf-reader.html" target="_blank">Click here</a> to download or upgrade version</dd>
        </dl>
    </div>
</div>

<?php endif;