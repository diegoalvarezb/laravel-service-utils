<?php

namespace Diegoalvarezb\ServiceUtils;

use Illuminate\Support\Facades\Log;
use Diegoalvarezb\ServiceUtils\ServiceResponse;

/**
 * Internal services responses functions.
 *
 * @package Diegoalvarezb\ServiceUtils
 */
abstract class AbstractService
{
    /**
     * Generate an internal service response with given data.
     *
     * @param  array  $data
     * @param  int    $error
     * @param  string $message
     * @return array
     */
    protected function generateResponse(
        $data = [],
        $errorCode = 'NOT_ERROR',
        $message = ''
    ) {
        return new ServiceResponse($data, $errorCode, $message);
    }

    /**
     * Log exception handled.
     *
     * @param  Exception $exception
     * @param  string    $type
     * @param  string    $customMessage
     * @return void
     */
    protected function logException($exception, $type = 'error', $customMessage = '')
    {
        $allowedTypes = ['error', 'emergency', 'alert', 'critical', 'warning', 'notice', 'info'];

        if (in_array($type, $allowedTypes)) {

            $logMessage = __CLASS__ . '  |  ' . __FUNCTION__ . '()  |  (' . get_class($exception) . ') ' . $exception->getMessage() . '  |  ' . $customMessage;

            Log::$type($logMessage);

        }

        Log::debug($exception);
    }
}
