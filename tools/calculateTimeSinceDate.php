<label for="inputDate">Enter a date (YYYY-MM-DD):</label>
<div class="input-group">
  <input type="date" id="inputDate" class="form-control">
  <button onclick="calculateTimeSince()" class="form-control btn btn-success">Calculate</button>
</div>

<p id="resultDateDiff" class="mt-3"></p>
<p id="totalDays"></p>

<script>
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
    const DAYS_IN_YEAR = 365;
    const MONTH_IN_YEAR = 12;
    const HOUR_A_DAY = 24;
    const MINUTES_A_HOUR = 60;
    const SECONDS_A_MINUTE = 60;
    const MILLISECONDS_A_SECOND = 1000;

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
    
    while(days >= DAYS_IN_YEAR){
        years++;
        days = days - DAYS_IN_YEAR
    }

    while (days >= DAYS_IN_YEAR/MONTH_IN_YEAR){
        months++;
        days = Math.floor(days - (DAYS_IN_YEAR/MONTH_IN_YEAR))
    }
    
    return { years, months, days, totalDays, isFuture };
  }
</script>
