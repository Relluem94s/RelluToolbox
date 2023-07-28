<label for="inputDate">Enter a date (YYYY-MM-DD):</label>
  <input type="date" id="inputDate" class="form-control">
  <button onclick="calculateTimeSince()" class="form-control btn btn-success">Calculate</button>
  <p id="result" class="mt-3"></p>
  <p id="totalDays"></p>

  <script>
    function calculateTimeSince() {
      const inputDateElement = document.getElementById("inputDate");
      const inputDateValue = inputDateElement.value;

      if (!inputDateValue) {
        alert("Please enter a date.");
        return;
      }

      const inputDate = new Date(inputDateValue);
      const resultElement = document.getElementById("result");
      const totalDaysElement = document.getElementById("totalDays");

      const { years, months, days, totalDays, isFuture } = getTimeSince(inputDate);
      
      if (isFuture) {
        resultElement.textContent = "The date is in the future!";
        totalDaysElement.textContent = "";
      } else {
        resultElement.textContent = `Before ${years} years, ${months} months, and ${days} days`;
        totalDaysElement.textContent = `Total days elapsed: ${totalDays}`;
      }
    }

    function getTimeSince(date) {
      const now = new Date();
      const timeDiff = now - date;

      if (timeDiff < 0) {
        const seconds = Math.floor(timeDiff / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);
        const isFuture = true;

        return { years: 0, months: 0, days, totalDays: 0, isFuture };
      }

      const seconds = Math.floor(timeDiff / 1000);
      const minutes = Math.floor(seconds / 60);
      const hours = Math.floor(minutes / 60);
      const days = Math.floor(hours / 24);
      const months = Math.floor(days / 30);
      const years = Math.floor(days / 365);
      const totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      const isFuture = false;

      return { years, months, days: days - months * 30, totalDays, isFuture };
    }
  </script>