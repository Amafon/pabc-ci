<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
    <div class="overview">
        <div class="title">
            <i class="uil uil-user"></i>
            <span class="text">Informations</span>
        </div>
        <div class="overview-content grid grid-cols-2 grid-cols-1">
            <?= form_open('admin/set-password', ['class'=>'set-pw'])?>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Entrer le mot de passe">
                </div>
                <div class="form-group">
                    <label for="password_confirm">Mot de passe (confirmation)</label>
                    <input type="password" name="password_confirm" id="password_confirm" placeholder="Confirmer le mot de passe">
                </div>
                <input type="submit" value="Modifier">
            </form>
        </div>
    </div>
<?=$this->endSection('content')?>
