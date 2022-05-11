<div class="content">
    <?php if (count($articles)>0):?>

        <?php foreach ($articles as $article):?>
            <div class="article">
                <h2 class="article_name"><?=$article['name']?></h2>
                <hr/>
                <div class="text"><?=$article['content']?></div>
                <div class="extra">
                    <div class="autor">autor article: <?=$article['email']?></div>
                    <div class="create_at">create at: <?=$article['create_at']?></div>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>