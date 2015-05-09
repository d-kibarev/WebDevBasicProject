<div id="home-page-msg">
    <h1>Welcome to our forum!</h1>
    <?php if(!$this->isLoggedIn) : ?>
        <p>Please <a href="/account/login">login</a> to get access!</p>
    <?php endif ?>
    <?php if($this->isLoggedIn) : ?>

    <a href="/home/create">Ask question >></a>
    <div id="main-content">
        <table style="width: 99%">
            <tr>
                <th style="border:1px solid;">Question</th>
                <th style="border:1px solid;">Author</th>
                <th style="border:1px solid;">Category</th>
            </tr>

            <?php foreach ($this->questions as $question) : ?>

                <tr>
                    <td style="border:1px solid;"><?= htmlspecialchars($question['content']) ?></td>
                    <td style="border:1px solid "><?= htmlspecialchars($question['username']) ?></td>
                    <td style="border:1px solid "><?= htmlspecialchars($question['name']) ?></td>
                    <td style="width: 100px;"><a href="/answers/index/<?=$question['id']?> "> See Answers >></a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <?php endif ?>
    </div>
</div>

