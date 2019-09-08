<html>
  <head>
    <link rel="stylesheet" href="/css/style.css">
    <style>
    @media print {
      html, body {
        width: 210mm;
        height: 297mm;
        margin: 0;
        padding: 0;
      }
      a, p {
        display: none;
      }
      canvas {
        border: 0 !important;
      }
    }
    </style>
  </head>
  <body>
    <div id="id-wrapper">
      <img id="photo-id" src="/storage/uploads/{{ $member->photo }}">
      <div id="your_id">{{ sprintf("%'.06d\n", $member->id ) }}</div>
      <div id="your_name">{{ $member->name }}</div>
      <div id="your_aff">{{ $member->affiliation }}</div>
      <!-- <div id="your_contact_number">{{ $member->contact_number }}</div> -->
      <div id="results"></div>

      <div id="signature-pad" class="m-signature-pad">
        <div class="m-signature-pad--body">
          <canvas style="border: 2px dashed #04dd7f; position: absolute; top: 204px; width: 177px; height: 50px;"></canvas>
        </div>

        <div class="m-signature-pad--footer">
          <p>Add your signature in the box.</p>
          <a href="/members">Back</a>
          <a href="#" onclick="window.print();">Print</a>
          <a href="#" data-action="clear">Clear</a>
        </div>
      </div>
    </div>


    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js?ver=1.7.2'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script>
    $(function () {
      var wrapper = document.getElementById("signature-pad"),
          clearButton = wrapper.querySelector("[data-action=clear]"),
          canvas = wrapper.querySelector("canvas"),
          signaturePad;

      // Adjust canvas coordinate space taking into account pixel ratio,
      // to make it look crisp on mobile devices.
      // This also causes canvas to be cleared.
      window.resizeCanvas = function () {
        var ratio =  window.devicePixelRatio || 0.5;
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
      }

      resizeCanvas();

      signaturePad = new SignaturePad(canvas);
      signaturePad.minWidth = 0.1;

      clearButton.addEventListener("click", function(event) {
        signaturePad.clear();
      });
      });


    </script>

  </body>
</html>
