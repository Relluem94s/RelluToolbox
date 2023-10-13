<input type="datetime-local" id="startDate" class="form-control">
<input type="datetime-local" id="endDate" class="form-control">
<button onclick="calculateTimeBetween()" class="form-control btn btn-success">Calculate</button>

<p id="resultDateTimeDiff" class="mt-3"></p>
<p id="totalDaysTime"></p>

<script>
  function calculateTimeBetween() {
    let startDateValue = $("#startDate").val();
    let endDateValue = $("#endDate").val();

    if (!startDateValue || !endDateValue) {
      $("#totalDaysTime").text("Please enter a date.")
      return;
    }

    if (startDateValue > endDateValue) {
      $("#totalDaysTime").text("Please Change the Order")
      return;
    }

    let startDate = new Date(startDateValue);
    let endDate = new Date(endDateValue);

    let { years, months, days, hours, minutes, totalDays, isFuture } = getTimeBetween(startDateValue, endDateValue);

    if (isFuture) {
      $("#resultDateTimeDiff").text("The date is in the future!");
      $("#totalDaysTime").text("");
    } else {
      $("#resultDateTimeDiff").text(
        `Difference ${years} years, ${months} months, ${days} days,  ${hours} hours,  ${minutes} minutes`
        );
      $("#totalDaysTime").text(`Total days elapsed: ${totalDays}`);
    }
  }

  function getTimeBetween(startDate, endDate) {
    const DAYS_IN_YEAR = 365;
    const MONTH_IN_YEAR = 12;
    const HOUR_A_DAY = 24;
    const MINUTES_A_HOUR = 60;
    const SECONDS_A_MINUTE = 60;
    const MILLISECONDS_A_SECOND = 1000;

    endDateArray = endDate.split("T");
    startDateArray = startDate.split("T");

    let totalDays = 0
    let years = 0;
    let months = 0;
    let days = 0;
    let isFuture = false;


    if(endDateArray[0] != startDateArray[0]){
      let timeDiff = new Date(endDateArray[0]) - new Date(startDateArray[0]);
      totalDays = Math.floor(timeDiff / (MILLISECONDS_A_SECOND * SECONDS_A_MINUTE * MINUTES_A_HOUR * HOUR_A_DAY));
      isFuture = false;
      years = 0;
      months = 0;
      days = totalDays;

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
    }

   

    endDateTimeArray = endDateArray[1].split(":");
    startDateTimeArray = startDateArray[1].split(":");

    hours = endDateTimeArray[0] - startDateTimeArray[0];
    minutes = endDateTimeArray[1] - startDateTimeArray[1];

    console.log("eD: " + endDate, "sT: " + startDate, "yS: " + years, "mS: " + months,
    "dS: " + days, "hS: " + hours, "miS: " + minutes, "tD: " + totalDays,
    "iF: " + isFuture, "eDA: " + endDateArray, "sDA: " + startDateArray);
    
    return { years, months, days, hours, minutes, totalDays, isFuture };
  }
</script>
