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
    $oList = array(); #definerer en liste for å holde styr på objekter
    $jData = file_get_contents("my_data.json"); #Henter inn dataen fra json filen
    $jInfo = json_decode($jData, true); #Dekoder dataen hentet inn fra json filen
    foreach($jInfo as $x){ #Kjører en loop som legger alle objektene inn i objektlista fra den dekodede dataen fra json filen
        array_push($oList, $x);
    }
    print_r($oList); #Printer ut alle objektene i objektlista
    class Wish { #Definerer klassen for ønske
        public $Header;
        public $Desc;
        public $Price;
        public $Link;
        function __construct($Header, $Desc, $Price, $Link){ #Lager en constructor for enklere dannelse av objekter
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
    $encoded = json_encode($oList);
    $file = fopen("my_data.json", "w+");
    fwrite($file, $encoded);
    fclose($file);
    ?>
    <br><a href="./index.html">Vil du gå tilbake?</a>
</body>
</html>