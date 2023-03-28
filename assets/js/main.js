
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

//-----> js for multi step form
//your javascript goes here
var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


    showTab(currentTab);

});

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "پرداخت";
    } else {
        document.getElementById("nextBtn").innerHTML = "بعدی";
    }
    fixStepIndicator(n)
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        // document.getElementById("regForm").submit();
        // return false;
        //alert("sdf");
        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("register").style.display = "none";
        document.getElementById("text-message").style.display = "block";




    }
    showTab(currentTab);
}

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    if (valid) { document.getElementsByClassName("step")[currentTab].className += " finish"; }
    return valid;
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) { x[i].className = x[i].className.replace(" active", ""); }
    x[n].className += " active";
}




