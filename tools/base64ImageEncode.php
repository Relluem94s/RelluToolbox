<input class="form-control btn, btn-info" type="file" id="imageInput" />
<textarea disabled class="form-control" id="image_output"></textarea>

<button class="btn btn-primary" onclick="copyToClipboard('image_output', 'Image')">
    <i class="fa-solid fa-clipboard"></i>
    Copy
</button>
 <script>
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