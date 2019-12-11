function triggerClick() {
    document.querySelector('#eve_image').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector('#display').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}


function disableMyText(){
    if(document.getElementById("check").checked == true){
        document.getElementById("eve_minprijs").disabled = true;
        document.getElementById("eve_maxprijs").disabled = true;
        document.getElementById("eve_minprijs").style.display ="none";
        document.getElementById("eve_maxprijs").style.display ="none";
    }else{
        document.getElementById("eve_minprijs").disabled = false;
        document.getElementById("eve_maxprijs").disabled = false;
        document.getElementById("eve_minprijs").style.display ="inline";
        document.getElementById("eve_maxprijs").style.display ="inline";
    }
}