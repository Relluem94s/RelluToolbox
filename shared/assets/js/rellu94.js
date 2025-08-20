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

function checkPasswordStrength() {
  const password = $("#password")[0].value;
  const hasLength = password.length >= 16;
  const hasUpper = /[A-Z]/.test(password);
  const hasLower = /[a-z]/.test(password);
  const hasNumber = /\d/.test(password);
  const hasSpecial = /[!@#$%^&*]/.test(password);

  let strength = [hasLength, hasUpper, hasLower, hasNumber, hasSpecial].filter(Boolean).length;

  if (password.length < 6) {
    strength = 0;
  }
  else if (password.length < 8) {
    strength = Math.min(strength, 1);
  } else if (password.length < 12) {
    strength = Math.min(strength, 2);
  }
  if (hasLength) {
    strength += 1;
  }

  const colors = {
    0: '#E33B2E',
    1: '#f37D00',
    2: '#F6ED18',
    3: '#D4FF00',
    4: '#98D801',
    5: '#32CD32',
    6: '#008000'
  };

  $("#password_strength")[0].value = strength;
  $("#password_strength_color")[0].value = colors[strength];
}


function asciiConverter() {
  let asciiOutput = document.getElementById("asciiOutput");
  let input = document.getElementById("asciiInput").value;
  if (/^\d+$/.test(input)) {
    asciiOutput.value = String.fromCharCode(parseInt(input));
  }
  else if (input.length === 1) {
    asciiOutput.value = input.charCodeAt(0);
  }
  else {
    asciiOutput.value = "Enter Char or Int";
  }
}


function urlEncode() {
  let urlEncodeOutput = document.getElementById("urlEncodeOutput");
  let urlEncodeInput = document.getElementById("urlEncodeInput").value;

  urlEncodeOutput.value = encodeURIComponent(urlEncodeInput)
}

function urlDecode() {
  let urlDecodeOutput = document.getElementById("urlDecodeOutput");
  let urlDecodeInput = document.getElementById("urlDecodeInput").value;

  urlDecodeOutput.value = decodeURIComponent(urlDecodeInput)
}

/* STOCK DATA APP */

function fetchStockData() {
  const symbol = document.getElementById('symbol').value;
  const quantity = parseInt(document.getElementById('quantity').value);
  const portfolioList = document.getElementById('portfolioList');
  fetch(`tools/stockApp/getStockData.php?symbol=${symbol}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        throw new Error(data.error);
      }

      const stockPrice = parseFloat(data.stockPrice);
      const totalValue = stockPrice * quantity;

      const stockItem = document.createElement('div');
      stockItem.className = 'stock-item';
      stockItem.innerHTML = `<p>
                <strong class="text-primary">${symbol}</strong> -
                <strong>Amount:</strong> ${quantity} -
                <strong>Price:</strong> $${stockPrice.toFixed(2)} -
                <strong>Total:</strong> $${totalValue.toFixed(2)}
                </p>`;
      portfolioList.appendChild(stockItem);
    })
    .catch(error => {
      console.error(error);
      foliError('Error retrieving the Stock data. Please try again later.');
    });
}


/* WEATHER APP */

function fetchWeatherData() {
  const city = document.getElementById('city').value;
  fetch(`tools//weatherApp/getWeather.php?city=${city}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById('weatherInfo').innerHTML = "<br><br>" + data;
      updateTemperatureColor();
    })
    .catch(error => {
      foliError('Error retrieving the Weather data. Please try again later.');
      console.error(error);
    });
}

function updateTemperatureColor() {
  const temperatureElement = document.querySelector('p.temperature');
  temperatureElement.style.fontWeight = "750";

  const temperatureText = temperatureElement.textContent;

  const normalizedTemperatureText = temperatureText.replace(/[^\d.,-]/g, '').replace(',', '.');

  const temperature = parseFloat(normalizedTemperatureText);

  if (temperature < 0) {
    temperatureElement.style.color = 'turquoise';
  } else if (temperature < 10) {
    temperatureElement.style.color = 'blue';
  } else if (temperature < 20) {
    temperatureElement.style.color = 'orange';
  } else {
    temperatureElement.style.color = 'red';
  }
}

async function getMetarData() {

  let icao = document.getElementById("icao").value

  const response = await fetch("https://api.aviationapi.com/v1/weather/metar?apt=" + icao.toUpperCase(), { mode: 'no-cors' });
  const data = await response.json();

  let object = Object.values(data);

  let altitude = object[0]['alt_hg'];
  let dewpoint = object[0]['dewpoint'];
  let raw = object[0]['raw'];
  let temperature = object[0]['temp'];
  let updated = object[0]['time_of_obs'];
  let visibility = object[0]['visibility'];
  let wind = object[0]['wind'];
  let windVel = object[0]['wind_vel'];
  let skyConditions = object[0]['sky_conditions'][0]['coverage'];


  const metarData = document.getElementById("metarData");

  metarData.innerHTML = `<p>
            <h4><b>Raw:</b> ${raw} </h4></br>
            <b>Report Time:</b> ${updated} </br>
            <b>Altimeter:</b> ${altitude} </br>
            <b>Temperature/Dewpoint</b> ${temperature}°C / ${dewpoint}°C</br>
            <b>Visibility:</b> ${visibility} statue miles </br>
            <b>Wind:</b> ${wind} degrees @ ${windVel} knots</br>
            <b>Sky Conditions:</b> ${skyConditions} </br>
            </p>`;
}


/* Stop Timer */

var ctxClass = window.audioContext || window.AudioContext || window.AudioContext || window.webkitAudioContext
var ctx = new ctxClass();

const beep = (function () {

  return function (finishedCallback) {

    let duration = 500;

    if (typeof finishedCallback != "function") {
      finishedCallback = function () { };
    }

    let osc = ctx.createOscillator();
    let gainNode = ctx.createGain();

    gainNode.connect(ctx.destination);

    gainNode.gain.value = 1;

    osc.connect(gainNode);

    osc.type = "square";

    osc.connect(ctx.destination);
    if (osc.noteOn) osc.noteOn(0); // old browsers
    if (osc.start) osc.start(); // new browsers

    setTimeout(function () {
      if (osc.noteOff) osc.noteOff(0); // old browsers
      if (osc.stop) osc.stop(); // new browsers
      finishedCallback();
    }, duration);

  };
})();


function startStopTimer() {
  let countDownDate = new Date();
  let offset = parseInt($('#stopTimerValue')[0].value);

  if (offset < 1) {
    document.getElementById("displayStopTime").innerHTML = "Invalid Number";
    return;
  }

  countDownDate.setMinutes(countDownDate.getMinutes() + offset);

  let x = setInterval(function () {
    let now = new Date().getTime();

    let distance = countDownDate - now;

    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("displayStopTime").innerHTML = hours + "h "
      + minutes + "m " + seconds + "s ";

    if (distance < 0) {
      clearInterval(x);
      beep();
      document.getElementById("displayStopTime").innerHTML = "Expired";
    }
  }, 1000);


}

function getTypeSchema(value) {
  if (value === null || value === undefined) return { type: "null" };
  
  const type = typeof value;
  if (type !== "object") return { type };
  
  if (Array.isArray(value)) {
    return { 
      type: "array", 
      items: value.length > 0 ? getTypeSchema(value[0]) : {}
    };
  }
  
  const nestedSchema = { type: "object", properties: {}, required: [] };
  for (const [key, val] of Object.entries(value)) {
    nestedSchema.properties[key] = getTypeSchema(val);
    if (val !== null && val !== undefined) nestedSchema.required.push(key);
  }
  return nestedSchema;
}

function generateJsonSchema(json = null) {
  let inputJson = json;
  let jsonSchema = document.getElementById('jsonSchemaGenOutput');
  
  if (inputJson === null) {
    const jsonElement = document.getElementById('jsonSchemaGenInput');
    let inputStr = jsonElement.value.trim();
    if (!inputStr) {
      jsonSchema.value = '';
      return { type: "object", properties: {}, required: [] };
    }
    
    inputStr = inputStr.replace(/(\w+):/g, '"$1":');
    
    try {
      inputJson = JSON.parse(inputStr);
    } catch (e) {
      jsonSchema.value = 'Error: Invalid JSON input - ' + e.message;
      return { type: "object", properties: {}, required: [] };
    }
  }

  const schema = getTypeSchema(inputJson);
  jsonSchema.value = JSON.stringify(schema, null, 2);
  return schema;
}
