<?php
function myProperty( $pid ) {

$property_info = get_posts([
    'post_type' => [ 'nas-ondemand' ],
    'p' => $pid,
    'post_status' => 'publish',
    'has_password' => false,
]);

foreach ( $property_info as $pi ) : 

    $post_id = $pi->ID;
    $post_title = $pi->post_title;

    $address = get_field( 'property_address', $post_id );
    $description = get_field( 'property_description', $post_id );
    $gallery = get_field( 'property_additional_photo', $post_id );
    $map_selector = get_field( 'multi_locations' );
    $map = get_field('property_map', $post_id );
    $maps = get_field('property_maps', $post_id );

    // Contact Person
    $contact_person = get_field( 'property_contact_person', $post_id );

endforeach;

// Featured Folder
if ( wp_is_mobile() ) {
    $btn_action = 'Tap';
} else {
    $btn_action = 'Click';
}

function countdays($date) {
    $olddate =  substr($date, 4);
    $newdate = date("Y") ."".$olddate;
    $nextyear = date("Y")+1 ."".$olddate;

    if(strtotime($newdate) > strtotime(date("Y-m-d"))) {
        $start_ts = strtotime($newdate); 
        $end_ts = strtotime(date("Y-m-d"));
        $diff = $end_ts - $start_ts;
        $n = round($diff / (60*60*24));
        $return = substr($n, 1);
        return $return;
    } else {
        $start_ts = strtotime(date("Y-m-d"));
        $end_ts = strtotime($nextyear);
        $diff = $end_ts - $start_ts;
        $n = round($diff / (60*60*24));
        $return = $n;
        return $return;
    }
}

function expire($expiration_date) { 
    $date = strtotime($expiration_date);
    $days_left = ceil(($date - time()) / (60*60*24));
    return $days_left;
}

$ffolders = get_field( 'file_management', $post_id );
?>
<hgroup> <h1><?php echo $post_title; ?></h1> </hgroup>
<div>
    <?php if ( $ffolders ) : 
        foreach ( $ffolders as $folder ) {
            // Is Sub-Directory Active
            $isfolder = $folder['ff_featured'];
        }

        if ( $isfolder ) :
            // Get the Updated Folder Name
            $folder_label = $folder['folder_name'];

            // Get Modified Date
            $modDate = get_the_modified_date('Y-m-d H:i:s', $post_id);

            // Set Expired Date
            $expDate = strtotime('+10 days', strtotime($modDate));
            $expDate = date('Y-m-d H:i:s', $expDate); ?>
            <aside class="uk-alert-warning uk-link-reset uk-text-small" uk-alert data-expiration="<?php echo expire($expDate)." days left"; ?>">
                <a href="#" class="uk-alert-close" uk-close aria-label="Close Alert Notification"></a>
                <strong><?php echo $folder_label; ?></strong> document was uploaded, and it is ready to download.
                <a href="#" class="highlight-folder uk-text-bold"><?php echo $btn_action; ?> here to view document</a>
            </aside>
            <?php 
        endif;

        // Set the expiration timer
        if (isset($expDate)) {
            if ( expire($expDate) <= '0' ) {
                $doc_featured = 1;
            } else {
                $doc_featured = 0;
            }            
        }

        // Update the Featured Checkbox
        $od_docs = get_posts([ 'post_type' => [ 'nas-ondemand' ], 'p' => $post_id, 'post_status' => [ 'publish' ] ]);
        if ( isset($doc_featured) ) {
            update_field( 'field_632eb5eebe96a', false, $post_id );
        }

    endif; ?>

    <section class="featured-image | uk-section uk-section-xsmall uk-position-relative">
        <div class="uk-cover-container">
            <?php if ( has_post_thumbnail( $post_id ) ) {   
                $featuredID = get_post_thumbnail_id( $post_id );
                echo wp_get_attachment_image( $featuredID, 'large', '', [ 'uk-cover' => '' ] );
            } else {
                echo '<img src="//placem.at/places?w=1280&h=720&txt=0&random='.$post_id.'" alt="'.$post_title.'" uk-cover>';
            } ?>            
            <canvas width="1280" height="570"></canvas>
            <aside class="uk-panel uk-hidden@m">
                <a href="#property-documents" class="uk-button uk-button-secondary uk-width-expand" uk-scroll> <span uk-icon="icon: folder" class="uk-margin-small-right"></span> See Documents </a>
            </aside>
        </div>
        <!-- End of Featured Image -->
        <?php if ( $contact_person ) :
        $cp = get_posts([ 
            'post_type' => 'nas-team',
            'p' => $contact_person->ID
        ]);            
        foreach ( $cp as $contact ) : 
            $contact_id = $contact->ID;
            $contact_name = $contact->post_title;

            $contact_pnominal = get_field( 'profile_postnominal', $contact_id );
            $contact_designation = get_field( 'profile_designation', $contact_id );
         ?>
        <div class="uk-overlay uk-position-top-right">
            <div class="contact-person | uk-card uk-card-secondary uk-card-small uk-width-medium">
                <div class="uk-card-header uk-text-center">Property Contact</div>
                <div class="uk-card-body uk-grid-collapse uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <?php $featured_image = get_post_thumbnail_id( $contact_id ); 
                        echo wp_get_attachment_image( $featured_image, 'thumbnail', '', [ 'class' => 'uk-border-circle' ] ); ?>                        
                    </div>
                    <div class="uk-width-expand"> 
                        <div class="uk-card-title"><?php echo $contact_name; echo ( $contact_pnominal ) ? ', <small>'. $contact_pnominal .'</small> ' : null; ?></div>
                        <div class="uk-text-meta"><?php echo $contact_designation; ?></div>
                    </div>
                </div>
                <div class="uk-card-footer uk-grid-collapse uk-flex-middle" uk-grid>
                    <div class="link-to-bio | uk-width-expand">
                        <a href="<?php echo get_permalink( $contact_id ); ?>"> <?php echo 'Visit '. $contact_name .' Bio'; ?> </a>
                    </div>
                    <div class="link-to-contact | uk-width-auto">
                        <a href="<?php echo get_permalink( 39 ).'?cid='.md5($contact_id); ?>" aria-label="Contact Person"> <span uk-icon="icon: mail"></span> </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;
        endif; ?>
    </section>

    <section class="property-details | uk-section uk-section-xsmall uk-section-secondary uk-position-relative uk-padding-small">
        <div class="pd-wrapper">
            <div class="pd-info">
                <address>
                    <div class="uk-margin-bottom">
                        <strong>Address:</strong>
                        <?php echo $address['street'] .', '. $address['city'].', '.$address['state']; ?>
                    </div>
                    <article>
                        <strong>Property Details:</strong>
                        <?php echo $description; ?>
                    </article>
                </address>
            </div>
            <?php if ( $gallery ) : ?>
            <div class="pd-additional-photos">
                <div class="uk-position-relative uk-light" tabindex="-1" uk-slideshow="min-height:400">
                    <ul class="uk-slideshow-items">
                        <?php foreach ( $gallery as $image ) {
                            echo '<li>'. wp_get_attachment_image( $image['ID'], 'full', '', [ 'uk-cover' => '' ] ) .'</li>';
                        } ?>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" aria-label="Previous" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" aria-label="Next" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <?php  if ( $map_selector == 'multi' ) : ?>
    <section class="property-map | uk-section uk-section-xsmall">
        <div class="acf-map uk-box-shadow-small" data-zoom="17">
            <?php foreach ( $maps as $multi ) : ?>
            <div hidden class="marker" data-lat="<?php echo esc_attr($multi['property_map']['lat']); ?>" data-lng="<?php echo esc_attr($multi['property_map']['lng']); ?>"></div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php elseif ( $map_selector == 'single' ) : ?>
    <section class="property-map | uk-section uk-section-xsmall">
        <div class="acf-map uk-box-shadow-small" data-zoom="17">
            <div class="marker" data-lat="<?php echo esc_attr($map['lat']); ?>" data-lng="<?php echo esc_attr($map['lng']); ?>"></div>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php 

}
add_action( 'myProperty', 'myProperty', 10, 1 );