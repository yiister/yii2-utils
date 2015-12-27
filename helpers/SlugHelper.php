<?php
/**
 * @copyright Copyright (c) 2015 Yiister
 * @license https://github.com/yiister/yii2-utils/blob/master/LICENSE
 * @link https://github.com/yiister/yii2-utils
 */

namespace yiister\utils\helpers;

class SlugHelper
{
    /**
     * Create a slug from input string.
     * @param string $str Input string
     * @param string $delimiter Words delimiter
     * @param int $maxLength Maximum output string length
     * @param string $mbEncoding Encoding for multi-byte functions
     * @return string
     */
    public static function createSlug($str, $delimiter = '-', $maxLength = 100, $mbEncoding = 'UTF-8')
    {
        $str = mb_strtolower($str, $mbEncoding);
        $abc = array("ый" => "y", "а" => "a", "б" => "b",
            "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "j",
            "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
            "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
            "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
            "ц" => "c", "ч" => "ch" ,"ш" => "sh", "щ" => "sch", "ъ" => "",
            "ы" => "y", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya",
            " " => $delimiter, "." => "", "/" => $delimiter
        );
        $str = preg_replace('#[^a-z0-9\-\_]#is', '', strtr($str, $abc));
        $str = trim(preg_replace('#' . preg_quote($delimiter) . '{2,}#is', $delimiter, $str));
        $length = mb_strlen($str, $mbEncoding);
        return $length > $maxLength ? mb_substr($str, 0, $maxLength, $mbEncoding) : $str;
    }
}
