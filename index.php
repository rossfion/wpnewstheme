<?php get_header(); ?>

<form class="ink-form">
    <div class="ink-grid">
        <div class="panel">
            <div class="control-group append-button">
                <div class="control all-100">
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" name="s" placeholder="Search news...">
                    </form>
                </div><!-- .control all-100 -->
            </div><!-- .control-group append-button -->
        </div><!-- .pabel -->
    </div><!-- .ink-grid -->
</form><!-- .ink-form -->

<div class="ink-grid vertical-space">


    <!--[if lte IE 9 ]>
    <div class="ink-alert basic" role="alert">
        <button class="ink-dismiss">&times;</button>
        <p>
            <strong>You are using an outdated Internet Explorer version.</strong>
            Please <a href="http://browsehappy.com/">upgrade to a modern browser</a> to improve your web experience.
        </p>
    </div>
    -->

    <div class="panel">
        <h2> Recent News</h2>
        <div id="car1" class="ink-carousel" data-space-after-last-slide="false" data-autoload="false">
            <ul class="stage column-group half-gutters">
                <?php while (have_posts()): the_post(); ?>
                    <li class="slide xlarge-25 large-25 medium-33 small-50 tiny-100">
                        <?php
                        the_post_thumbnail('news-thumb', array(
                            'class' => "half-bottom-space"
                        ));
                        ?>  
                        <div class="description">
                            <h4 class="no-margin">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4><!-- .no-margin -->
                            <h5 class="slab">
                                <?php the_date('F j, Y g:i a'); ?>
                            </h5><!-- .slab -->
                            <div class="excerpt">
                                <?php the_excerpt(); ?>
                            </div><!-- .excerpt -->
                        </div><!-- .description -->
                    </li><!-- .slide xlarge-25 large-25 medium-33 small-50 tiny-100 -->
                <?php endwhile; ?>
            </ul><!-- .stage column-group half-gutters -->
        </div><!-- .ink-carousel -->

        <nav id="p1" class="ink-navigation">
            <ul class="pagination black">
            </ul><!-- .pagination black -->
        </nav><!-- .ink-navigation -->

    </div><!-- .panel -->

    <div class="panel ink-grid">
        <div class="column-group">
            <div class="all-50">
                <h2>Featured Stories</h2>
                <div id="car3" class="ink-carousel" data-autoload="false">
                    <ul class="stage column-group half-gutters unstyled">
                        <?php
                        $featured_query = new WP_Query(array(
                            'category_name' => 'featured'
                        ));
                        ?>
                        <?php while ($featured_query->have_posts()): $featured_query->the_post(); ?>
                        <li class="slide xlarge-100 large-100 medium-100 small-100 tiny-100">
                            <?php
                                the_post_thumbnail('news-large', array(
                                    'class' => "half-bottom-space"
                                ));
                            ?> 
                            <h4 class="no-margin">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4><!-- .no-margin -->
                                <h5 class="slab">
                                    <?php the_date('F j, Y g:i a'); ?>
                                </h5><!-- .slab -->
                                <div class="excerpt">
                                    <?php the_excerpt(); ?>
                                </div><!-- .excerpt -->
                        </li><!-- .slide xlarge-100 large-100 medium-100 small-100 tiny-100 -->

                        <?php endwhile; ?>
                    </ul><!-- .stage column-group half-gutters unstyled -->

                    <nav id="p3" class="ink-navigation" data-previous-label="" data-next-label="">
                        <ul class="pagination chevron">
                        </ul><!-- .pagination chevron -->
                    </nav><!-- .ink-navigation -->

                </div><!-- .ink-carousel -->

                <script>
                    Ink.requireModules(['Ink.UI.Carousel_1'], function (InkCarousel) {
                        new InkCarousel('#car3', {pagination: '#p3', nextLabel: '', previousLabel: ''});
                    });
                </script>

            </div><!-- .all-50 -->

            <div class="all-50">
                <!-- Popular Posts go here -->
                <h2>Popular</h2>
                <ul class="unstyled">
                    <?php
                        $args = array(
                            'order_by' => 'comment_count',
                            'posts_per_page' => '3',
                        );
                    ?>
                    <?php $popular_query = new WP_Query($args); ?>
                    <?php while ($popular_query->have_posts()): $popular_query->the_post(); ?>
                        <li class="column-group half-gutters">
                            <div class="all-40 small-50 tiny-50">
                                <?php the_post_thumbnail('news-popular'); ?> 
                            </div><!-- .all-40 small-50 tiny-50 -->
                            <div class="all-60 small-50 tiny-50">
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php comments_number('No Responses', '1 Response', '% Responses'); ?>
                                </h4>
                                    <?php the_excerpt(); ?>
                            </div><!-- .all-60 small-50 tiny-50 -->
                        </li><!-- .column-group half-gutters -->
                        
                    <?php endwhile; ?>

                </ul><!-- .unstyled -->
            </div><!-- .all-50 -->
        </div><!-- .column-group -->
    </div><!-- .panel ink-grid -->

    <script>
        Ink.requireModules(['Ink.UI.Carousel_1'], function (InkCarousel) {
            new InkCarousel('#car1', {pagination: '#p1'});
        });
    </script>

    <div class="panel vertical-space">
        <h2>New in Business</h2>
        <div id="car2" class="ink-carousel" data-autoload="false">

            <ul class="stage column-group half-gutters unstyled">

                <?php
                $business_query = new WP_Query(array(
                    'category_name' => 'business'
                ));
                ?>
                    <?php while ($business_query->have_posts()): $business_query->the_post(); ?>

                    <li class="slide xlarge-25 large-25 medium-33 small-50 tiny-100">
                        <?php
                            the_post_thumbnail('news-thumb', array(
                                'class' => "half-bottom-space"
                            ));
                        ?> 
                        <h4 class="no-margin">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4><!-- .no-margin -->
                        <h5 class="slab">
                            <?php the_date('F j, Y g:i a'); ?>
                        </h5><!-- .slab -->
                            <?php the_excerpt(); ?>
                    </li><!-- .slide xlarge-25 large-25 medium-33 small-50 tiny-100 -->

                    <?php endwhile; ?>
            </ul><!-- .stage column-group half-gutters unstyled -->

            <nav id="p2" class="ink-navigation" data-next-label="" data-previous-label="">
                <ul class="pagination dotted">
                </ul><!-- .pagination dotted -->
            </nav><!-- .ink-navigation -->

        </div><!-- .ink-carousel -->
    </div><!-- .panel vertical-space -->


    <script>
        Ink.requireModules(['Ink.UI.Carousel_1'], function (InkCarousel) {
            new InkCarousel('#car2', {pagination: '#p2'})
        });
    </script>

</div><!-- .ink-grid vertical-space -->

<?php get_footer(); ?>