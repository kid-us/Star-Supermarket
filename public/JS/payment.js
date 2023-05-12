// phone with flag indicator
let phoneInput = document.querySelector("#phone-flag");
intlTelInput(phoneInput, {
  initialCountry: "auto",
  geoIpLookup: function (success, failure) {
    $.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
      let countryCode = resp && resp.country ? resp.country : "us";
      success(countryCode);
    });
  },
});
// 

$("#country_selector").countrySelect();
$("#country_selector").countrySelect({
    defaultCountry: "us"
  });