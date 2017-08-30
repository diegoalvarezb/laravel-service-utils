<?php

return [

    /*
     *
     */
    'codes' => [
        'NOT_ERROR' => 0,
        'ERROR_GENERAL' => 1000,
    ],

    /*
     *
     */
    'messages' => [
        'NOT_ERROR' => 'Ok.',
        'ERROR_GENERAL' => 'General error.',
    ],

    /*
     *
     */
    'http_codes' => [
        'NOT_ERROR' => Response::HTTP_OK,
        'ERROR_GENERAL' => Response::HTTP_INTERNAL_SERVER_ERROR,
    ],

];