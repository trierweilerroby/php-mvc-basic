<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-gray-100">

    <?php include_once __DIR__ . '/../header.php'; ?>

    <div class="m-10">

    <h1 class="text-3xl font-bold mb-4">Articles</h1>

    <form method="POST" class="mb-4">
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
        <input type="hidden" name="author" value="<?= (int)$user['id'] ?>">
        <button type="submit" class="btn btn-primary" name="addArticleBtn">Add</button>
    </form>

    <?php 
    if ($user['type_id'] == 1) {
        foreach ($model as $article): ?>
            <div class="mb-4 p-4 bg-white rounded shadow">
                <h2 class="text-2xl font-bold"><?= $article->getTitle() ?></h2>
                <form method="POST" class="mt-2">
                    <input type="hidden" id="id" name="id" value="<?= $article->getId() ?>">
                    <input type="submit" id="delete" name="deleteArticleBtn" value="Delete" class="btn btn-danger">
                </form>
            </div>
        <?php endforeach;
    } ?>
    <?php
    if($user['type_id'] == 2) {
        foreach ($userArticle as $article): ?>
            <div class="mb-4 p-4 bg-white rounded shadow">
                <h2 class="text-2xl font-bold"><?= $article->getTitle() ?></h2>
                <form method="POST" class="mt-2">
                    <input type="hidden" id="id" name="id" value="<?= $article->getId() ?>">
                    <input type="submit" id="delete" name="deleteArticleBtn" value="Delete" class="btn btn-danger">
                </form>
            </div>
        <?php endforeach;
    } ?>
    </div>


    <?php include_once __DIR__ . '/../footer.php'; ?>

</body>

</html>
