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

namespace lccong\EasyTBK\Vip\Osp\Buffer;

use lccong\EasyTBK\Vip\Osp\Transport\Transport;
use lccong\EasyTBK\Vip\Osp\StringFunc\StringFuncFactory;

/**
 * A memory buffer is a tranpsort that simply reads from and writes to an
 * in-memory string buffer. Anytime you call write on it, the data is simply
 * placed into a buffer, and anytime you call read, data is read from that
 * buffer.
 *
 * @package thrift.transport
 */
class MemoryBuffer extends Transport {

  /**
   * Constructor. Optionally pass an initial value
   * for the buffer.
   */
  public function __construct($buf = '') {
    $this->buf_ = $buf;
  }

  protected $buf_ = '';

  public function isOpen() {
    return true;
  }

  public function open() {}

  public function close() {}

  public function write($buf) {
    $this->buf_ .= $buf;
  }

  public function read($len) {
    $bufLength = StringFuncFactory::create()->strlen($this->buf_);

    if ($bufLength === 0) {
      throw new \Exception('TMemoryBuffer: Could not read ' .
                                    $len . ' bytes from buffer.');
    }

    if ($bufLength <= $len) {
      $ret = $this->buf_;
      $this->buf_ = '';
      return $ret;
    }

    $ret = StringFuncFactory::create()->substr($this->buf_, 0, $len);
    $this->buf_ = StringFuncFactory::create()->substr($this->buf_, $len);

    return $ret;
  }

  function getBuffer() {
    return $this->buf_;
  }

  public function available() {
    return StringFuncFactory::create()->strlen($this->buf_);
  }
}
