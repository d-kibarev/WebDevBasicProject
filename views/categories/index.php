<div id="home-page-msg">
    <h1>Categories</h1>
    <input type="button" value="Add new category" id="add-category">
    <script>
        $('#add-category').on('click', function(){
            $.ajax({
                url: '/categories/create',
                method: 'GET'
            }).success(function(data){
                $('#home-page-msg').html(data);
            })
        })
    </script>
    <form method="post" action="/categories/index">
        <table style="width: 99%">
            <tr>
                <th style="border:1px solid;">Categories</th>
            </tr>
            <?php foreach ($this->categories as $category) : ?>

                <tr>
                    <td style="border:1px solid "><?= htmlspecialchars($category['name']) ?></td>
                    <td style="width: 150px;"><a type="submit" href="/home/index/0/5/<?=$category['id']?> ">See questions >></a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </form>
</div>