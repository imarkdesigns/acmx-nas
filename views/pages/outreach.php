<?php
// Outreach Header Settings
$or_hdr_content = get_field( 'hdr_content' );
$or_hdr_bg = get_field( 'hdr_photo' );
$or_hdr_blockquote = get_field( 'outreach_hdr_quote' );

// Outreach People
$or_intro = get_field( 'introduction' );
$or_members = get_field( 'outreach_people' );

// Outreach Lead Role
$or_community = get_field( 'community' );

// Outreach Organization
$or_organizations = get_field( 'organizations' );

// Outeach Pearlie Goodman
$or_pg = get_field( 'pg_introduction' );
$or_pg_gallery = get_field( 'pg_gallery' );
$or_pg_faq = get_field( 'pg_faq' );

?>
<header data-fragment="hero" class="outreach | uk-position-relative">
    <div class="uk-cover-container uk-transform-origin-bottom-center">
        <picture uk-parallax="scale: 1.2,1; start: 50%; end: 40vh">
            <?php echo wp_get_attachment_image( $or_hdr_bg['id'], 'full' ); ?>
        </picture>
    </div>
    <blockquote class="uk-overlay uk-position-top-center uk-position-medium uk-light">
        <p><?php echo $or_hdr_blockquote['blockquote']; ?></p>
        <footer class="uk-text-right uk-light">
            <?php echo $or_hdr_blockquote['citation']; ?>
        </footer>
    </blockquote>
    <div class="uk-overlay uk-position-center uk-light">
        <h1 class="uk-text-center" uk-parallax="start: 50%; end: 25%; opacity: 0,1 10%,1 30%,1; y: 5vh, 0 50%, 0 25%, -2vh"><?php echo strip_tags($or_hdr_content); ?></h1>
    </div>
</header>

<main id="main" class="main" role="main">

    <section class="outreach-karen-speech | uk-section uk-section-muted">
        <div class="uk-container">
            
            <article class="uk-article">
                <div class="uk-flex-top uk-margin-top" uk-grid>
                    <div class="uk-width-1-3@m uk-text-center uk-flex-last uk-flex-first@m">
                        <?php $photo = $or_community['upload_photo'];
                        echo wp_get_attachment_image( $photo['ID'], 'full', '', [ 'class' => 'uk-border-rounded uk-box-shadow-medium' ] ); ?>
                    </div>
                    <div class="uk-width-2-3@m">
                        <?php echo $or_community['content']; ?>
                    </div>
                </div>
            </article>

        </div>
    </section>

    <section class="outreach-people | uk-section uk-section-medium-dark uk-section-large uk-light">
        <div class="uk-container uk-container-small">
            <div class="uk-panel uk-margin-large-bottom uk-text-center">
                <?php echo $or_intro; ?>
            </div>
            <div class="uk-child-width-1-2@s uk-child-width-1-2@m uk-grid-large" uk-grid>
                <?php foreach ( $or_members as $member ) :
                    switch ( $member['op_member']->ID ) {
                        case '74':
                            $photo = get_the_post_thumbnail_url( $member['op_member']->ID, 'full' );
                            break;

                        case '986':
                            $photo = get_the_post_thumbnail_url( $member['op_member']->ID, 'full' );
                            break;

                        case '73':
                            $photo = get_the_post_thumbnail_url( $member['op_member']->ID, 'full' );
                            break;

                        case '987':
                            $photo = get_the_post_thumbnail_url( $member['op_member']->ID, 'full' );
                            break;
                    }
                ?>
                <div>
                    <div class="uk-card uk-border-rounded uk-overflow-hidden">
                        <div class="uk-card-media-top uk-cover-container uk-position-relative">
                            <img src="<?php echo $photo; ?>" alt="<?php echo $member['op_member']->post_title; ?>">
                            <div class="uk-overlay uk-overlay-primary uk-position-bottom">
                                <h3><?php echo $member['op_member']->post_title; ?></h3>
                                <button type="button" tabindex="0" uk-toggle="target: #modal-teamID<?php echo $member['op_member']->ID; ?>; animation: uk-animation-fade" aria-label="Read More"><span uk-icon="icon: plus; ratio: .8"></span></button>
                            </div>
                            <div id="modal-teamID<?php echo $member['op_member']->ID; ?>" class="uk-overlay uk-overlay-primary uk-position-cover uk-padding-large" hidden>
                                <p><?php echo $member['blockquote']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    // get_template_part( _opt.'ondemand-banner' ); ?>

    <section class="outreach-community | uk-section">
        <div class="uk-container">
            
            <h2>NAS Supported Community Organizations</h2>
            <ul class="uk-list uk-column-1-2 uk-column-1-3@s uk-column-divider uk-padding-large uk-light" data-src="<?php echo _uri.'/resources/images/img-outreach-organizations.jpg' ?>" uk-img>
                <?php foreach ( $or_organizations as $organization ) : ?>
                <li><?php echo $organization['organization_name']; ?></li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <section class="outreach-sponsor | uk-section uk-section-medium-dark uk-light">
        <div class="uk-container">
            <div class="uk-headings uk-text-center uk-margin-medium-bottom">
                <?php echo $or_pg; ?>
            </div>

            <?php if ( $or_pg_gallery ) : ?>
            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-small uk-text-center" uk-grid>
                <?php foreach ( $or_pg_gallery as $gallery ) : ?>
                <div>
                    <figure class="uk-margin-remove">
                        <?php echo wp_get_attachment_image( $gallery['ID'], 'full', '', [ 'class' => 'uk-border-rounded' ] ); ?>
                    </figure>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <hr class="uk-divider-small uk-margin-large">

            <?php if ( $or_pg_faq ) : ?>
            <ul class="faq-lists" uk-accordion>
                <?php foreach  ( $or_pg_faq as $faq ) : ?>
                <li>
                    <a href="#" class="uk-accordion-title"><?php echo $faq['title']; ?></a>
                    <div class="uk-accordion-content">
                        <p><?php echo $faq['content']; ?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </section>

</main>