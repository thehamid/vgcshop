const donationprice = document.getElementById('dontionprice');

document.addEventListener("DOMContentLoaded", () => {
    changeImage(1);
});

function changeImage(index) {
    var img = document.createElement("img");
    img = document.getElementById("sel" + index).src;
    console.log(index);
    // src = document.getElementById("displayPic");
    // src.replaceChild(img, src.childNodes[0])
    document.getElementById("displayPic").style ="background-image:url('"+img+"')";
}


//On Input Change Events
donationprice.addEventListener('input', function () {
    if (donationprice.value.length == 0) {
        document.getElementById('donTxt').innerHTML = '';
    } else {
        document.getElementById('donTxt').innerHTML = this.value;
    }
});