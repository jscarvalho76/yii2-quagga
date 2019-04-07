if(window.location.hash.substr(1,2) == "zx"){
    var bc = window.location.hash.substr(3);
    localStorage["barcode"] = decodeURI(window.location.hash.substr(3))
    window.close();
    self.close();
    window.location.href = "about:blank";//In case self.close isn't allowed
}

var changingHash = false;
function onbarcode(event){
    switch(event.type){
        case "hashchange":{
            if(changingHash == true){
                return;
            }
            var hash = window.location.hash;
            if(hash.substr(0,3) == "#zx"){
                hash = window.location.hash.substr(3);
                changingHash = true;
                window.location.hash = event.oldURL.split("\#")[1] || ""
                changingHash = false;
                processBarcode(hash);
            }

            break;
        }
        case "storage":{
            window.focus();
            if(event.key == "barcode"){
                window.removeEventListener("storage", onbarcode, false);
                processBarcode(event.newValue);
            }
            break;
        }
        default:{
            console.log(event)
            break;
        }
    }
}
window.addEventListener("hashchange", onbarcode, false);

function getScan(){

    var href = window.location.href;

    var ptr = href.lastIndexOf("#");
    if(ptr>0){
        href = href.substr(0,ptr);
    }
    window.addEventListener("storage", onbarcode, false);
    setTimeout('window.removeEventListener("storage", onbarcode, false)', 15000);
    localStorage.removeItem("barcode");
    //window.open  (href + "#zx" + new Date().toString());barcode

    if(navigator.userAgent.match(/Firefox/i)){
        //Used for Firefox. If Chrome uses this, it raises the "hashchanged" event only.
        //window.location.href =  ("http://zxing.appspot.com/scan?ret=" + encodeURIComponent(href + "#zx{CODE}"));
        window.open   ("zxing://scan/?ret=" + encodeURIComponent(href + "#zx{CODE}"));
    }else{
        //Used for Chrome. If Firefox uses this, it leaves the scan window open.
        window.open   ("zxing://scan/?ret=" + encodeURIComponent(href + "#zx{CODE}"));
        //window.open   ("http://zxing.appspot.com/scan?ret=" + encodeURIComponent(href + "#zx{CODE}"));
    }
}

/**
 * @function isMobile
 * detecta se o useragent e um dispositivo mobile
 */
function isMobile()
{
    var userAgent = navigator.userAgent.toLowerCase();
    if( userAgent.search(/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i)!= -1 )
        return true;
}

function processBarcode(bc){
    document.getElementById(dataQuagga.input).value = bc;
    if(dataQuagga.submit)
        $('#' + dataQuagga.id ).submit();
    //document.getElementById("formLeitor").submit();
    //put your code in place of the line above.
}

