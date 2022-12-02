<?php
// Loan Maturity Header Settings
$loan_hdr_content = get_field( 'hdr_content' );
$loan_hdr_bg = get_field( 'hdr_photo' );

// Loan Intro
$loan_intro = get_field( 'introduction' );

// Loan TIC
$loan_tic = get_field( 'loan_maturity_experience' );
// $loan_pdf = get_field_object('download_pdf');

// Loan Goal
$loan_goal = get_field( 'loan_speech' );

?>
<header data-fragment="hero" class="loan-maturity | uk-flex uk-flex-middle uk-light" data-src="<?php echo ( $loan_hdr_bg ) ? $loan_hdr_bg['url'] : 'https://placem.at/places?w=1920&h=550&txt=0&random=1' ?>" uk-img>
    <div class="uk-width-1-1">
        <div class="uk-container uk-container-small">
            <?php echo $loan_hdr_content; ?>
        </div>
    </div>

    <div class="uk-position-small uk-position-bottom-left uk-width-1-1 uk-light">
        <div class="hdr-caption | uk-container uk-container-small">
            <?php echo nl2br($loan_hdr_bg['description']); ?>
        </div>
    </div>    
</header>

<main id="main" class="main" role="main">

    <section class="loan-intro | uk-section uk-section-muted uk-section-large">
        <div class="uk-container uk-container-small">
            <?php echo $loan_intro; ?>
        </div>
    </section>

    <section class="loan-tic | uk-section">
        <div class="uk-container uk-container-small">
            <?php echo $loan_tic; ?>
        </div>
    </section>

    <section class="loan-goal | uk-section uk-section-secondary">
        <div class="uk-container uk-container-small">
            <blockquote>
                <p><?php echo $loan_goal['blockquote']; ?></p>
                <footer><?php echo $loan_goal['citation']; ?></footer>
            </blockquote>
        </div>
    </section>

    <section class="loan-list | uk-section">
        <div class="uk-container">

            <ul class="uk-flex-center" uk-tab="media: @m" role="list">
                <li role="listitem"><a href="#" role="button">Refinanced</a></li>
                <li role="listitem"><a href="#" role="button">Refinanced with TIC Structure in Place</a></li>
                <li role="listitem"><a href="#" role="button">Sold</a></li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li id="refinanced">
                    <?php do_action( 'lm_refinanced', 'Refinanced' ) ?>
                </li>
                <li id="refinanced-tic">
                    <?php do_action( 'lm_tic', 'Refinanced with TIC' ) ?>
                </li>
                <li id="sold">
                    <?php do_action( 'lm_sold', 'Sold' ) ?>
                </li>
            </ul>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>
    
</main>