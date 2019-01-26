<?php

// Retrieve attributes for an event passed to the view
function get_attributes($event){
    foreach ($event as $event){
        $id = $event->id;
        $name = $event->name;
        $description = $event->description;
        $type = $event->type;
        $date = $event->date;
        $start_time = $event->start_time;
        $end_time = $event->end_time;
        $price = $event->price;
        $image = $event->image;
    }
    return array(
        "id" => $id,
        "name" => $name,
        "description" => $description, 
        "type" => $type, 
        "date" => $date,
        "start_time" => $start_time,
        "end_time" => $end_time,
        "price" => $price,
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