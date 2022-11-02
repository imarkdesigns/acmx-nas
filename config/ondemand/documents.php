<?php
function documents() {

$folders = get_field( 'file_management' );

if ( $folders ) : ?>
<div class="file-management" uk-overflow-auto>
    <ul uk-accordion>
    <?php foreach ( $folders as $folder ) :

    // Check if Files exists
    $files = $folder['document_file'];

    // Check if Sub-Folder Exists
    $subfolders = $folder['sub_folder_lists'];

    if ( str_contains($folder['folder_name'], 'Tax Packages') ) {
        $data_folder_label = 'data-folder="tax-packages"';
    } else {
        $data_folder_label = '';
    }

    ?>
    <li <?php echo $data_folder_label; ?>>
        <a href="#" class="uk-accordion-title"> <?php echo $folder['folder_name'] ?> </a>
        <div class="uk-accordion-content">
            <?php if ( $subfolders ) : ?>
            <ul uk-accordion>
                <?php foreach ( $subfolders as $sfolder ) : 
                $sfiles = $sfolder['sub_document_file']; ?>
                <li>
                    <a href="#" class="uk-accordion-title"> <?php echo $sfolder['sub_folder_name']; ?> </a>
                    <div class="uk-accordion-content">
                        <?php if ( $sfiles ) : ?>
                        <ul>
                            <?php foreach ( $sfiles as $sfile ) :
                                echo '<li data-filetype="'.$sfile['subtype'].'"><a href="'. $sfile['url'] .'" target="_blank" download>'. $sfile['title'] .'</a></li>';
                            endforeach; ?>
                        </ul>
                        <?php else : ?>
                        <div class="empty-folder | uk-panel">
                            <p class="uk-text-muted">Folder is Empty</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if ( $files || $subfolders ) : ?>
            <ul>
                <?php foreach ( $files as $file ) :
                    echo '<li data-filetype="'.$file['subtype'].'"><a href="'. $file['url'] .'" target="_blank" download>'. $file['title'] .'</a></li>';
                endforeach; ?>
            </ul>
            <?php else : ?>
            <div class="empty-folder | uk-panel">
                <p class="uk-text-muted">Folder is Empty</p>
            </div>
            <?php endif; ?>
        </div>
    </li>
    <?php 
    endforeach; ?>
    </ul>
</div>
<?php endif;

}
add_action( 'documents', 'documents' );