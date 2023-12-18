<?php
get_header(); // Add argument for specific header, example: get_header('page'); will get a header file called header_page.php
?>
<main>
    <div class="container">
    <?php
    while(have_posts()) {
        the_post(); // gets the post object
        the_title('<h1>', '</h1>'); // before after could be h1 for example. Could also be used inside a html h1 tag if you want to give it some special class, then remove all the arguments
        the_content(); // Will output all of the post or page content
    }
    ?>
    </div>
</main>
<?php
get_footer(); // Add argument for specific footer, example: get_footer('page'); will get a footer file called footer_page.php
?>