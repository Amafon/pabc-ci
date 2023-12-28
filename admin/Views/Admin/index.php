<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
         <div class="overview">
          <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Tableau de bord</span>
          </div>
          <div class="boxes">
            <div class="box box-1">
              <i class="uil uil-thumbs-up"></i>
              <span class="text">Budget 2023</span>
              <span class="number"><strong><?= number_format(177237430898, 0, ',', ' ') ?></strong> XOF FCFA</span>
            </div>
            <div class="box box-2">
              <i class="uil uil-comments"></i>
              <span class="text">Consommation</span>
              <span class="number"><strong><?= number_format(54227507658, 0, ',', ' ') ?></strong> XOF FCFA</span>
            </div>
            <div class="box box-3">
              <i class="uil uil-share"></i>
              <span class="text">Solde (à reporter)</span>
              <span class="number"><strong><?= number_format(123009923240, 0, ',', ' ') ?></strong> XOF FCFA</span>
            </div>
            <div class="box box-3">
              <i class="uil uil-share"></i>
              <span class="text">Taux de Consommation</span>
              <span class="number"><strong>31%</strong></span>
            </div>
          </div>
        </div>
        <div class="activity">
          <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
          </div>
          <div class="activity-data">
            <div class="data names">
              <span class="data-title">Name</span>
              <span class="data-list">Prem Sahi</span>
              <span class="data-list">Prem Sahi</span>
              <span class="data-list">Prem Sahi</span>
              <span class="data-list">Prem Sahi</span>
            </div>
            <div class="data emails">
              <span class="data-title">Email</span>
              <span class="data-list">prem.sahi@gmail.com</span>
              <span class="data-list">prem.sahi@gmail.com</span>
              <span class="data-list">prem.sahi@gmail.com</span>
              <span class="data-list">prem.sahi@gmail.com</span>
            </div>
            <div class="data joinded">
              <span class="data-title">Joined</span>
              <span class="data-list">2022-02-12</span>
              <span class="data-list">2022-02-12</span>
              <span class="data-list">2022-02-12</span>
              <span class="data-list">2022-02-12</span>
            </div>
            <div class="data type">
              <span class="data-title">Type</span>
              <span class="data-list">New</span>
              <span class="data-list">New</span>
              <span class="data-list">New</span>
              <span class="data-list">New</span>
            </div>
            <div class="data status">
              <span class="data-title">Status</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
            </div>
          </div>
        </div>
<?=$this->endSection('content')?>
