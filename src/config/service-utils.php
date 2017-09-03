<?php

use Symfony\Component\HttpFoundation\Response;

return [

    /*
     *
     */
    'service_codes' => [

        0 => [
            'message' => 'Ok.',
            'http_code' => Response::HTTP_OK,
            'is_critial' => false,
            'is_error' => false,
        ],

        1000 => [
            'message' => 'General error.',
            'http_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'is_critial' => false,
            'is_error' => true,
        ],

    ],

];