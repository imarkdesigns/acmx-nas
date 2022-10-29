<?php
// Home Header Settings
$hdr_slides = get_field( 'hdr_slide' );
$hdr_overlay = get_field( 'hdr_slide_overlay' ); ?>
<header class="home | uk-position-relative" data-fragment="hero">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="autoplay-interval: 2000; pause-on-hover: false; autoplay: true; animation: fade; min-height: 667">
        <ul class="uk-slideshow-items">
            <?php foreach ( $hdr_slides as $slide ) : ?>
            <li>
                <?php
                    echo wp_get_attachment_image( $slide['ID'], 'full', '', [ 'uk-cover' => '' ] );
                    $description = '';
                    $description .= '<div class="description | uk-overlay uk-position-bottom-left">';
                    $description .= '<div>'.$slide['title'].' <small>'.$slide['description'].'</small></div>';
                    $description .= '</div>';
                    echo $description;
                ?>
                <div class="uk-overlay-primary uk-position-cover"></div>
            </li>
            <?php endforeach; ?>
        </ul>
        <ul class="uk-thumbnav uk-position-bottom" uk-margin>
            <?php $i = 0;
            foreach ( $hdr_slides as $slide ) : ?>
            <li uk-slideshow-item="<?php echo $i++; ?>">
                <?php echo '<a href="#" uk-tooltip="title: '.$slide['caption'].'; pos: bottom"> '.wp_get_attachment_image( $slide['ID'], 'thumbnail' ).' </a>'; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="headings | uk-overlay uk-position-bottom-left uk-light">
            <?php echo $hdr_overlay; ?>
        </div>
    </div>
    <!-- End of Slide -->
    <?php do_action( 'TrackRecord' ); ?>
</header>

<?php
// About NAS Content Panel
$about_title = get_field( 'aboutNAS_title' );
$about_details = get_field( 'aboutNAS_details' );
$about_excerpt = get_field( 'aboutNAS_excerpt' );
$about_link = get_field( 'aboutNAS_link' );

// Video Content Panel
$video_details = get_field( 'companyVideo_details' );
$video_bg = get_field( 'companyVideo_background' );
$video_link = get_field( 'companyVideo_video' );

?>
<main id="main" class="main" role="main">

    <section class="about | uk-section">
        <div class="uk-container uk-container-large">

            <article class="uk-article uk-child-width-1-2@m uk-flex-top" uk-grid>
                <div>
                    <div class="uk-panel">
                        <h2><?php echo $about_title; ?></h2>
                        <a href="<?php echo $about_link['button_link']; ?>" class="uk-button uk-button-primary uk-margin-top"><?php echo $about_link['button_label']; ?></a>
                    </div>
                </div>
                <div>
                    <div class="uk-panel">
                        <?php echo $about_details; ?>
                        <div class="excerpt | uk-margin-bottom" hidden>
                            <?php echo $about_excerpt; ?>
                        </div>
                        <button type="button" class="toggle-excerpt" uk-toggle="target: .excerpt; animation: uk-animation-fade" role="button"> Read More </button>
                    </div>
                </div>
                <div class="company-video | uk-width-1-1">
                    <div class="uk-panel" uk-lightbox>
                        <figure class="uk-position-relative">
                            <figcaption class="uk-overlay uk-position-center uk-light">
                                <?php echo $video_details; ?>
                            </figcaption>
                            <?php echo wp_get_attachment_image( $video_bg['ID'], 'full' ); ?>
                        </figure>
                        <a href="<?php echo $video_link.'&rel=0'; ?>" aria-label="Play Video" aria-describedby="watch-video" class="play-btn" uk-tooltip="title: Watch Video; pos: bottom;" data-attrs="width: 1280; height: 720;">
                            <span uk-icon="icon: play; ratio: 3"></span>
                        </a>
                        <div id="watch-video" class="uk-tooltip" role="tooltip"> <div class="uk-tooltip-inner">Watch Video</div> </div>
                    </div>
                </div>
            </article>

        </div>
    </section>

    <?php 
    do_action( 'randomComments' ); ?>

    <?php 
    do_action( 'storiesList', null ); ?>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    do_action( 'newsList' ); ?>

</main>