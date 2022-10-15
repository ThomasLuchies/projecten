let cartCookie = getCookieByName("currentProductsInCart");
let cartCookieArray = JSON.parse(cartCookie);
const mainCartLeft = document.getElementById("mainCartLeft");
const mainCartRight = document.getElementById("mainCartRight");
let subTotalCart = 0;

for(let n = 0; n < cartCookieArray.length; n++)
{
  subTotalCart += cartCookieArray[n][1];
  let div = document.createElement("div");
  div.className = "cartProductCell";
  div.innerHTML = cartCookieArray[n][0] + cartCookieArray[n][1] + cartCookieArray[n][2] + cartCookieArray[n][3] + cartCookieArray[n][4];
  mainCartLeft.appendChild(div);
  mainCartRight.innerHTML = subTotalCart;
}
