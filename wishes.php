<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hovedside</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1 id="Welcome">Her er mine ønsker!</h1>
    <?php
    $oList = array();
    $jData = file_get_contents("my_data.json");
    $jInfo = json_decode($jData, true);
    foreach($jInfo as $x){
        array_push($oList, $x);
    }
    print_r($oList);
    class Wish {
        public $Header;
        public $Desc;
        public $Price;
        public $Link;
        function __construct($Header, $Desc, $Price, $Link){
            $this->Header = $Header;
            $this->Desc = $Desc;
            $this->Price = $Price;
            $this->Link = $Link;
        }
    }
    function createObj(&$oList, string $Header, string $Desc, float $Price, string $Link){
        $myObject = new Wish($Header, $Desc, $Price, $Link);
        array_push($oList, $myObject);
    }
    global $encoded;
    global $sum;
    $encoded = json_encode($oList);
    $file = fopen("my_data.json", "w+");
    fwrite($file, $encoded);
    fclose($file);
    ?>
    <br><a href="./index.html">Vil du gå tilbake?</a>
</body>
</html>