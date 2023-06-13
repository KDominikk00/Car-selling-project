<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sprzedaj swój samochód</title>
</head>
<body>
    <div class="top">
            <nav>
                <a href="index.php"><img src="logo1.png" alt="logo strony"></a>
                <input type="search" placeholder="np. Audi, BMW, Mercedes">
                <a href="tel:+48 111 222 333" id="infolinia"><i class="fa-solid fa-phone"></i> +48 111 222 333</a>
                <a href="sprzedaj.php"><button>sprzedaj swój samochód</button></a>
            </nav><br>
    </div>
        <section>
            <form action="sprzedaj.php" method="POST">
                <h1>Sprzedaj swój samochód</h1>
                Nazwa*: <input type="text" placeholder="np. Audi, BMW, Mercedes" name="nazwa"><br>
                Zdjęcie:<input type="text" placeholder="URL np. https://www.autocentrum.pl/dzIwNS5" name="zdjecie"><br>
                Dane*: <input type="text" placeholder="Pojemność, KM, Przebieg, rocznik" name="dane"><br>
                Opis: <input type="text" placeholder="np. Dodatkowe informacje, uszkodzenia," name="opis"><br>
                Cena: <input type="number" placeholder="np. 10000" name="cena"><br>
                Telefon*: <input type="text" placeholder="+48 111 222 333" name="telefon"><br>
                <input type="Submit" value="Dodaj ogłoszenie" id="butt"> 
                <br><br>

    <?php
        $conn = mysqli_connect("localhost", "root", "", "samochody");

        if(empty($_POST['nazwa']) || empty($_POST['zdjecie']) || empty($_POST['dane']) || empty($_POST['telefon']) || empty($_POST['cena'])) {
            echo "proszę uzupełnić wymagające pola";
        }else {
            $nazwa = $_POST['nazwa'];
            $zdjecie = $_POST['zdjecie'];
            $dane = $_POST['dane'];
            $opis = $_POST['opis'];
            $telefon = $_POST['telefon'];
            $cena = $_POST['cena'];

            $sql = "INSERT INTO sprzedaz (zdjecie, nazwa, dane, opis, cena, nrTel) VALUES ('$zdjecie', '$nazwa', '$dane', '$opis', $cena, '$telefon');";
            $res = mysqli_query($conn, $sql);
        }

        mysqli_close($conn);
    ?>
            </form>
        </section>


</body>
</html>



