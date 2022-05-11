<h2 class="h2Article">Create Article</h2>
<form method="post" action="<?=Rout::url('saveArticle')?>" class="articleForm">
    <label>Label:
        <input type="text" name="name">
    </label>
    <label>Text:
        <textarea name="text"></textarea>
    </label>
    <label>Author:
        <input type="text" name="autorName" readonly value="<?=$userName[0]?>">
    </label>
    <input type="hidden" name="autor" value="<?=$userId?>">
    <label>Create at:
        <input type="text" name="create_data" readonly value="<?=date('Y-m-d H:i:s');?>">
    </label>
    <input type="submit" value="create">
</form>


