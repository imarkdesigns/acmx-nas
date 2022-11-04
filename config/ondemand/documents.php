<?php
function documents( $userID ) {

// $user = get_user_by('id', $userID);
// echo $user->ID;

$authors = [ 'role' => [ 'investor' ] ];
$authorsQuery = new WP_User_Query( $authors );

if ( ! empty( $authorsQuery->results ) ) {
    asort($authorsQuery->results);
    foreach ( $authorsQuery->results as $user ) :

        if ( $userID != $user->ID )
            continue;

            $userField = get_field( 'document_access', 'user_'.$user->ID );
            $userAccess = $userField['value'];

    endforeach;
}

// Folders List
$folders = get_field( 'file_management' );

// Bypass Partial Access
$bypass = get_field( 'bypass_partial_access' );

if ( $folders ) : ?>
<div class="file-management" uk-overflow-auto>
    <ul uk-accordion>
    <?php foreach ( $folders as $folder ) :

    // Check if Files exists
    $files = $folder['document_file'];

    // Check if User for Partial Access to Documents
    $faccess = $folder['folder_access'];

    // Check if Sub-Folder Exists
    $subfolders = $folder['sub_folder_lists'];

    if ( str_contains($folder['folder_name'], 'Tax Packages') || str_contains($folder['folder_name'], 'Tax Package') ) {
        $data_folder_label = 'data-folder="tax-packages"';
    } else {
        $data_folder_label = '';
    }

        // in favor of Partial Access
        if ( !$bypass ) {
            if ( $faccess && $userAccess == 'partial_access' ) {
                include( locate_template( _od_config.'documents-part.php', false, true ) );
            } elseif ( $userAccess == 'full_access' ) {
                include( locate_template( _od_config.'documents-part.php', false, true ) );
            }
        } elseif ( $bypass ) {
            include( locate_template( _od_config.'documents-part.php', false, true ) );
        }

    endforeach; ?>
    </ul>
</div>
<?php endif;

}
add_action( 'documents', 'documents', 10, 1 );