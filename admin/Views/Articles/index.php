<?= $this->extend('Layouts/adminDefault.php') ?>
<?= $this->section('content') ?>
<div class="overview">
    <div class="title">
        <i class="uil uil-bag"></i>
        <span class="text">Communication</span>
    </div>
    <div class="overview-content">
        <div class="service">
            <h2 class="heading-secondary">Liste des Articles</h2>
            <div class="table-container" style="max-width: 100%; margin: 0 auto">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Auteur</th>
                            <th>Catégorie</th>
                            <th>Date de création</th>
                            <th>Voir</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article) : ?>
                            <tr>
                                <td style="text-align: center;"><?= $article->id ?></td>
                                <td><?= esc(substr($article->title, 0, 13)) ?></td>
                                <td><?= esc(substr($article->description, 0, 50)) ?></td>
                                <td><?= esc($article->first_name) ?></td>
                                <td><?= esc($article->label) ?></td>
                                <td style="text-align: center;"><?= date_format($article->created_at, "d/m/Y") ?></td>
                                <td style="text-align: center;"><a href="<?= url_to('Articles::show', $article->id) ?>">Voir</a></td>
                                <td style="text-align: center;"><a href="<?= url_to('\admin\Controllers\Articles::edit', $article->id) ?>">Editer</a></td>
                                <td style="text-align: center;"><a href="#">Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Auteur</th>
                            <th>Catégorie</th>
                            <th>Date de création</th>
                            <th>Voir</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>