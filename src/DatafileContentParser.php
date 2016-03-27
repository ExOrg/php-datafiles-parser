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
 * DatafileContentParser.
 * Parse file content
 * according to given format.
 *
 * @package DataCoder
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link https://github.com/ExOrg/php-data-coder
 */
class DatafileContentParser
{
    /**
     * Namespace separator.
     */
    const NAMESPACE_SEPARATOR = "\\";

    /**
     * Parsing strategy full name postfix.
     */
    const STRATEGY_CLASS_NAME_POSTFIX = "DataDecoder";

    /**
     * Parsed file format.
     *
     * @var string
     */
    private $fileFormat = null;

    /**
     * Construct parser instance and set-up parsed file format.
     *
     * @param string $fileFormat
     */
    public function __construct($fileFormat)
    {
        $this->fileFormat = $fileFormat;
    }

    /**
     * Parse file content.
     *
     * @param string $data
     * @return array
     */
    public function parseData($data)
    {
        $decodingStrategy = $this->buildDecodingStrategy();
        $result = $this->parseDataWithDecodingStrategy($data, $decodingStrategy);

        return $result;
    }

    /**
     * Build decoding strategy.
     *
     * @return DataDecodingStrategyInterface
     */
    private function buildDecodingStrategy()
    {
        $decodingStrategyClass = __NAMESPACE__
            . self::NAMESPACE_SEPARATOR
            . ucfirst(strtolower($this->fileFormat))
            . self::STRATEGY_CLASS_NAME_POSTFIX;

        $decodingStrategy = new $decodingStrategyClass();

        return $decodingStrategy;
    }

    /**
     * Parse file content with chosen decoding strategy.
     *
     * @param string $data
     * @param DataDecodingStrategy $decodingStrategy
     * @return array
     */
    private function parseDataWithDecodingStrategy($data, $decodingStrategy)
    {
        $dataDecoder = new DataDecoder();
        $dataDecoder->setDataDecodingStrategy($decodingStrategy);
        $result = $dataDecoder->decodeData($data);

        return $result;
    }
}
