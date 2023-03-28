<?php
require_once(__DIR__."/../../config/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<?php
require_once __DIR__ . '/../header.php';
require_once(__DIR__."/../../repositories/userrepository.php");
$userrepository = new UserRepository();
$users = $userrepository->getAll();
foreach ($users as $user){

       ?>
        <div class="article">
            <p><i><?= $user->getFirstName() ?></i></p>
            <p><?= $user->getLastname() ?></p>
            <p><?= $user->getEmai() ?></p>
            <p><?= $user->getJobsearch() ?></p>
            <p><?= $user->getCertificate() ?></p>

        <form method='POST' class="fl">
            <input type='hidden' id='id' name='id' value=$id>
            <input type='submit' id='delete' name='delete' value='Delete'>
        </form>
        <form method='POST' class="fl">
            <input type='hidden' id='id' name='id' value=$name>
            <input type='submit' id='edit' name='edit' value='Edit'>
        </form>

        </div>
       <?php
    }

   if(isset($_POST['delete'])){
        echo"<meta http-equiv='refresh' content='0'>";
    }else if(isset($_POST['edit'])){

    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous">
</script>
</body>

</html>

