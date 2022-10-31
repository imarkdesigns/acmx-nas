<header data-fragment="hero" class="uk-flex uk-flex-center uk-flex-middle uk-height-medium">
    <article class="uk-text-center uk-width-xlarge">
        <?php the_field( 'hdr_content' ); ?>
    </article>
</header>

<main id="main" class="main" role="main">

    <section class="legal-information | uk-section uk-section-muted">
        <div class="uk-container uk-container-small">

            <article class="uk-article">
                <?php the_content(); ?>
            </article>

        </div>
    </section>

</main>