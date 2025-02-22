<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-3">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">String to Base64</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="String" type="text" class="form-control" id="original_decoded_string"
                            oninput="$('#encoded_output_string')[0].value=btoa($('#original_decoded_string')[0].value);">
                    </div>
                    <div class="mt-2">
                        <input placeholder="Base64 Encoded" type="text" class="form-control" id="encoded_output_string"
                            disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Base64 to String</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="Base64 Encoded" type="text" class="form-control"
                            id="original_encoded_string"
                            oninput="$('#decoded_output_string')[0].value=atob($('#original_encoded_string')[0].value);">
                    </div>
                    <div class="mt-2">
                        <input placeholder="String" type="text" class="form-control" id="decoded_output_string"
                            disabled>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>


<div class="container">
    <div class="row row-cols-1">

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Image to Base64</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input class="form-control btn, btn-info" type="file" id="imageInput" />
                        <button class="btn btn-primary" onclick="copyToClipboard('image_output', 'Image')">
                            <i class="fa-solid fa-clipboard"></i>
                            Copy
                        </button>
                    </div>
                    <div class="mt-2">
                        <textarea disabled class="form-control" id="image_output"></textarea>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Base64 to Image</legend>
                <div class="mb-2">
                    <textarea class="form-control" id="image_input"></textarea>
                    <button class="btn btn-success" onclick="setImage()"><i class="fa-solid fa-gears"></i>
                        Generate</button>
                    <div class="mt-2">
                        <img id="image_output_image" style="display:none;" alt="Base64" width="100%"
                            alt="Generated Image">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>



<script>
    function setImage(){
        $("#image_output_image")[0].src = $("#image_input")[0].value
        $("#image_output_image")[0].style.display="block";
    }

    document.getElementById('imageInput').addEventListener('change', function (event) {
   var file = event.target.files[0];
   if (file) {
     var reader = new FileReader();

     reader.onload = function (readerEvent) {
     var base64String = readerEvent.target.result;
     $("#image_output")[0].value=base64String;
   }
   reader.readAsDataURL(file);
   }
 });
</script>


