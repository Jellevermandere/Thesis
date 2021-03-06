
 <style>
  body {
    font-family: 'Ropa Sans', sans-serif;
    color: #333;
    width: 100%;
    margin: 0 auto;
    position: relative;
  }
  #outputMessage {
    text-align: center;
    background-color: #eee;
  }
  #loadingMessage {
    text-align: center;
    padding: 40px;
    background-color: #eee;
  }

  #canvas {
    width: 100%;
    height: auto;
  }

  #output {
    text-align: center;
    background: #eee;
    padding: 10px;
    padding-bottom: 0;
  }

  #output div {
    padding-bottom: 10px;
    word-wrap: break-word;
  }

  #noQRFound {
    text-align: center;
  }
</style>


<?php  
    $url = "http://";   
    $urls = "https://";    
        // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    $urls.= $_SERVER['HTTP_HOST']; 
        // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    $urls.= $_SERVER['REQUEST_URI'];
  ?> 


  <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
  <div id="output" hidden>
    <div id="outputMessage">Please point your device at a QR code</div>
    <div hidden><b>Data:</b> <span id="outputData"></span></div>
  </div>
  <canvas id="canvas" hidden></canvas>
  

  <script>
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");
    var url = "<?php echo $url?>";
    var urls = "<?php echo $urls?>";

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    

    //Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });
    

    function tick() {
      loadingMessage.innerText = "⌛ Loading video..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;

          if(!(code.data == url || code.data == urls)){
            window.location.href = code.data;
          }
          
        } 
        else {
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
      
    }
    
  </script>