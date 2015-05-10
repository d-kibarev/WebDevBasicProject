<script src='/content/jQuery/jquery-2.1.3.min.js'></script>
<script src='/content/jquery.noty/jquery.noty.js'></script>
<div id="home-page-msg">
    <h1>Welcome to our forum!</h1>
    <?php if(!$this->isLoggedIn) : ?>
        <p>Please <a href="/account/login">login</a> to get access!</p>
    <?php endif ?>
    <?php if($this->isLoggedIn) : ?>

    <a href="/home/create">Ask question >></a>
    <input type="button" value="Ask question" id="ask-question">
    <script>
        $('#ask-question').on('click', function(event){
            $.ajax({
                url: '/home/create',
                method: 'GET'
            }).success(function(data){
                $('#home-page-msg').html(data);
            })
        })
    </script>
    <a href="/home/create">See categories >></a>
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
                    <td style="width: 150px;"><a href="/answers/index/<?=$question['id']?> ">See Answers >></a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <a href="/home/index/<?= $this->page - 1?>/<?= $this->items?>"><-Previous</a>
        <a href="/home/index/<?= $this->page + 1?>/<?= $this->items?>">Next-></a>
        <?php endif ?>
    </div>
</div>

