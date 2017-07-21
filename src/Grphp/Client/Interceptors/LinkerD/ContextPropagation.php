<?php
/**
 * Copyright (c) 2017-present, BigCommerce Pty. Ltd. All rights reserved
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace Grphp\Client\Interceptors\LinkerD;

use Grphp\Client\Interceptors\Base;

/**
 * Properly passes through l5d context propagation headers to enable dynamic l5d request routing
 *
 * @package Grphp\Client\Interceptors\LinkerD
 */
class ContextPropagation extends Base
{
    const METADATA_KEYS = [
        'l5d-dtab',
        'l5d-ctx-dtab',
        'l5d-ctx-deadline',
        'l5d-ctx-trace'
    ];

    /**
     * gRPC requires metadata keys to be as a string. Also, the PHP gRPC library expects them in an array.
     *
     * @param callable $callback
     */
    public function call(callable $callback)
    {
        foreach (self::METADATA_KEYS as $k) {
            if (array_key_exists($k, $_REQUEST)) {
                $this->metadata[$k] = ['' . $_REQUEST[$k]];
            }
        }
        $response = $callback();
        return $response;
    }
}