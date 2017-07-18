<?php
/**
 * Copyright 2015 Klarna AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * File containing the CurlHandle class.
 *
 * PHP version 5.3
 *
 * @category  Payment
 * @package   KlarnaAPI
 * @author    Klarna <support@klarna.com>
 * @copyright 2015 Klarna AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://developers.klarna.com/
 */

/**
 * CurlHandle
 *
 * @category  Payment
 * @package   KlarnaAPI
 * @author    Klarna <support@klarna.com>
 * @copyright 2015 Klarna AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://developers.klarna.com/
 */
class CurlHandle
{
    /**
     * Internal cURL resource
     *
     * @var resource
     */
    protected $handle;

    /**
     * Constructor
     *
     * @throws RuntimeException if cURL extension is not loaded
     */
    public function __construct()
    {
        if (!extension_loaded('curl')) {
            throw new RuntimeException(
                'cURL extension is requred.'
            );
        }
    }

    /**
     * Initialize the handle
     *
     * @return void
     */
    public function init()
    {
        $this->handle = curl_init();
    }

    /**
     * Set a cURL option
     *
     * @param int   $name  CURLOPT_* constant
     * @param mixed $value Option value
     *
     * @return void
     */
    public function setOption($name, $value)
    {
        curl_setopt($this->handle, $name, $value);
    }

    /**
     * Execute cURL handle
     *
     * @return void
     */
    public function execute()
    {
        return curl_exec($this->handle);
    }

    /**
     * Get cURL info
     *
     * @return array|false Array with info or false if error occurred
     */
    public function getInfo()
    {
        return curl_getinfo($this->handle);
    }

    /**
     * Get cURL error
     *
     * @return string|false Error message or false if no error occurred
     */
    public function getError()
    {
        return curl_error($this->handle);
    }

    /**
     * Close the cURL handle
     *
     * @return void
     */
    public function close()
    {
        curl_close($this->handle);
    }
}
