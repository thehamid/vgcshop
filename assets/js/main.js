
window.onload=changeImage(1);


changeImage(1);
function changeImage(index) {
    var img = document.createElement("img");
    img = document.getElementById("sel" + index).src;
    console.log(index);
    // src = document.getElementById("displayPic");
    // src.replaceChild(img, src.childNodes[0])
    document.getElementById("displayPic").src =img;
}