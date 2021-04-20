<?php
// Usage: [countdownzilla enddate="" title="" title_tag="H3" text="" date_YYYY-mm-dd="2021-04-24" AM/PM="" time_hh:mm= "09:58" days_label="" hours_label="" minutes_label="" seconds_label="" class=""]

// Convert seconds into days, hours, minutes and seconds
// Source: https://stackoverflow.com/questions/8273804/convert-seconds-into-days-hours-minutes-and-seconds
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a,%h, %i,%s');
}

function wp_countdownzilla( $atts ) {
	$a = shortcode_atts( array(
        'title'             => "",
        'title_tag'         => "h3",
        'text'              => "",
        'classes'           => "countdownzilla",
        'end_date'          => date("Y-m-d", strtotime("+1 week")),
        'time_hhmm'         => "09:00",
        'AM/PM'             => "A",
        'days'              => "days",
        'hours'             => "hours",
        'minutes'           => "minutes",
        'seconds'           => "seconds",
    ), $atts );

    // Default output
    $countdownzilla = "";

    // End date?
    $creatingenddate = $a['end_date']." ".$a['time_hhmm']; 
    $end_date = strtotime(date($creatingenddate));
    $enddate =  $end_date * 1000;
    // Date now
    $now = strtotime("now");

    // Time between now and enddate.
    $seconds_left = $end_date - $now;

    if($seconds_left > 0){
        $time_left = secondsToTime($seconds_left);
        $time_explode = explode(",", $time_left);

        $days = $time_explode[0];
        $hours = $time_explode[1];
        $minutes = $time_explode[2];
        $seconds = $time_explode[3];

        $countdown = "<div class='countdownzilla_countdown'>";
            $countdown .= "<div class='countdownzilla_countdown_item'><span class='countdownzilla_countdown_number countdownzilla_days'>".$days."</span><span class='countdownzilla_countdown_span_text'>".$a['days']."</span></div>";
            $countdown .= "<div class='countdownzilla_countdown_item'><span class='countdownzilla_countdown_number countdownzilla_hours'>".$hours."</span><span class='countdownzilla_countdown_span_text'>".$a['hours']."</span></div>";
            $countdown .= "<div class='countdownzilla_countdown_item'><span class='countdownzilla_countdown_number countdownzilla_minutes'>".$minutes."</span><span class='countdownzilla_countdown_span_text'>".$a['minutes']."</span></div>";
            $countdown .= "<div class='countdownzilla_countdown_item'><span class='countdownzilla_countdown_number countdownzilla_seconds'>".$seconds."</span><span class='countdownzilla_countdown_span_text'>".$a['seconds']."</span></div>";
        $countdown .= "</div>";


        $title = ($a['title'] != "") ? "<".$a['title_tag']." class='countdownzilla_title'>".$a['title']."</".$a['title_tag'].">" : "";
        $text = ($a['text'] != "") ? "<div class='countdownzilla_text'>".$a['text']."</div>" : "";
        $classes = ($a['classes'] != "")? $a['classes'] : "";
        
        $countdownzilla = '<div id="countdownzilla_plugin" class="'.$classes.'" data-enddate="'.$enddate.'">'.$title.$text.$countdown.'</div>';
    }
    return $countdownzilla;

}

add_shortcode( 'countdownzilla', 'wp_countdownzilla' );