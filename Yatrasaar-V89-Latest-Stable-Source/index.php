<?php
if (!defined('ABSPATH')) exit;
/*
 * Robust homepage fallback:
 * If WordPress reaches index.php for the site's front page, render the
 * premium Yatrasaar homepage instead of the generic page content.
 */
if (is_front_page()) {
    $home = get_template_directory() . '/front-page.php';
    if (file_exists($home)) { include $home; exit; }
}
get_header();
?>
<main class="site-main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><div class="container"><h1><?php the_title(); ?></h1><div class="entry-content"><?php the_content(); ?></div></div></article>
<?php endwhile; else : ?>
  <div class="container"><h1>Yatrasaar</h1><p>Welcome to Yatrasaar.</p></div>
<?php endif; ?>
</main>
<?php get_footer(); ?>
