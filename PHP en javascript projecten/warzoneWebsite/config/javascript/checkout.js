var stripe = Stripe('pk_test_51HQzHtJ3nASyy72JfjBo1d7Mns2iFaawZCin2SvEfKt8fcvRM2e9eG0Q0jk8lb3PIxReaWFwoKEUIyz2bYiYyhpZ00wK0Kvyg3');
let paymentId;

function checkout()
{
  // Create a new Checkout Session using the server-side endpoint you
  // created in step 3.
  fetch('config/createSession.php',
  {
    method: 'POST',
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({tournamentName: document.getElementById("tournamentName").innerHTML})
  })
  .then(function(response)
  {
    return response.json();
  })
  .then(function(session)
  {
    $.ajax({
      type: "post",
      url: "config/insertRegister.php",
      data: {"paymentId": session.paymentId},
      async: false,
    }).done(function(data)
    {
      if(data == "succes")
      {
        console.log("test");
        return stripe.redirectToCheckout({ sessionId: session.id });
      }
      else
      {
        console.log("an error ocured");
      }
    }).fail(function (jqXHR, textStatus)
    {
      console.log("test");
    })
  })
  .then(function(result)
  {
    // If `redirectToCheckout` fails due to a browser or network
    // error, you should display the localized error message to your
    // customer using `error.message`.
    if (result.error)
    {
      alert(result.error.message);
    }
  })
  .catch(function(error) {
    console.error('Error:', error);
  });
}
