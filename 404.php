<?php 
get_header(); ?>

<main class="main" role="main">
    
    <section class="notfound | uk-section">
        <div class="uk-overlay-primary uk-position-cover"></div>
        <div class="uk-overlay uk-position-center uk-light">
                
            <div class="four-oh-four-not-found">
                <?php the_field( 'notfound_content', 'option' ); ?>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();