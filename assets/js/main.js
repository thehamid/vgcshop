
document.addEventListener("DOMContentLoaded", () => {
    changeImage(1);
    const donationprice = document.getElementById('don_price_input');
    //On Input Change Events
    donationprice.addEventListener('input', function () {
        if (donationprice.value.length == 0) {
            document.getElementById('donTxt').innerHTML = '';
        } else {
            document.getElementById('donTxt').innerHTML = this.value+" تومان";
        }
    });
    document.querySelectorAll("input[name='vgc-option']").forEach((input) => {
        input.addEventListener('change', radioClick);
    });
});

function changeImage(index) {
    var img = document.createElement("img");
    img = document.getElementById("sel" + index).src;
    document.getElementById("displayPic").style ="background-image:url('"+img+"')";
    document.getElementById("inputPic").setAttribute('value',img);

}

function radioClick() {
    let radioValue = document.querySelector('input[name="vgc-option"]:checked').value;
    console.log("click");
    console.log(radioValue);
    document.querySelector('input[name="vgc-value"]').value=radioValue;
    document.getElementById('donTxt').innerHTML =radioValue+" تومان";

}






