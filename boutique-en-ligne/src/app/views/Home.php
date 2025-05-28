<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OMNI – The Future</title>  <!-- TailwindCSS  -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!----------CSS ----->
    <link rel="stylesheet" href="public/assets/css/accueil.css">

  <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-..." 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" 
  />
</head>
<body class="antialiased text-gray-100">


<header class="relative h-[75vh] overflow-hidden">

<video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted>
  <source src="./public/assets/img/accueil.mp4" type="video/mp4">

</video>




 
  <div class="absolute inset-0 bg-black/50 z-10"></div>

 <!-- NAV Desktop -->
<nav class="absolute inset-x-0 top-0 z-20">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-6">
   
    <div class="text-2xl font-bold text-white">OMNI</div>

    <ul class="hidden md:flex space-x-8 text-white items-center">
      <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=all" class="hover:opacity-80">Collection</a></li>

    

     
     <li class="relative group">
  <button
    id="sexBtn"
    class="hover:opacity-80 flex items-center"
    aria-haspopup="true"
    aria-expanded="false"
  >
    Sexe <i class="fas fa-chevron-down ml-2"></i>
  </button>
  <ul
    id="sexMenu"
    class="absolute top-full mt-2 left-0 w-40 bg-white/10 backdrop-blur-md text-white rounded shadow-lg opacity-0 pointer-events-none transition-opacity duration-300 z-50 group-hover:opacity-100 group-hover:pointer-events-auto"
  >
    <li>
      <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="block px-4 py-2 hover:bg-white/20 hover:text-white transition duration-200 rounded-t">
        Homme
      </a>
    </li>
    <li>
      <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="block px-4 py-2 hover:bg-white/20 hover:text-white transition duration-200 rounded-b">
        Femme
      </a>
    </li>
  </ul>
</li>
<a href="/boutique-en-ligne/cart">Mon Panier</a>

                  <li class="relative group">
                    <button
                      id="compteBtn"
                      class="hover:opacity-80 flex items-center"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                    <i class="fa-regular fa-user"></i> <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <ul
                      id="compteMenu"
                      class="absolute top-full mt-2 left-0 w-40 bg-white/10 backdrop-blur-md text-white rounded shadow-lg opacity-0 pointer-events-none transition-opacity duration-300 z-50 group-hover:opacity-100 group-hover:pointer-events-auto"
                    >
                      <li>
                        <a href="/boutique-en-ligne/register" class="block px-4 py-2 text-sm hover:bg-white/20 hover:text-white transition duration-200 rounded-t">
                          <small>Pas encore inscrit ? <span class="underline">Inscrivez-vous</span></small>
                        </a>
                      </li>
                      <li>
                        <a href="/boutique-en-ligne/login" class="block px-4 py-2 text-sm hover:bg-white/20 hover:text-white transition duration-200">
                          Se connecter
                        </a>
                      </li>
                      <li>
                        <a href="/boutique-en-ligne/profile" class="block px-4 py-2 text-sm hover:bg-white/20 hover:text-white transition duration-200 rounded-b">
                          Mon Compte
                        </a>
                      </li>
                      <li>
                        <a href="/boutique-en-ligne/profile" class="block px-4 py-2 text-sm hover:bg-white/20 hover:text-white transition duration-200 rounded-b">
                          Déconnexion
                        </a>
                      </li>
                    </ul>
                  </li>




   

    </ul>

    <!-- Burger mobile -->
    <div class="flex items-center">
      <button id="burgerBtn" class="md:hidden text-white">
        <i class="fas fa-bars fa-lg"></i>
      </button>
    </div>
  </div>

  <!-- Menu mobile  -->
  <div id="mobileMenu" class="hidden md:hidden bg-black/80">
    <ul class="flex flex-col p-6 space-y-4 text-white">
      <li><a href="">Collection</a></li>
 <a href="/boutique-en-ligne/cart">Mon Panier</a>

  
     
      <li>
        <!-- Mobile  Sexe -->
        <button
          id="sexBtnMobile"
          class="w-full text-left flex items-center justify-between"
          aria-expanded="false"
        >
          Sexe <i class="fas fa-chevron-down"></i>
        </button>
        <ul id="sexMenuMobile" class="mt-2 ml-4 space-y-2 hidden">
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man">Homme</a></li>
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman">Femme</a></li>
        </ul>
      </li>
<!-- Mobile Compte -->
<li>
  <button
    id="compteMobile"
    class="w-full text-left flex items-center justify-between"
    aria-expanded="false"
  ><i class="fa-regular fa-user"></i> <i class="fas fa-chevron-down"></i>
  </button>
  <ul id="compteMenuMobile" class="mt-2 ml-4 space-y-2 hidden">
    <li><a href="/boutique-en-ligne/login">Se Connecter</a></li>
    <li><a href="/boutique-en-ligne/register">S'inscrire</a></li>
      <li><a href="/boutique-en-ligne/profile">Mon Compte</a></li>
  </ul>
</li>

   
    </ul>
  </div>
</nav>

<script>
// Desktop 
const sexBtn = document.getElementById('sexBtn');
const sexMenu = document.getElementById('sexMenu');
sexBtn.addEventListener('click', () => {
  const expanded = sexBtn.getAttribute('aria-expanded') === 'true';
  sexBtn.setAttribute('aria-expanded', String(!expanded));
  sexMenu.classList.toggle('opacity-100');
  sexMenu.classList.toggle('pointer-events-auto');
});

//   mobile
const sexBtnMobile = document.getElementById('sexBtnMobile');
const sexMenuMobile = document.getElementById('sexMenuMobile');
sexBtnMobile.addEventListener('click', () => {
  const exp = sexBtnMobile.getAttribute('aria-expanded') === 'true';
  sexBtnMobile.setAttribute('aria-expanded', String(!exp));
  sexMenuMobile.classList.toggle('hidden');
});
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const btnMobile = document.getElementById("compteMobile");
    const menuMobile = document.getElementById("compteMenuMobile");

    btnMobile.addEventListener("click", function () {
      const isExpanded = btnMobile.getAttribute("aria-expanded") === "true";

      if (isExpanded) {
        menuMobile.classList.add("hidden");
        btnMobile.setAttribute("aria-expanded", "false");
      } else {
        menuMobile.classList.remove("hidden");
        btnMobile.setAttribute("aria-expanded", "true");
      }
    });
  });
</script>

  
  </nav>


</header>
<!------------- Categories----------------->
<section class="tendances-section">
  <div class="tendances-decor-line"></div>
  <div class="tendances-decor-dots"></div>
  <div class="tendances-inner">
    <h2>Tendances</h2>
    <p class="tendances-description">Découvrez nos dernières collections et les tendances du moment.</p>
    
    <div class="tendances-grid">      <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="tendance-card">
        <img src="/boutique-en-ligne/public/assets/img/tendances-femmes.jpg" alt="Tendance Femme">
        <div class="card-label">
          <span class="card-label-category">Catégorie</span>
          <h3 class="card-label-title">Femme</h3>
        </div>
      </a>      <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="tendance-card">
        <img src="/boutique-en-ligne/public/assets/img/tendances-homme.jpg" alt="Tendance Homme">
        <div class="card-label">
          <span class="card-label-category">Catégorie</span>
          <h3 class="card-label-title">Homme</h3>
        </div>
      </a>

 
    </div>

    <div class="collection-cta">
      <a href="/boutique-en-ligne/index.php?controller=product&action=index">
        <button class="btn-collection">Voir la collection</button>
      </a>
    </div>
  </div>
</section>

<!------------- Categories----------------->

  <!-- NOS PRODUITS -->
  <section id="get-started" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-gray-800 mb-8">Nos Produits</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($randomProducts as $prod): ?>
          <div class="relative group overflow-hidden rounded-lg shadow-lg">
            <img 
              src="<?= htmlspecialchars($prod['image_url']) ?>" 
              alt="<?= htmlspecialchars($prod['name']) ?>" 
              class="w-full h-64 object-cover transition-transform group-hover:scale-105"
            >
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-4">
              <span class="text-white font-semibold"><?= htmlspecialchars($prod['name']) ?></span>
              <span class="text-green-400 font-bold">
                €<?= number_format($prod['price'], 2, ',', ' ') ?>
              </span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
    <!-- NOS PRODUITS -->

<footer class="bg-gray-900 text-white w-full">
  <div class="w-full grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16">
    
    <div class="flex flex-col items-start space-y-8 w-full">
      <div class="flex items-center w-full">
        <span class="text-3xl font-bold text-blue-400">OMNI</span>
        <span class="h-8 border-r-2 border-blue-400 ml-6"></span>
      </div>
      <form action="https://formspree.io/f/xrbqdbrz" method="POST" class="w-full">
        <h4 class="text-xl font-semibold w-full text-gray-300 mb-4">Contactez-nous</h4>

        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4 w-full">
          <input
            type="email"
            name="email"
            placeholder="Mon email"
            required
            class="flex-1 bg-transparent border-2 border-white rounded-full px-6 py-3 placeholder-gray-300 focus:outline-none text-white w-full"
          />
          <button
            type="submit"
            aria-label="Envoyer"
            class="w-12 h-12 flex items-center justify-center border-2 border-white rounded-full hover:bg-white/20 transition flex-shrink-0"
          >
            <i class="fas fa-arrow-right text-white"></i>
          </button>
        </div>

        <input
          type="text"
          name="message"
          placeholder="Mon message"
          required
          class="w-full mt-4 bg-transparent border-2 border-white rounded-full px-6 py-3 placeholder-gray-300 focus:outline-none text-white"
        />
      </form>
    </div>

    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">Informations Légales</h4>
      <ul class="space-y-3">
        <li><a href="./app/views/charte.html" class="text-base hover:text-blue-400 transition">Charte de Confidentialité</a></li>
        <li><a href="./app/views/mention.html" class="text-base hover:text-blue-400 transition">Mentions Légales</a></li>
        <li><a href="./app/views/conditions" class="text-base hover:text-blue-400 transition">Conditions générales de ventes</a></li>
      </ul>
    </div>

<div class="flex flex-col space-y-6 w-full">
  <h4 class="text-xl font-semibold text-gray-300">À propos</h4>
  <p class="text-base text-gray-400">
    OMNI est une marque engagée dans la qualité et le style, proposant des vêtements sportswear modernes et confortables.
  </p>
</div>


    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">La marque</h4>
      <ul class="space-y-3">
        <li><a href="#" class="text-base hover:text-blue-400 transition">OMNI</a></li>
      </ul>
    </div>
  </div>

  <div class="bg-gray-900 text-center py-6 w-full">
    <p class="text-base text-gray-300">&copy; 2025 Sébastien, Esteban, Lamine</p>
  </div>
</footer>



  <!-- Burger Menu JS -->
  <script>
    const burgerBtn  = document.getElementById('burgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    burgerBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const compteBtn = document.getElementById("compteBtn");
    const compteMenu = document.getElementById("compteMenu");

    compteBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      const isVisible = compteMenu.classList.contains("opacity-100");

  
      compteMenu.classList.remove( "pointer-events-auto");
      compteMenu.classList.add("opacity-0", "pointer-events-none");
      compteBtn.setAttribute("aria-expanded", "false");

      
      if (!isVisible) {
        compteMenu.classList.remove("opacity-0", "pointer-events-none");
        compteMenu.classList.add("opacity-100", "pointer-events-auto");
        compteBtn.setAttribute("aria-expanded", "true");
      }
    });

   
    document.addEventListener("click", function () {
      compteMenu.classList.remove("opacity-100", "pointer-events-auto");
      compteMenu.classList.add("opacity-0", "pointer-events-none");
      compteBtn.setAttribute("aria-expanded", "false");
    });
  });
</script>

</body>
</html>