<?php
//session_start();
?>
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
<div class="topnav">
    <a  href="databasefrom.php">Form</a>
    <a  href="index.php">Display</a>
    <a class="active" href="management.php">Management</a>
</div>
<br>
<br>
<?php


require_once("config.php");

try{
    $connection = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successfull";
}catch (PDOEXEPTION $e){
    echo"Connnection failed: ".$e->getmessage();
}
$sql = "Select * FROM posts";
$result = $connection->query($sql);

foreach ($result as $row){
    $id = (int)$row['id'];
    $name = (int)$row['name'];
    echo "<div class='boxgrey'>";
        echo "<h1>";
            echo $row['name'];
        echo "</h1>";
        echo "<h3>";
            echo nl2br($row['message']);
            echo $row['posted_at'];
        echo "</h3>";
        echo" <form method='POST'>";
        echo"<input type='hidden' id='id' name='id' value=$id>";
        echo"<input type='submit' id='delete' name='delete' value='Delete'>";
        echo"</form>";
        echo" <form method='POST'>";
        echo"<input type='hidden' id='id' name='id' value=$name>";
        echo"<input type='submit' id='edit' name='edit' value='Edit'>";
        echo"</form>";

    echo "</div>";
    echo "<br>";
}

if(isset($_POST['delete'])){
    $deletequery = "DELETE FROM posts WHERE id = :id";

    $id = htmlspecialchars($_POST['id']);
    $deletestatement = $connection->prepare($deletequery);
    $deletestatement->bindParam(':id',$id);
    $deletestatement->execute();
     echo"<meta http-equiv='refresh' content='0'>";
}else if(isset($_POST['edit'])){

}
?>