<?php

use Symfony\Component\HttpFoundation\Response;

return [

    /*
     *
     */
    'service_codes' => [

        'NOT_ERROR' => [
            'is_error' => false,
            'message' => 'Ok.',
            'http_code' => Response::HTTP_OK,
            'is_critial' => false,
        ],

        'GENERAL_ERROR' => [
            'is_error' => true,
            'message' => 'General error.',
            'http_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'is_critial' => false,
        ],

    ],

];