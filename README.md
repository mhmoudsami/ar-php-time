## Arabic Time, Dates, Calender and Numbers
### From http://ar-php.org/


## Installation 
`composer require alhoqbani/ar-time`
## Usage
### Date in Arabic
```
<?php
require 'vendor/autoload.php';
Alhoqbani\ArPHP\Date;

$ar_date = new ArabicDate();
$time = time();

echo date('l dS F Y h:i:s A', $time); // Thursday 20th April 2017 07:44:04 PM
echo '<br /><br />';

echo $ar_date->date('l dS F Y h:i:s A', $time); //  الخميس 23 رجب 1438 07:44:04 مساءً
echo '<br /><br />';

$ar_date->setMode(2);
echo $ar_date->date('l dS F Y h:i:s A', $time); // الخميس 20 نيسان 2017 07:44:04 مساءً
echo '<br /><br />';

$ar_date->setMode(3);
echo $ar_date->date('l dS F Y h:i:s A', $time); // الخميس 20 أبريل 2017 07:44:04 مساءً
echo '<br /><br />';

$ar_date->setMode(4);
echo $ar_date->date('l dS F Y h:i:s A', $time); // الخميس 20 نيسان/أبريل 2017 07:44:04 مساءً
```

### Arabic mktime()

```
<?php
require 'vendor/autoload.php';
Alhoqbani\ArPHP\Mktime;

$ar_mktime = new ArabicMktime();

$time = $ar_mktime->mktime(0, 0, 0, 9, 1, 1427);

echo "<p>Calculated first day of Ramadan 1427 unix timestamp is: $time</p>";
// Calculated first day of Ramadan 1427 unix timestamp is: 1159081200

$Gregorian = date('l F j, Y', $time);

echo "<p>Which is $Gregorian in Gregorian calendar</p>";
// Which is Sunday September 24, 2006 in Gregorian calendar

```

### Arabic Numbers
```
<?php
require 'vendor/autoload.php';
Alhoqbani\ArPHP\Numbers;


$ar_number = new ArabicNumbers();

$ar_number->setFeminine(1);
$ar_number->setFormat(1);

$integer = 2147483647;
$text = $ar_number->int2str($integer);
// ملياران و مئة و سبع و أربعون مليون و أربعمئة و ثلاث و ثمانون ألف و ستمئة و سبع و أربعون

$ar_number->setFeminine(2);
$ar_number->setFormat(2);

$integer = 47483647;
$text = $ar_number->int2str($integer);
// سبعة و أربعين مليون و أربعمئة و ثلاثة و ثمانين ألف و ستمئة و سبعة و أربعين
```


### Salat (Prayers Time)
```
<?php
require 'vendor/autoload.php';
Alhoqbani\ArPHP\Salat;

$salat = new Salat();

        $this->salat->setConf('Shafi', -0.833333, -17.5, -19.5, 'Sunni');
        $this->salat->setLocation(33.52, 36.31, 3, 691);
        $this->salat->setDate(4, 21, 2017);
        
        $times = $this->salat->getPrayTime();
        
```


### StrToTime 
```
<?php
require 'vendor/autoload.php';
Alhoqbani\ArPHP\StrToTime;

        $str_to_time = new StrToTime();
        $time = time();
        $string = 'الجمعة القادمة';
        $unix_time = $str_to_time->strtotime($next_friday_arabic_string, $time);
        
```




