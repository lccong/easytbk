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
 */

namespace lccong\EasyTBK\Vip\Osp\StringFunc;


class Mbstring implements StringFunc {
    public function substr($str, $start, $length = null) {
        /**
         * We need to set the charset parameter, which is the second
         * optional parameter and the first optional parameter can't
         * be null or false as a "magic" value because that would
         * cause an empty string to be returned, so we need to
         * actually calculate the proper length value.
         */
        if($length === null) {
            $length = $this->strlen($str) - $start;
        }

        return mb_substr($str, $start, $length, '8bit');
    }

    public function strlen($str) {
        return mb_strlen($str, '8bit');
    }
}
