<?php
require_once "../controllers/general_controller.php";
require_once "../controllers/stadium_controller.php";


// print_r(stadium_revenue_list_ctr());

function display_stadium_revenue_fxn(){
    $list = stadium_revenue_list_ctr();

    foreach($list as $data){
        $revenue = $data['number_issued'] * $data['price_per_ticket'];

        display_row($data['stadium_name'], $data['Event_name'], $data['number_issued'], $data['price_per_ticket'], $revenue);
    }
}

function display_stadium_details(){
    $list = stadium_event_numbers_ctr();

    foreach($list as $data){
        display_stadium_row($data['Stadium_id'],$data['stadium_name'], $data['capacity'], $data['events']);
    }
}


function display_stadium_row($stadium_id, $stadium_name, $capacity, $events){
    echo " <tr>
	    <td>$stadium_name</td>
	    <td>$capacity</td>
		<td>$events</td>
	  </tr>";
}



function display_row($stadium_name, $event, $ticket_sold, $price_per_ticket, $revenue){
    echo " <tr>
	    <td>$stadium_name</td>
	    <td>$event</td>
		<td>$ticket_sold</td>
		<td>ghc $price_per_ticket</td>
	    <td>ghc $ticket_sold</td>
	  </tr>"; 
}


function event_list(){
    $list = event_ticket_list_ctr();

    foreach($list as $data){
        display_row_event_purchase($data['Event_id'], $data['Ticket_id'], $data['Event_name'], $data['stadium_name'], $data['price_per_ticket']);  
    }
}



function display_row_event_purchase($event_id, $ticket_id, $event, $stadium, $price){

    echo "<tr>
	    <td>$event</td>        
	    <td>$stadium</td>
		<td>ghc $price</td>
		<td><a href='payment.php?ticket_id=$ticket_id&event_id=$event_id&ticket_price=$price'>Purchase</a></td>
	  </tr>";


}
?>