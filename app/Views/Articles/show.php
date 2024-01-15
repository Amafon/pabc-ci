<?= $this->extend('Layouts/default.php') ?>
<?= $this->section('content') ?>
<main class="main">
  <div class="container container-articles">
    <div class="section-header">
      <header class="article-header">
        <!-- <p class="category">Business</p> -->
        <p class="category"><?= $category->label ?></p>
        <h1 class="article-title">
          <?= $article->title ?>
        </h1>
        <p class="article-description">
          <?= esc($article->description) ?>
        </p>
        <div class="article-infos">
          <img class="author-pro" src="<?php echo base_url('images/art-prof.png'); ?>" />
          <p class="article-author"><?= $user->first_name ?></p>
          <p class="article-date"><?= date_format($article->created_at, 'd F Y') ?></p>
        </div>
      </header>
    </div>
  </div>
  <div class="container">
    <div class="articles">
      <section class="section-articles blog">
        <div class="blog-article">
          <img class="article-img" src="<?= base_url('article_images/' . $article->image) ?>" />
          <?= $article->content ?>
        </div>
      </section>
      <aside class="section-aside blog">
        <form action="" class="form-search">
          <input type="text" name="article-input" id="" placeholder="Chercher un article" />
          <input type="submit" value="Chercher" />
        </form>
        <p class="categories_title">Catégories</p>
        <div class="aside-categories">
          <ul class="category_list">
            <?php foreach ($categories as $category) : ?>
              <?php if ((int)$category->nb != 0) : ?>
                <li class="category_list_item">
                  <a href="<?= site_url('articles?category=' . $category->id) ?>" class="category_link"><span class="category_name"><?= $category->label ?></span>
                    <span class="category_number"><?= $category->nb ?></span></a>
                </li>
              <?php endif; ?>
            <?php endforeach ?>
          </ul>
        </div>
        <div class="aside-posts">
          <p class="posts-intro">Articles récents</p>
          <div class="posts">
            <?php foreach ($articles as $article) : ?>
              <div class="post">
                <a href="<?= url_to('Articles::show', $article->id) ?>" class="post-link"><img src="<?= base_url('article_images/' . $article->image) ?>" alt="" class="post-img" /></a>
                <p class="post-title"><?= substr(esc($article->title), 0, 20) . '...' ?></p>
                <p class="post-date"><?= date_format($article->created_at, 'd F Y') ?></p>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </aside>
    </div>
  </div>
</main>
<?= $this->endSection('content') ?>