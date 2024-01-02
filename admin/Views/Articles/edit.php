'<?=$this->extend('Layouts/adminDefault.php')?>
<?=$this->section('content')?>
    <div class="overview">
        <div class="title">
            <i class="uil uil-bag"></i>
            <span class="text">Communication</span>
        </div>
        <div class="overview-content">
            <div class="service">
                <h2 class="heading-secondary">Nouvel Article</h2>
                <?= form_open_multipart('admin/services/com/site/articles/edit/' . $article->id, ['class'=>'article'])?>
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" placeholder="Entrer le titre de l'article" value="<?=old('title', $article->title) ?>">
                    </div>
                    <div class="form-group niceEdit">
                        <label for="niceEdit">Contenu</label>
                        <textarea class="" type="text" name="content" id="niceEdit" placeholder="Entrer le contenu de l'article" style="width: 100%;"><?=old('content', $article->content)?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" placeholder="Sélectionner une image" value="<?=old('image', $article->image)?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category">
                            <option >Sélectionner une catégorie</option>
                            <?php foreach($categories as $category):?>
                                <option value="<?=$category->id?>" <?= $category->id == $article->category_id ? 'selected':'';?>><?=$category->label?></option> 
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="tag" name="tag" id="tag" placeholder="Entrer le tag" value="<?=old('tag', $article->tag) ?>">
                    </div>
                    <input type="reset" value="Réinitialiser">
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </div>
    </div>
<?=$this->endSection('content')?>
