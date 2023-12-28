<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Style Sheet -->
    <link rel="stylesheet" href="<?php echo base_url('css/admin.css').'?'. time(); ?>" />
    <!-- Data Tables CSS -->
    <link href="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-1.13.8/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/date-1.5.1/sc-2.3.0/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <!-- Iconscout CSS -->
    <link
    rel="stylesheet"
    href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <!-- Google Font: Rubik -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap"
    rel="stylesheet"
    />
    <title>Admin</title>
  </head>
  <body>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="<?= base_url('images/logo.png')?>" alt="" />
        </div>
        <span class="logo_name">PABC</span>
      </div>
      <div class="menu-items">
        <ul class="nav-links">
          <li>
            <a href="<?= site_url('admin')?>">
              <i class="uil uil-estate"></i>
              <span class="link-name">Tableau de bord</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/services')?>">
              <i class="uil uil-files-landscapes"></i>
              <span class="link-name">Services</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/budget')?>">
              <i class="uil uil-setting"></i>
              <span class="link-name">Administration</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/messages')?>">
              <i class="uil uil-comments"></i>
              <span class="link-name">Messages</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/profil')?>">
              <i class="uil uil-user"></i>
              <span class="link-name">Profil</span>
            </a>
          </li>
        </ul>
        <ul class="logout-mode">
          <li>
            <a href="<?= site_url('/')?>">
              <i class="uil uil-estate"></i>
              <span class="link-name">Accueil</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('logout')?>">
              <i class="uil uil-signout"></i>
              <span class="link-name">Logout</span>
            </a>
          </li>
          <li class="mode">
            <a href="#">
              <i class="uil uil-moon"></i>
              <span class="link-name">Mode nuit</span>
            </a>
            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="search-box">
          <i class="uil uil-search"></i>
          <input type="text" name="" id="" placeholder="Search here..." />
        </div>
        <img src="<?= base_url('images/profile.jpg')?>" alt="" />
      </div>
      <div class="dash-content">
        <?php if(session()->has('message')):?>
          <p><?=session('message')?></p>
        <?php endif;?>
        <?php if(session()->has('errors')):?>
          <ul>
            <?php foreach(session('errors') as $error):?>
              <li><?=$error?></li>
            <?php endforeach;?>
          </ul>
        <?php endif;?>
        <?= $this->renderSection('content') ?>
      </div>
    </section>
    <script src="<?= base_url('js/admin.js') ?>"></script>
    <!-- NiceEdit Textarea Form -->
    <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
    <!-- Data Tables JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-1.13.8/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/date-1.5.1/r-2.5.0/sc-2.3.0/datatables.min.js"></script>

    <script>
      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      $(document).ready(function() {
          $('#example').DataTable( {
              responsive: true,
              rowReorder: true,
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ],
          } );
      } );
    </script>
  </body>
</html>
