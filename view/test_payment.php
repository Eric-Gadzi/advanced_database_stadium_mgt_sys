<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
     <form id="paymentForm">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email-address" required />
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="tel" id="amount" required />
  </div>
  <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" />
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" />
  </div>
  <div class="form-submit">
    <button type="submit" onclick="payWithPaystack()"> Pay </button>
  </div>
</form>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" integrity="sha512-RRfZvuP9XhtjKZr1PtQG0dSEa+eukng8YKjGk0aP+tyxgqX9h6UWIf6uK7VbR1FQg8V0hKjvOZDx69GK2M8cdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-rUEGLtL4z4eBn2QJ0ZltO5cXp36S5wh5b5ltKzJdcugfLiC4z4gz1Q2DgFZK1JQ8I+HJgsOBUetwOyq3RN12Yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script>
//     const paymentForm = document.getElementById('paymentForm');
// paymentForm.addEventListener("submit", payWithPaystack, false);

window.onload = function (){
   // alert("paystack has started working");
    payWithPaystack();
}
function payWithPaystack(e) {
//   e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_bed9ac10a9fd731dd3af495d9160b4a59b72217a', // Replace with your public key
    email: "gadzi.eric@gmail.com",
    amount: 100 * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    currency: "GHS",
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
    //   let message = 'Payment complete! Reference: ' + response.reference;
    // alert("this is fun");

  //  submitData({reference: response.reference});
       window.location.href = "../actions/process_ticket_payment.php?reference="+response.reference;
    }
  });

  handler.openIframe();
}

function submitData(data){
    $.ajax({
      type: 'POST',
      url: '../actions/process_ticket_payment.php',
      data: data,
      success: function(response) {
        // handle the successful response
        alert(response)
        // display_success();
        showMessage('Your action was successful!', 'success');


      },
      error: function(xhr, status, error) {
        // handle the error
        console.log(xhr.responseText);
        //alert(xhr.responseText);
        // display_failed();

showMessage('There was an error with your action.', 'error');

      }
    });
}


function showMessage(message, type) {
  if (type === 'success') {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: message,
      showConfirmButton: true,
  
    });
  } else if (type === 'error') {
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: message,
      confirmButtonText: 'OK'
    });
  } else {
    console.error('Invalid message type:', type);
  }
}
</script>
</body>
</html>