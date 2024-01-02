<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
    <div class="overview">
        <div class="title">
            <i class="uil uil-bag"></i>
            <span class="text">Communication</span>
        </div>
        <div class="overview-content">
            <div class="service">
                <h2 class="heading-secondary">Nouvel Article</h2>
                <?= form_open_multipart('admin/services/com/site/articles/create', ['class'=>'article'])?>
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" placeholder="Entrer le titre de l'article" value="<?=old('title') ?>">
                    </div>
                    <div class="form-group niceEdit">
                        <label for="niceEdit">Contenu</label>
                        <textarea class="" type="text" name="content" id="niceEdit" placeholder="Entrer le contenu de l'article" style="width: 100%;"><?=old('content')?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category">
                            <option >Sélectionner une catégorie</option>
                            <option value="1">Pont de Cocody</option>
                            <option value="2">Embouchure de Grand Bassam</option>
                            <option value="3">Coulée Verte du Banco</option>
                            <option value="4">Bassin Ecrêteur de Williamsville</option>
                            <option value="5">Carrefour de l'Indenié</option>
                            <option value="6">STEP Fraternité Matin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="tag" name="tag" id="tag" placeholder="Entrer le tag" value="<?=old('tag') ?>">
                    </div>
                    <input type="reset" value="Réinitialiser">
                    <input type="submit" value="Créer un article">
                </form>
            </div>
        </div>
    </div>
<?=$this->endSection('content')?>
