<textarea class="form-control" id="image_input"></textarea>
<br><br>
<button class="btn btn-success" onclick="setImage()"><i class="fa-solid fa-gears"></i> Generate</button>
<br><br>
<img id="image_output_image" style="display:none;" width="100%" alt="Generated Image">
<script>
    function setImage(){
        $("#image_output_image")[0].src = $("#image_input")[0].value
        $("#image_output_image")[0].style.display="block";
    }
</script>
