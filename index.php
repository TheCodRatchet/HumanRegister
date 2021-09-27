<?php

require_once "vendor/autoload.php";

use App\RegisterEntry;
use App\RegisterTable;


if (isset($_POST['submit'])) {
    new RegisterEntry($_POST['name'], $_POST['surname'], $_POST['id'], $_POST['info']);
    header("Refresh:0");
}
$table = new RegisterTable("app/register.csv");
$records = $table->getRecords();

var_dump($_POST["id2"]);
?>

<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="surname">Surname:</label><br>
    <input type="text" id="surname" name="surname"><br>
    <label for="id"></label>ID:<br>
    <input type="text" id="id" name="id"/><br>
    <label for="info"></label>Additional info:<br>
    <textarea id="info" name="info"></textarea><br>
    <input type="submit" name="submit" value="Add person"><br>
    <br>
    <input name="id2" placeholder="Put in ID of person"/>
    <button type="submit" name="submit2">search</button>
</form>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Human Register</title>
</head>
<body>
<?php foreach ($records as $record): ?>
    <?php if ($_POST['id2'] == $record[2]): ?>
        <?php echo "{$record[0]} {$record[1]}: {$record[2]}" ?><br>
        <?php echo "{$record[3]}" ?><br>
        <button onclick="" name="delete">delete</button>
    <?php endif; ?>
<?php endforeach; ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col"><?php echo "Name"; ?></th>
        <th scope="col"><?php echo "Surname"; ?></th>
        <th scope="col"><?php echo "ID"; ?></th>
        <th scope="col"><?php echo "Additional info"; ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $record): ?>
        <tr>
            <th scope="row"><?php echo $record[0]; ?></th>
            <th scope="row"><?php echo $record[1]; ?></th>
            <th scope="row"><?php echo $record[2]; ?></th>
            <th scope="row"><?php echo $record[3]; ?></th>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
