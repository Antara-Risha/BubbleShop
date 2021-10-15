<?php

if (! function_exists('order_status')) {
    function order_status() {
        return [
            '1' => "Washing",
            '2' => "Ironing",
            '3' => "Dispatched",
        ];
    }
}

if (! function_exists('order_status_key_to_name')) {
    function order_status_key_to_name($status_key)
    {
        $status_array = [
            '1' => "Washing",
            '2' => "Ironing",
            '3' => "Dispatched",
        ];

        if (array_key_exists($status_key, $status_array)) {
            return $status_array[ $status_key ];
        }
    }
}
