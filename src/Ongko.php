<?php

namespace Kevikanon;

use InvalidArgumentException;
use OutOfRangeException;

/**
 * @property $words array list of bangla words indexed by english numeric equivalent
 * @method   Kevikanon\Ongko toWards(mixed $number)
 * @method   Kevikanon\Ongko toNumbers(mixed $number)
 * @method   Kevikanon\Ongko convertFloat(mixed $number)
 * @method   Kevikanon\Ongko convertInteger($number)
 */
class Ongko
{
    /**
     * @property $words array list of bangla words indexed by english numeric equivalent
     */
    public $words = [
        0  => "শুন্য",
        1  => "এক",
        2  => "দুই",
        3  => "তিন",
        4  => "চার",
        5  => "পাঁচ",
        6  => "ছয়",
        7  => "সাত",
        8  => "আট",
        9  => "নয়",
        10 => "দশ",
        11 => "এগারো",
        12 => "বারো",
        13 => "তেরো",
        14 => "চৌদ্দ",
        15 => "পনেরো",
        16 => "ষোল",
        17 => "সতেরো",
        18 => "আঠারো",
        19 => "উনিশ",
        20 => "বিশ",
        21 => "একুশ",
        22 => "বাইশ",
        23 => "তেইশ",
        24 => "চব্বিশ",
        25 => "পঁচিশ",
        26 => "ছাব্বিশ",
        27 => "সাতাশ",
        28 => "আটাশ",
        29 => "ঊনত্রিশ",
        30 => "ত্রিশ",
        31 => "একত্রিশ",
        32 => "বত্রিশ",
        33 => "তেত্রিশ",
        34 => "চৌত্রিশ",
        35 => "পঁয়ত্রিশ",
        36 => "ছত্রিশ",
        37 => "সাঁইত্রিশ",
        38 => "আটত্রিশ",
        39 => "ঊনচল্লিশ",
        40 => "চল্লিশ",
        41 => "একচল্লিশ",
        42 => "বিয়াল্লিশ",
        43 => "তেতাল্লিশ",
        44 => "চুয়াল্লিশ",
        45 => "পঁয়তাল্লিশ",
        46 => "ছেচল্লিশ",
        47 => "সাতচল্লিশ",
        48 => "আটচল্লিশ",
        49 => "ঊনপঞ্চাশ",
        50 => "পঞ্চাশ",
        51 => "একান্ন",
        52 => "বায়ান্ন",
        53 => "তিপ্পান্ন",
        54 => "চুয়ান্ন",
        55 => "পঞ্চান্ন",
        56 => "ছাপ্পান্ন",
        57 => "সাতান্ন",
        58 => "আটান্ন",
        59 => "ঊনষাট",
        60 => "ষাট",
        61 => "একষট্টি",
        62 => "বাষট্টি",
        63 => "তেষট্টি",
        64 => "চৌষট্টি",
        65 => "পঁয়ষট্টি",
        66 => "ছেষট্টি",
        67 => "সাতষট্টি",
        68 => "আটষট্টি",
        69 => "ঊনসত্তর",
        70 => "সত্তর",
        71 => "একাত্তর",
        72 => "বাহাত্তর",
        73 => "তিয়াত্তর",
        74 => "চুয়াত্তর",
        75 => "পঁচাত্তর",
        76 => "ছিয়াত্তর",
        77 => "সাতাত্তর",
        78 => "আটাত্তর",
        79 => "ঊনআশি",
        80 => "আশি",
        81 => "একাশি",
        82 => "বিরাশি",
        83 => "তিরাশি",
        84 => "চুরাশি",
        85 => "পঁচাশি",
        86 => "ছিয়াশি",
        87 => "সাতাশি",
        88 => "আটাশি",
        89 => "ঊননব্বই",
        90 => "নব্বই",
        91 => "একানব্বই",
        92 => "বিরানব্বই",
        93 => "তিরানব্বই",
        94 => "চুরানব্বই",
        95 => "পঁচানব্বই",
        96 => "ছিয়ানব্বই",
        97 => "সাতানব্বই",
        98 => "আটানব্বই",
        99 => "নিরানব্বই",
    ];

    /**
     * Returns any english numbers or numeric strings translated to Bangla words
     *
     * @param  mixed $number float number or numeric string
     * @return String translated Bangla words
     */

    public function toWords($number)
    {
        if (!is_numeric($number) || $number < 0) {
            throw new InvalidArgumentException('Not a valid number.');
        }
        if (strlen($number) > 16) {
            throw new OutOfRangeException("Number is out of range.");
        }
        if ($number == 0) {
            return $this->words[0];
        }if (is_float($number)) {
            $exploded = explode(".", $number);
            return $this->convertInteger($exploded[0]) . " দশমিক " . $this->convertFloat($exploded[1]);
        }
        return $this->convertInteger($number);
    }

    /**
     * Returns any english numbers or numeric strings translated to Bangla numbers
     *
     * @param  mixed $number float number or numeric string
     * @return String translated Bangla numbers
     */

    public function toNumbers($number)
    {
        $englishDigits = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $banglaDigits  = array("০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯");

        return str_replace($englishDigits, $banglaDigits, $number);
    }

    /**
     * Returns float numbers translated to Bangla words
     *
     * @param  mixed $number float number or numeric string
     * @return String translated Bangla words
     */

    public function convertFloat($number)
    {
        $converted = "";
        for ($i = 0; $i <= strlen($number) - 1; $i++) {
            $converted = $converted . " " . $this->words[$number[$i]];
        }
        return $converted;
    }

    /**
     * Returns numbers translated to Bangla words
     *
     * @param  mixed $number number or numeric string
     * @return String translated Bangla words
     */
    public function convertInteger($number)
    {
        if (strlen($number) <= 2) {
            return $this->words[ltrim($number, "0")];
        } elseif (strlen($number) == 3) {
            return $this->words[substr($number, -3, 1)] . "শত "
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) > 3 && strlen($number) <= 5) {
            return (ltrim(substr($number, -strlen($number), strlen($number) - 3), "0")
                ? $this->words[ltrim(substr($number, -strlen($number), strlen($number) - 3), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) > 5 && strlen($number) <= 7) {
            return (ltrim(substr($number, -strlen($number), strlen($number) - 5), "0")
                ? $this->words[ltrim(substr($number, -strlen($number), strlen($number) - 5), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -5, 2), "0") ? $this->words[ltrim(substr($number, -5, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) > 7 && strlen($number) <= 9) {
            return (ltrim(substr($number, -strlen($number), strlen($number) - 7), "0")
                ? $this->words[ltrim(substr($number, -strlen($number), strlen($number) - 7), "0")] . " কোটি " : "")
                . (ltrim(substr($number, -7, 2), "0")
                ? $this->words[ltrim(substr($number, -7, 2), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -5, 2), "0") ? $this->words[ltrim(substr($number, -5, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) == 10) {
            return (ltrim(substr($number, -10, 1), "0") ? $this->words[ltrim(substr($number, -10, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -9, 2), "0")
                ? $this->words[ltrim(substr($number, -9, 2), "0")] . " কোটি " : " কোটি ")
                . (ltrim(substr($number, -7, 2), "0")
                ? $this->words[ltrim(substr($number, -7, 2), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -5, 2), "0") ? $this->words[ltrim(substr($number, -5, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) > 10 && strlen($number) <= 12) {
            return (ltrim(substr($number, -strlen($number), strlen($number) - 10), "0")
                ? $this->words[ltrim(substr($number, -strlen($number), strlen($number) - 10), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -10, 1), "0") ? $this->words[ltrim(substr($number, -10, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -9, 2), "0")
                ? $this->words[ltrim(substr($number, -9, 2), "0")] . " কোটি " : " কোটি ")
                . (ltrim(substr($number, -7, 2), "0")
                ? $this->words[ltrim(substr($number, -7, 2), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -5, 2), "0") ? $this->words[ltrim(substr($number, -5, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) > 12 && strlen($number) <= 14) {
            return (ltrim(substr($number, -strlen($number), strlen($number) - 12), "0")
                ? $this->words[ltrim(substr($number, -strlen($number), strlen($number) - 12), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -12, 2), "0")
                ? $this->words[ltrim(substr($number, -12, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -10, 1), "0") ? $this->words[ltrim(substr($number, -10, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -9, 2), "0")
                ? $this->words[ltrim(substr($number, -9, 2), "0")] . " কোটি " : " কোটি ")
                . (ltrim(substr($number, -7, 2), "0")
                ? $this->words[ltrim(substr($number, -7, 2), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -5, 2), "0") ? $this->words[ltrim(substr($number, -5, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        } elseif (strlen($number) > 14 && strlen($number) <= 16) {
            return (ltrim(substr($number, -strlen($number), strlen($number) - 14), "0")
                ? $this->words[ltrim(substr($number, -strlen($number), strlen($number) - 14), "0")] . " কোটি " : "")
                . (ltrim(substr($number, -14, 2), "0")
                ? $this->words[ltrim(substr($number, -14, 2), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -12, 2), "0")
                ? $this->words[ltrim(substr($number, -12, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -10, 1), "0") ? $this->words[ltrim(substr($number, -10, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -9, 2), "0")
                ? $this->words[ltrim(substr($number, -9, 2), "0")] . " কোটি " : " কোটি ")
                . (ltrim(substr($number, -7, 2), "0")
                ? $this->words[ltrim(substr($number, -7, 2), "0")] . " লক্ষ " : "")
                . (ltrim(substr($number, -5, 2), "0") ? $this->words[ltrim(substr($number, -5, 2), "0")] . " হাজার " : "")
                . (ltrim(substr($number, -3, 1), "0") ? $this->words[ltrim(substr($number, -3, 1), "0")] . "শত " : "")
                . (ltrim(substr($number, -2, 2), "0") ? $this->words[ltrim(substr($number, -2, 2), "0")] : "");
        }
    }
}
