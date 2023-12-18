<?php
get_header(); // Add argument for specific header, example: get_header('page'); will get a header file called header_page.php
?>
<main>
    <div class="container">
    <div class="flex flex-row flex-wrap">
        <?php
        while(have_posts()) {
            the_post(); // gets the post object
            
            // Checks if there is a featured image added to the post and shows a fallback if there isn't. 
            if (has_post_thumbnail( get_the_ID() )) {
                $thePostThumbnail = get_the_post_thumbnail( get_the_ID(), 'large' ); // Gets the featured image from the post ID.
            } else {
                $thePostThumbnail = "<img loading='lazy' src='" . get_theme_file_uri() . "/accets/images/no-image.webp" . "' style='width: 100%' alt='An image shown when an image is missing.' >";
            } ?>
            <article>
                <header>
                    <span class="date"><?php echo get_the_date() ; ?></span>
                    <h2><a href="<?php echo get_permalink(get_the_ID()) ?>"><?php echo get_the_title(  ); ?></a></h2>
                </header>
                <a href="<?php echo get_permalink(get_the_ID()) ?>" class="image fit"><?php echo $thePostThumbnail; ?></a>
                <p><?php echo wp_trim_excerpt( get_the_excerpt() ); ?></p>
                <a href="<?php echo get_permalink(get_the_ID()) ?>" class="button"><?php echo __('Read more', 'themedomain'); ?></a>
            </article>
        <?php }
        ?>
    </div>
    </div>
</main>
<?php
get_footer(); // Add argument for specific footer, example: get_footer('page'); will get a footer file called footer_page.php
?>