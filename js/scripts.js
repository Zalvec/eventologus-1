//Activeer op click
function triggerClick() {
    document.querySelector('#eve_image').click();
}

//Hide masseges
function Hide(HideID)
{
    HideID.style.display = "none";
}

//Image weergeven bij opladen
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector('#display').setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(e.files[0]);
    }
}

//Input veld eve_prijs (min & max) weergeven of disablen bij check 'gratis'
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

// Scroll To Top
$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#goToTop').fadeIn();
        } else {
            $('#goToTop').fadeOut();
        }
    });
    var duration_ms = 800;
    $('#goToTop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1000);
        return false;
    });
});
