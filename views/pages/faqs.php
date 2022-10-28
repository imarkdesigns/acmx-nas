<?php
// FAQ Header Settings
$faq_hdr_content = get_field( 'hdr_content' );

// FAQ List
$help_txt = get_field( 'faq_help_text' );
$faq_list = get_field( 'faq_lists' );
?>
<header data-fragment="hero" class="faq | uk-flex uk-flex-center uk-flex-middle uk-text-center">
    <div class="faq-banner | uk-padding-large">
        <?php echo $faq_hdr_content; ?>
    </div>
</header>

<main id="main" class="main" role="main">

    <section class="faqs | uk-section">
        <div class="uk-container uk-container-small">

            <div class="uk-child-width-auto@s uk-flex-between" uk-grid>
                <div>
                    <div class="uk-panel">
                        <span class="uk-text-small"><span uk-icon="info"></span> <?php echo $help_txt; ?></span>
                    </div>
                </div>
                <div>
                    <div class="uk-panel">
                        <button type="button" class="faq-toggle" aria-controls="uk-accordion">Expand All</button>
                    </div>
                </div>
            </div>

            <ul class="faq-lists" uk-accordion="multiple: true" role="list">
                <?php foreach ( $faq_list as $faq ) : ?>
                <li>
                    <a href="#" class="uk-accordion-title"><?php echo $faq['title'] ?></a>
                    <div class="uk-accordion-content"><?php echo $faq['content']; ?></div>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>