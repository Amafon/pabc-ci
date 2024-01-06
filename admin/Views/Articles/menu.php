<?= $this->extend('Layouts/adminDefault.php') ?>
<?= $this->section('content') ?>
<div class="overview">
    <div class="title">
        <i class="uil uil-bag"></i>
        <span class="text">Communication</span>
    </div>
    <div class="overview-content">
        <div class="service">
            <h2 class="service-title">Articles</h2>
            <div class="features">
                <a href="articles/new" class="feature-link">
                    <div class="box">
                        <p>Nouvel Article</p>
                    </div>
                </a>
                <a href="articles" class="feature-link">
                    <div class="box">
                        <p>Gestion des Articles</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>