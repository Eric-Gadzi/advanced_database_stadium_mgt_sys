<?php
require_once "../controllers/general_controller.php";
require_once "../classes/tickets_class.php";




function insert_payment_ctr($ticket_id, $participant_id, $amount, $card_number, $card_name, $card_type, $number_of_tickets){
    $ticket = new Ticket_Class;
    return $ticket->insert_payment_cls($ticket_id, $participant_id, $amount, $card_number, $card_name, $card_type, $number_of_tickets);
}

$reference = "qwerty";
$ticket_id = "TO2";
$participant_id = "10";
$amount = 20000;
$card_number = $reference;
$card_name = "asdfgfd";
$card_type = "visa";
$number_of_tickets = 1;


$insert = insert_payment_ctr($ticket_id, $participant_id, $amount, $card_number, $card_name, $card_type, $number_of_tickets);

if($insert){
    echo "inserted";

}else{
    echo "not inserted";
}

print_r("hellow".$insert);

?>