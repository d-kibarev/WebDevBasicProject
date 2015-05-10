<div id="home-page-msg">
    <h1>Ask Question</h1>
    <form method="post" action="/home/create">
        Category:
        <select name="category-id" style="width: 153px;">
            <?php foreach ($this->categories as $category) : ?>
                <option value="<?=$category['id']?>">
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach ?>
        </select>
        </br>
        Tag name: <input type="text" name="tag-name" style="width: 158px;">
        </br>
        Question:  <input type="text" name="question-text" style="width: 154px;">
        <br/>
        <input type="submit" value="Post question" style="width: 150px;">
    </form>
</div>

