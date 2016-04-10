<?php

/*
 * This file is part of the DataCoder package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Exorg\DataCoder;

/**
 * Dummy3DataDecoder.
 * Dummy data decoder for testing purposes only.
 *
 * @package DataCoder
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link https://github.com/ExOrg/php-data-coder
 */
class Dummy3DataDecoder
{
    /**
     * Simulate data decodind
     * and return expected result.
     *
     * @param string $data
     * @return array
     * @throws DataFormatInvalidException
     */
    public function decodeData($data)
    {
        return "<DUMMY 3 DATA/>";
    }
}