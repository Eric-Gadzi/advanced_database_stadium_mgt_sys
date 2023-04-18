<?php 



class Ticket_Class extends db_connection{

    public function insert_payment_cls($ticket_id, $participant_id, $amount, $card_number, $card_name, $card_type, $number_of_tickets){
        $sql = "INSERT INTO `payment`(`ticket_id`, `Participant_id`, `Amount`, `card_number`, `card_name`, `card_type`, `nummber_of_ticket`) VALUES ('$ticket_id','$participant_id','$amount','$card_number','$card_name','$card_type','$number_of_tickets')";

        return $this->db_query($sql);
    }
}


?>