<?php

// Retrieve attributes for an event passed to the view
function get_attributes($event){
    foreach ($event as $event){
        $id = $event->id;
        $name = $event->name;
        $description = $event->description;
        $type = $event->type;
        $start_date = $event->start_date;
        $start_time = $event->start_time;
        $end_date = $event->end_date;
        $end_time = $event->end_time;
        $price = $event->price;
        $max = $event->max;
        $image = $event->image;
    }
    return array(
        "id" => $id,
        "name" => $name,
        "description" => $description, 
        "type" => $type, 
        "start_date" => $start_date,
        "start_time" => $start_time,
        "end_date" => $end_date,
        "end_time" => $end_time,
        "price" => $price,
        "max" => $max,
        "image" => $image,
    );
}

// Date formatting
function formatDate($date){
    return date("F j, Y", strtotime($date));
}

// Time formatting
function formatTime($time){
    return date("h:i a", strtotime($time));
}