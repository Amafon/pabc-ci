<?=$this->extend('Layouts/default.php')?>
<?=$this->section('content')?>
    <main class="main">
      <div class="container container-articles">
        <div class="section-header">
          <header class="article-header">
            <!-- <p class="category">Business</p> -->
            <p class="category"><?=$category->label?></p>
            <h1 class="article-title">
              <?=$article->title?>
            </h1>
            <p class="article-description">
              <?=substr($article->content, 0, 50)?>
            </p>
            <div class="article-infos">
              <img class="author-pro" src="images/art-prof.png" />
              <p class="article-author"><?=$user->first_name?></p>
              <p class="article-date"><?=date_format($article->created_at, 'd M Y')?></p>
            </div>
          </header>
        </div>
      </div>
      <div class="container">
        <div class="articles">
          <section class="section-articles blog">
            <div class="blog-article">
              <img class="article-img" src="images/art-bg1.png" />
              <?=$article->content?>
              <!-- <h3 class="blog-heading-tertiary">The confidential data</h3>
              <p>
                The company announced its Q chatbot during Amazon Web Service’s
                (AWS) annual developer conference—and it’s already “experiencing
                severe hallucinations and leaking confidential data,” the site
                reported. The confidential data in question includes the
                location of AWS data centers, internal discount programs, and
                unreleased features, according to leaked documents obtained by
                Platformer.
              </p>
              <p>
                One of the incidents was marked “sev 2,” referring to a bug so
                severe that Amazon contacted engineers during the night and made
                them work through the weekend to solve it, according to
                Platformer. While companies define their own incident severity
                levels, a ranking of 2 generally refers to an incident with a
                major impact.
              </p>
              <p>
                Amazon is hoping to compete with similar AI offerings by Google
                and Microsoft-tied OpenAI, and recently announced a $4 billion
                investment in AI startup Anthropic. Those competitors have had
                their own issues with hallucinating AIs: Microsoft’s
                ChatGPT-supported Bing chatbot infamously went off the rails
                soon after release, while Google’s Bard served up incorrect
                information during its very first public demo. Yet Amazon’s
                pitch for Q included the claim that its approach would minimize
                the risk of losing control of sensitive internal data.
              </p>
              <h3 class="blog-heading-tertiary">In response to reports</h3>
              <p>
                “We think Q has the potential to become a work companion for
                millions and millions of people in their work life,” Adam
                Selipsky, CEO of AWS, told the New York Times. Selipsky added
                that Amazon had designed Q in response to reports other
                companies had “banned these AI assistants from the enterprise
                because of the security and privacy concerns,” and Q has
                safeguards in place such as need-to-know restrictions on
                corporate data.
              </p>
              <p>
                In a statement to IT Brew, Amazon said reports of Q misbehaving
                derived from the normal feedback process and that the company
                had not determined any actual security issues.
              </p>
              <p>
                “Some employees are sharing feedback through internal channels
                and ticketing systems, which is standard practice at Amazon,”
                Amazon spokesperson Ryan C. Peters wrote. “No security issue was
                identified as a result of that feedback. We appreciate all of
                the feedback we’ve already received and will continue to tune Q
                as it transitions from being a product in preview to being
                generally available.”
              </p>
              <h3 class="blog-heading-tertiary">Lorem ipsum</h3>
              <p>
                “Amazon Q has not leaked confidential information,” the
                statement continued.
              </p>
              <p>
                Q relies on an Amazon platform called Bedrock, and it links
                several generative AI models including Meta’s and Anthropic’s,
                as well as Titan, its in-house AI image generator, according to
                the Times. Amazon has set initial pricing at $20 per user per
                month.
              </p>
              <p>
                Q relies on an Amazon platform called Bedrock, and it links
                several generative AI models including Meta’s and Anthropic’s,
                as well as Titan, its in-house AI image generator, according to
                the Times. Amazon has set initial pricing at $20 per user per
                month.
              </p> -->
            </div>
          </section>
          <aside class="section-aside blog">
            <form action="" class="form-search">
              <input
                type="text"
                name="article-input"
                id=""
                placeholder="Chercher un article"
              />
              <input type="submit" value="Chercher" />
            </form>
            <p class="categories_title">Categories</p>
            <div class="aside-categories">
              <ul class="category_list">
                <li class="category_list_item">
                  <a href="" class="category_link"
                    ><span class="category_name">Business</span>
                    <span class="category_number">42</span></a
                  >
                </li>
                <li class="category_list_item">
                  <a href="" class="category_link"
                    ><span class="category_name">Tech</span>
                    <span class="category_number">73</span></a
                  >
                </li>
                <li class="category_list_item">
                  <a href="" class="category_link"
                    ><span class="category_name">Science</span>
                    <span class="category_number">99</span></a
                  >
                </li>
                <li class="category_list_item">
                  <a href="" class="category_link"
                    ><span class="category_name">Sports</span>
                    <span class="category_number">7</span></a
                  >
                </li>
                <li class="category_list_item">
                  <a href="" class="category_link"
                    ><span class="category_name">Travel</span>
                    <span class="category_number">15</span></a
                  >
                </li>
              </ul>
            </div>
            <div class="aside-posts">
              <p class="posts-intro">Recent Posts</p>
              <div class="posts">
                <div class="post">
                  <a href="" class="post-link"
                    ><img src="images/post-1.png" alt="" class="post-img"
                  /></a>
                  <p class="post-title">Lorem ipsum dolor sit amet</p>
                  <p class="post-date">03 septembre 2023</p>
                </div>
                <div class="post">
                  <a href="" class="post-link"
                    ><img src="images/post-2.png" alt="" class="post-img"
                  /></a>
                  <p class="post-title">Lorem ipsum dolor sit amet</p>
                  <p class="post-date">03 octobre 2023</p>
                </div>
                <div class="post">
                  <a href="" class="post-link"
                    ><img src="images/post-3.png" alt="" class="post-img"
                  /></a>
                  <p class="post-title">Lorem ipsum dolor sit amet</p>
                  <p class="post-date">03 novembre 2023</p>
                </div>
                <div class="post">
                  <a href="" class="post-link"
                    ><img src="images/post-4.png" alt="" class="post-img"
                  /></a>
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
<?=$this->endSection('content')?>
