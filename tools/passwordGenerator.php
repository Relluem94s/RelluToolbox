<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Password</legend>
                <div class="mb-2">
                    <br>
                    <div class="input-group">
                        <input class="form-control" type="number" step="1" min="12" max="128" value="32" id="passwordLength">
                        <button class="btn btn-success" onclick="generatePassword(), checkPasswordStrength()">
                            <i class="fa-solid fa-gears"></i>
                            Generate</button>
                        <button class="btn btn-primary" onclick="copyToClipboard('password', 'Password')">
                            <i class="fa-solid fa-clipboard"></i>
                            Copy</button>
                    </div>
                    <div class="mt-2">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" disabled>
                        <label for="password_strength">Password Strength:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="password_strength" disabled>
                            <input type="color" class="form-control" id="password_strength_color" disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
