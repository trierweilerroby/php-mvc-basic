<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
    include_once __DIR__ . '/../header.php';
    $user = $_SESSION['user'];
?>

<h1>Articles!</h1>


<form method="POST">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" value="">
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <input class="form-control" name="content" value="">
        </div>
        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input class="form-control" name="salary" value="">
        </div>
        <input type="hidden" name="author" value='<?= (int)$user['id'] ?>'>
        <button type="submit" class="btn btn-primary" name="createArticleBtn">Add</button>
    </form>

<?php
    foreach ($model as $article) {
?>

<h2><?= $article->getTitle() ?></h2>

<form method='POST'>
        <input type='hidden' id='id' name='id' value='<?= $article->getId() ?>'>
        <input type='submit' id='delete' name='deleteArticleBtn' value='Delete'>
</form>
<?php
    }
    include_once __DIR__ . '/../footer.php';
?>



</body>
</html>