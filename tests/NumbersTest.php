<?php

use Alhoqbani\ArPHP\Numbers;
use PHPUnit\Framework\TestCase;


class NumbersTest extends TestCase
{
    protected $number;
    protected function setUp()
    {
        parent::setUp();
        $this->number = new Numbers();
    }
    protected function tearDown()
    {
        parent::tearDown();
        unset($this->number);
    }
    
    /** @test */
    public function it_can_convert_arabic_idiom_number_string_into_integer()
    {
        $arabic_idiom  = ' أربعة مليارات وخمسة وخمسون مليونًا وأربعة عشرة ألفًا ,تسعة وثلاثون ';
        $int = $this->number->str2int($arabic_idiom);

        $expected_int = 4055014039;
        
        $this->assertEquals(
            $expected_int,
            $int,
            "The arabic idiom {$arabic_idiom} shoul be {$expected_int}, but got {$int}"
        );
        
    
    }
    
    /** @test */
    public function it_transilate_integers_to_arabic_indic_digits()
    {
        $integer_to_convert = 12390;
        $expected_indic_digits = '١٢٣٩٠';
        
        $indic_digits = $this->number->int2indic($integer_to_convert);
        
        $this->assertEquals(
            $expected_indic_digits,
            $indic_digits,
            'mes'
        );
        
        
    }
    
    /** @test */
    public function it_can_read_required_files()
    {
        $this->assertFileIsReadable(
            'src/data/ArNumbers.xml',
            "Requerid file ArNumbers.xml is missing");
    }
    
    /** @test */
    public function it_can_convert_numbers_to_arabic_idiom()
    {
        $number = '2147483647';
        $ar_numbers = new Numbers();
        $ar_numbers->setFeminine(1);
        $ar_numbers->setFormat(1);
        $expected = 'ملياران و مئة و سبع و أربعون مليون و أربعمئة و ثلاث و ثمانون ألف و ستمئة و سبع و أربعون';
        $arabic_idiom = $ar_numbers->int2str($number);
        $this->assertEquals(
            $expected,
            $arabic_idiom,
            "Covernted number must be {$expected} , but got {$arabic_idiom}");
    }
    
    /** @test */
    public function it_can_spell_number_in_arabic_idiom_as_money()
    {
        $expected_text = 'ثلاثمئة ليرة';
        $converted_number = $this->number->money2str(300);
        
        $this->assertEquals(
            $expected_text,
            $converted_number,
            "The Expected text {$expected_text}, but it got {$converted_number}"
        );
    
    }
    
}