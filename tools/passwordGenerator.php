<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <div class="mb-2">
                    <br>
                    <div class="input-group">
                        <input class="form-control" type="number" step="1" min="12" max="128" value="32" id="passwordLength">
                        <button class="btn btn-success" onclick="generatePassword()">
                            <i class="fa-solid fa-gears"></i>
                            Generate</button>
                        <button class="btn btn-primary" onclick="copyToClipboard('password', 'Password')">
                            <i class="fa-solid fa-clipboard"></i>
                            Copy</button>
                    </div>
                    <div class="mt-2">
                        <input type="text" class="form-control" id="password" disabled>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
