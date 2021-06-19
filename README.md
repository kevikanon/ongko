# Ongko

A helper package to translate English number and numeric strings to Bangla number or words.

## Installation

```
composer require kevikanon/ongko

```

## Usage

Here you can see some example of just how simple this package is to use.

```php
use Kevikanon\Ongko;

$ongko = new Ongko;

### Bangla Words
$ongko->toWords(458677524); // returns: পঁয়তাল্লিশ কোটি সাতাত্তর লক্ষ ছিয়াশি হাজার পাঁচশত চব্বিশ
$ongko->toWords(455.24);;   // returns: চারশত পঞ্চান্ন দশমিক দুই চার


### Bangla Numbers

$ongko->toNumbers(34765);  // returns: ৩৪৭৬৫
$ongko->toNumbers(455.24); // returns: ৪৫৫.২৪

```

## License

Ongko is licensed under [The MIT License (MIT)](LICENSE).
