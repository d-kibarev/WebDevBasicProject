<?php if($this->isLoggedIn) : ?>
    <div id="main-content">
        <table style="width: 99%">
            <tr>
                <th style="border:1px solid ">Answer</th>
                <th style="border:1px solid ">Author</th>
            </tr>
            <?php foreach ($this->answers as $answer) : ?>
                <tr>
                    <td style="border:1px solid "><?= htmlspecialchars($answer['content']) ?></td>
                    <td style="border:1px solid "><?= htmlspecialchars($answer['user_id']) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <a href="/answers/create/">Post new answer >></a>
    </div>
<?php endif ?>