<?php if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$ys_css_path = get_template_directory() . '/style.css';
$ys_css_ver = file_exists($ys_css_path) ? filemtime($ys_css_path) : time();
$ys_logo = yatrasaar_asset_url('assets/yatrasaar-logo-fast.webp');
?>
<link rel="preload" as="image" href="<?php echo esc_url($ys_logo); ?>" fetchpriority="high">
<link rel="stylesheet" id="yatrasaar-direct-css" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?ver=' . $ys_css_ver); ?>" media="all">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if (is_front_page()): ?>
<div class="om-loader" id="omLoader" aria-label="Loading Yatrasaar" role="status"><div class="om-loader-symbol">ॐ</div><div class="om-loader-ring"></div><div class="om-loader-text">YATRASAAR</div></div>
<?php endif; ?>
<?php if (is_front_page()): ?>
<div class="home-enquiry-popup" id="homeEnquiryPopup" aria-hidden="true">
  <div class="home-enquiry-backdrop" data-popup-close="1"></div>
  <div class="home-enquiry-card" role="dialog" aria-modal="true" aria-labelledby="homePopupTitle">
    <button type="button" class="home-enquiry-close" id="homeEnquiryClose" aria-label="Close enquiry form">&times;</button>
    <div class="home-enquiry-kicker">PLAN YOUR SACRED JOURNEY</div>
    <h2 id="homePopupTitle">Where would you like to go?</h2>
    <p>Share a few details and our team will help you plan your yatra.</p>
    <form class="home-enquiry-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="yatrasaar_submit_enquiry">
      <?php wp_nonce_field('yatrasaar_submit_enquiry','yatrasaar_nonce',true,false); ?>
      <input type="hidden" name="source" value="Home Popup">
      <div class="popup-form-grid">
        <input name="name" type="text" placeholder="Your name" required>
        <input name="phone" type="tel" placeholder="Phone number" required>
        <input name="state" type="text" placeholder="Your State" autocomplete="address-level1" required>
        <select name="destination" required><option value="">Choose destination</option><option>Adi Kailash &amp; Om Parvat</option><option>Char Dham Yatra</option><option>Munsiyari</option><option>Kainchi Dham</option><option>Jageshwar Dham</option><option>Chitai Golu</option></select>
        <label class="popup-date-field"><span>Travel date</span><input name="travel_date" type="date" aria-label="Travel date"></label>
      </div>
      <button type="submit" class="popup-submit">Get My Yatra Plan &rarr;</button>
    </form>
  </div>
</div>
<?php endif; ?>
<?php if (is_front_page()): ?>
<script>
(function(){
  var KEY='yatrasaar_home_popup_seen';
  var COOKIE='yatrasaar_home_popup_seen=1';
  var popup=document.getElementById('homeEnquiryPopup');
  if(!popup) return;
  var closeBtn=document.getElementById('homeEnquiryClose');
  var forced=new URLSearchParams(window.location.search).get('popup')==='1';
  function seen(){
    if(forced) return false;
    try{ if(localStorage.getItem(KEY)==='1') return true; }catch(e){}
    return document.cookie.indexOf(COOKIE) !== -1;
  }
  function markSeen(){
    if(forced) return;
    try{localStorage.setItem(KEY,'1');}catch(e){}
    document.cookie=COOKIE+'; max-age=31536000; path=/; SameSite=Lax';
  }
  function openPopup(){if(seen())return;popup.classList.add('is-visible');popup.setAttribute('aria-hidden','false');if(document.body)document.body.classList.add('popup-open');}
  function closePopup(){popup.classList.remove('is-visible');popup.setAttribute('aria-hidden','true');if(document.body)document.body.classList.remove('popup-open');markSeen();}
  if(closeBtn) closeBtn.addEventListener('click',closePopup);
  popup.addEventListener('click',function(e){if(e.target && e.target.getAttribute('data-popup-close')==='1') closePopup();});
  document.addEventListener('keydown',function(e){if(e.key==='Escape' && popup.classList.contains('is-visible')) closePopup();});
  window.setTimeout(openPopup,1200);
  var form=popup.querySelector('form');
  if(form) form.addEventListener('submit',markSeen);
})();
</script>
<?php endif; ?>
<div class="topbar">
  <div class="social" aria-label="Yatrasaar social links">
    <a class="social-icon instagram" href="https://www.instagram.com/yatrasaar/" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><defs><linearGradient id="igGrad" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="#feda75"/><stop offset=".45" stop-color="#fa7e1e"/><stop offset=".7" stop-color="#d62976"/><stop offset="1" stop-color="#4f5bd5"/></linearGradient></defs><rect x="3.2" y="3.2" width="17.6" height="17.6" rx="5" fill="none" stroke="url(#igGrad)" stroke-width="2.2"/><circle cx="12" cy="12" r="4.1" fill="none" stroke="url(#igGrad)" stroke-width="2.1"/><circle cx="17.35" cy="6.7" r="1.25" fill="#d62976"/></svg></a>
    <a class="social-icon facebook" href="https://www.facebook.com/people/Yatrasaar/61577176858292/" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.7 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.3-1.5 1.5-1.5h1.7V3.6c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.1H7.6V13h2.6v8h3.5z" fill="#1877F2"/></svg></a>
    <a class="social-icon whatsapp" href="https://wa.me/918920264675" target="_blank" rel="noopener" aria-label="WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.1 3.9A11.2 11.2 0 0 0 12.1.6C5.9.6.9 5.6.9 11.8c0 2 .5 3.9 1.5 5.6L.8 23.4l6.2-1.6c1.6.9 3.3 1.3 5.1 1.3h.1c6.1 0 11.1-5 11.1-11.2 0-3-1.2-5.8-3.3-8z" fill="#25D366"/></svg></a>
  </div>
  <div class="contact"><a href="tel:+918920264675">📞 +91 89202 64675</a><a href="mailto:info@yatrasaar.com">✉ info@yatrasaar.com</a></div>
</div>
<nav class="nav">
  <a href="<?php echo esc_url(home_url('/')); ?>"><img class="logo" src="<?php echo esc_url(yatrasaar_asset_url('assets/yatrasaar-logo-fast.webp')); ?>" alt="Yatrasaar"></a>
  <div class="nav-links" id="yatrasaarMobileMenu">
    <ul class="nav-menu">
      <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
      <li><a href="<?php echo esc_url(yatrasaar_url('adi-kailash-packages')); ?>">Adi Kailash</a></li>
      <li><a href="<?php echo esc_url(yatrasaar_url('tour-packages')); ?>">Tour Packages</a></li>
      <li><a href="<?php echo esc_url(yatrasaar_url('about')); ?>">About</a></li>
      <li><a href="<?php echo esc_url(yatrasaar_url('contact')); ?>">Contact</a></li>
    </ul>
  </div>
  <a class="nav-cta" href="<?php echo esc_url(yatrasaar_url('contact')); ?>">Enquire Now →</a>
  <button type="button" class="menu" id="yatrasaarMenuButton" aria-controls="yatrasaarMobileMenu" aria-expanded="false" aria-label="Open menu" onclick="event.preventDefault();event.stopImmediatePropagation();(function(b){var m=document.getElementById('yatrasaarMobileMenu');var o=m.classList.toggle('mobile-open');b.setAttribute('aria-expanded',o?'true':'false');b.setAttribute('aria-label',o?'Close menu':'Open menu');b.innerHTML=o?'✕':'☰';})(this);">☰</button>
</nav>
