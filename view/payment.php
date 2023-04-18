<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/payment.css" rel="stylesheet">
    <title>Pay For Ticket</title>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <form method="post" id = "paymentForm">
      <input type="hidden" name="ticket_id" value="<?php echo $_GET['ticket_id']; ?>">
      <input type="hidden" name="event_id" value="<?php echo $_GET['event_id']; ?>">
      <input type="hidden" name="participant_id" value="10">
    <div class="form">
        <h2>Payment</h2>
        <div class="input">
          <div class="inputBox">
            <label>Email</label>
            <input type="text" name="uemail" placeholder="example@xyz.com" required/>
          </div>
          <div class="inputBox">
            <label>Amount (GHC)</label>
            <input type="text" name="amount" value="<?php echo $_GET['ticket_price']; ?>" placeholder="" readonly/>
          </div>
          <div class="inputBox">
            <input type="submit" name="submit" value="Pay"/>
          </div>
        </div>

      </div>
</form>

      <script src="https://js.paystack.co/v1/inline.js" onclick="payWithPaystack()"></script> 
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        
        document.getElementById();
        function payWithPaystack(e) {
           e.preventDefault();

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
    data = {ticket_id: "<?php echo $_GET['ticket_id']; ?>", event_id:"<?php echo $_GET['event_id']; ?>", participant_id: "10", reference: response.reference, amount: "<?php echo $_GET['ticket_price']; ?>"}

     submitData(data);
      //  window.location.href = "../actions/process_ticket_payment.php?reference="+response.reference;
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
