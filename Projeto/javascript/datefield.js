function updateCheckout() {
    var date1 = document.querySelector('#begin_date');
    var date2 = document.querySelector('#end_date');
    date2.setAttribute('min',date1.value);
    

}