<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/e19a49893e.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
  <title>PABC</title>
</head>

<body>
  <header class="header nav">
    <div class="container">
      <a href="<?= url_to('Home::index') ?>" class="link logo">PABC</a>
      <div class="nav-links">
        <a href="<?= url_to('Home::index') ?>" class="link link-item">Accueil</a>
        <a href="projets.html" class="link link-item">Projets</a>
        <a href="<?= url_to('Articles::index') ?>" class="link link-item">Articles</a>
        <?php if (auth()->loggedIn() && auth()->user()->inGroup('agent', 'admin')) : ?>
          <a href="<?= site_url('admin') ?>" class="link link-item">Admin</a>
        <?php endif; ?>
        <?php if (auth()->loggedIn()) : ?>
          <p>Bonjour <em><?= esc(auth()->user()->first_name) ?></em></p>
        <?php endif; ?>
        <?php if (auth()->loggedIn()) : ?>
          <a href="<?= url_to('logout'); ?>" class="link link-item">Déconnexion</a>
        <?php else : ?>
          <a href="<?= url_to('login'); ?>" class="link link-item">Connexion</a>
        <?php endif; ?>
        <i class="fa-solid fa-xmark close"></i>
      </div>
      <i class="fa-solid fa-bars menu"></i>
    </div>
  </header>
  <?= $this->renderSection('content'); ?>
  <footer class="footer">
    <div class="container footer-grid grid-cols-1 gap-1">
      <div class="footer-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2361.9881946823025!2d-4.000347169342571!3d5.359649005758492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1934ef717587b%3A0x40f9c25c3da0f3fd!2sUnit%C3%A9%20de%20Gestion%20du%20Projet%20de%20Sauvegarde%20et%20de%20Valorisation%20de%20la%20Baie%20de%20Cocody%20et%20de%20la%20Lagune%20Ebri%C3%A9%20(UG-PABC)!5e0!3m2!1sfr!2sci!4v1702015061425!5m2!1sfr!2sci" width="100%" height="450px" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="footer-text">
        <div class="section-header">
          <div class="section-header">
            <h2>Adresses</h2>
          </div>
        </div>
        <p class="footer-description">
          L'Unité de Gestion du PABC se trouve aux II Plateaux Boulevard
          Latrille , Lot 174 Ilot 16. En remontant le Boulevard Latrille par
          "La Vie", le bâtiement est en face du supermarché SICONEX et à côté
          de l'Université de Grand-Bassam .
        </p>
        <p class="footer-contact">
          <ion-icon name="call-outline"></ion-icon>
          <span><a href="tel:+(225)2722509292">(225) 27 22 50 92 92/93</a></span>
        </p>
        <p class="footer-email">
          <ion-icon name="mail-outline"></ion-icon>
          <span><a href="mailto:contact@pabc-ci.org">contact@pabc-ci.org</a></span>
        </p>
        <div class="footer-social">
          <ion-icon name="logo-facebook"></ion-icon>
          <ion-icon name="logo-instagram"></ion-icon>
          <ion-icon name="logo-linkedin"></ion-icon>
        </div>
      </div>
    </div>
    <div class="container">
      <a href="<?= url_to('Home::index') ?>" class="link logo">PABC</a>
      <p>Copyright &copy; 2023</p>
    </div>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url('js/swiper.js'); ?>"></script>
  <script src="<?php echo base_url('js/script.js'); ?>"></script>
</body>

</html>