<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
        crossorigin="anonymous">
    <style>
        body {
            font-family: sans-serif;
        }
        .sign-in-form {
            margin: auto;
        }
        #username {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        #password {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>
<div class="container text-center">
    <div class="row">
        <form method="post" class="sign-in-form mt-5 mt-md-5 col-lg-4 col-md-5 col-sm-8">
            <h3>Authentication</h3>
            <? if($loginError):?>
            <div class="alert alert-danger">
                You entered the wrong login information
            </div>
            <? endif; ?>
            <input type="text" id="email" name="email" class="form-control mt-3" placeholder="email" required="" autofocus="">
            <input type="password" id="password" name="password" class="form-control" placeholder="password" required="">
            <button class="w-75 btn btn-lg btn-primary mt-1" type="submit">login</button>
            <div class="mt-3">
                <a href="/">back</a>
            </div>
        </form>
    </div>
</div>
</body>
