<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OMNI – The Future</title>
  <!-- TailwindCSS  -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!----------CSS ----->
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/accueil.css">

  <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-..." 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" 
  />
</head>
<body class="antialiased text-dark-100">


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
  
      <li><a href="/boutique-en-ligne/profile">Déconnexion</a></li>
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



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Boutique en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            
            inputs.forEach(input => {
                // Check on page load if input has value
                if(input.value !== '') {
                    input.classList.add('border', 'border-gray-300', 'rounded-md');
                }
                
                // Add event listener for input
                input.addEventListener('input', function() {
                    if(this.value !== '') {
                        this.classList.add('border', 'border-gray-300', 'rounded-md');
                    }
                });
                
                // Focus event
                input.addEventListener('focus', function() {
                    this.classList.add('border', 'border-gray-300', 'rounded-md');
                });
                
                // Blur event
                input.addEventListener('blur', function() {
                    if(this.value === '') {
                        this.classList.remove('border', 'border-gray-300', 'rounded-md');
                    }
                });
            });
        });
    </script>
</head>


    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Left side image -->
        <div class="md:w-2/7 bg-gray-800">
            <img src="/boutique-en-ligne/public/assets/img/tendances-femmes.jpg" alt="Boutique lifestyle" class="h-[200] w-[200] object-cover" />
        </div>

        <!-- Right side form -->
        <div class="md:w-1/2 flex flex-col justify-center items-center p-8">
            <div class="w-full max-w-md">
                <h1 class="text-3xl font-bold mb-8 text-center">Inscription</h1>
                
                <form method="POST" action="/boutique-en-ligne/register" class="space-y-6">
                    <div>
                        <input type="text" id="first_name" name="first_name" placeholder="Prenom" required 
                            class="mt-1 block w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-500 transition-all">
                    </div>
                    
                    <div>
                        <input type="text" id="name" name="name" placeholder="Nom" required 
                            class="mt-1 block w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-500 transition-all">
                    </div>
                    
                    <div>
                        <input type="email" id="email" name="email" placeholder="Email" required 
                            class="mt-1 block w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-500 transition-all">
                    </div>
                    
                    <div>
                        <input type="password" id="password" name="password" placeholder="Mot de passe" required 
                            class="mt-1 block w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-500 transition-all">
                    </div>
                    
                    <div>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer mot de passe" required 
                            class="mt-1 block w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-500 transition-all">
                    </div>
                    
                    <!-- PHP Error Message -->
                    <?php if (!empty($error)): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p><?php echo $error; ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <div>
                        <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Inscription
                        </button>
                    </div>
                </form>
                    
           
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Avez-vous déjà un compte? 
                        <a href="/boutique-en-ligne/login" class="font-medium text-blue-600 hover:text-blue-500">
                            Connexion
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

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