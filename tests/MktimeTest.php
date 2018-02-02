<?php

use Alhoqbani\ArPHP\Mktime;
use PHPUnit\Framework\TestCase;


class MktimeTest extends TestCase
{
    
    /** @test */
    public function it_can_read_required_files()
    {
        $this->assertFileIsReadable(
            'src/data/um_alqoura.txt',
            "Requerid file um_alqoura.txt is missing");
    }
    
    /** @test */
    public function it_can_convert_hijri_dates_from_to_unixtime()
    {
        $ar_mktime = new Mktime();
        $time = $ar_mktime->mktime(0, 0, 0, 9, 1, 1427);
        $expected = 1159081200;
        $this->assertEquals(
            $expected,
            $time,
            "Expected {$expected}, but got {$time}"
        );
    }
    
    /** @test */
    public function it_calculates_Hijri_calendar_correction_using_um_alqura_calendar_information()
    {
        $mktime = new Mktime();
        $correction_factor = $mktime->mktimeCorrection(9, 1437);
        $expected_correction_factor = -1;
        $this->assertEquals(
            $expected_correction_factor,
            $correction_factor,
            "it expects a correction factor of {$correction_factor}, but got {$correction_factor}"
        );
    }
    
    /** @test */
    public function it_calculates_how_many_days_in_a_given_Hijri_month()
    {
        $m = 9;
        $y = 1437;
        $mktime = new Mktime();
        $days_number = $mktime->hijriMonthDays($m, $y);
        $expected_days_number = 30;
        
        $this->assertEquals(
            $expected_days_number,
            $days_number,
            "it expects month {$m} to have $expected_days_number days,
                    but returned {$days_number} days."
        );
    }
    
    
    
    
}