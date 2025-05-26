
  document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.main-nav');

    burger.addEventListener('click', () => {
      nav.classList.toggle('open');
      burger.classList.toggle('active');
      burger.setAttribute('aria-expanded', burger.classList.contains('active'));
    });
  });
  
  document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('promoBurger');
    const links  = document.getElementById('promoLinks');
  
    burger.addEventListener('click', () => {
      const opened = links.classList.toggle('open');
      burger.setAttribute('aria-expanded', opened);
      burger.classList.toggle('active');
    });
  });
  
  