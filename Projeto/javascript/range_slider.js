var slider = document.getElementById("range_slider_input");
var output = document.getElementById("price_range");
output.innerHTML = slider.value;

slider.oninput = function () {
    output.innerHTML = this.value;
}