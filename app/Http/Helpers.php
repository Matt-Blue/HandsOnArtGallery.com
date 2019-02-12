<?php

// Date formatting
function formatDate($date){
    return date("F j, Y", strtotime($date));
}

// Time formatting
function formatTime($time){
    return date("h:i a", strtotime($time));
}