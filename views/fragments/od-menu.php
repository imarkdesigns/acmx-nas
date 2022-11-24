<?php
$current_user = wp_get_current_user();
$display_name = $current_user->display_name;

if ( wp_is_mobile() ) : ?>
<a href="#main" id="skipToLink" class="skip-to-content-link">Skip to Content</a>
<div data-ondemand="menu" class="uk-position-relative">
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>" aria-label="<?php bloginfo(); ?>"></a>
        </div>
        <!-- Logo -->

        <div class="uk-navbar-right">
            <div class="uk-navbar-nav uk-margin-right">
                <li>
                    <a href="#" title=""><?php echo $display_name; ?></a>
                    <div class="uk-navbar-dropdown" uk-dropdown="mode: click; offset: 0">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="<?php echo get_permalink( 39 ); ?>" target="_blank">Contact NAS</a></li>
                            <li><a href="<?php echo get_permalink( 35 ); ?>" target="_blank">NAS News</a></li>
                            <li><a href="<?php echo get_permalink( 3 ); ?>" target="_blank">Legal Information</a></li>
                            <li><a>Questions? 310 943 8171</a></li>
                            <li><a href="#nas-help" uk-toggle>Help</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><?php echo do_shortcode('[wppb-logout text="" redirect_url="/ondemand" link_text="Log Out"]'); ?></li>
                        </ul>
                    </div>
                </li>
            </div>
        </div>
        <!-- OnDemand Menu Navigation -->
        
    </nav>
</div>

<div id="nas-help" class="help-mobile" uk-modal>
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
<?php else : ?>
<a href="#main" id="skipToLink" class="skip-to-content-link">Skip to Content</a>
<div data-ondemand="menu" class="uk-position-relative">
    <nav class="uk-navbar-container uk-grid-collapse uk-flex-between uk-flex-middle" uk-navbar uk-grid>
        <div class="uk-width-1-4">
            <a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>" aria-label="<?php bloginfo(); ?>"></a>
        </div>
        <!-- Logo -->

        <div class="uk-width-3-4">
            <div class="uk-grid-collapse uk-flex-middle" uk-grid>

                <div class="od-search | uk-position-relative uk-width-1-2@s uk-visible@s">
                    <form class="uk-search uk-search-navbar" role="search">
                        <span uk-search-icon></span>
                        <label for="search-property" aria-label="Search NAS"><span hidden>Search NAS</span></label>
                        <input id="search-property" name="s" class="uk-search-input" type="search" placeholder="Search Property" autocomplete="off" onkeyup="OnDemandSearch()">
                        <a hidden id="close-search" class="uk-navbar-toggle uk-position-center-right uk-position-small" uk-close uk-toggle="target: .navbar; animation: uk-animation-fade" href="#" aria-label="Close Search"></a>
                    </form>
                    <div class="quick-links" hidden>
                        <div id="ondemandFetch"></div>
                    </div>
                </div>
                <!-- Search Property -->

                <div class="od-nav | uk-width-1-2@s">
                    <div class="uk-flex uk-flex-between uk-visible@l">
                        <div>
                            <div class="uk-subnav">
                                <li <?php echo ( $post->ID == '45' ) ? 'class="uk-active"' :null ; ?>><a href="<?php echo get_permalink( 45 ); ?>">Dashboard</a></li>
                                <li <?php echo ( $post->ID == '47' ) ? 'class="uk-active"' :null ; ?>><a href="<?php echo get_permalink( 47 ); ?>">Profile</a></li>
                                <li><a href="<?php echo get_permalink( 39 ); ?>" target="_blank">Contact NAS</a></li>
                                <li><a href="<?php echo get_permalink( 35 ); ?>" target="_blank">NAS News</a></li>
                            </div>
                        </div>
                        <div class="uk-margin-right">
                            <?php 
                            if ( is_user_logged_in() ) {
                                echo do_shortcode('[wppb-logout text="" redirect_url="/dashboard" link_text="Log Out"]');
                            } 
                            ?>
                        </div>
                    </div>
                    <ul class="uk-navbar-nav uk-flex-right uk-margin-right uk-hidden@l">
                        <li>
                            <a href="#"><?php echo $display_name; ?></a>
                            <div class="uk-navbar-dropdown" uk-dropdown="mode: click; offset: 0">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="<?php echo get_permalink( 45 ); ?>">Dashboard</a></li>
                                    <li><a href="<?php echo get_permalink( 47 ); ?>">Profile</a></li>
                                    <li><a href="<?php echo get_permalink( 39 ); ?>" target="_blank">Contact NAS</a></li>
                                    <li><a href="<?php echo get_permalink( 35 ); ?>" target="_blank">NAS News</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><?php echo do_shortcode('[wppb-logout text="" redirect_url="/ondemand" link_text="Log Out"]'); ?></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- OnDemand Menu Navigation -->

            </div>
        </div>

    </nav>
</div>
<?php endif;