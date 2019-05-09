<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php
    // Je récupere les données de OMDB au format JSON
    $response = file_get_contents('http://www.omdbapi.com/?apikey=API_KEY&t=Forrest');
    // Je décode les données et les recupere sous forme de tableau
    // Grâce au 'true'
    $response = json_decode($response, true);

    var_dump($response);
?>
    <h3> <?= $response['Title']; ?></h3> 
<?php

    // Je récupere les données de OMDB au format XML
    $xml = file_get_contents('http://www.omdbapi.com/?apikey=API_KEY&t=titanic&r=xml');

    var_dump($xml);

    // Je crée un objet SimpleXMLElement 
    $xmlElement = new SimpleXMLElement($xml);
    var_dump($xmlElement);
    var_dump($xmlElement->movie);
    var_dump($xmlElement->movie['title']);
    // J'affiche le titre du film
?>
    <h3> <?= $xmlElement->movie['title']; ?> </h3> 
<?php

    $xmlMany = file_get_contents('http://www.omdbapi.com/?apikey=API_KEY&s=ave&r=xml');
    $xmlElementMany = new SimpleXMLElement($xmlMany);
    var_dump($xmlElementMany);
?>
    <?php for($i=0; $i<100; $i++) : ?>
        <h3><?= $xmlElementMany->result[$i]['title']; ?></h3>
    <?php endfor
?>

</body>
</html>