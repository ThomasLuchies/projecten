const adressInformationButton = document.getElementById("adressInformationButton");
const orderOverviewButton = document.getElementById("orderOverviewButton");
const paymentButton = document.getElementById("paymentButton");
const fieldsArray = Array("firstName", "lastName", "streetName", "houseNumber", "zipCode", "city");
let page;

function getPage()
{
  page = parseInt(window.location.search.split("=")[1]);
  switch(page)
  {
    case 1:
      adressInformationButton.style.backgroundColor = "black";
      adressInformationButton.children[0].style.color = "white";
      break;
    case 2:
      orderOverviewButton.style.backgroundColor = "black";
      orderOverviewButton.children[0].style.color = "white";
      break;
    case 3:
      paymentButton.style.backgroundColor = "black";
      paymentButton.children[0].style.color = "white";
      break;
  }
  console.log(adressInformationButton.dataset.screen);
}

function updateScreen(screen)
{

}

getPage();
