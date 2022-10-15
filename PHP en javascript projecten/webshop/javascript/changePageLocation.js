let currentLocationCookie = getCookieByName("currentLocation");
const currentLocation = document.getElementById("location");

currentLocation.innerHTML = currentLocation.innerHTML + " " + currentLocationCookie.replaceAll("%20", " ").toUpperCase();
