<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- OMNI</title>   
    <!-- TailwindCSS  -->
    <script src="https://cdn.tailwindcss.com"></script>   
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/product.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header class="relative h-[75vh] w-full overflow-hidden">

  <?php
  $category = isset($_GET['gender']) ? $_GET['gender'] : 'all';
  $bannerMedia = '';

  if ($category === 'man') {
      $bannerMedia = '/boutique-en-ligne/public/assets/img/home.mp4';/* banniere  vrai homme*/
  } elseif ($category === 'woman') {
      $bannerMedia = '/boutique-en-ligne/public/assets/img/femme.mp4'; /* banniere femme*/
  } else {
      $bannerMedia = '/boutique-en-ligne/public/assets/img/www.omni.com (1).mp4'; /* banniere   defaut*/
  }
  ?>

  <?php if (pathinfo($bannerMedia, PATHINFO_EXTENSION) === 'mp4'): ?>
    <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted>
  <source src="<?= $bannerMedia ?>" type="video/mp4">
</video>

  <?php else: ?>
    <img class="absolute top-0 left-0 w-full h-full object-cover" src="<?= $bannerMedia ?>" alt="Bannière">
  <?php endif; ?>

  <div class="absolute inset-0 bg-black/50 z-10"></div>

 
  <nav class="absolute inset-x-0 top-0 z-20">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-6">
      <div class="text-2xl font-bold text-white">
        <a href="/boutique-en-ligne/home" class="no-underline text-white hover:opacity-80">OMNI</a>
      </div>

      <!-- Desktop Menu -->
      <ul class="hidden md:flex space-x-8 text-white items-center">
        <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe" class="hover:opacity-80">Collection</a></li>
        <li class="relative">
          <button id="sexBtn" class="hover:opacity-80 flex items-center" aria-haspopup="true" aria-expanded="false">
            Sexe <i class="fas fa-chevron-down ml-2"></i>
          </button>
          <ul id="sexMenu" class="absolute top-full mt-2 left-0 w-40 text-white-800 bg-white text-black rounded shadow-lg opacity-0 pointer-events-none transition-opacity">
            <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="block px-4 py-2 hover:bg-gray-200">Homme</a></li>
            <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="block px-4 py-2 hover:bg-gray-200">Femme</a></li>
          </ul>
        </li>
        <li><a href="/boutique-en-ligne/cart" class="hover:opacity-80">Mon Panier</a></li>
        <li><a href="#" class="hover:opacity-80">Mon Compte</a></li>
      </ul>

      <!-- Burger Button -->
      <div class="flex items-center md:hidden">
        <button id="burgerBtn" class="text-white focus:outline-none">
          <i class="fas fa-bars fa-lg"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-black/90 text-white absolute top-0 left-0 w-full z-30">
    <ul class="flex flex-col p-6 space-y-4">
      <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe">Collection</a></li>
      <li><a href="#">Mon Panier</a></li>
      <li><a href="#">Mon Compte</a></li>
      <li>
        <button id="sexBtnMobile" class="w-full text-left flex items-center justify-between" aria-expanded="false">
          Sexe <i class="fas fa-chevron-down"></i>
        </button>
        <ul id="sexMenuMobile" class="mt-2 ml-4 space-y-2 hidden">
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man">Homme</a></li>
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman">Femme</a></li>
        </ul>
      </li>
    </ul>
  </div>
</header>




    <main class="products-container">

        
        <!-- Filtres -->
        <div class="filters-container">
    <h2>Filtrer les produits</h2>
    <div class="filters-options">
        <!-- Type de vêtement -->
        <div class="filter-group">
            <label for="garment-filter" class="filter-label">Type de vêtement</label>
            <select id="garment-filter" class="filter-select">
                <option value="">Tous les types</option>
                <?php
                $garments = [];
                foreach ($products as $product) {
                    $val = $product['garment'] ?? '';
                    if ($val !== '' && !in_array($val, $garments)) {
                        $garments[] = $val;
                        echo '<option value="'.htmlspecialchars($val, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars(ucfirst($val), ENT_QUOTES, 'UTF-8').'</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Couleur -->
        <div class="filter-group">
            <label for="color-filter" class="filter-label">Couleur</label>
            <select id="color-filter" class="filter-select">
                <option value="">Toutes les couleurs</option>
                <?php
                $colors = [];
                foreach ($products as $product) {
                    $val = $product['color'] ?? '';
                    if ($val !== '' && !in_array($val, $colors)) {
                        $colors[] = $val;
                        echo '<option value="'.htmlspecialchars($val, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars(ucfirst($val), ENT_QUOTES, 'UTF-8').'</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Taille -->
        <div class="filter-group">
            <label for="size-filter" class="filter-label">Taille</label>
            <select id="size-filter" class="filter-select">
                <option value="">Toutes les tailles</option>
                <?php
                $sizes = [];
                foreach ($products as $product) {
                    $val = $product['size'] ?? '';
                    if ($val !== '' && !in_array($val, $sizes)) {
                        $sizes[] = $val;
                        echo '<option value="'.htmlspecialchars($val, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars(strtoupper($val), ENT_QUOTES, 'UTF-8').'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <!-- Bouton Réinitialiser -->
    <button class="reset-filters" id="reset-filters">Réinitialiser les filtres</button>
</div>

 <?php foreach ($products as $i => $product): ?>
    <?php
    $name        = $product['name'] ?? '';
    $garment     = $product['garment'] ?? '';
    $color       = $product['color'] ?? '';
    $size        = $product['size'] ?? '';
    $price       = $product['price'] ?? 0;
    $img         = $product['image_url'] ?? '';
    $reverse     = $i % 2 === 1 ? 'reverse' : '';
    $productId   = $product['id'] ?? 0;
    ?>
    <div class="product-card-vertical <?= $reverse ?>"
         data-garment="<?= htmlspecialchars($garment) ?>"
         data-color="<?= htmlspecialchars($color) ?>"
         data-size="<?= htmlspecialchars($size) ?>"
         data-product-id="<?= intval($productId) ?>">
        
        <div class="product-image">
            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($name) ?>">
            <a href="index.php?page=details&id=<?= intval($productId) ?>" class="view-details-button" aria-label="Voir les détails">
            
            </a>
        </div>
        
        <div class="product-info">
            <div>
                <h3 class="product-name">
                   <a href="index.php?controller=product&action=details&id=<?= intval($productId) ?>">

                        <?= htmlspecialchars($name) ?>
                    </a>
                </h3>
                <p class="product-details">
                    <?= ucfirst($color) ?> | <?= strtoupper($size) ?> | <?= ucfirst($garment) ?>
                </p>
            </div>
            <div class="product-meta">
                <span class="product-price">€<?= number_format($price, 2, ',', ' ') ?></span>
                <div class="product-actions">
                    <button class="cart-button" aria-label="Ajouter au panier" data-id="<?= $product['id'] ?>"></button>

                    <button class="like-button" aria-label="Ajouter aux favoris"></button>
                </div>
            </div>
        </div>
    </div>

    <?php if ($i % 2 === 1): ?>
        <hr class="product-separator">
    <?php endif; ?>
<?php endforeach; ?>
<!----------AJOUT AU Panier -------------->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.cart-button').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.dataset.id;

            fetch('/boutique-en-ligne/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Produit ajouté au panier !");
                } else {
                    alert("Erreur : " + data.message);
                }
            })
            .catch(error => {
                console.error('Erreur :', error);
            });
        });
    });
});
</script>



    <hr class="product-separator">



    </main>
    
    <footer>
       
    </footer>
    
   
    <script src="/boutique-en-ligne/public/assets/js/burger-menu.js" defer></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const garmentFilter = document.getElementById('garment-filter');
        const colorFilter = document.getElementById('color-filter');
        const sizeFilter = document.getElementById('size-filter');
        const resetButton = document.getElementById('reset-filters');
        const productCards = document.querySelectorAll('.product-card-vertical');

        function applyFilters() {
            const garmentVal = garmentFilter.value.toLowerCase();
            const colorVal = colorFilter.value.toLowerCase();
            const sizeVal = sizeFilter.value.toLowerCase();
            let count = 0;

            productCards.forEach(card => {
                const cardGarment = card.dataset.garment.toLowerCase();
                const cardColor = card.dataset.color.toLowerCase();
                const cardSize = card.dataset.size.toLowerCase();

                const matchGarment = !garmentVal || cardGarment === garmentVal;
                const matchColor = !colorVal || cardColor === colorVal;
                const matchSize = !sizeVal || cardSize === sizeVal;

                if (matchGarment && matchColor && matchSize) {
                    card.style.display = 'flex'; 
                    count++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noMsg = document.querySelector('.no-filters-results');

            if (count === 0) {
                if (!noMsg) {
                    const msg = document.createElement('div');
                    msg.className = 'no-products no-filters-results';
                    msg.textContent = 'Aucun produit ne correspond à votre sélection.';
                    document.querySelector('main').appendChild(msg);
                }
            } else {
                if (noMsg) noMsg.remove();
            }
        }

        garmentFilter.addEventListener('change', applyFilters);
        colorFilter.addEventListener('change', applyFilters);
        sizeFilter.addEventListener('change', applyFilters);

        resetButton.addEventListener('click', function () {
            garmentFilter.value = '';
            colorFilter.value = '';
            sizeFilter.value = '';
            applyFilters();
        });
    });
</script>


<footer class="bg-gray-900 text-white w-full">
  <div class="w-full grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16">
    
    <div class="flex flex-col items-start space-y-8 w-full">
      <div class="flex items-center w-full">
        <span class="text-3xl font-bold text-blue-400">OMNI</span>
        <span class="h-8 border-r-2 border-blue-400 ml-6"></span>
      </div>

      <h4 class="text-xl font-semibold w-full text-gray-300">Contactez-nous</h4>

      <div class="flex items-center space-x-4 w-full">
        <input
          type="email"
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
        placeholder="Mon message"
        required
        class="w-full bg-transparent border-2 border-white rounded-full px-6 py-3 placeholder-gray-300 focus:outline-none text-white"
      />
    </div>
    
    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">Informations Légales</h4>
      <ul class="space-y-3">
        <li><a href="#" class="text-base hover:text-blue-400 transition">Charte de Confidentialité</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Mentions Légales</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Conditions générales de ventes</a></li>
      </ul>
    </div>

    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">Informations Légales</h4>
      <ul class="space-y-3">
        <li><a href="#" class="text-base hover:text-blue-400 transition">Charte de Confidentialité</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Mentions Légales</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Conditions générales de ventes</a></li>
      </ul>
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
  // === Desktop ===
  const sexBtn     = document.getElementById('sexBtn');
  const sexMenu    = document.getElementById('sexMenu');

  sexBtn.addEventListener('click', e => {
    e.stopPropagation();
    const isOpen = sexBtn.getAttribute('aria-expanded') === 'true';

    sexBtn.setAttribute('aria-expanded', String(!isOpen));
    sexMenu.classList.toggle('opacity-0');
    sexMenu.classList.toggle('pointer-events-none');
    sexMenu.classList.toggle('opacity-100');
    sexMenu.classList.toggle('pointer-events-auto');
  });

  // Fermer si on clique en dehors
  document.addEventListener('click', e => {
    if (!sexBtn.contains(e.target) && !sexMenu.contains(e.target)) {
      sexBtn.setAttribute('aria-expanded', 'false');
      sexMenu.classList.add('opacity-0', 'pointer-events-none');
      sexMenu.classList.remove('opacity-100', 'pointer-events-auto');
    }
  });

  // === Mobile ===
  const sexBtnMobile  = document.getElementById('sexBtnMobile');
  const sexMenuMobile = document.getElementById('sexMenuMobile');

  sexBtnMobile.addEventListener('click', e => {
    e.stopPropagation();
    const isOpen = sexBtnMobile.getAttribute('aria-expanded') === 'true';

    sexBtnMobile.setAttribute('aria-expanded', String(!isOpen));
    sexMenuMobile.classList.toggle('hidden');
  });

  document.addEventListener('click', e => {
    if (!sexBtnMobile.contains(e.target) && !sexMenuMobile.contains(e.target)) {
      sexBtnMobile.setAttribute('aria-expanded', 'false');
      sexMenuMobile.classList.add('hidden');
    }
  });
</script>

</body>
</html>




