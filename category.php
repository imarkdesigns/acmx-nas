<?php get_header(); ?>
<main id="main" class="main" role="main">

    <nav class="localnav | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <div class="uk-grid-small uk-flex-between uk-width-expand" uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s">
                    <h1><?php echo get_the_archive_title(); ?></h1>
                </div>
                <div class="uk-width-1-1 uk-width-auto@s">
                    <button type="button" class="uk-button uk-button-small">News Categories <span uk-icon="icon: chevron-down; ratio: .7"></span></button>
                    <div class="uk-dropbar uk-dropbar-top" uk-drop="mode: click; stretch: x; target: !.localnav; animation: slide-top; animate-out: true; duration: 300; auto-update: false">
                        <div class="category-tray | uk-container uk-container-large">
                            <div class="uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small uk-grid-divider uk-flex-center uk-flex-between" uk-grid>
                            <?php $categories = get_categories();
                            foreach ( $categories as $category ) : ?>
                                <div>
                                    <?php
                                    printf( '<a href="%1$s">%2$s</a>',
                                            esc_url( get_category_link( $category->term_id ) ),
                                            esc_html( $category->name )
                                        );
                                    ?>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="archive-list | uk-section">
        <div class="uk-container">

            <div class="uk-grid-match" uk-grid role="list">
                <?php // $categories = get_the_category();
                $category = get_queried_object();
                // echo $category->term_id;
                do_action( 'categoryPost', $category->term_id ); ?>
            </div>

            <div class="uk-margin-large-top uk-text-center">
                <a href="#nas-archived-news" class="uk-button uk-button-default" uk-scroll="offset: 80"> View More News </a>
            </div>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <section class="more-news-lists uk-section">
        <div class="uk-container">

            <div id="nas-archived-news" class="uk-headings">
                <h2>More NAS News</h2>
            </div>

            <div class="uk-grid-match" uk-grid>
                <?php do_action( 'newsMore' ); ?>
            </div>

            <div class="uk-margin-large-top uk-text-center">
                <a href="<?php echo get_permalink( 7196 ); ?>" class="uk-button uk-button-default"> View Archive </a>
            </div>
        </div>
    </section>

</main>
<?php get_footer();