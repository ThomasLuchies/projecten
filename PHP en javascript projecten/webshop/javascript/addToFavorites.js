const favoritesButton = document.getElementById("addToFavorites");
let productId = getCookieByName("currentProduct");

function checkFavorite()
{
    $.ajax(
        {
            type: "POST",
            url: "getFavoriteStatus.php",
            data: { productId: productId },
            async: true,
        }).done(function(data) {
            if(data == "false")
            {
                favoritesButton.innerHTML = "Add to Wishlist";
                favoritesButton.style.backgroundColor = "white";
                favoritesButton.style.color = "black"; 
            }
            else
            {
                favoritesButton.innerHTML = "Remove from Wishlist"
                favoritesButton.style.backgroundColor = "red";
                favoritesButton.style.color = "white";
            }
        });
}

favoritesButton.addEventListener("click", () =>
{
    console.log("test");
    $.ajax(
        {
            type: "POST",
            url: "addToFavorites.php",
            data: { productId: productId },
            dataType: "json",
            async: true,
        });
    setTimeout(function()
    {
        checkFavorite();
    },100);    
});

checkFavorite();