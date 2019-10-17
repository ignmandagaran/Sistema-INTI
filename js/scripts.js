var provincia_select = document.getElementById("provincia-select");
provincia_select.addEventListener("change", getLocalidadSelectList);
                  
function getLocalidadSelectList(){
    var provincia_select = document.getElementById("provincia-select");
    var provincia_id = provincia_select.options[provincia_select.selectedIndex].value;
    //console.log('ProvinciaId : ' + provincia_id);

    var xhr = new XMLHttpRequest();
    var url = 'vendor/php/ajax/localidad.php?provincia_id=' + provincia_id;
    // open function
    xhr.open('GET', url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
    // check response is ready with response states = 4
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var text = xhr.responseText;
            console.log('response from provincias.php : ' + xhr.responseText);
            var localidad_select = document.getElementById("localidad-select");
            localidad_select.innerHTML = text;
            localidad_select.style.display='inline';
        }

    }
    xhr.send();
}