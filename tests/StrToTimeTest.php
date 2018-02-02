<?php

use Alhoqbani\ArPHP\StrToTime;
use PHPUnit\Framework\TestCase;


class StrToTimeTest extends TestCase
{
    
    /** @test */
    public function it_can_read_required_files()
    {
        $this->assertFileIsReadable(
            'src/data/ArNumbers.xml',
            "Requerid file ArNumbers.xml is missing");
    }
    
    /** @test */
    public function it_can_convert_arabic_strig_to_time()
    {
        $str_to_time = new StrToTime();
        $time = '1492794707';
        $next_friday_arabic_string = 'الجمعة القادمة';
        $converted = $str_to_time->strtotime($next_friday_arabic_string, $time);
        $expected =  '1493362800';
        
        $this->assertEquals(
            $expected,
            $converted,
                "Covernted StrToTimt must be {$expected} , but got {$converted}");
    }
    
}