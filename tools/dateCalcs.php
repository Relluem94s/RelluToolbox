<fieldset>
  <legend>Get Time Since:</legend>
  <br>
  <label for="inputDate">Enter a date (YYYY-MM-DD):</label>
  <div class="input-group">
    <input type="date" id="inputDate" class="form-control">
    <button onclick="calculateTimeSince()" class="form-control btn btn-success">Calculate</button>
  </div>

  <p id="resultDateDiff" class="mt-3"></p>
  <p id="totalDays"></p>

</fieldset>

<fieldset>
  <legend>Get Time Difference:</legend>
  <br>
  <input type="time" id="startTime" class="form-control">
  <input type="time" id="endTime" class="form-control">
  <button onclick="calculateTimeBetween()" class="form-control btn btn-success">Calculate</button>

  <p id="resultDateTimeDiff" class="mt-3"></p>
  <p id="totalDaysTime"></p>
</fieldset>

<fieldset>
  <legend>Number to Time:</legend>
  <br>
  <input type="text" id="inputTimeNumber" class="form-control" placeholder="Time in Decimal e.g. 0,6">
  <div class="input-group">
    <input type="number" id="outputTimeHours" step="1" disabled class="form-control" placeholder="Hours">
    <input type="number" id="outputTimeMinutes" step="1" disabled class="form-control" placeholder="Minutes">
  </div>
  <button onclick="calculateTimeFromNumber()" class="form-control btn btn-success">Calculate</button>
</fieldset>

<fieldset>
  <legend>Time to Number:</legend>
  <br>
  <input type="number" id="inputHours" step="1" class="form-control" placeholder="Hours">
  <input type="number" id="inputMinutes" step="1" class="form-control" placeholder="Minutes">

  <input type="number" id="outputTimeNumber" step="0.1" disabled class="form-control"
    placeholder="Time in Decimal e.g. 0.6">

  <button onclick="calculateNumberFromTime()" class="form-control btn btn-success">Calculate</button>
</fieldset>


<script>
  const DAYS_IN_YEAR = 365;
  const MONTH_IN_YEAR = 12;
  const HOUR_A_DAY = 24;
  const MINUTES_A_HOUR = 60;
  const SECONDS_A_MINUTE = 60;
  const MILLISECONDS_A_SECOND = 1000;

  function allowOnlyNumbers(event) {
    let char = String.fromCharCode(event.which);
    if (!/[0-9]/.test(char)) {
      event.preventDefault();
    }
  }

  $("#inputTimeNumber").on("input", function () {
    let timeInput = $(this).val().toString();
    if (timeInput.includes(',')) {
      $(this).val(timeInput.replace(',', '.'));
    }
  });


  $("#inputHours").on("keypress", allowOnlyNumbers);
  $("#inputMinutes").on("keypress", allowOnlyNumbers);


  function calculateNumberFromTime() {
    let hours = parseFloat($('#inputHours').val()) || 0;
    let minutes = parseFloat($('#inputMinutes').val()) || 0;

    let decimalTime = hours + (minutes / MINUTES_A_HOUR);

    $('#outputTimeNumber').val(decimalTime.toFixed(2));
  }

  function calculateTimeFromNumber() {
    let time = $("#inputTimeNumber").val() || 0;

    let hours = Math.floor(time);
    let minutes = Math.round((time - hours) * MINUTES_A_HOUR);

    if (minutes === MINUTES_A_HOUR) {
      hours += 1;
      minutes = 0;
    }

    $('#outputTimeHours').val(hours);
    $('#outputTimeMinutes').val(minutes);
  }

  function calculateTimeSince() {
    let inputDateValue = $("#inputDate").val();

    if (!inputDateValue) {
      $("#totalDays").text("Please enter a date.")
      return;
    }

    let inputDate = new Date(inputDateValue);

    let { years, months, days, totalDays, isFuture } = getTimeSince(inputDate);

    if (isFuture) {
      $("#resultDateDiff").text("The date is in the future!");
      $("#totalDays").text("");
    } else {
      $("#resultDateDiff").text(`Before ${years} years, ${months} months, and ${days} days`);
      $("#totalDays").text(`Total days elapsed: ${totalDays}`);
    }
  }

  function getTimeSince(date) {
    let now = new Date();
    let timeDiff = now - date;
    let totalDays = Math.floor(timeDiff / (MILLISECONDS_A_SECOND * SECONDS_A_MINUTE * MINUTES_A_HOUR * HOUR_A_DAY));
    let isFuture = false;
    let years = 0;
    let months = 0;
    let days = totalDays;

    if (timeDiff < 0) {
      isFuture = true;
      return { years: 0, months: 0, days: 0, totalDays: 0, isFuture };
    }

    while (days >= DAYS_IN_YEAR) {
      years++;
      days = days - DAYS_IN_YEAR
    }

    while (days >= DAYS_IN_YEAR / MONTH_IN_YEAR) {
      months++;
      days = Math.floor(days - (DAYS_IN_YEAR / MONTH_IN_YEAR))
    }

    return { years, months, days, totalDays, isFuture };
  }

  function calculateTimeBetween() {
    let startTimeValue = $("#startTime").val();
    let endTimeValue = $("#endTime").val();

    if (!startTimeValue || !endTimeValue) {
      $("#totalDaysTime").text("Please enter a Time.")
      return;
    }

    if (startTimeValue > endTimeValue) {
      $("#totalDaysTime").text("Please Change the Order")
      return;
    }

    let startTime = new Date(startTimeValue);
    let endTime = new Date(endTimeValue);

    let { hours, minutes, isFuture } = getTimeBetween(startTimeValue, endTimeValue);

    if (isFuture) {
      $("#resultDateTimeDiff").text("The date is in the future!");
      $("#totalDaysTime").text("");
    } else {
      $("#resultDateTimeDiff").text(
        `Difference ${hours} hours,  ${minutes} minutes`
      );
      $("#totalDaysTime").text("");
    }
  }

  function getTimeBetween(startDate, endDate) {
    let totalDays = 0
    let years = 0;
    let months = 0;
    let days = 0;
    let isFuture = false;


    endDateTimeArray = endDate.split(":");
    startDateTimeArray = startDate.split(":");

    hours = endDateTimeArray[0] - startDateTimeArray[0];
    minutes = endDateTimeArray[1] - startDateTimeArray[1];

    if (minutes < 0) {
      minutes = MINUTES_A_HOUR - Math.abs(minutes);
      hours = hours - 1;
    }

    return { hours, minutes, isFuture };
  }
</script>
