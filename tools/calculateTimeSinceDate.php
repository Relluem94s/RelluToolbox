<label for="inputDate">Enter a date (YYYY-MM-DD):</label>
  <input type="date" id="inputDate" class="form-control">
  <button onclick="calculateTimeSince()" class="form-control btn btn-success">Calculate</button>
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
      let now = new Date();
      let timeDiff = now - date;

      
      let seconds = Math.floor(timeDiff / 1000);
      let minutes = Math.floor(seconds / 60);
      let hours = Math.floor(minutes / 60);
      let days = Math.floor(hours / 24);
      
      if (timeDiff < 0) {
        let isFuture = true;
        return { years: 0, months: 0, days, totalDays: 0, isFuture };
      }
      
      let months = Math.floor(days / 30);
      let years = Math.floor(days / 365);
      let totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      let isFuture = false;

      return { years, months, days: days - months * 30, totalDays, isFuture };
    }
  </script>