<?php

class Stadium_Class extends db_connection
{

    public function createStadium_cls($stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email)
    {
        $sql = "INSERT INTO STADIUM(stadium_name, stadium_type, capacity, club_associated_with, ghgps_code, year_built, contact, email) VALUE
                ('$stadium_name', '$stadium_type', '$capacity' , '$club_associated', '$gps_code', '$year_built', '$contact', '$email')";

        return $this->db_query($sql);
    }

    public function update_stadium_cls($stadium_id, $stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email)
    {
        $sql = "UPDATE `stadium` SET `stadium_name`='$stadium_name',`stadium_type`='$stadium_type',`capacity`='$capacity',`Club_associated_with`='$club_associated',`ghgps_code`='$gps_code',`year_built`='$year_built',`contact`='$contact',`email`='$email' WHERE `Stadium_id`='$stadium_id'";

        return $this->db_query($sql);

    }

    public function delete_stadium_cls($stadium_id)
    {
        $sql = "DELETE FROM `stadium` WHERE
        `Stadium_id`='$stadium_id'";

        return $this->db_query($sql);

    }

    public function select_one_stadium_cls($stadium_id)
    {
        $sql = "SELECT * FROM `stadium` WHERE `Stadium_id`='$stadium_id'";

        return $this->getAData($sql);
    }

    public function select_all_stadiums_cls()
    {
        $sql = "SELECT * FROM `stadium`";

        return $this->getAllData($sql);

    }

    public function stadium_event_numbers_cls()
    {
        $sql = "SELECT COUNT(event.Event_id) as events, stadium.stadium_name, stadium.capacity, stadium.Stadium_id FROM `stadium`, event WHERE Stadium.Stadium_id = event.venue GROUP BY event.venue;";

        return $this->getAllData($sql);

    }

    public function stadium_revenue_cls()
    {
        $sql = "SELECT SUM(price_per_ticket*number_issued) as revenue, event.venue FROM `ticket`, event, stadium where ticket.Event_id = event.Event_id GROUP by event.venue";

        return $this->getAllData($sql);

    }

    public function stadium_revenue_list_cls()
    {
        $sql = "Select event.Event_name, ticket.price_per_ticket, ticket.number_issued, stadium.stadium_name, Ticket.number_issued*ticket. price_per_ticket AS total_price FROM event
                INNER JOIN ticket ON  ticket.event_id = event.event_id
                INNER JOIN stadium ON stadium.Stadium_id = event.venue";

        return $this->getAllData($sql);

    }

    public function event_ticket_list_cls(){
        $sql = "Select event.Event_name, event.Event_id, ticket.Ticket_id, ticket.price_per_ticket, stadium.stadium_name FROM  event
                INNER JOIN ticket ON  ticket.event_id = event.event_id
                INNER JOIN stadium ON stadium.Stadium_id = event.venue";

return $this->getAllData($sql);

    }

    function stadium_details_cls(){
        $sql = "";
        return $this->getAllData($sql);

    }


    function count_stadiums(){
        $sql = "SELECT * FROM stadium";
        $this->getAllData($sql);
        return $this->countData();
    }

    function count_event()
{
    $sql = "SELECT * FROM Event";
    $this->getAllData($sql);
    return $this->countData();
}


}
