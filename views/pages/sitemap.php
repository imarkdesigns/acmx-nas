<main id="main" class="main" role="main">
    <nav class="localnav | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <div>
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
    </nav>

    <section class="sitemap | uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-grid-large" uk-grid>

                <div class="uk-width-1-1">
                    <div class="uk-text-bold"> National Asset Services </div>
                    <?php $page = ['post_type'=>'page','posts_per_page'=>-1,'post__not_in'=>[ 41, 43 ],'post_parent'=>0,'order'=>'ASC','orderby'=>'menu_order']; 
                    query_posts( $page ); ?>
                    <ul class="uk-list uk-flex uk-flex-wrap">
                        <?php while ( have_posts() ) : the_post();
                            echo '<li class="uk-width-1-2@s uk-width-1-4@m uk-margin-remove">';
                            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
                            echo '</li>';
                        endwhile; ?>
                    </ul>
                </div>

                <div class="uk-width-1-1">
                    <div class="uk-text-bold"> NAS Team </div>
                    <?php $team = ['post_type'=>'nas-team','posts_per_page'=>-1,'order'=>'ASC']; 
                    query_posts( $team ); ?>
                    <ul class="uk-list uk-flex uk-flex-wrap">
                        <?php while ( have_posts() ) : the_post();
                            echo '<li class="uk-width-1-2@s uk-width-1-4@m uk-margin-remove">';
                            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
                            echo '</li>';
                        endwhile; ?>
                    </ul>
                </div>

                <div class="uk-width-1-1">
                    <div class="uk-text-bold"> Success Stories </div>
                    <?php $stories = ['post_type'=>'nas-stories','posts_per_page'=>-1,'order'=>'ASC']; 
                    query_posts( $stories ); ?>
                    <ul class="uk-list uk-flex uk-flex-wrap">
                        <?php while ( have_posts() ) : the_post();
                            echo '<li class="uk-width-1-2@s uk-width-1-4@m uk-margin-remove">';
                            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
                            echo '</li>';
                        endwhile; ?>
                    </ul>
                </div>

                <div class="sitemap-news | uk-width-1-1">
                    <div class="uk-text-bold"> NAS News </div>
                    <?php $news = ['post_type'=>'post','posts_per_page'=>-1,'order'=>'ASC']; 
                    query_posts( $news ); ?>
                    <ul class="uk-list uk-flex uk-flex-wrap">
                        <?php while ( have_posts() ) : the_post();
                            echo '<li class="uk-width-1-2@s uk-width-1-4@m">';
                            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
                            echo '</li>';
                        endwhile; ?>
                    </ul>
                </div>


            </div>


        </div>
    </section>


</main>