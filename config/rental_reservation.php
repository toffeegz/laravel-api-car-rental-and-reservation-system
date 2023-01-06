<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Car Rental and Reservation Configuration
    |--------------------------------------------------------------------------
    |
    | Reservation Status
    | User Status
    */
    
    'reservation_status' => [
        'PENDING' => 1,
        'APPROVED' => 2,
        'CANCELLED' => 3,
        'FAILED' => 4,
    ],

    'user_status' => [
        0 => 'PENDING',
        1 => 'APPROVED',
    ],
];