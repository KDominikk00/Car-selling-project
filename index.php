<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Portal ogłoszeniowy</title>
</head>
<body>
    <div class="top">
        <nav>
            <a href="index.php"><img src="logo1.png" alt="logo strony"></a>
            <input type="search" placeholder="np. Audi, BMW, Mercedes">
            <a href="tel:+48 111 222 333" id="infolinia"><i class="fa-solid fa-phone"></i> +48 111 222 333</a>
            <a href="sprzedaj.php"><button>sprzedaj swój samochód</button></a>
        </nav><br>
        <header>
            <h1>Znajdz swój <br> wymarzony samochód <br> <input type="button" value="Znajdź!" onClick="document.querySelector('main').scrollIntoView();" /></h1>   
            <img id="header-img" src="car1.png" alt="samochód">
        </header>
    </div>

    <main>
        <!-- <section>
                <img src="samochod1.jpg" alt="Samochód">
                <div class="mainFlex">
                    <div class="opisL">
                        <h2>Mercedes Benz Klasa C</h2>
                        <h3>1999cm3, 180KM, 35000km, 2021</h3> <br>
                    </div>
                    <div class="opisR">
                       <br> <h4>120 000</h4>
                        <p>zł/netto</p>
                    </div>
                </div>
                <div class="opisFlex">
                    <p>Szybki, zrywny, PAKIET AMG, sprzedaje ponieważ kupiłem BMW</p>
                    <button><a href="tel: 111 222 333">Zadzwoń</a></button>
                </div>
        </section> -->
        <?php script1() ?>
    </main>

    <section id="OC">
        <div class="p1">
            <h5>Ile powinien kosztować <br>samochód</h5>
            <p>Kupując samochód za gotówkę musimy odpowiednio dobrać samochód do naszych finansów. Eksperci z <a href="subiektywnieofinansach.pl">SubiektywnieOFinansach.pl</a> twierdzą że koszt samochodu nie powinien przekraczać połowy rocznego dochodu kupującego</p>
        </div>

        <div class="p2">
            <h5>Oblicz na jaki samochód cię stać</h5> <br>
                <input type="number" placeholder="Twoje zarobki/m netto" id="zarobki"><br>
                <button onclick="koszt()">Oblicz</button>
                <p id="koszt"></p>
        </div>
    </section>

    <footer>
        <div class="footerL">
            <h6>Odwiedź nas również na:</h6>
            <ul>
                <li><a href="">Facebook</a></li>
                <li><a href="">Twitter</a></li>
                <li><a href="">Instagram</a></li>
                <li><a href="">Youtube</a></li>
                <li><a href="">Reddit</a></li>
            </ul>
        </div>

        <div class="footerR">
            <h6>Kontakt</h6>
            <p>Twój adres</p>
            <p>Ulica nr. domu</p>
            <p>+48 111 222 333</p>
        </div>
    </footer>

    <?php
    function script1() {
        $conn = mysqli_connect("localhost", "root", "", "samochody");

        if(!$conn) {
            echo "nie udało się połączyć z bazą";
            return;
        }else {
            $sql = "SELECT zdjecie, nazwa, dane, opis, cena, nrTel FROM sprzedaz";
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_row($res)) {
                echo 
                "
                <section>
                    <img src='$row[0]' alt='Samochód'>
                    <div class='mainFlex'>
                        <div class='opisL'>
                            <h2>$row[1]</h2>
                            <h3>$row[2]</h3> <br>
                        </div>
                        <div class='opisR'>
                        <br> <h4>$row[4]</h4>
                            <p>zł/netto</p>
                        </div>
                    </div>
                    <div class='opisFlex'>
                        <p>$row[3]</p>
                        <button><a href='tel: $row[5]'>Zadzwoń</a></button>
                    </div>
                </section>
                ";
            }
        }
        mysqli_close($conn);
    }
    ?>

    <script src="app.js"></script>
</body>
</html>