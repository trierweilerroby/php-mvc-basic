<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <?php include_once __DIR__ . '/../header.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <!-- Main Title -->
        <h1 class="text-5xl font-bold text-center text-blue-600 mb-8">Manage Articles</h1>

        <!-- Add Article Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-3xl font-semibold text-gray-700 mb-6 text-center">Add a New Article</h2>
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-lg font-medium text-gray-600 mb-2">Title</label>
                    <input class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" name="title" placeholder="Enter the article title">
                </div>
                <div>
                    <label class="block text-lg font-medium text-gray-600 mb-2">Content</label>
                    <textarea class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" name="content" rows="4" placeholder="Enter the article content"></textarea>
                </div>
                <div>
                    <label class="block text-lg font-medium text-gray-600 mb-2">Salary</label>
                    <input class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" name="salary" placeholder="Enter the salary amount">
                </div>
                <label for="article_type" class="form-label">Article Type</label>
                <select name="article_type" class="form-select" required>
                    <?php foreach ($jobTypes as $jobType): ?>
                        <option value="<?= $jobType->getId(); ?>">
                            <?= htmlspecialchars($jobType->getJob_type()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="author" value="<?= (int)$user['id'] ?>">
                <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition" name="addArticleBtn">Add Article</button>
            </form>
        </div>

        <!-- Articles List -->
        <h2 class="text-4xl font-semibold text-center text-gray-700 mb-6">Your Articles</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
            if ($user['type_id'] == 1) {
                foreach ($model as $article): ?>
                    <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition">
                        <h3 class="text-xl font-bold text-blue-600 mb-2"><?= htmlspecialchars($article->getTitle()) ?></h3>
                        <p class="text-gray-600 mb-4"><?= htmlspecialchars($article->getContent()) ?></p>
                        <p class="font-medium text-gray-700 mb-4"><strong>Salary:</strong> $<?= htmlspecialchars($article->getSalary()) ?></p>
                        <form method="POST" class="text-center">
                            <input type="hidden" name="id" value="<?= $article->getId() ?>">
                            <button type="submit" class="bg-red-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-red-700 transition" name="deleteArticleBtn">Delete</button>
                        </form>
                    </div>
                <?php endforeach;
            }

            if ($user['type_id'] == 2) {
                foreach ($userArticle as $article): ?>
                    <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition">
                        <h3 class="text-xl font-bold text-blue-600 mb-2"><?= htmlspecialchars($article->getTitle()) ?></h3>
                        <p class="text-gray-600 mb-4"><?= htmlspecialchars($article->getContent()) ?></p>
                        <p class="font-medium text-gray-700 mb-4"><strong>Salary:</strong> $<?= htmlspecialchars($article->getSalary()) ?></p>
                        <form method="POST" class="text-center">
                            <input type="hidden" name="id" value="<?= $article->getId() ?>">
                            <button type="submit" class="bg-red-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-red-700 transition" name="deleteArticleBtn">Delete</button>
                        </form>
                    </div>
                <?php endforeach;
            }
            ?>
        </div>
    </div>

    <?php include_once __DIR__ . '/../footer.php'; ?>

</body>

</html>
