<div style="text-align: center; width: 66%">
        <div class="box" style="text-align: left">
            <div class="page-header">
                <h1>Login</h1>
            </div>
            <form method="POST" action="/account/login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <hr />
                <div class="form-group" style="text-align:center">
                    <button type="submit" class="button"><span class="glyphicon glyphicon-lock"></span> Login</button>
                    <a href="/account/register" style="text-decoration: none; border-bottom: blue 1px dotted;">Register here</a>
                </div>
            </form>
        </div>
    </div>


