let id = $('.interactive').attr('id');

Quagga.init({
    inputStream : {
        name : "Live",
        type : "LiveStream",
        constraints: {
            facingMode: "environment",
            aspectRatio: {min: 2, max: 4},
            width: 320,
        },
        target: document.querySelector('#'+id)    // Or '#yourElement' (optional)
    },
    locator: {
        patchSize: "medium",
        halfSample: true
    },
    locate: true,
    decoder : {
        readers : ["ean_reader", "upc_reader"]
    }
}, function(err) {
    if (err) {
        console.log(err);
        return
    }
    console.log("Initialization finished. Ready to start");

    Quagga.start();
});


Quagga.onProcessed(function(result) {
    var drawingCtx = Quagga.canvas.ctx.overlay,
        drawingCanvas = Quagga.canvas.dom.overlay;

    if (result) {
        if (result.boxes) {
            drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
            result.boxes.filter(function (box) {
                return box !== result.box;
            }).forEach(function (box) {
                Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
            });
        }

        if (result.box) {
            Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
        }

        if (result.codeResult && result.codeResult.code) {
            Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
        }
    }
});


