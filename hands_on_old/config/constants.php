<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */

    'super_admin' => env('SUPER_ADMIN','root@root.com'),
    'max_attendees' => env('MAX_ATTENDEES',20),


];