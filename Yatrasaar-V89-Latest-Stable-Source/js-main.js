const ASSET_BASE=(window.YatrasaarData&&window.YatrasaarData.assets)||"assets";
const ASSET_VER=(window.YatrasaarData&&window.YatrasaarData.assetVersion)||"1";
const asset=(name)=>ASSET_BASE+"/"+name+"?ver="+ASSET_VER;
const peaks=[
 {name:"Adi Kailash",image:asset("adi-kailash-new.png")},
 {name:"Om Parvat",image:asset("om-parvat-new.png")},
 {name:"Munsiyari",image:asset("munsiyari-new.png")}
];
const temples=[
 {name:"Kainchi Dham",image:asset("kainchi-dham-new.png")},
 {name:"Jageshwar Dham",image:asset("jageshwar-dham-new.png")},
 {name:"Chitai Golu",image:asset("chitai-golu.webp")}
];
const bgA=document.getElementById("heroBgA"),bgB=document.getElementById("heroBgB");
const peakBlock=document.getElementById("peakBlock"),templeBlock=document.getElementById("templeBlock");
const peakWord=document.getElementById("peakWord"),templeWord=document.getElementById("templeWord");
const wait=ms=>new Promise(r=>setTimeout(r,ms));

// Preload every hero image once so changing destinations never waits for a network request.
const heroItems=[...peaks,...temples];
const preloaded=[];
heroItems.forEach(item=>{const im=new Image();im.decoding="async";im.src=item.image;preloaded.push(im)});

let activeBg=bgA;
let nextBg=bgB;
function setHeroBg(img){
  if(activeBg.dataset.src===img) return;
  nextBg.style.backgroundImage=`url("${img}")`;
  nextBg.dataset.src=img;
  nextBg.classList.add("is-visible");
  activeBg.classList.remove("is-visible");
  [activeBg,nextBg]=[nextBg,activeBg];
}

async function type(el,text){
 el.textContent="";
 for(const c of text){el.textContent+=c;await wait(55)}
 await wait(1300);
 for(let i=text.length;i>0;i--){el.textContent=text.slice(0,i-1);await wait(28)}
 await wait(140);
}

async function cycle(){
 while(true){
  peakBlock.style.display="block";templeBlock.style.display="none";
  for(const x of peaks){setHeroBg(x.image);await type(peakWord,x.name)}
  await wait(350);
  peakBlock.style.display="none";templeBlock.style.display="block";
  for(const x of temples){setHeroBg(x.image);await type(templeWord,x.name)}
  await wait(450);
 }
}
if(bgA && bgB && peakBlock && templeBlock && peakWord && templeWord){
  setHeroBg(peaks[0].image);
  cycle();
}

function goContact(){document.getElementById("contact").scrollIntoView({behavior:"smooth"})}
// Homepage destination enquiries: show a starting-point selector for Adi Kailash, including Other.
function setupDestinationEnquiries(){
  const forms=document.querySelectorAll('#heroForm, #journeyForm');
  forms.forEach(form=>{
    const destination=form.querySelector('.destination-select');
    const fromField=form.querySelector('.route-from-field');
    const fromSelect=form.querySelector('.route-from-select');
    if(!destination || !fromField) return;
    const sync=()=>{
      const isAdi=destination.value === 'Adi Kailash';
      fromField.hidden=!isAdi;
      if(!isAdi && fromSelect) fromSelect.value='';
    };
    destination.addEventListener('change',sync);
    sync();
  });
}
setupDestinationEnquiries();

function selectHomeDestination(destination){
  const form=document.getElementById('journeyForm');
  if(!form) return;
  const select=form.querySelector('.destination-select');
  if(select){select.value=destination; select.dispatchEvent(new Event('change',{bubbles:true}));}
  document.getElementById('contact')?.scrollIntoView({behavior:'smooth',block:'start'});
}

// Explore Yatras cards (except Adi Kailash) pre-select the destination in the homepage enquiry form.
document.querySelectorAll('.explore-card[data-destination]').forEach(card=>{
  card.addEventListener('click',e=>{
    e.preventDefault();
    selectHomeDestination(card.dataset.destination);
  });
});

function sendWhatsApp(form){
 const values=[...form.querySelectorAll('input,select,textarea')].map(el=>({label:el.getAttribute('aria-label')||el.previousElementSibling?.textContent?.trim()||el.name||'',value:el.value.trim()})).filter(x=>x.value);
 const lines=['Hello Yatrasaar, I want to enquire about a yatra.'];
 values.forEach(x=>{if(x.label) lines.push(x.label.replace('*','')+': '+x.value)});
 const msg=encodeURIComponent(lines.join('\n'));
 window.open("https://wa.me/918920264675?text="+msg,"_blank");
}
const heroForm=document.getElementById("heroForm");
const journeyForm=document.getElementById("journeyForm");
const formAction=(form)=>String(form?.getAttribute("action")||"");
if(heroForm && !formAction(heroForm).includes("admin-post.php")) heroForm.addEventListener("submit",e=>{e.preventDefault();sendWhatsApp(e.target)});
if(journeyForm && !formAction(journeyForm).includes("admin-post.php")) journeyForm.addEventListener("submit",e=>{e.preventDefault();sendWhatsApp(e.target)});

if("IntersectionObserver" in window){ const revealItems=document.querySelectorAll(".reveal"); revealItems.forEach(e=>e.classList.add("reveal-ready")); const io=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add("show");io.unobserve(e.target)}}),{threshold:.08}); revealItems.forEach(e=>io.observe(e)); } else { document.querySelectorAll(".reveal").forEach(e=>e.classList.add("show")); }



// Om loader: keep it brief and never block the page if assets are slow.
document.addEventListener('DOMContentLoaded',()=>{
  const loader=document.getElementById('omLoader');
  if(!loader) return;
  const hide=()=>setTimeout(()=>loader.classList.add('hide'),350);
  if(document.readyState==='complete') hide(); else window.addEventListener('load',hide,{once:true});
  setTimeout(()=>loader.classList.add('hide'),800);
});


// Shared mobile hamburger navigation — robust on every WordPress page.
(function(){
  function initYatrasaarMobileMenu(){
    const menuBtn=document.getElementById('yatrasaarMenuButton') || document.querySelector('.menu');
    const navLinks=document.getElementById('yatrasaarMobileMenu') || document.querySelector('.nav-links');
    if(!menuBtn || !navLinks || menuBtn.dataset.menuReady==='1') return;
    menuBtn.dataset.menuReady='1';

    function closeMenu(){
      navLinks.classList.remove('mobile-open');
      menuBtn.setAttribute('aria-expanded','false');
      menuBtn.setAttribute('aria-label','Open menu');
      menuBtn.textContent='☰';
    }
    function toggleMenu(e){
      if(e) e.preventDefault();
      e && e.stopPropagation();
      const open=!navLinks.classList.contains('mobile-open');
      navLinks.classList.toggle('mobile-open',open);
      menuBtn.setAttribute('aria-expanded',open?'true':'false');
      menuBtn.setAttribute('aria-label',open?'Close menu':'Open menu');
      menuBtn.textContent=open?'✕':'☰';
    }

    menuBtn.setAttribute('aria-expanded','false');
    menuBtn.addEventListener('click',toggleMenu);

    navLinks.addEventListener('click',function(e){
      const link=e.target.closest('a');
      if(link) closeMenu();
    });
    document.addEventListener('click',function(e){
      if(!navLinks.contains(e.target) && !menuBtn.contains(e.target)) closeMenu();
    });
    window.addEventListener('resize',function(){
      if(window.innerWidth>800) closeMenu();
    });
  }

  if(document.readyState==='loading') document.addEventListener('DOMContentLoaded',initYatrasaarMobileMenu,{once:true});
  else initYatrasaarMobileMenu();
})();


// Detailed route explorer data
(function(){
  const data={
    'new-delhi':{name:'New Delhi',route:'Delhi → Pithoragarh → Dharchula → Gunji → Adi Kailash',duration:'7 Days / 6 Nights',price:'₹32,000',intro:'A complete journey from New Delhi through Kumaon and the high Himalayas, covering Adi Kailash, Om Parvat and key spiritual stops.',days:[
      ['Day 1','New Delhi → Haldwani/Kathgodam → Pithoragarh','Begin the journey from New Delhi and continue towards Kumaon. The route includes the Haldwani/Kathgodam side and onward travel to Pithoragarh.'],
      ['Day 2','Pithoragarh → Dharchula','Complete medical and Inner Line Permit formalities, visit Mostamanu Temple and Chandak, then continue to Dharchula by the Kali River.'],
      ['Day 3','Dharchula → Nabi/Gunji','Drive through the mountain terrain towards Nabi/Gunji, with scenic views of the valleys and Kali River.'],
      ['Day 4','Gunji → Jyolingkong → Adi Kailash','Drive towards Jyolingkong and continue for Adi Kailash Darshan, with Parvati Sarovar and Gauri Kund on the route before returning to Gunji.'],
      ['Day 5','Gunji → Nabidhang → Om Parvat','Travel towards Nabidhang for Om Parvat Darshan, then return towards Dharchula.'],
      ['Day 6','Dharchula → Almora → Jageshwar / Chitai Golu','Travel back through Kumaon with a visit to Jageshwar Dham and Chitai Golu Devta Temple before the overnight stay in Almora.'],
      ['Day 7','Almora → Kainchi Dham → New Delhi','Visit Kainchi Dham on the return journey and continue to New Delhi for the final drop.']
    ]},
    bareilly:{name:'Bareilly',route:'Bareilly → Pithoragarh → Dharchula → Gunji → Adi Kailash',duration:'6 Days / 5 Nights',price:'₹27,000',intro:'A Bareilly departure joining the core Himalayan route through Pithoragarh, Dharchula and Gunji before the sacred Adi Kailash and Om Parvat visits.',days:[
      ['Day 1','Bareilly → Dharchula','Start from Bareilly and travel towards Dharchula, the gateway to the high-Himalayan section of the yatra.'],
      ['Day 2','Dharchula → Nabi/Gunji','Continue through mountain valleys from Dharchula to Nabi/Gunji with scenic Himalayan views.'],
      ['Day 3','Gunji → Adi Kailash → Gunji','Travel from Nabi/Gunji towards Adi Kailash, experience the sacred landscape and return to the base village.'],
      ['Day 4','Gunji → Om Parvat → Gunji','Head towards Om Parvat for Darshan of the natural snow formation before returning to Nabi/Gunji.'],
      ['Day 5','Nabi → Dharchula','Descend from Nabi/Gunji to Dharchula through the mountain route.'],
      ['Day 6','Dharchula → Bareilly','Conclude the yatra with the return drive from Dharchula to Bareilly.']
    ]},
    kathgodam:{name:'Kathgodam',route:'Kathgodam → Pithoragarh → Dharchula → Gunji → Adi Kailash',duration:'7 Days / 6 Nights',price:'₹30,000',intro:'A Kumaon-focused departure that adds Kainchi Dham and Chitai Golu before entering the core Pithoragarh–Dharchula–Gunji route.',days:[
      ['Day 1','Kathgodam/Haldwani → Bhimtal → Kainchi Dham → Chitai Golu → Pithoragarh','Begin from Kathgodam, visit Bhimtal, Kainchi Dham and Chitai Golu Devta Temple, then continue to Pithoragarh.'],
      ['Day 2','Pithoragarh → Dharchula','Explore Pithoragarh sights such as Chandak and Mostamanu Temple, then drive to Dharchula.'],
      ['Day 3','Dharchula → Nabi/Gunji','Drive towards Nabi/Gunji through the mountain route and settle into the high-Himalayan base.'],
      ['Day 4','Gunji → Jyolingkong → Adi Kailash','Visit Jyolingkong, Parvati Sarovar and Adi Kailash, with the sacred high-altitude landscape as the focus of the day.'],
      ['Day 5','Gunji → Nabidhang → Om Parvat → Dharchula','Travel to Nabidhang for Om Parvat Darshan and continue back towards Dharchula.'],
      ['Day 6','Dharchula → Patal Bhuvneshwar','Continue towards Patal Bhuvneshwar and explore the revered limestone cave before the overnight stay.'],
      ['Day 7','Patal Bhuvneshwar → Kathgodam/Haldwani','Return through Kumaon and conclude the journey at Kathgodam/Haldwani.']
    ]},
    pithoragarh:{name:'Pithoragarh',route:'Pithoragarh → Dharchula → Gunji → Adi Kailash',duration:'4 Days / 3 Nights',price:'₹21,000',intro:'A compact regional itinerary beginning in Pithoragarh and moving directly into the Dharchula–Gunji–Adi Kailash and Om Parvat circuit.',days:[
      ['Day 1','Pithoragarh → Dharchula','Explore Pithoragarh, complete permit and medical formalities, then continue to Dharchula for the overnight stay.'],
      ['Day 2','Dharchula → Nabi/Gunji','Travel from Dharchula to Nabi/Gunji through the scenic Kali River valley and mountain terrain.'],
      ['Day 3','Gunji → Jyolingkong → Adi Kailash → Gauri Kund','Drive to Jyolingkong and continue to Adi Kailash, with Gauri Kund and the surrounding sacred landscape.'],
      ['Day 4','Gunji → Nabidhang → Om Parvat → Pithoragarh','Witness Om Parvat from Nabidhang and return through the mountain route towards Pithoragarh.']
    ]},
    dharchula:{name:'Dharchula',route:'Dharchula → Gunji → Adi Kailash',duration:'3 Days / 2 Nights',price:'₹16,000',intro:'The shortest joining route, starting directly from Dharchula and focusing on Nabi/Gunji, Adi Kailash and Om Parvat.',days:[
      ['Day 1','Dharchula → Nabi/Gunji','Depart Dharchula early and drive through the mountain terrain with views of the Kali River and surrounding peaks.'],
      ['Day 2','Gunji → Adi Kailash → Parvati Sarovar → Gauri Kund → Gunji','Start early for Adi Kailash and the surrounding sacred sites, including Parvati Sarovar and Gauri Kund, before returning to Gunji.'],
      ['Day 3','Gunji → Nabidhang → Om Parvat → Dharchula','Drive towards Nabidhang for Om Parvat Darshan and return to Dharchula to conclude the route.']
    ]}
  };
  function render(key){
    const panel=document.getElementById('routeDetailPanel'); const d=data[key]; if(!panel||!d)return;
    const stops=d.route.split(' → ').map((stop,i)=>`<span class="route-flow-chip">${stop}</span>`).join('');
    const routeStops=d.route.split(' → ');
    const points=routeStops.map((stop,i)=>{const x=8+(i*(84/Math.max(routeStops.length-1,1))); const y=50 + (i%2===0?-12:12); return {stop,x,y};});
    const path=points.map((pt,i)=>`${i?'L':'M'} ${pt.x} ${pt.y}`).join(' ');
    const mapDots=points.map((pt,i)=>`<button class="map-stop" style="left:${pt.x}%;top:${pt.y}%" type="button" title="${pt.stop}"><span>${i+1}</span><strong>${pt.stop}</strong></button>`).join('');
    panel.innerHTML=`<div class="route-detail-head"><div><span class="kicker">${d.name} Route • Detailed Itinerary</span><h3>${d.route}</h3><p>${d.intro}</p><div class="route-detail-summary">${stops}</div></div><div class="route-detail-pricebox"><span class="label">Yatrasaar Package</span><strong>${d.price}</strong><small>per person</small><span class="duration">⏱ ${d.duration}</span></div></div><div class="route-map-wrap"><div class="route-map-copy"><span class="kicker">Journey Route</span><h4>Follow the journey</h4><p>From your starting point to the sacred Adi Kailash region.</p></div><div class="route-map"><svg viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true"><path class="route-map-glow" d="${path}"/><path class="route-map-line" d="${path}"/></svg>${mapDots}<div class="map-mountain">✦</div></div></div><div class="itinerary-section-title"><span class="kicker">Day by Day</span><h4>Your journey, clearly planned</h4></div><div class="itinerary-grid">${d.days.map((x,i)=>`<article class="itinerary-day" style="--day-index:${i}"><span class="day-label">${x[0].replace('Day ','D')}</span><h4>${x[1]}</h4><p>${x[2]}</p></article>`).join('')}</div><div class="route-detail-footer"><a class="btn btn-primary" href="${(window.YatrasaarData&&window.YatrasaarData.contactUrl)||'contact.html'}?route=${encodeURIComponent(d.name)}">Enquire for ${d.name} Route →</a></div>`;
    panel.scrollIntoView({behavior:'smooth',block:'start'});
  }
  document.addEventListener('DOMContentLoaded',()=>{
    const jump=document.getElementById('routeJump');
    const buttons=document.querySelectorAll('.itinerary-btn');
    if(jump) jump.addEventListener('change',()=>{ if(jump.value) render(jump.value); });
    buttons.forEach(btn=>btn.addEventListener('click',e=>{
      e.preventDefault();
      const key=btn.dataset.itinerary;
      if(jump) jump.value=key;
      render(key);
    }));
  });
})();


// V65 — Adi Kailash header dropdown + route deep links.
(function(){
  const ready = function(){
    const dropdown = document.querySelector('.adi-dropdown');
    const trigger = document.querySelector('.adi-dropdown > .adi-main-link');
    if (dropdown && trigger) {
      trigger.addEventListener('click', function(e){
        if (window.innerWidth <= 800) {
          const opened = dropdown.classList.toggle('submenu-open');
          trigger.setAttribute('aria-expanded', opened ? 'true' : 'false');
          e.preventDefault();
        }
      });
    }

    const hash = window.location.hash;
    if (hash && /^#route-(new-delhi|bareilly|kathgodam|pithoragarh|dharchula)$/.test(hash)) {
      const target = document.querySelector(hash);
      if (target) {
        setTimeout(function(){ target.scrollIntoView({behavior:'smooth', block:'center'}); target.classList.add('route-deep-link'); }, 350);
      }
    }
  };
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', ready); else ready();
})();

// V63 — automatic Explore Yatras carousel + show homepage enquiry popup only once per browser.
(function(){
  const grid=document.querySelector('#journeys .explore-grid');
  if(grid){
    let timer=null;
    let paused=false;
    const start=()=>{
      if(timer || grid.children.length<2) return;
      timer=setInterval(()=>{
        if(paused) return;
        const cards=[...grid.children];
        const first=cards[0];
        if(!first) return;
        const gap=parseFloat(getComputedStyle(grid).gap)||18;
        const step=first.getBoundingClientRect().width+gap;
        const max=grid.scrollWidth-grid.clientWidth-2;
        if(grid.scrollLeft>=max){ grid.scrollTo({left:0,behavior:'smooth'}); }
        else { grid.scrollBy({left:step,behavior:'smooth'}); }
      },3600);
    };
    const stop=()=>{if(timer){clearInterval(timer);timer=null;}};
    grid.addEventListener('mouseenter',()=>paused=true);
    grid.addEventListener('mouseleave',()=>paused=false);
    grid.addEventListener('touchstart',()=>paused=true,{passive:true});
    grid.addEventListener('touchend',()=>{setTimeout(()=>paused=false,1800)},{passive:true});
    document.addEventListener('visibilitychange',()=>document.hidden?stop():start());
    start();
  }
})();
