<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crater-free
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-post">
            <div class="image">
                <?php
                    if ( has_post_thumbnail()) {
                        the_post_thumbnail('full');
                    }
                ?>
            </div>
            <div class="meta">
                <span class="meta-item"><i class="fa fa-clock-o"></i><?php _e('Posted on','crater-free'); ?>: <?php the_time(get_option('date_format')) ?></span>
                <span class="meta-item"><i class="fa fa-user"></i><?php _e('Posted by','crater-free'); ?>: <a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a></span>
                <span class="meta-item"><i class="fa fa-comment-o"></i><?php _e('Comments','crater-free'); ?>: <a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?></a></span>
            </div>
            <div class="content">
                <h3 class="entry-title">
                    <?php
                        if ( is_sticky() && is_home() ) :
                            echo "<i class='fa fa-thumb-tack'></i>";
                        endif;
                    ?>
                    <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h3>

                <?php
                    if(is_single()){
                        the_content();
                        wp_link_pages(array(
                            'before' => '<div class="page-link">' . __('Pages:','crater-free'),
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        )); 
                        ?>
                            <div class="post-tags">
                                <?php the_tags(); ?>
                            </div>
                            <div class="post-categories">
                                <?php _e('Categories:','crater-free') ?><?php the_category(); ?>
                            </div>
                        <?php
                    }
                    else{
                        the_excerpt();  
                        ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php _e('READ MORE','crater-free'); ?></a>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </article>
    