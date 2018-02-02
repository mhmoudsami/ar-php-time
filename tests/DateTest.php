<?php

use Alhoqbani\ArPHP\Date;
use PHPUnit\Framework\TestCase;


class DateTest extends TestCase
{
    
    /** @test */
    public function it_can_read_required_files()
    {
        $this->assertFileIsReadable(
            'src/data/ArDate.xml',
            "Requerid file ArDate.xml is missing");
        $this->assertFileIsReadable(
            'src/data/um_alqoura.txt',
            "Requerid file um_alqoura.txt is missing");
    }
    
    /** @test */
    public function it_can_set_and_change_the_mode()
    {
        $ar_date = new Date();
        $unixTime = '1492743189';
        
        $ar_date->setMode(1);
        $month = $ar_date->date('F', $unixTime);
        $this->assertEquals(
            'رجب',
            $month,
            "Expected رجب , but got {$month}"
        );
        $ar_date->setMode(2);
        
        $month = $ar_date->date('F', $unixTime);
        $this->assertEquals(
            'نيسان',
            $month,
            "Expected نيسان , but got {$month}"
        );
        
    }
    
    /** @test */
    public function it_can_convert_unix_timestamps_to_Hijri_calender()
    {
        $ar_date = new Date();
        $unixTime = '1492743189';
        $ar_date->setMode(1);
        $hijri = $ar_date->date('l dS F Y h:i:s A', $unixTime);
        $this->assertContains(
            'الخميس 23 رجب',
            $hijri,
            'Covernted date must contain الخميس 23 رجب');
    }
    
    /** @test */
    public function it_calculate_Hijri_calendar_correction_using_um_al_qura_calendar_information()
    {
        $date = new Date();
        $time = 1492743189;
        
        $correction_factor = $date->dateCorrection($time);
        $expected_correction_factor = 0;
        
        $this->assertEquals(
            $expected_correction_factor,
            $correction_factor,
            "it expexts a correction factor of {$expected_correction_factor},
                    but it got {$correction_factor}"
        );
        
    }
    
    /** @test */
    public function it_accept_and_return_the_mode_defined_by_user()
    {
        $date = new Date();
        $unixTime = '1492743189';
    
        $mode_hijri_format = $date->setMode(1)->date('F', $unixTime);
        $expected_month = 'رجب';
        
        $this->assertEquals(
            $expected_month,
            $mode_hijri_format,
            "It expects month to be in mode 1 as {$expected_month},
                    but it got $mode_hijri_format"
        );
    
        $mode_arabic_format = $date->setMode(2)->date('F', $unixTime);
        $expected_month = 'رجب';
        
        $this->assertEquals(
            $expected_month,
            $mode_hijri_format,
            "It expects month to be in mode 2 as {$expected_month},
                    but it got $mode_arabic_format"
        );
    
        $mode_morocco = $date->setMode(7)->date('F', $unixTime);
        $expected_month = 'أبريل';
        
        $this->assertEquals(
            $expected_month,
            $mode_morocco,
            "It expects month to be in mode 3 as {$expected_month},
                    but it got $mode_morocco"
        );
    
        $mode_english = $date->setMode(9)->date('F', $unixTime);
        $expected_english_month = 'أبريل';
        
        $this->assertEquals(
            $expected_english_month,
            $mode_english,
            "It expects month to be in mode 3 as {$expected_english_month},
                    but it got $expected_english_month"
        );
    }
}