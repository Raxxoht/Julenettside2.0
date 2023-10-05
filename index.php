<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hovedside</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Velkommen til min juleønskeside!</h1>
    <?php
    $json = file_get_contents("my_data.json");
    $data = json_decode($json);
    print_r($data);
    ?>
</body>
</html>