<?php

require_once dirname(__FILE__) . "./../classes/stadium_class.php";

function createStadium_ctr($stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email)
{
    $stadium = new Stadium_Class;
    return $stadium->createStadium_cls($stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email);

}

function update_stadium_ctr($stadium_id, $stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email)
{
    $stadium = new Stadium_Class;
    return $stadium->update_stadium_cls($stadium_id, $stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email);

}

function delete_stadium_ctr($stadium_id)
{
    $stadium = new Stadium_Class;
    return $stadium->delete_stadium_cls($stadium_id);
}

function select_one_stadium_ctr($stadium_id)
{
    $stadium = new Stadium_Class;
    return $stadium->select_one_stadium_cls($stadium_id);
}

function select_all_stadiums_cls()
{
    $stadium = new Stadium_Class;
    return $stadium->select_all_stadiums_cls();
}


function stadium_event_numbers_ctr(){
    $stadium = new Stadium_Class;
    return $stadium->stadium_event_numbers_cls();
}

function stadium_revenue_ctr(){
    $stadium = new Stadium_Class;
    return $stadium->stadium_revenue_cls();
}

function stadium_revenue_list_ctr(){
   $stadium = new Stadium_Class;
    return $stadium->stadium_revenue_list_cls(); 
}

function event_ticket_list_ctr(){
     $stadium = new Stadium_Class;
    return $stadium->event_ticket_list_cls();
}

function stadium_details_ctr(){
    $stadium = new Stadium_Class;
    return $stadium->stadium_details_cls();
}

function count_stadiums(){
    $stadium = new Stadium_Class;
    return $stadium->count_stadiums();
}

function count_events()
{
    $stadium = new Stadium_Class;
    return $stadium->count_event();
}


