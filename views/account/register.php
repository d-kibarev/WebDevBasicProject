<div style="width: 66%">
    <div class="box">
        <h1>User Registration</h1>
        <hr />
        <form role="form" method="post">
            <div class="form-group">
                <label for="Username">Username</label>
                <input id="Username" placeholder="Username" type="text" name="username" required />
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input id="Password" type="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <label for="PasswordConfirm">Password Confirm</label>
                <input id="PasswordConfirm" type="password" placeholder="Password Confirm" name="confirm-password" >
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input id="Email" placeholder="Email" type="text" name="email" >
            </div>
            <button type="submit" class="button"><span class="glyphicon glyphicon-lock"></span> Register</button>
            <a href="/account/login" style="text-decoration: none; border-bottom: blue 1px dotted;">Login here</a>
        </form>
    </div>
</div>
