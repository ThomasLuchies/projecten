const addToCartButton = document.getElementById("addToCart");

addToCartButton.addEventListener('click', () =>
{
    if(selectedSize != null)
    {
        menuCartHover.style.display = "flex";
        noSizeSelectedNotice.style.display = "none";
        $.ajax(
        {
            type: "POST",
            url: "getProductInfo.php",
            data: { productId: currentProductId },
            dataType: "json",
            async: true,
        }).done(function (data)
        {
            let productName = data["productName"];
            let productPrice = data["productPrice"];
            let productImg = data["productImg"];
            console.log(productName + productPrice + productImg);
            if(getCookieByName("currentProductsInCart") == null)
            {
                let productArray = [[productName, productPrice, productImg, selectedSize, productCount]];
                document.cookie = "currentProductsInCart = " + JSON.stringify(productArray);
                refreshCart();
            }
            else
            {
                currentProductsInCartCookie =  getCookieByName("currentProductsInCart");
                currentProductsInCartCookieArray = JSON.parse(currentProductsInCartCookie);
                for(let i = 0; i < currentProductsInCartCookieArray.length; i++)
                {
                    if(currentProductsInCartCookieArray[i][0] == productName)
                    {
                        if(currentProductsInCartCookieArray[i][3] == selectedSize)
                        {
                            productCount = currentProductsInCartCookieArray[i][4] + 1;
                            currentProductsInCartCookieArray.splice(i, 1);
                            console.log(productCount);
                            break;
                        }
                        else
                        {
                            productCount = 1;
                        }
                    }
                }
                console.log("test");
                currentProductsInCartCookieArray.push([productName, productPrice, productImg, selectedSize, productCount]);
                document.cookie = "currentProductsInCart = " + JSON.stringify(currentProductsInCartCookieArray);
                console.log(currentProductsInCartCookieArray); 
                refreshCart();
            }
        });
        setTimeout(function()
        {
            menuCartHover.style.display = "none";
        }, 3000);
    }
    else
    {
        noSizeSelectedNotice.style.display = "block";
    }
});
