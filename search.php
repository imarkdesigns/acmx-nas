<?php get_header(); ?>
<main id="main" class="main" role="main">

    <nav class="localnav | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <div class="uk-grid-small uk-flex-between uk-width-expand" uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s">
                    <h1><?php printf( ' Search Results for: ' . esc_html(get_search_query()) ); ?></h1>
                </div>
            </div>
        </div>
    </nav>

    <section class="search-list | uk-section">
        <div class="uk-container">

            <div class="uk-grid-match" uk-grid role="list">
                <?php do_action( 'searchResult', esc_html(get_search_query()) ); ?>
            </div>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>
<?php get_footer();