<h2 class="bg-success text-center text-uppercase mb-auto"><?php echo $title; ?></h2>

<?php foreach ($news as $news_item) : ?>
        <div class="bg-primary card mb-3 mt-3 body container-sm text-center">
                <h3 class="text-capitalize"><?php echo $news_item['title']; ?></h3>
                <div class="main">
                        <?php echo $news_item['text']; ?>
                </div>
                <p><a class="button" href="<?php echo site_url('news/view/' . $news_item['slug']); ?>">View article</a></p>
        </div>
<?php endforeach; ?>