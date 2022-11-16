<?php 
// Main Menu
$navMenu = [
    'theme_location' => 'Main Menu',
    'menu_class'     => 'uk-navbar-nav',
    'container'      => '',
    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
    'depth'          => 2,
    'walker'         => new subMenuWrap()
]; 

// Mobile Menu
$mobMenu = [
    'theme_location' => 'Mobile Menu',
    'menu_class'     => 'uk-navbar-dropdown-nav',
    'container'      => '',
    'items_wrap'     => '<ul uk-nav class="%2$s">%3$s</ul>',
    'depth'          => 2,
    'walker'         => new mobileMenuWrap()
]; 

// Make Menu Top to Other Pages
if ( !is_home() && !is_page([ 3, 31, 37, 7196 ]) && !is_singular( 'nas-stories' ) && !is_singular( 'post' ) && !is_archive() && !is_search() ) {
    if ( wp_is_mobile() ) {
        $class = 'uk-position-top xs';
    } else {
        $class = 'uk-position-top';
    }
} else {
    if ( wp_is_mobile() ) {
        $class = 'uk-position-relative xs';
    } else {
        $class = 'uk-position-relative';
    }
} 

// Quick Links
$quickLinks = get_field( 'quick_link_list', 'option' );

?>

<a href="#main" id="skipToLink" class="skip-to-content-link">Skip to Content</a>
<div data-fragment="menu" class="<?php echo $class; ?>">

    <nav class="uk-navbar-container" uk-navbar uk-sticky="show-on-up: true; animation: uk-animation-slide-top">
        <div class="navbar | uk-navbar-left">
            <a href="<?php echo home_url(); ?>" class="uk-navbar-item uk-logo" aria-label="<?php bloginfo(); ?>"></a>
        </div>
        <div class="navbar-search-field navbar | uk-navbar-center" hidden>
            <div class="uk-position-relative uk-width-xlarge">
                <form class="uk-search uk-search-default uk-width-1-1" role="search">
                    <span uk-search-icon></span>
                    <label for="navbar-search" aria-label="Search NAS"><span hidden>Search NAS</span></label>
                    <input id="navbar-search" class="uk-search-input" type="search" name="s" placeholder="Type your subject keywords here..." autocomplete="off" autofocus onkeyup="fetchMenu()">
                </form>
                <a id="close-search" class="uk-navbar-toggle uk-position-center-right uk-position-small" uk-close uk-toggle="target: .navbar; animation: uk-animation-fade" href="#" aria-label="Close Search"></a>
                <div class="quick-links | uk-background-muted" uk-overflow-auto>
                    <div id="datafetch"></div>
                    <strong>Quick Links</strong>
                    <ul class="uk-list">
                        <?php foreach ( $quickLinks as $links ) :
                            echo '<li><a href="'.$links['link_url'].'">'.$links['link_label'].'</a></li>';
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar | uk-navbar-right uk-visible@l">
            <?php wp_nav_menu( $navMenu ); ?>
            <div class="navbar-search-trigger">
                <a id="open-search" class="uk-navbar-toggle" href="#" uk-search-icon uk-toggle="target: .navbar; animation: uk-animation-fade" aria-label="Search"> Search </a>
            </div>
        </div>
        <div class="uk-navbar-right uk-hidden@l">
            <button type="button" class="mobile-menu | uk-navbar-toggle" aria-label="Sidebar Menu" uk-toggle>
                <span>menu</span>
                <span uk-navbar-toggle-icon></span>
            </button>
            <div class="navbar-mobile-menu | uk-dropbar uk-dropbar-top uk-background-secondary" uk-drop="mode: click; stretch: true; target: !.uk-navbar-container; animation: slide-top; animate-out: true; duration: 300">
                <form class="uk-search uk-search-default uk-width-1-1" role="search">
                    <span uk-search-icon></span>
                    <label for="dropbar-search" aria-label="Search NAS"><span hidden>Search NAS</span></label>
                    <input id="dropbar-search" class="uk-search-input" type="search" name="s" placeholder="Type your keywords here..." autocomplete="off" autofocus onkeyup="fetchMobile()">
                </form>                
                <div id="datafetchMobile"></div>
                <?php wp_nav_menu( $mobMenu ); ?>
            </div>
        </div>
    </nav>

</div>