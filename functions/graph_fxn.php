<?php
require_once dirname(__FILE__) . "./../controllers/general_controller.php";
require_once dirname(__FILE__) . "./../controllers/stadium_controller.php";


function stadium_event_numbers()
{


    $queryList = stadium_event_numbers_ctr();
    $dataPoints = array();
    foreach ($queryList as $data) {
        array_push($dataPoints, array("y" => $data['events'], "label" => $data['stadium_name']));
    }
    return json_encode($dataPoints, JSON_NUMERIC_CHECK);
}


function stadium_revenue_fxn(){
    $queryList = stadium_revenue_ctr();
    $dataPoints = array();

foreach ($queryList as $data) {
        $stadiumName = select_one_stadium_ctr($data['venue'])['stadium_name'];
    array_push($dataPoints, array("y" => $data['revenue'], "label" => $stadiumName));
}
return json_encode($dataPoints, JSON_NUMERIC_CHECK);

}

print_r(stadium_revenue_fxn());

?>