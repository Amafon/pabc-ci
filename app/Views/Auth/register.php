<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

    <div class="container d-flex justify-content-center p-5">
        <div class="card col-12 col-md-5 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-5"><?= lang('Auth.register') ?></h5>

                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= $error ?>
                                <br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= session('errors') ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Firsname -->
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="firstname" name="first_name" placeholder="Prénom" value="<?= old('first_name') ?>" required>
                        <label for="firstname">Prénom</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" name="email" inputmode="email" autocomplete="email" placeholder="Adresse email" value="<?= old('email') ?>" required>
                        <label for="email">Adresse email</label>
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password" name="password" inputmode="text" autocomplete="new-password" placeholder="Mot de passe" required>
                        <label for="password">Mot de passe</label>
                    </div>

                    <!-- Password (Again) -->
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control" id="password" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="Confirmer le mot de passe" required>
                        <label for="password">Mot de passe (confirmer)</label>
                    </div>

                    <div class="d-grid col-12 col-md-8 mx-auto m-3">
                        <button type="submit" class="btn btn-primary btn-block">S'enregistrer</button>
                    </div>

                    <p class="text-center">Vous avez déjà un compte? <a href="<?= url_to('login') ?>">Connexion</a></p>
                    <p class="text-center">Retourner à la page d'accueil? <a href="<?= url_to('/') ?>">Accueil</a></p>

                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>
