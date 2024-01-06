<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
    <div class="overview">
        <div class="title">
            <i class="uil uil-bag"></i>
            <span class="text">Communication</span>
        </div>
        <div class="overview-content">
            <div class="service">
                <h2 class="heading-secondary">Editer l'Image de l'Article</h2>
                <?= form_open_multipart('admin/services/com/site/articles/' . $article->id . '/image/create', ['class'=>'article'])?>
                    <div class="form-group">
                        <label for="image">Image File</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <input type="reset" value="Réinitialiser">
                    <input type="submit" value="Ajouter">
                </form>
            </div>
        </div>
    </div>
<?=$this->endSection('content')?>
