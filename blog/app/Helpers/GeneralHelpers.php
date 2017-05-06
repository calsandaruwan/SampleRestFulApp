<?php

function format_response($data) {
    $default = [
        'status' => 200,
        'error' => true,
        'message' => '',
        'data'=>''
    ];
    
    if (is_array($data)) {
        $response = array_merge($default,$data);
    }
    
    return json_encode($response);
}
