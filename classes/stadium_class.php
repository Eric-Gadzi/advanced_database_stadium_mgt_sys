<?php

class Stadium_Class extends db_connection
{

    public function createStadium_cls($stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email)
    {
        $sql = "INSERT INTO STADIUM(stadium_name, stadium_type, capacity, club_associated_with, ghgps_code, year_built, contact, email) VALUE
                ('$stadium_name', '$stadium_type', '$capacity' , '$club_associated', '$gps_code', '$year_built', '$contact', '$email')";

        return $this->db_query($sql);
    }

    public function update_stadium_cls($stadium_id,$stadium_name, $stadium_type, $capacity, $club_associated, $gps_code, $year_built, $contact, $email)
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

        return $this->getAData();
    }

    public function select_all_stadiums_cls()
    {
        $sql = "SELECT * FROM `stadium`";

        return $this->getAllData();

    }

}
