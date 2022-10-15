const discountCodeInput = document.getElementById("discountCodeInput");
const discountCodeSubmit = document.getElementById("discountCodeSubmit");
const totalPrice = document.getElementById("totalPrice");
const tax = document.getElementById("tax");
const subTotalAmount = document.getElementById("subTotalAmount");
let firstAmount = parseInt(totalPrice.innerHTML)
let input;
let discount;
let minAmount;
let newAmount;

discountCodeSubmit.addEventListener("click", ()=>
{
  input = discountCodeInput.value;
  $.ajax
  ({
      type: "POST",
      url: "checkDiscountCode.php",
      data: { input: input },
      dataType: "json",
      async: true
    }).done(function(data)
  {
      console.log(data);
      discount = data["discount"];
      minAmount = data["minAmount"];
      console.log(totalPrice.innerHTML);
      if(parseInt(totalPrice.innerHTML) >= minAmount)
      {
        newAmount = ((firstAmount / 100) * (100 - discount)).toFixed(2);
        totalPrice.innerHTML = newAmount;
        tax.innerHTML = (newAmount - (newAmount / 1.21)).toFixed(2);
        subTotalAmount.innerHTML = (newAmount / 1.21).toFixed(2);
      }
      else
      {
        newAmount = firstAmount;
        totalPrice.innerHTML = newAmount;
        tax.innerHTML = (newAmount - (newAmount / 1.21)).toFixed(2);
        subTotalAmount.innerHTML = (newAmount / 1.21).toFixed(2);
        discountCodeInput.style.border = "1px solid red";

      }
  })
})
