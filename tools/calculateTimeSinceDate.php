<label for="inputDate">Enter a date (YYYY-MM-DD):</label>
  <input type="date" id="inputDate" class="form-control">
  <button onclick="calculateTimeSince()" class="form-control btn btn-success">Calculate</button>
  <p id="result" class="mt-3"></p>
  <p id="totalDays"></p>

  <script>
    function calculateTimeSince() {
      let inputDateElement = document.getElementById("inputDate");
      let inputDateValue = inputDateElement.value;

      if (!inputDateValue) {
        alert("Please enter a date.");
        return;
      }

      let inputDate = new Date(inputDateValue);
      let resultElement = document.getElementById("result");
      let totalDaysElement = document.getElementById("totalDays");

      let { years, months, days, totalDays, isFuture } = getTimeSince(inputDate);
      
      if (isFuture) {
        resultElement.textContent = "The date is in the future!";
        totalDaysElement.textContent = "";
      } else {
        resultElement.textContent = `Before ${years} years, ${months} months, and ${days} days`;
        totalDaysElement.textContent = `Total days elapsed: ${totalDays}`;
      }
    }

    function getTimeSince(date) {
      let now = new Date();
      let timeDiff = now - date;

      if (timeDiff < 0) {
        let seconds = Math.floor(timeDiff / 1000);
        let minutes = Math.floor(seconds / 60);
        let hours = Math.floor(minutes / 60);
        let days = Math.floor(hours / 24);
        let isFuture = true;

        return { years: 0, months: 0, days, totalDays: 0, isFuture };
      }

      let seconds = Math.floor(timeDiff / 1000);
      let minutes = Math.floor(seconds / 60);
      let hours = Math.floor(minutes / 60);
      let days = Math.floor(hours / 24);
      let months = Math.floor(days / 30);
      let years = Math.floor(days / 365);
      let totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      let isFuture = false;

      return { years, months, days: days - months * 30, totalDays, isFuture };
    }
  </script>