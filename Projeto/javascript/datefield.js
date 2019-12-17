function updateMinMax(value) {
    if (value === 0) {
        var currCheckInMin = document.getElementsByTagName("input")[id = "checkIn"].getAttribute('min');
        var currCheckIn = document.getElementsByTagName("input")[id = "checkIn"].value;

        currCheckIn = new Date(currCheckIn);
        currCheckIn.setDate(currCheckIn.getDate() + 1);

        var year = currCheckIn.getUTCFullYear();
        var month = currCheckIn.getUTCMonth() + 1; //months from 1-12
        if (month < 10) {
            month = '0' + month;
        }
        var day = currCheckIn.getUTCDate();
        if (day < 10) {
            day = '0' + day;
        }

        var newdate = year + '-' + month + '-' + day;
        console.log('currcheckinmin');
        console.log(currCheckInMin);
        console.log('newDate pro checkout');
        console.log(newdate);

        currCheckInMin = new Date(currCheckInMin);
        checkIn_isLarger = date_larger_than(currCheckInMin, currCheckIn);
        if (checkIn_isLarger == false) {
            document.getElementsByTagName("input")[id = "checkOut"].setAttribute('min', newdate);
        } else if (checkIn_isLarger == null) {
            document.getElementsByTagName("input")[id = "checkOut"].setAttribute('min', tomorrow);
        }
    } else if (value === 1) {
        var currCheckOutMin =
            document.getElementsByTagName("input")[id = "checkOut"].getAttribute('min');
        var currCheckOut = document.getElementsByTagName("input")[id = "checkOut"].value;

        currCheckOut = new Date(currCheckOut);
        currCheckOut.setDate(currCheckOut.getDate() - 1);

        var year = currCheckOut.getUTCFullYear();
        var month = currCheckOut.getUTCMonth() + 1; //months from 1-12
        if (month < 10) {
            month = '0' + month;
        }
        var day = currCheckOut.getUTCDate();
        if (day < 10) {
            day = '0' + day;
        }

        var checkOut_isLarger = date_larger_than(currCheckOutMin, currCheckOut);
        if (checkOut_isLarger == false) {
            document.getElementsByTagName("input")[id = "checkIn"].setAttribute('max', currCheckOut);
        } else if (checkOut_isLarger == null) {
            document.getElementsByTagName("input")[id = "checkIn"].removeAttribute('max');
        }
    }
}

function setTotalPrice(pricePerDay) {
    var checkIn = document.getElementsByTagName("input")[id = "checkIn"];
    var checkOut = document.getElementsByTagName("input")[id = "checkOut"];
    if (checkIn.checkValidity() && checkOut.checkValidity()) {
        var checkInDate = new Date(checkIn.value);
        var checkOutDate = new Date(checkOut.value);
        var diffTime = Math.abs(checkOutDate - checkInDate);
        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        pricePerDay = parseInt(pricePerDay);
        var totalPrice = pricePerDay * diffDays;
        document.getElementsByTagName("p")[id = "totalPrice"].innerHTML = "Total: " + totalPrice + "€";
    }
    else {
        document.getElementsByTagName("p")[id = "totalPrice"].innerHTML = "";
    }
}
function updateCheckout() {
    var date = document.getElementById("datetoday").getAttribute("value");
    date[8] = date[8] + 1;
    document.getElementById("datetoday2").setAttribute("min", date);
}