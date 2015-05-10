<div id="home-page-msg">
    <h1>
        <?php
        if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }
        else{
            echo "Guest";
        }?>'s profile
    </h1>
    <div id="main-content">
        <table style="width: 99%">
            <tr>
                <th style="border:1px solid;">Username</th>
                <th style="border:1px solid;">Email</th>
            </tr>
                <tr>
                    <td style="border:1px solid;"><?= htmlspecialchars($this->profileInfo['username']) ?></td>
                    <td style="border:1px solid "><?= htmlspecialchars($this->profileInfo['email']) ?></td>
                </tr>
        </table>
    </div>
</div>
