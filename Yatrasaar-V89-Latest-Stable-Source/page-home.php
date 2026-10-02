<?php get_header(); ?>
<header class="hero">
  <div class="hero-bg hero-bg-a is-visible" id="heroBgA" style="background-image:url('<?php echo esc_url(get_template_directory_uri().'/assets/adi-kailash-new.png'); ?>')"></div><div class="hero-bg hero-bg-b" id="heroBgB"></div><div class="hero-overlay"></div>
  <div class="hero-inner">
    <div>
      <div class="eyebrow">Sacred Journeys • Divine Destinations</div>
      <div class="type-area" id="peakBlock">
        <div class="type-label">Explore the Sacred Peaks of</div>
        <div class="type-word"><span id="peakWord"></span><span class="cursor"></span></div>
      </div>
      <div class="type-area" id="templeBlock" style="display:none">
        <div class="type-label">Discover the Sacred Temples of Uttarakhand</div>
        <div class="type-word"><span id="templeWord"></span><span class="cursor"></span></div>
      </div>
      <p class="hero-tagline">Feel the mountains, discover the sacred, and make every journey a story worth remembering.</p>
      <div class="actions"><a class="btn btn-primary" href="#journeys">Explore Yatras →</a><a class="btn btn-outline" href="<?php echo esc_url(yatrasaar_url('adi-kailash-packages')); ?>">View Packages</a></div>
    </div>
    <form class="enquiry" id="heroForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"><input type="hidden" name="action" value="yatrasaar_submit_enquiry"><?php wp_nonce_field('yatrasaar_submit_enquiry','yatrasaar_nonce',true,false); ?><input type="hidden" name="source" value="Home Hero">
      <small>Plan Your Journey</small><h2>Get Your Free Yatra Plan</h2>
      <div class="field"><input name="name" placeholder="Your Full Name" required></div>
      <div class="field"><input name="email" type="email" placeholder="your@email.com" required></div>
      <div class="field"><input name="phone" type="tel" placeholder="Your Mobile no." required></div>
      <div class="field"><input name="state" type="text" placeholder="Your State" autocomplete="address-level1" required></div>
      <div class="field"><select name="destination" class="destination-select" required><option value="">Select a destination...</option><option>Adi Kailash &amp; Om Parvat</option><option>Char Dham Yatra</option><option>Munsiyari</option><option>Kainchi Dham</option><option>Jageshwar Dham</option><option>Chitai Golu</option></select></div>
      <div class="field route-from-field" hidden><label>From</label><select name="route_from" class="route-from-select"><option value="">Select starting point...</option><option>New Delhi</option><option>Bareilly</option><option>Kathgodam</option><option>Pithoragarh</option><option>Dharchula</option><option>Other</option></select></div>
      <div class="form-row"><div class="field"><input name="travel_date" type="date" aria-label="Travel date"></div><div class="field"><input name="travellers" type="number" min="1" value="1" aria-label="Travellers"></div></div>
      <div class="field"><textarea name="message" placeholder="Any special requests..."></textarea></div>
      <button class="btn btn-primary" type="submit">✈ Get My Free Yatra Plan</button>
    </form>
  </div>
</header>

<div class="announcement">
  <div class="announcement-track">
    <div class="announce-item"><strong>Yatrasaar – Aapki har yaatra ka saathi! ✨</strong></div>
    <div class="announce-item">Call us at <strong>+91 89202 64675</strong></div>
    <div class="announce-item">Email: <strong>info@yatrasaar.com</strong></div>
    <div class="announce-item"><strong>Register for Adi Kailash Yatra 2026</strong></div>
    <div class="announce-item"><strong>Explore Adi Kailash Yatra 2026 →</strong></div>
    <div class="announce-item"><strong>Yatrasaar – Aapki har yaatra ka saathi! ✨</strong></div>
    <div class="announce-item">Call us at <strong>+91 89202 64675</strong></div>
    <div class="announce-item">Email: <strong>info@yatrasaar.com</strong></div>
    <div class="announce-item"><strong>Register for Adi Kailash Yatra 2026</strong></div>
    <div class="announce-item"><strong>Explore Adi Kailash Yatra 2026 →</strong></div>
  </div>
</div>

<section class="section reveal" id="journeys">
  <div class="container">
    <div class="center-head"><div class="kicker">Explore the Divine</div><h2>Our Yatras</h2><p>Choose your destination and begin a journey through the sacred landscapes of Uttarakhand.</p></div>
    <div class="explore-grid">
      <a class="explore-card" href="<?php echo esc_url(yatrasaar_url('adi-kailash-packages')); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/adi-kailash-new.png'); ?>" alt="Adi Kailash"><div class="explore-copy"><small>Sacred Peak</small><h3>Adi Kailash Yatra</h3><span>The Abode of Lord Shiva</span></div></a>
      <a class="explore-card" href="#contact" data-destination="Om Parvat"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/om-parvat-new.png'); ?>" alt="Om Parvat"><div class="explore-copy"><small>Iconic Mountain</small><h3>Om Parvat Yatra</h3><span>A Natural Divine Wonder</span></div></a>
      <a class="explore-card" href="#contact" data-destination="Char Dham Yatra"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/char-dham-new.png'); ?>" alt="Char Dham"><div class="explore-copy"><small>Pilgrimage</small><h3>Char Dham Yatra</h3><span>Seek Blessings at the Four Dhams</span></div></a>
      <a class="explore-card" href="#contact" data-destination="Munsiyari"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/munsiyari-new.png'); ?>" alt="Munsiyari"><div class="explore-copy"><small>Kumaon Himalayas</small><h3>Munsiyari</h3><span>Explore More Sacred Destinations</span></div></a>
      <a class="explore-card" href="#contact" data-destination="Kainchi Dham"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/kainchi-dham-new.png'); ?>" alt="Kainchi Dham"><div class="explore-copy"><small>Sacred Temple</small><h3>Kainchi Dham</h3><span>A peaceful spiritual destination</span></div></a>
      <a class="explore-card" href="#contact" data-destination="Chitai Golu"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/chitai-golu.webp'); ?>" alt="Chitai Golu Temple"><div class="explore-copy"><small>Sacred Temple</small><h3>Chitai Golu</h3><span>The Temple of Golu Devta</span></div></a>
    </div>
  </div>
</section>


<section class="section featured reveal" id="packages">
  <div class="featured-head">
    <div class="best-badge">✦ &nbsp; Sacred Journeys Collection</div>
    <h2>Journeys that <span>call you home</span></h2>
    <div class="sub">Explore • Experience • Surrender</div>
    <p>From sacred Himalayan peaks to timeless temples, discover meaningful journeys curated by Yatrasaar.</p>
    <div class="gold-line"></div>
  </div>


</section>


<section class="section reveal" id="why">
  <div class="container">
    <div class="center-head"><div class="kicker">Why Yatrasaar?</div><h2>More Than Travel, A Deeper Purpose</h2><p>Thoughtful planning and dependable support for every step of your Himalayan journey.</p></div>
    <div class="why-grid">
      <div class="why-card"><div class="icon">♙</div><h3>Experienced Team</h3><p>Years of Himalayan travel experience.</p></div>
      <div class="why-card"><div class="icon">▣</div><h3>Permit Assistance</h3><p>We handle the important paperwork and guidance.</p></div>
      <div class="why-card"><div class="icon">▤</div><h3>Comfortable Travel</h3><p>Clean, safe and reliable transport.</p></div>
      <div class="why-card"><div class="icon">⌖</div><h3>Local Support</h3><p>On-ground support across Uttarakhand.</p></div>
      <div class="why-card"><div class="icon">✎</div><h3>Customised Itineraries</h3><p>Travel your way with flexible planning.</p></div>
      <div class="why-card"><div class="icon">◷</div><h3>24×7 Support</h3><p>Always here when you need us.</p></div>
    </div>
  </div>
</section>

<section class="section paper reveal" id="temples">
  <div class="container">
    <div class="center-head"><div class="kicker">Explore the Sacred</div><h2>Temples & Spiritual Destinations</h2><p>Discover the places, traditions and sacred landscapes that make Uttarakhand extraordinary.</p></div>
    <div class="temple-grid">
      <article class="temple-card"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/kainchi-dham-new.png'); ?>" alt="Kainchi Dham"><div class="temple-body"><h3>Kainchi Dham</h3><p>A peaceful spiritual destination in the Kumaon hills.</p></div></article>
      <article class="temple-card"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/char-dham-new.png'); ?>" alt="Char Dham"><div class="temple-body"><h3>Char Dham Yatra</h3><p>A celebrated pilgrimage through Uttarakhand's sacred dhams.</p></div></article>
      <article class="temple-card"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/jageshwar-dham-new.png'); ?>" alt="Jageshwar Dham"><div class="temple-body"><h3>Jageshwar Dham</h3><p>An ancient temple landscape surrounded by Himalayan forests.</p></div></article>
      <article class="temple-card"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/chitai-golu.webp'); ?>" alt="Chitai Golu Temple"><div class="temple-body"><h3>Chitai Golu Temple</h3><p>Known for its thousands of bells and its strong Kumaoni tradition of devotion to Golu Devta.</p></div></article>
    </div>
  </div>
</section>

<section class="section reveal" id="gallery">
  <div class="container">
    <div class="center-head"><div class="kicker">Moments From Our Journeys</div><h2>Memories from the Mountains</h2><p>Real places. Real journeys. Moments worth keeping.</p></div>
    <div class="gallery">
      <div><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/adi-kailash-new.png'); ?>" alt="Adi Kailash"></div><div><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/om-parvat-new.png'); ?>" alt="Om Parvat"></div><div><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/munsiyari-new.png'); ?>" alt="Munsiyari"></div><div><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/char-dham-new.png'); ?>" alt="Char Dham"></div><div><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/chitai-golu.webp'); ?>" alt="Chitai Golu Temple"></div>
    </div>
  </div>
</section>

<section class="start" id="contact">
  <div class="start-wrap">
    <div class="start-copy"><div class="kicker">Ready for your own journey?</div><h2>Let's Plan Your Yatra</h2><p>Get in touch with our team for customised itineraries, group bookings or any queries.</p><div class="contact-line">📞 +91 89202 64675<br>✉ info@yatrasaar.com</div></div>
    <form class="form-card" id="journeyForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"><input type="hidden" name="action" value="yatrasaar_submit_enquiry"><?php wp_nonce_field('yatrasaar_submit_enquiry','yatrasaar_nonce',true,false); ?><input type="hidden" name="source" value="Home Journey">
      <h3>Get Your Free Yatra Plan</h3>
      <label>Full Name <span class="req">*</span></label><input name="name" placeholder="Your full name" required>
      <label>Email <span class="req">*</span></label><input name="email" type="email" placeholder="your@email.com" required>
      <label>Phone <span class="req">*</span></label><input name="phone" type="tel" placeholder="Your Mobile no." required>
      <label>Your State <span class="req">*</span></label><input name="state" type="text" placeholder="Your state" autocomplete="address-level1" required>
      <label>Destination</label><select name="destination" class="destination-select"><option value="">Select a destination...</option><option>Adi Kailash &amp; Om Parvat</option><option>Char Dham Yatra</option><option>Munsiyari</option><option>Kainchi Dham</option><option>Jageshwar Dham</option><option>Chitai Golu</option></select>
      <div class="route-from-field" hidden><label>From</label><select name="route_from" class="route-from-select"><option value="">Select starting point...</option><option>New Delhi</option><option>Bareilly</option><option>Kathgodam</option><option>Pithoragarh</option><option>Dharchula</option><option>Other</option></select></div>
      <div class="row"><div><label>Travel Date</label><input name="travel_date" type="date"></div><div><label>Travellers</label><input name="travellers" type="number" min="1" value="1"></div></div>
      <label>Message (optional)</label><textarea name="message" placeholder="Any special requests..."></textarea>
      <button class="btn" type="submit">✈ &nbsp; Get My Free Yatra Plan</button>
    </form>
  </div>
</section>
<?php get_footer(); ?>
