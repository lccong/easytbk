<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements. See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership. The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 * @package thrift.transport
 */

namespace lccong\EasyTBK\Vip\Osp\Transport;

use lccong\EasyTBK\Vip\Osp\StringFunc\StringFuncFactory;

/**
 * Base interface for a transport agent.
 *
 * @package thrift.transport
 */
abstract class Transport {

  /**
   * Whether this transport is open.
   *
   * @return boolean true if open
   */
  public abstract function isOpen();

  /**
   * Open the transport for reading/writing
   *
   * @throws TTransportException if cannot open
   */
  public abstract function open();

  /**
   * Close the transport.
   */
  public abstract function close();

  /**
   * Read some data into the array.
   *
   * @param int    $len How much to read
   * @return string The data that has been read
   * @throws TTransportException if cannot read any more data
   */
  public abstract function read($len);

  /**
   * Guarantees that the full amount of data is read.
   *
   * @return string The data, of exact length
   * @throws TTransportException if cannot read data
   */
  public function readAll($len) {
    // return $this->read($len);

    $data = '';
    $got = 0;
    while (($got = StringFuncFactory::create()->strlen($data)) < $len) {
      $data .= $this->read($len - $got);
    }
    return $data;
  }

  /**
   * Writes the given data out.
   *
   * @param string $buf  The data to write
   * @throws TTransportException if writing fails
   */
  public abstract function write($buf);

  /**
   * Flushes any pending data out of a buffer
   *
   * @throws TTransportException if a writing error occurs
   */
  public function flush() {}

  public abstract function getBuffer();
}
