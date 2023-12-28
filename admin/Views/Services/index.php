<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
    <div class="overview">
        <div class="title">
            <i class="uil uil-bag"></i>
            <span class="text">Services</span>
        </div>
        <div class="overview-content">
            <div class="features">
                <?php if(auth()->user()->inGroup('compta', 'admin')):?>
                    <a href="compta" class="feature-link">
                        <div class="box box-compta">
                            <p>Comptabilité</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('mg', 'admin')):?>
                    <a href="services/mg" class="feature-link">
                        <div class="box box-mg">
                            <p>Moyens Généraux</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('rh', 'admin')):?>
                    <a href="services/rh" class="feature-link">
                        <div class="box box-rh">
                            <p>Ressources Humaines</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('pm', 'admin')):?>
                    <a href="services/pm" class="feature-link">
                        <div class="box box-pm">
                            <p>Passation des Marchés</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('rm', 'admin')):?>
                    <a href="services/rm" class="feature-link">
                        <div class="box box-rm">
                            <p>Rédaction des Marchés</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('com', 'admin')):?>
                    <a href="services/com" class="feature-link">
                        <div class="box box-com">
                            <p>Communication</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('sop', 'admin')):?>
                    <a href="services/sop" class="feature-link">
                        <div class="box box-sop">
                            <p>Suivi Opérationnel</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('sev', 'admin')):?>
                    <a href="services/sev" class="feature-link">
                        <div class="box box-sev">
                            <p>Suivi Environnement</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('sop', 'admin')):?>
                    <a href="services/sop" class="feature-link">
                        <div class="box box-sop">
                            <p>Suivi Evaluation</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('ia', 'admin')):?>
                    <a href="services/ia" class="feature-link">
                        <div class="box box-ia">
                            <p>Informatique et <br /> Archivage</p>
                        </div>
                    </a>
                <?php endif;?>
                <?php if(auth()->user()->inGroup('cai', 'admin')):?>
                    <a href="services/cai" class="feature-link">
                        <div class="box box-cai">
                            <p>Contrôle et <br /> Audit Interne</p>
                        </div>
                    </a>
                <?php endif;?>
                <a href="services/gc" class="feature-link">
                    <div class="box box-gc">
                        <p>Gestion des <br /> Congés</p>
                    </div>
                </a>
                <a href="services/df" class="feature-link">
                    <div class="box box-df">
                        <p>Demande de <br /> Fournitures</p>
                    </div>
                </a>
                <a href="services/dm" class="feature-link">
                    <div class="box box-dm">
                        <p>Demande de <br /> Matériels</p>
                    </div>
                </a>
                <a href="services/gb" class="feature-link">
                    <div class="box box-gb">
                        <p>Gestion <br /> Budgétaire</p>
                    </div>
                </a>
                <a href="services/dg" class="feature-link">
                    <div class="box box-dg">
                        <p>Documents <br /> Généraux</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?=$this->endSection('content')?>
