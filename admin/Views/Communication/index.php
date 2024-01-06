<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
    <div class="overview">
        <div class="title">
            <i class="uil uil-bag"></i>
            <span class="text">Services</span>
        </div>
        <div class="overview-content">
            <div class="service">
                <h2 class="heading-secondary">Communication</h2>
                <div class="features">
                    <a href="com/site" class="feature-link">
                        <div class="box">
                            <p>Gestion du Site</p>
                        </div>
                    </a>
                    <a href="com/action2" class="feature-link">
                        <div class="box">
                            <p>Action 2</p>
                        </div>
                    </a>
                    <a href="com/action3" class="feature-link">
                        <div class="box">
                            <p>Action 3</p>
                        </div>
                    </a>
                    <a href="com/action4" class="feature-link">
                        <div class="box">
                            <p>Action 4</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?=$this->endSection('content')?>
