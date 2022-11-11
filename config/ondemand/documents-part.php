<li <?php echo $data_folder_label; ?>>
    <a href="#" class="uk-accordion-title"> <?php echo $folder['folder_name'] ?> </a>
    <div class="uk-accordion-content">
        <?php if ( $subfolders ) : ?>
        <ul uk-accordion>
            <?php foreach ( $subfolders as $sfolder ) : 
            $sub_2_folders = $sfolder['sub_2_folder_lists'];
            if ( !empty($sfolder['df_subfolder2']) ) {
                $df_folder = $sfolder['df_subfolder2'];
            }

            $sfiles = $sfolder['sub_document_file']; ?>
            <li>
                <a href="#" class="uk-accordion-title"> <?php echo $sfolder['sub_folder_name']; ?> </a>
                <div class="uk-accordion-content">
                    <?php if ( $sub_2_folders ) : ?>
                    <ul uk-accordion>
                        <?php foreach ( $sub_2_folders as $s2folder ) : 
                        $s2files = $s2folder['sub_2_document_file']; ?>
                        <li>
                            <a href="#" class="uk-accordion-title"> <?php echo $s2folder['sub_2_folder_name']; ?> </a>
                            <div class="uk-accordion-content">
                                <?php if ( $s2files ) : ?>
                                <ul data-root-folder="2">
                                    <?php foreach ( $s2files as $s2file ) :
                                        echo '<li data-filetype="'.$s2file['subtype'].'"><a href="'. $s2file['url'] .'" target="_blank" download>'. $s2file['title'] .'</a></li>';
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


                    <?php 
                    if ( $sfiles ) : ?>
                    <ul data-root-folder="1">
                        <?php foreach ( $sfiles as $sfile ) :
                            echo '<li data-filetype="'.$sfile['subtype'].'"><a href="'. $sfile['url'] .'" target="_blank" download>'. $sfile['title'] .'</a></li>';
                        endforeach; ?>
                    </ul>
                    <?php elseif ( !$df_folder ) : ?>
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