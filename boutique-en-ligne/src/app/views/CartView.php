
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI</title>
<script src="https://js.stripe.com/v3/"></script>


  <!-- TailwindCSS  -->
  <script src="https://cdn.tailwindcss.com"></script>

    <!-----------CSS------------------>
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/cart.css">

<!-----------Style Police------------------->

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-----------Style Police------------------->

</head>

<header class="relative h-[75vh] overflow-hidden">


<video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted>
  <source src="./public/assets/img/accueil.mp4" type="video/mp4">

</video>

    
 
  <div class="absolute inset-0 bg-black/50 z-10"></div>

 <!-- NAV Desktop -->
<nav class="absolute inset-x-0 top-0 z-20">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-6">
   
     <div class="text-2xl font-bold text-white">
  <a href="/boutique-en-ligne/home" class="no-underline text-white hover:opacity-80">OMNI</a>
</div>


    <ul class="hidden md:flex space-x-8 text-white items-center">
      <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe" class="hover:opacity-80">Collection</a></li>
    

     
      <li class="relative">
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
          class="absolute top-full mt-2 left-0 w-40  text-white-800 rounded shadow-lg opacity-0 pointer-events-none transition-opacity"
        >
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="block px-4 py-2 hover:bg-gray-500">Homme</a></li>
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="block px-4 py-2 hover:bg-gray-500">Femme</a></li>
        </ul>
      </li>

<li>
 <a href="/boutique-en-ligne/cart">Mon Panier</a>
</li>


      <li><a href="/boutique-en-ligne/profile" class="hover:opacity-80">Mon Compte</a></li>
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
   <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe">Collection</a></li>
<li><a href="?controller=cart&action=index" class="hover:opacity-80">Mon Panier</a></li>

      <li><a href="#">Mon Compte</a></li>
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


    <!-- Menu mobile -->
    <div id="mobileMenu" class="hidden md:hidden bg-black/80">
      <ul class="flex flex-col p-6 space-y-4 text-white">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blocks</a></li>
        <li><a href="#">Patterns</a></li>
        <li><a href="#">Templates</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Contact</a></li>
        <li>
        
        </li>
      </ul>
    </div>
  </nav>


</header>



<!----------------------- PANIER------------>

<div class="cart-container">
                  <h1>Votre Panier</h1>

                            <?php if (empty($products)): ?>
                                <div class="cart-empty">
                                    <p>Votre panier est vide.</p>
                                </div>
                            <?php else: ?>
                                            <!-- En-tête du panier -->
                                            <div class="cart-header">
                                                <div class="product-col">Produits</div>
                                                <div class="price-col">Prix</div>
                                                <div class="quantity-col">Quantité</div>
                                                <div class="subtotal-col">Sous-total</div>
                                            </div>

                                                        <!-- Produits du panier -->
                                                        <?php foreach ($products as $product): ?>
                                                            <div class="cart-product">
                                                                <div class="product-image">
                                                                    <img src="<?= $product['image_url'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                                                </div>
                                                                <div class="product-info">
                                                                    <?= htmlspecialchars($product['name']) ?>
                                                                </div>
                                                                <div class="product-price"><?= number_format($product['price'], 2) ?> €</div>
                                                                <div class="product-quantity">
                                                                    <div class="quantity-control">
                                                                      
                                                                        <div class="quantity-value"><?= $product['quantity'] ?></div>
                                                                  
                                                                    </div>
                                                                </div>
                                                                <div class="product-subtotal"><?= number_format($product['subtotal'], 2) ?> €</div>
                                                            </div>
                                                        <?php endforeach; ?>

                                            <!-- Total -->
                                            <div class="cart-total">Total : <?= number_format($total, 2) ?> €</div>

                          <!-- Bouton vider le panier -->
                          <div class="cart-actions">
                              <form method="post" action="/boutique-en-ligne/cart/clear" onsubmit="return confirm('Voulez-vous vraiment vider votre panier ?');">
                                  <button type="submit">Vider le panier</button>
                              </form>
                          </div>
    <?php endif; ?>

                                          <!-- paiement -->
                                      <div class="cart-actions flex flex-col space-y-4 mt-6">
                                        
                                        

                                          
                                          <form method="post" action="/boutique-en-ligne/cart/checkout">
                                        
                                                  <form id="payment-form" action="/votre-script-de-paiement.php" method="POST">
                                                    <div id="card-element">
                                                    
                                                    </div>

                                                  <form id="payment-form">
                                                      <div id="card-element">
                                                          <!-- Le champ de carte de crédit sera inséré ici -->
                                                      </div>
                                                      <button id="submit">Payer</button>
                                                      <div id="error-message"></div>
                                                  </form>

                                                  </form>

                                          </form>

                                          <!-- Méthodes de paiement -->
                                          <div class="flex items-center space-x-4 mt-4">
                                              <span class="text-gray-700 font-medium">Nous acceptons :</span>
                                              <i class="fab fa-cc-visa text-3xl text-blue-700"></i>
                                              <i class="fab fa-cc-mastercard text-3xl text-red-600"></i>
                                              <i class="fab fa-cc-amex text-3xl text-blue-500"></i>
                                              <i class="fab fa-cc-paypal text-3xl text-yellow-500"></i>
                                          </div>
                                      </div>

</div>



<!----------------------- FIN PANIER------------>



<!-- Footer -->
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
  </body>
</html>