<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mb-3">
        <label for="Firstname" class="form-label">Firstname</label>
        <input class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="Lastname" class="form-label">Lastname</label>
        <input class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </div>
    </div>
    <div class="mb-3">
    <select class="form-select" aria-label="Default select example">
        <option selected>--Usertype--</option>
        <option value="1">Admin</option>
        <option value="2">User</option>
        <option value="3">Employer</option>
    </select>
    </div>
    
</body>
</html>