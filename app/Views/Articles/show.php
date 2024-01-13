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
          <?= substr($article->content, 0, 50) ?>
        </p>
        <div class="article-infos">
          <img class="author-pro" src="images/art-prof.png" />
          <p class="article-author"><?= $user->first_name ?></p>
          <p class="article-date"><?= date_format($article->created_at, 'd M Y') ?></p>
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
        <p class="categories_title">Categories</p>
        <div class="aside-categories">
          <ul class="category_list">
            <li class="category_list_item">
              <a href="" class="category_link"><span class="category_name">Business</span>
                <span class="category_number">42</span></a>
            </li>
            <li class="category_list_item">
              <a href="" class="category_link"><span class="category_name">Tech</span>
                <span class="category_number">73</span></a>
            </li>
            <li class="category_list_item">
              <a href="" class="category_link"><span class="category_name">Science</span>
                <span class="category_number">99</span></a>
            </li>
            <li class="category_list_item">
              <a href="" class="category_link"><span class="category_name">Sports</span>
                <span class="category_number">7</span></a>
            </li>
            <li class="category_list_item">
              <a href="" class="category_link"><span class="category_name">Travel</span>
                <span class="category_number">15</span></a>
            </li>
          </ul>
        </div>
        <div class="aside-posts">
          <p class="posts-intro">Recent Posts</p>
          <div class="posts">
            <div class="post">
              <a href="" class="post-link"><img src="images/post-1.png" alt="" class="post-img" /></a>
              <p class="post-title">Lorem ipsum dolor sit amet</p>
              <p class="post-date">03 septembre 2023</p>
            </div>
            <div class="post">
              <a href="" class="post-link"><img src="images/post-2.png" alt="" class="post-img" /></a>
              <p class="post-title">Lorem ipsum dolor sit amet</p>
              <p class="post-date">03 octobre 2023</p>
            </div>
            <div class="post">
              <a href="" class="post-link"><img src="images/post-3.png" alt="" class="post-img" /></a>
              <p class="post-title">Lorem ipsum dolor sit amet</p>
              <p class="post-date">03 novembre 2023</p>
            </div>
            <div class="post">
              <a href="" class="post-link"><img src="images/post-4.png" alt="" class="post-img" /></a>
              <p class="post-title">Lorem ipsum dolor sit amet</p>
              <p class="post-date">03 décembre 2023</p>
            </div>
          </div>
        </div>
        <div class="aside-tags">
          <p class="tags-intro">Tags</p>
          <div class="tags">
            <a href="#" class="tag">World</a>
            <a href="#" class="tag">Business</a>
            <a href="#" class="tag">Tech</a>
            <a href="#" class="tag">Science</a>
            <a href="#" class="tag">Health</a>
            <a href="#" class="tag">Sports</a>
            <a href="#" class="tag">Arts</a>
            <a href="#" class="tag">Books</a>
            <a href="#" class="tag">Style</a>
          </div>
        </div>
      </aside>
    </div>
  </div>
</main>
<?= $this->endSection('content') ?>