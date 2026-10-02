<?php
if (!defined('ABSPATH')) exit;
$key = sanitize_key($_GET['yatra'] ?? '');
$data = [
 'adi-kailash-om-parvat'=>['Adi Kailash & Om Parvat','Two sacred Himalayan destinations in one journey','adi-kailash-new.png'],
 'char-dham'=>['Char Dham Yatra','A sacred pilgrimage through Uttarakhand’s four revered dhams.','char-dham-new.png'],
 'kainchi-dham'=>['Kainchi Dham','A peaceful spiritual destination in the Kumaon hills.','kainchi-dham-new.png'],
 'munsiyari'=>['Munsiyari','A beautiful Himalayan destination known for mountain views and Kumaon landscapes.','munsiyari-new.png'],
 'chitai-golu'=>['Chitai Golu','A beloved Kumaoni temple dedicated to Golu Devta, known for its bells and devotional traditions.','chitai-golu.webp'],
 'jageshwar'=>['Jageshwar Dham','An ancient Shiva temple complex surrounded by Himalayan forests.','jageshwar-dham-new.png'],
];
if (!isset($data[$key])) { wp_safe_redirect(home_url('/#journeys')); exit; }
[$title,$desc,$image]=$data[$key];
get_header();
?>
<main class="yatra-detail-page">
  <section class="yatra-detail-hero" style="--yatra-detail-bg:url('<?php echo esc_url(get_template_directory_uri().'/assets/'.$image); ?>')">
    <div class="yatra-detail-hero-bg" aria-hidden="true"></div>
    <div class="yatra-detail-hero-overlay" aria-hidden="true"></div>
    <div class="container yatra-detail-hero-content"><div class="kicker">Yatrasaar • Sacred Journey</div><h1><?php echo esc_html($title); ?></h1><p><?php echo esc_html($desc); ?></p><a class="btn btn-primary" href="<?php echo esc_url(home_url('/#contact')); ?>">Enquire Now →</a></div>
  </section>
  <section class="section yatra-detail-intro"><div class="container"><div class="center-head"><div class="kicker">Journey Details</div><h2>Discover the Journey</h2><p>Complete itinerary, routes, inclusions, dates and travel information for this sacred destination will be added here.</p><div class="yatra-detail-actions"><a class="btn btn-outline" href="<?php echo esc_url(home_url('/#journeys')); ?>">← Back to Yatras</a><a class="btn btn-primary" href="<?php echo esc_url(home_url('/#contact')); ?>">Plan This Yatra →</a></div></div></div></section>
</main>
<?php get_footer(); ?>
