$(function() {
    // Once a barcode had been read successfully, stop quagga and
    // close the modal after a second to let the user notice where
    // the barcode had actually been found.
    Quagga.onDetected(function(result) {
        if (result.codeResult.code){
            $('#scanner_input').val(result.codeResult.code);
            Quagga.stop();
            $('#leitorEan').submit();
            setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);
        }
    });
});