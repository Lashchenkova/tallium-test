<?php

namespace AppBundle\Util;

interface RuntimeServiceInterface
{
    /**
     * Send message through socket
     *
     * @param $requestJSONData
     * @return mixed
     */
    public function emit($requestJSONData);
}