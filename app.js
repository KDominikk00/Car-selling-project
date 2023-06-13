function koszt() {
    let dochod = document.querySelector("#zarobki").value;

    let koszt = dochod * 6;
    document.getElementById("koszt").textContent = `Twój samochód powinien kosztować nie więcej niż ${koszt} PLN`;
}