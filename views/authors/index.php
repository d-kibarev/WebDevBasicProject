<h1><?= htmlspecialchars($this->title) ?></h1>

<form action="/answers/create">
    <input type="text" name="answer-text" required>
    <input type="submit" value="Post Answer">
</form>
