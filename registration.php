<!DOCTYPE html>
<html lang="en">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "register-handler.php";
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<div class="container">
    <form class="form" id="form" method="POST" action="registration.php">
        <h2>Register With Us</h2>
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Enter username" name="username">
            <small>Error Message</small>
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" id="email" placeholder="Enter email" name="email">
            <small>Error Message</small>
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter password" name="password1">
            <small>Error Message</small>
        </div>
        <div class="form-control">
            <label for="password2">Confirm Password</label>
            <input type="password" id="password2" placeholder="Enter password again" name="password2">
            <small>Error Message</small>
        </div>
        <button id="submit">Submit</button>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function (){
        $('#submit').click(function (e){

            var valid = this.form.checkValidity();
            if (valid) {
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password2 = $('#password2').val();

                if (password === password2) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'register-handler.php',
                        data: {username: username, email: email, password: password},
                        success: function (data) {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                            }).then(function () {
                                window.location = "index.php";
                            })
                        },
                        error: function (data) {
                            Swal.fire({
                                'title': 'Error',
                                'text': 'There were errors while saving the data',
                                'type': 'error'
                            })
                        }
                    })
                } else {
                    const formControl = password2.parentElement;
                    formControl.className = 'form-control error';
                    const small = formControl.querySelector('small');
                    small.innerText = 'Passwords do not match';
                }
            } else {

            }
        })
    });
</script>
</body>
</html>