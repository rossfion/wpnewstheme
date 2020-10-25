<?php get_header(); ?>

<div class="ink-grid vertical-space">
    <div class="panel">
        <div class="column-group">
            <div class="all-70 post">
                <?php while (have_posts()) : the_post(); ?>
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <div class="meta">
                        Posted on <?php the_time('F j, Y g:i a'); ?> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                in
                        <?php
                            $categories = get_the_category();
                            $separator = ", ";
                            $output = '';

                                if ($categories) {
                                    foreach ($categories as $category) {
                                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                                    }
                                }
                            echo trim($output, $separator);
                        ?>
                    </div><!-- .meta -->

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail(); ?>
                                </div><!-- .post-thumbnail -->
                            <?php endif; ?>
                            <br />
                            <?php the_content(); ?>
                            <br />
                            <?php comments_template(); ?>
                        <?php endwhile; ?>
            </div><!-- .all-70 post -->
            
            <div class="all-30">
                <div class="sidebar">
                    <?php if (is_active_sidebar('sidebar')) : ?>
                        <?php dynamic_sidebar('sidebar'); ?>
                    <?php endif; ?>
                </div><!-- .sidebar -->
            </div><!-- .all-30 -->
        </div><!-- .column-group -->
    </div><!-- .panel -->
</div><!-- .ink-grid vertical-space -->

<?php get_footer(); ?>