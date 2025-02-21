<div class="container">
  <div class="row row-cols-1 row-cols-md-2 g-3">
    
    <div class="col">
      <fieldset class="fieldset-card">
        <legend class="fieldset-legend">Number to Time:</legend>
        <input type="text" id="inputTimeNumber" class="form-control" placeholder="Time in Decimal e.g. 0,6">
        <button onclick="calculateTimeFromNumber()" class="form-control btn btn-success">Calculate</button>
        <div class="input-group">
          <input type="number" id="outputTimeHours" step="1" disabled class="form-control" placeholder="Hours">
          <input type="number" id="outputTimeMinutes" step="1" disabled class="form-control" placeholder="Minutes">
        </div>
      </fieldset>
    </div>

    <div class="col">
      <fieldset class="fieldset-card">
        <legend class="fieldset-legend">Time to Number:</legend>
        <input type="number" id="inputHours" step="1" class="form-control" placeholder="Hours">
        <input type="number" id="inputMinutes" step="1" class="form-control" placeholder="Minutes">

        <button onclick="calculateNumberFromTime()" class="form-control btn btn-success">Calculate</button>

        <input type="number" id="outputTimeNumber" step="0.1" disabled class="form-control"
          placeholder="Time in Decimal e.g. 0.6">

      </fieldset>
    </div>

    <div class="col">
      <fieldset class="fieldset-card">
        <legend class="fieldset-legend">Unix Time to Date:</legend>
        <br>
        <input type="number" id="inputUnixToDate" step="1" class="form-control"
          placeholder="Unix Time (e.g. 1708459200)">
        <button onclick="convertUnixToDate()" class="form-control btn btn-success mt-2">Calculate</button>
        <input type="text" id="outputResultUnixToDate" disabled class="form-control" placeholder="Result">
      </fieldset>
    </div>

    <div class="col">
      <fieldset class="fieldset-card">
        <legend class="fieldset-legend">Date to Unix Time:</legend>
        <br>
        <input type="date" id="inputDateToUnix" class="form-control" placeholder="Date (e.g. 2025-02-20)">
        <button onclick="convertDateToUnix()" class="form-control btn btn-success mt-2">Calculate</button>
        <input type="text" id="outputResultDateToUnix" disabled class="form-control" placeholder="Result">
      </fieldset>
    </div>
  </div>
</div>

<script>
  $("#inputHours").on("keypress", allowOnlyNumbers);
  $("#inputMinutes").on("keypress", allowOnlyNumbers);
</script>