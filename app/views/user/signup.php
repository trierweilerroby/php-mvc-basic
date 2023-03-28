<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form action="/signupUser" method="POST">
        <div class="mb-3">
            <label for="Firstname" class="form-label">Firstname</label>
            <input class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label for="Lastname" class="form-label">Lastname</label>
            <input class="form-control" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <div class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                special characters, or emoji.
            </div>
        </div>
        <div class="mb-3">
            <select class="form-select" name="type_id">
                <option selected>--Usertype--</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
                <option value="3">Employer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="signupBtn">Submit</button>
    </form>
</body>

</html>