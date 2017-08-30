<?php

namespace Diegoalvarezb\ServiceUtils;

use Illuminate\Http\Response;

/**
 * Service responses functions.
 *
 * @package Diegoalvarezb\ServiceUtils
 */
class ServiceResponse
{
    /**
     * @var int
     */
    protected $errorCode;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $message;

    /**
     * Function construct.
     *
     * @param  array  $data
     * @param  int    $errorCode
     * @param  string $message
     */
    public function __construct($data, $errorCode, $message)
    {
        $this->data = $data;
        $this->errorCode = $errorCode;
        $this->message = $message;

        if (empty($message)) {
            $this->message = config('service-utils.messages.' . $errorCode);
        }
    }

    /**
     * Returns if a response is not ok.
     *
     * @return boolean
     */
    public function hasErrors()
    {
        return ($this->errorCode !== config('service-utils.codes.NOT_ERROR'));
    }

    /**
     * Returns if an error response is critial and must user interaction.
     *
     * @return boolean
     */
    public function isCritical()
    {
        return ($this->errorCode >= config('service-utils.codes.ERROR_GENERAL'));
    }

    /**
     * Returns response message.
     *
     * @return array
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Returns response data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Returns HTTP code corresponding to service code.
     *
     * @return array
     */
    public function getHttpCode()
    {
        return config('service-utils.http_codes.' . $this->errorCode);
    }
}
