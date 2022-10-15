<div id="paymentMain">
    <div id="paymentMethods">
        <input type="radio" name="payment" value="ideal" id="ideal">
        <label for="ideal">
            <img src="img/IDEAL.png" alt="ideal">
            <span class="paymentButtonText">Ideal</span>
        </label>
        <input type="radio" name="payment" value="card" id="card">
        <label for="card">
            <img src="img/creditcard.png" alt="card">
            <span class="paymentButtonText">Creditcard</span>
        </label>
        <p id="noPaymentSelected">Please select your payment method</p>
        <button id="checkoutButton" class="orderButton">Checkout</button>
    </div>
</div>
<script>
    var stripe = Stripe("pk_test_51HQzHtJ3nASyy72JfjBo1d7Mns2iFaawZCin2SvEfKt8fcvRM2e9eG0Q0jk8lb3PIxReaWFwoKEUIyz2bYiYyhpZ00wK0Kvyg3");

    var checkoutButton = document.getElementById("checkoutButton");

    checkoutButton.addEventListener("click", function () 
    {
        if($('input[name=payment]:checked').val() != undefined)
        {
            document.getElementById("noPaymentSelected").style.display = "none";
            fetch("createSession.php", {

            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({method: $('input[name=payment]:checked').val()})
            })
            .then(function (response) {
            console.log("test");
            return response.json();
            })
            .then(function (session) 
            {
            return stripe.redirectToCheckout({ sessionId: session.id });
            })

            .then(function (result) {

            // If redirectToCheckout fails due to a browser or network

            // error, you should display the localized error message to your

            // customer using error.message.

            if (result.error) {

            alert(result.error.message);

            }

            })

            .catch(function (error) {

            console.error("Error:", error);

            });
        }
        else
        {

            document.getElementById("noPaymentSelected").style.display = "block";
        }
    });
</script>
