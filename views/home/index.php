<div id="home-page-msg">
    <h1>Welcome to our forum!</h1>
    <input type="button" name="create-question" value="Ask question >>">
    <table>
        <tr>
            <th>Question</th>
            <th>Category</th>
        </tr>
        <?php foreach ($this->questions as $question) : ?>
            <tr>
                <td><?= $question['content'] ?></td>
                <td><?= htmlspecialchars($question['name']) ?></td>
                <td><a href="/authors/delete/<?=$question['id']?> ">[Answer]</a></td>
            </tr>
        <?php endforeach ?>
    </table>

</div>

