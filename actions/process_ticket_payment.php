<?php
require_once "../controllers/general_controller.php";
require_once "../controllers/tickets_controller.php";

$reference = $_POST['reference'];
$ticket_id = $_POST['ticket_id'];
$participant_id = $_POST['participant_id'];
$amount = $_POST['amount'];
$card_number = $reference;
$card_name = "ecobank";
$card_type = "visa";
$number_of_tickets = 1;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' . $reference,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_50902229f2c6e2eac75bfdc2b90cc0211df24a5b",
        "Cache-Control: no-cache",
    ),
));



$response = json_decode(curl_exec($curl), true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}else{
    // print_r($response);
    $inserted = insert_payment_ctr($ticket_id, $participant_id, $amount, $card_number, $card_name, $card_type, $number_of_tickets);

    if($inserted){
        echo 1;
    }else{
        echo 2;
    }
}

?>