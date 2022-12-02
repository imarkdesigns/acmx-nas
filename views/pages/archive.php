<main id="main" class="main" role="main">

    <nav class="localnav | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <div>
                <h1><?php echo 'NAS News Archive'; ?></h1>
            </div>
            <div>
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
    </nav>

    <section class="archive-list | uk-section">
        <div class="uk-container">

            <div class="news-scroll-wrapper | uk-grid-match" uk-grid role="list">
                <?php do_action( 'newsArchive' ); ?>
            </div>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>