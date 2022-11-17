<?php
function documents( $userID ) {

$users_dir = get_field( 'directory_list', 'user_'.$userID );
$doc_files = get_field( 'file_management' );

foreach ( $users_dir as $dir ) {
    if ( $dir['property']->post_title != get_the_title() )
        continue;

    $folders = $dir['folder_list'];
}

if ( $folders ) :

    foreach ( $folders as $folder_selected ) {
        $active_folder[] = $folder_selected->name;
    }

    foreach ( $doc_files as $file ) {
        $folder_name[] = $file['folder_name'];
    }

    $folder_labels = array_intersect_key($folder_name, $active_folder); ?>
    <div class="file-management" uk-overflow-auto>
        <ul uk-accordion data-folder-level="RootFolder">
        <?php foreach ( $doc_files as $doc ) : 
        if ( in_array($doc['folder_name'], array_intersect($folder_name, $active_folder)) ) : 
            ## Root Folder
            $RFolder = $doc['folder_name']; // Root folder names
            $RFName = $doc['document_file']; // Root file names
            
            ## Sub Folder Level One       
            $SFL1 = $doc['df_subfolder']; // Sub-folder Level 1
            $SFL1Name = $doc['sub_folder_lists']; // Sub-folder file names

            // For Tax Packages Folder
            if ( str_contains($doc['folder_name'], 'Tax Packages') ) {
                $data_folder_label = 'data-folder="tax-packages"';
            } else if ( empty($RFName) && $SFL1 == false ) {
                $data_folder_label = 'data-folder="empty"';
            } else {
                $data_folder_label = '';
            }
            ?>
            <li <?php echo $data_folder_label; ?>>
                <a href="#" class="uk-accordion-title"><?php echo $RFolder; ?></a>
                <div class="uk-accordion-content">
                    
                    <?php ## Folder Level 1
                    if ( $SFL1 ) : ?>
                    <ul uk-accordion data-folder-level="level-1">
                    <?php foreach ( $SFL1Name as $doc ) :
                        $S1Folder = $doc['sub_folder_name']; // Root folder names
                        $S1FName = $doc['sub_document_file']; // Root file names

                        ## Sub Folder Level One       
                        $SFL2 = $doc['df2_subfolder']; // Sub-folder Level 1
                        $SFL2Name = $doc['sub_2_folder_lists']; // Sub-folder file names
                        ?>
                        <li>
                            <a href="#" class="uk-accordion-title"><?php echo $S1Folder; ?></a>
                            <div class="uk-accordion-content">

                                <?php ## Folder Level 2
                                if ( $SFL2 ) : ?>
                                <ul uk-accordion data-folder-level="level-2">
                                <?php foreach ( $SFL2Name as $doc ) :
                                    $S2Folder = $doc['sub_2_folder_name']; // Root folder names
                                    $S2FName = $doc['sub_2_document_file']; // Root file names

                                    ## Sub Folder Level One       
                                    $SFL3 = $doc['df3_subfolder']; // Sub-folder Level 2
                                    $SFL3Name = $doc['sub_3_folder_lists']; // Sub-folder file names                                    
                                    ?>
                                    <li>
                                        <a href="#" class="uk-accordion-title"><?php echo $S2Folder; ?></a>
                                        <div class="uk-accordion-content">

                                            <?php ## Folder Level 3
                                            if ( $SFL2 ) : ?>
                                            <ul uk-accordion data-folder-level="level-3">
                                            <?php foreach ( $SFL3Name as $doc ) :
                                                $S3Folder = $doc['sub_3_folder_name']; // Root folder names
                                                $S3FName = $doc['sub_3_document_file']; // Root file names
                                                ?>
                                                <li>
                                                    <a href="#" class="uk-accordion-title"><?php echo $S3Folder; ?></a>
                                                    <div class="uk-accordion-content">

                                                        <?php // List all files
                                                        do_action( 'root_files', $S3FName ); ?>
                                                    </div>
                                                </li>
                                                <?php 
                                            endforeach; ?>
                                            </ul>
                                            <?php endif; 
                                            // List all files
                                            do_action( 'root_files', $S2FName ); ?>
                                        </div>
                                    </li>
                                    <?php 
                                endforeach; ?>
                                </ul>
                                <?php endif;

                                // List all files
                                do_action( 'root_files', $S1FName ); ?>
                            </div>
                        </li>
                        <?php 
                    endforeach; ?>
                    </ul>
                    <?php endif;

                    // List all files
                    do_action( 'root_files', $RFName ); ?>
                </div>
            </li>
            <?php endif;
        endforeach; ?>
        </ul>
    </div>

<?php endif; 

}
add_action( 'documents', 'documents', 10, 1 );

function root_files( $files ) {
    if ( $files ) :
    echo '<ul>';
    foreach ( $files as $file ) {
        echo '<li data-filetype="'.$file['subtype'].'"> <a href="'.$file['url'].'" download>'.$file['title'].'</a> </li>';
    }
    echo '</ul>';
    endif;
}
add_action( 'root_files', 'root_files', 10, 1 );
