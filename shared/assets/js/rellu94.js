

$(".toggleMode span").on("click", function () {
  (Cookies.get("mode")) ? Cookies.remove("mode") : Cookies.set("mode", "dark", { sameSite: ' None', secure: true })
  toggleMode();
});

function toggleMode() {
  if (Cookies.get("mode")) {
    $("body").addClass("dark-mode");
    $(".dark").hide();
    $(".light").show();
    $(".light").css("color", "white");
  } else {
    $("body").removeClass("dark-mode");
    $(".dark").show();
    $(".light").hide();
    $(".dark").css("color", "gray");
  }
}

if (Cookies.get("dismissedCookieBanner")) {
  $(".cookieBanner").hide();
}


toggleMode();


let dismissCookieBanner = () => {
  Cookies.set("dismissedCookieBanner", true, { sameSite: ' None' })
  $(".cookieBanner").hide();
}

async function copyToClipboard(field_name, display_name) {

  let field = document.getElementById(field_name);

  if (field.value) {
    navigator.clipboard.writeText(field.value);
    foliSuccess(display_name + " copied successfully to clipboard!");

    /* For security reasons clear Clipboard after 10sec */
    await delay(10000);
    navigator.clipboard.writeText("");
  }
  else {
    foliWarn("No " + display_name + " generated yet!");
  }
}


/* Credit https://stackoverflow.com/a/9083857 */
function toRoman(number) {
  let num = Math.floor(number),
    val, s = '', i = 0,
    v = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1],
    r = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I'];

  function toBigRoman(n) {
    let ret = '', n1 = '', rem = n;
    while (rem > 1000) {
      let prefix = '', suffix = '', n = rem, s = '' + rem, magnitude = 1;
      while (n > 1000) {
        n /= 1000;
        magnitude *= 1000;
        prefix += '(';
        suffix += ')';
      }
      n1 = Math.floor(n);
      rem = s - (n1 * magnitude);
      ret += prefix + n1.toRoman() + suffix;
    }
    return ret + rem.toRoman();
  }

  if (this - num || num < 1) num = 0;
  if (num > 3999) return toBigRoman(num);

  while (num) {
    val = v[i];
    while (num >= val) {
      num -= val;
      s += r[i];
    }
    ++i;
  }
  return s;
};

/* Credit https://stackoverflow.com/a/9083857 */
function fromRoman(roman) {
  let s = roman.toUpperCase().replace(/ +/g, ''),
    L = s.length, sum = 0, i = 0, next, val,
    R = { M: 1000, D: 500, C: 100, L: 50, X: 10, V: 5, I: 1 };

  function fromBigRoman(rn) {
    let n = 0, x, n1, S, rx = /(\(*)([MDCLXVI]+)/g;

    while ((S = rx.exec(rn)) != null) {
      x = S[1].length;
      n1 = Number.fromRoman(S[2])
      if (isNaN(n1)) return NaN;
      if (x) n1 *= Math.pow(1000, x);
      n += n1;
    }
    return n;
  }

  if (/^[MDCLXVI)(]+$/.test(s)) {
    if (s.indexOf('(') == 0) return fromBigRoman(s);

    while (i < L) {
      val = R[s.charAt(i++)];
      next = R[s.charAt(i)] || 0;
      if (next - val > 0) val *= -1;
      sum += val;
    }
    if (toRoman(sum) === s) return sum;
  }
  return NaN;
};

const DAYS_IN_YEAR = 365;
const MONTH_IN_YEAR = 12;
const HOUR_A_DAY = 24;
const MINUTES_A_HOUR = 60;
const SECONDS_A_MINUTE = 60;
const MILLISECONDS_A_SECOND = 1000;

function allowOnlyNumbers(event) {
  let char = String.fromCharCode(event.which);
  if (!/\d/.test(char)) {
    event.preventDefault();
  }
}

$("#inputTimeNumber").on("input", function () {
  let timeInput = $(this).val().toString();
  if (timeInput.includes(',')) {
    $(this).val(timeInput.replace(',', '.'));
  }
});

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
  let isFuture = false;

  let endDateTimeArray = endDate.split(":");
  let startDateTimeArray = startDate.split(":");

  let hours = endDateTimeArray[0] - startDateTimeArray[0];
  let minutes = endDateTimeArray[1] - startDateTimeArray[1];

  if (minutes < 0) {
    minutes = MINUTES_A_HOUR - Math.abs(minutes);
    hours = hours - 1;
  }

  return { hours, minutes, isFuture };
}



function convertUnixToDate() {
  const input = document.getElementById('inputUnixToDate').value.trim();
  const output = document.getElementById('outputResultUnixToDate');

  if (!input) {
    output.value = "Please enter a Unix Timestamp!";
    return;
  }

  const date = new Date(parseInt(input) * 1000);
  if (isNaN(date.getTime())) {
    output.value = "Invalid Unix Timestamp!";
  } else {
    output.value = date.toUTCString();
  }
}

function convertDateToUnix() {
  const input = document.getElementById('inputDateToUnix').value.trim();
  const output = document.getElementById('outputResultDateToUnix');

  if (!input) {
    output.value = "Please enter a Date!";
    return;
  }

  const date = new Date(input);
  if (isNaN(date.getTime())) {
    output.value = "Invalid Date Format!";
  } else {
    output.value = Math.floor(date.getTime() / 1000);
  }
}

const delay = ms => new Promise(res => setTimeout(res, ms));

function generatePassword() {
  let length = document.getElementById("passwordLength").value,
    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-.,*§$!%&/()=?{[]}",
    password = "";
  for (let i = 0, n = charset.length; i < length; ++i) {
    password += charset.charAt(Math.floor(Math.random() * n));
  }
  $("#password")[0].value = password;
}