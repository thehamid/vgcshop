

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
});

function changeImage(index) {
    var img = document.createElement("img");
    img = document.getElementById("sel" + index).src;
    document.getElementById("displayPic").style ="background-image:url('"+img+"')";
}



$(document).ready(function(){
    $(".btn-check").click(function(){

        var radioValue = $("input[name='project-option']:checked").val();

        if(radioValue){

            $("input[name='value']").val(radioValue);
            $('#farsi').text(wordifyfa(radioValue)+"تومان");
            $('#donTxt').text(radioValue);
        }

    });
});

$('#input_number').keyup(function () {
    $('#farsi').text(wordifyfa($(this).val())+"تومان");
});