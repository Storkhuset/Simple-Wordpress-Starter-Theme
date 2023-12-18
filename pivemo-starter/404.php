<?php get_header(); // add argument for specific header. ?>

<main>
    <div class="container">
        <h1>404</h1>
        <p>The post or page "<?php echo $_SERVER['REQUEST_URI']; ?>" you were looking for doesn't exist, sorry!</p>
    </div>
</main>

<?php get_footer(); // add argument for specific footer. ?>