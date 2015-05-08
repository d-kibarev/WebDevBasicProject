<h1>Add New Answer</h1>

<form method="post" action="/answers/create/<?=$this->currentQuestionId?>">
    Answer: <input type="text" name="answer-text">
    <br/>
    <input type="submit" value="Post answer">
</form>
