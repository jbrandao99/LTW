function updateCheckout() {
    var date = document.getElementById("datetoday").getAttribute("value");
    date[8] = date[8] + 1;
    document.getElementById("datetoday2").setAttribute("min", date);
}