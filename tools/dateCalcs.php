<div class="container">
  <div class="row row-cols-1">
    <div class="col">
      <fieldset class="fieldset-card">
        <legend class="fieldset-legend">Get Time Since:</legend>
        <div class="input-group">
          <input type="date" id="inputDate" class="form-control">
          <button onclick="calculateTimeSince()" class="form-control btn btn-success">Calculate</button>
        </div>

        <p id="resultDateDiff" class="mt-3"></p>
        <p id="totalDays"></p>

      </fieldset>
    </div>

    <div class="col">
      <fieldset class="fieldset-card">
        <legend class="fieldset-legend">Get Time Difference:</legend>
        <input type="time" id="startTime" class="form-control">
        <input type="time" id="endTime" class="form-control">
        <button onclick="calculateTimeBetween()" class="form-control btn btn-success">Calculate</button>

        <p id="resultDateTimeDiff" class="mt-3"></p>
        <p id="totalDaysTime"></p>
      </fieldset>
    </div>
  </div>
</div>
