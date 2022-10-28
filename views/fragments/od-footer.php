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
                <li><a href="<?php echo get_permalink( 3 ); ?>" target="_blank">Legal Information</a></li>
                <li><a>Do you have questions? 310.943.8171</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </div>
    </div>
</footer>
<?php endif;