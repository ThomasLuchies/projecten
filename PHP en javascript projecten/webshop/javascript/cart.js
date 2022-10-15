const menuCartHover = document.getElementById("menuCartHover");
const menuCart = document.getElementById("menuCart");
const cartAmount = document.getElementById("cartAmount");
let currentProductId = getCookieByName("currentProduct");
const noSizeSelectedNotice = document.getElementById("noSizeSelectedNotice");
const subTotalNumber = document.getElementById("subTotalNumber");
const purchaseButton = document.getElementById("purchaseButton");
const closeButton = document.getElementById("close");
let div = null;
let currentProductsInCartCookie;
let productCount = 1;
let productName;
let productPrice;
let productImg;
let totalProductsInCart;
let productSize;
let subTotal;

menuCart.addEventListener('click', () =>
{
    menuCartHover.style.display = "flex";
    console.log("test");
});

closeButton.addEventListener('click', () =>
{
    setTimeout(function()
    {
        menuCartHover.style.display = "none";
    }, 1);
});

purchaseButton.addEventListener('click', () =>
{
    location.href="cart.php";
});


function refreshCart()
{
    document.getElementById("menuCartMain").innerHTML = "";
    totalProductsInCart = 0;
    subTotal = 0;
    currentProductsInCartCookie =  getCookieByName("currentProductsInCart");
    currentProductsInCartCookieArray = JSON.parse(currentProductsInCartCookie);
    if(currentProductsInCartCookieArray != null)
    {
        for(let n = 0; n < currentProductsInCartCookieArray.length; n++)
        {
            productName = currentProductsInCartCookieArray[n][0];
            productPrice = currentProductsInCartCookieArray[n][1];
            productImg = currentProductsInCartCookieArray[n][2];
            productSize = currentProductsInCartCookieArray[n][3];
            productCount = currentProductsInCartCookieArray[n][4];
            totalProductsInCart += productCount;
            subTotal += productPrice * productCount;
            console.log(productName + productPrice + productImg);
            div = document.createElement("div");
            div.className="cartCell";
            div.innerHTML = "<div class='cartCellTop'><div class='cartCellTopLeft'><img src='img/products/" + productImg + "'></div><div class='cartCellTopLeft'><p class='productName'>" + productName + "</p><p class='productPrice'><strong>€" + productPrice + ",-</strong></p><p class='productSize'>Size: " + productSize.toUpperCase() + "</p><p class='productCount'>" + productCount + "</p></div></div><button class='removeButton' onclick=deleteItem(" + n + ")><img src='img/Prullenmand.png'><p>REMOVE</p></button>";
            document.getElementById("menuCartMain").appendChild(div);
        }
        cartAmount.innerHTML = "You have " + totalProductsInCart + " items in your shopping bag";
        subTotalNumber.innerHTML = "<strong>€" + subTotal + ",-</strong>";
    }
}

function deleteItem(index)
{
    currentProductsInCartCookieArray.splice(index, 1);
    document.cookie = "currentProductsInCart = " + JSON.stringify(currentProductsInCartCookieArray);
    refreshCart();
}

refreshCart();