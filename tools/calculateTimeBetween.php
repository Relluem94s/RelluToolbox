<script>
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
    const DAYS_IN_YEAR = 365;
    const MONTH_IN_YEAR = 12;
    const HOUR_A_DAY = 24;
    const MINUTES_A_HOUR = 60;
    const SECONDS_A_MINUTE = 60;
    const MILLISECONDS_A_SECOND = 1000;



    let totalDays = 0
    let years = 0;
    let months = 0;
    let days = 0;
    let isFuture = false;


    endDateTimeArray = endDate.split(":");
    startDateTimeArray = startDate.split(":");

    hours = endDateTimeArray[0] - startDateTimeArray[0];
    minutes = endDateTimeArray[1] - startDateTimeArray[1];

    console.log("eD: " + endDate, "sT: " + startDate, "hS: " + hours, "miS: " + minutes,
      "iF: " + isFuture, "eDA: " + endDateTimeArray, "sDA: " + startDateTimeArray);

    return { hours, minutes, isFuture };
  }
</script>

<input type="time" id="startTime" class="form-control">
<input type="time" id="endTime" class="form-control">
<button onclick="calculateTimeBetween()" class="form-control btn btn-success">Calculate</button>

<p id="resultDateTimeDiff" class="mt-3"></p>
<p id="totalDaysTime"></p>
