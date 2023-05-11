<?php
if (isset($_GET['filter']) && isset($_GET['sortby']) && isset($_GET['orderby'])) {
    $cars = cars::loadcars($_GET['filter'], $_GET['sortby'], $_GET['orderby']);
} else if (isset($_GET['sortby']) && isset($_GET['orderby'])) {
    $cars = cars::loadcars("", $_GET['sortby'], $_GET['orderby']);
} else if (isset($_GET['filter']) && isset($_GET['orderby'])) {
    $cars = cars::loadcars($_GET['filter'], "", $_GET['orderby']);
} else if (isset($_GET['orderby'])) {
    $cars = cars::loadcars("", "Nummer", $_GET['orderby']);
} else if (isset($_GET['sortby'])) {
    $cars = cars::loadcars("", $_GET['sortby']);
} else if (isset($_GET['filter'])) {
    $cars = cars::loadcars($_GET['filter']);
} else {
    $cars = cars::loadcars();
}
//print_r($cars);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compeatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/65416f0144.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<header>

</header>
<form method="get">
    <input type="text" name="filter">
    <select name="sortby">
        <option value="Nummer" <?php if(isset($_GET["sortby"])=="Nummer" and $_GET["sortby"]=="Nummer") {echo"selected";} ?>>Nummer</option>
        <option value="Merk" <?php if(isset($_GET["sortby"])=="Merk" and $_GET["sortby"]=="Merk") {echo"selected";} ?>>Merk</option>
        <option value="Generatie" <?php if(isset($_GET["sortby"])=="Generatie" and $_GET["sortby"]=="Generatie") {echo"selected";} ?>>Generatie</option>
        <option value="Model"<?php if(isset($_GET["sortby"])=="Model" and $_GET["sortby"]=="Model") {echo"selected";} ?>>Model</option>
        <option value="Producent"<?php if(isset($_GET["sortby"])=="Producent" and $_GET["sortby"]=="Producent") {echo"selected";} ?>>Producent</option>
        <option value="Producent"<?php if(isset($_GET["sortby"])=="Producent" and $_GET["sortby"]=="Producent")  {echo"selected";} ?>>Producent</option>
        <option value="`Huidige locatie`"<?php if(isset($_GET["sortby"])=="`Huidige locatie`" and $_GET["sortby"]=="`Huidige locatie`") {echo"selected";} ?>>Huidige locatie</option>
        <option value="DoosID"<?php if(isset($_GET["sortby"]) and $_GET["sortby"]=="Doos") {echo"selected";} ?>>Doos</option>
    </select>

    <select class="fa-solid" name="orderby">
        <option value="ASC"class="fa-solid fa-arrow-up" <?php if(isset($_GET["orderby"]) and $_GET["orderby"]=="ASC") {echo"selected";} ?>>&darr;</option>
        <option value="DESC"class="fa-solid fa-arrow-down" <?php if(isset($_GET["orderby"]) and $_GET["orderby"]=="DESC") {echo"selected";} ?>>&uarr;</option>
    </select>
    <input type="submit" value="Zoeken">
</form>
<div class="flex-container">
    <?php
    foreach ($cars as $car) {
        $carosserievariant = "";
        $dubbel = "Nee";
        $orgineel = "Nee";
        if ($car["Dubbel"] == 1) {
            $dubbel = "ja";
        }
        if ($car["Origineel?"] == 1) {
            $orgineel = "ja";
        }

        $tempSplit = explode(";", $car["carosserievariant"]);

        echo "<div class=\"container\">
        <div class=\"img-container\">
            <img src=>
            <img src=>
        </div>
        <div class=\"info-container\">";
        echo "<div class='blok1'><h1>Nummer: " . $car["Nummer"] . "</h1></div>";
        echo "<div class='blok2'><h1>Dubbel: " . $dubbel . "</h1></div>";
        echo "<div class='blok3'><h1>Merk: " . $car["Merk"] . "</h1></div>";
        echo "<div class='blok4'><h1>Model: " . $car["Model"] . "</h1></div>";
        echo "<div class='blok5'><h1>Generatie: " . $car["Generatie"] . "</h1></div>";
        echo "<div class='blok6'><h1>Jaar: " . $car["Jaar"] . "</h1></div>";
        echo "<div class='blok7'><h1>Kleur: " . $car["Kleur"] . "</h1></div>";
        echo "<div class='blok8'><h1>Producent: " . $car["Producent"] . "</h1></div>";
        echo "<div class='blok9'><h1>Model nummer: " . $car["Modelnr"] . "</h1></div>";
        echo "<div class='blok10'><h1>Schaal: " . $car["Schaal"] . "</h1></div>";
        echo "<div class='blok11'><h1>Productie jaar: " . $car["prod jaar"] . "</h1></div>";
        echo "<div class='blok12'><h1>Orgineel: " . $orgineel . "</h1></div>";
        echo "<div class='blok14'><h1>Opbergverpakking: " . $car["Opbergverpakking"] . "</h1></div>";
        echo "<div class='blok15'><h1>Doos: " . $car["DoosID"] . "</h1></div>";
        echo "<div class='blok16'><h1>Staat: " . $car["Staat"] . "</h1></div>";
        echo "<div class='blok17'><h1>Huidige locatie: " . $car["Locatie"] . "</h1></div>";
        foreach ($tempSplit as $i) {
            switch ($i) {
                case 1:
                    $carosserievariant = $carosserievariant . ", 2-door";
                    break;
                case 2:
                    $carosserievariant = $carosserievariant . ", 3-door";
                    break;
                case 3:
                    $carosserievariant = $carosserievariant . ", 4-door";
                    break;
                case 4:
                    $carosserievariant = $carosserievariant . ", 5-door";
                    break;
                case 5:
                    $carosserievariant = $carosserievariant . ", Stationwagon";
                    break;
                case 6:
                    $carosserievariant = $carosserievariant . ", Hatchback";
                    break;
                case 7:
                    $carosserievariant = $carosserievariant . ", Coupé";
                    break;
                case 8:
                    $carosserievariant = $carosserievariant . ", SUV";
                    break;
                case 9:
                    $carosserievariant = $carosserievariant . ", Sedan";
                    break;
                case 10:
                    $carosserievariant = $carosserievariant . ", Van";
                    break;
                case 11:
                    $carosserievariant = $carosserievariant . ", Convertible";
                    break;
                case 12:
                    $carosserievariant = $carosserievariant . ", Off-Road Vehicle";
                    break;
                case 13:
                    $carosserievariant = $carosserievariant . ", Camper";
                    break;
                case 14:
                    $carosserievariant = $carosserievariant . ", Truck (Semi)";
                    break;
                case 15:
                    $carosserievariant = $carosserievariant . ", Pick-up Truck";
                    break;
                case 16:
                    $carosserievariant = $carosserievariant . ", MPV";
                    break;
                case 17:
                    $carosserievariant = $carosserievariant . ", Bus";
                    break;
                case 18:
                    $carosserievariant = $carosserievariant . ", Aanhanger";
                    break;
                case 19:
                    $carosserievariant = $carosserievariant . ", Caravan";
                    break;
                case 20:
                    $carosserievariant = $carosserievariant . ", Racewagen";
                    break;
                case 21:
                    $carosserievariant = $carosserievariant . ", Saloon";
                    break;
                case 22:
                    $carosserievariant = $carosserievariant . ", Sportwagen";
                    break;
            }
        }
        echo "</div>";
        echo "<div class='blok18'><h1>carosserievariant: " . substr($carosserievariant, 1) . "</h1></div>";
        echo "<div class='blok13'><h1>Opmerking: " . str_replace(array('<div>', '</div>'), ' ',$car["Opmerkingen"]) . "</h1></div>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>