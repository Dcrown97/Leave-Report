<?php
function getOrderEndDate( $start_date, $orderDaysCode )
{
$saturday_off = false;
if( $orderDaysCode == 'meal_monthly_6' ) { $orderDays = 24; }
elseif( $orderDaysCode == 'meal_monthly_5' ) {
$orderDays = 20;
$saturday_off = true;
}elseif( $orderDaysCode == 'meal_weekly' ) {
$orderDays = 5;
$saturday_off = true;
}
else{ $orderDays = 1; } // Daily Meal

$formatted_date = new DateTime( $start_date );

$date_timestamp = $formatted_date->getTimestamp();
// loop for X days
for( $i = 0; $i < ( $orderDays - 1 ); $i++ ) { // get what day it is next day $nextDay=date('w', strtotime('+1day', $date_timestamp) ); // if it's Sunday or Saturday get $i-1 if( $nextDay==0 || ( $nextDay==6 && $saturday_off ) ) { $i--; } // modify timestamp, add 1 day $date_timestamp=strtotime('+1day', $date_timestamp); } $formatted_date->setTimestamp($date_timestamp);

    return $formatted_date->format( 'Y-m-d' );
    }
}

    $orderEndDate = getOrderEndDate( '2020-06-17', 'meal_monthly_6' );
    echo $orderEndDate;
    ?>