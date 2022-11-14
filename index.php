<?php get_header();

    // global $post;
    switch ( get_the_ID() ) {

        case '2':  $pageName = 'home'; break;
        case '17': $pageName = 'about'; break;
        case '19': $pageName = 'team'; break;
        case '21': $pageName = 'stories'; break;
        case '23': $pageName = 'comments'; break;
        case '25': $pageName = 'loan'; break;
        case '27': $pageName = 'faqs'; break;
        case '29': $pageName = 'outreach'; break;
        case '31': $pageName = 'asset'; break;
        case '33': $pageName = 'property'; break;
        case '37': $pageName = 'map'; break;
        case '39': $pageName = 'contact'; break;
        case '41': $pageName = 'sitemap'; break;
        case '7196': $pageName = 'archive'; break;

        // Privacy Policy
        case '3': $pageName = 'legal'; break;

        default:
            $pageName = 'news';
            break;

    }

    if ( post_password_required() ) : ?>
        <main class="main" role="main">
            <section class="uk-section uk-section-muted">
                <div class="uk-container uk-container-small uk-height-meidum uk-flex uk-flex-middle uk-flex-center uk-text-center">
                    
                    <article>
                        <span uk-icon="icon: lock; ratio: 5"></span>
                        <hr class="uk-divider-small uk-margin-auto">
                        <?php the_content(); ?>
                    </article>

                </div>
            </section>
        </main>
    <?php else :
        get_template_part( _page.$pageName );
    endif;
    
get_footer();