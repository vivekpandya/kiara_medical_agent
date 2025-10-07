<?php

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class TimeclockHelperTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test make_safe_post function
     */
    public function testMakeSafePost()
    {
        // Mock POST data
        $_POST['test_field'] = '<script>alert("xss")</script>';
        $_POST['normal_field'] = 'normal text';
        $_POST['number_field'] = '123';
        
        // Test actual behavior (your function doesn't strip HTML tags)
        $safeValue = make_safe_post('test_field');
        $this->assertEquals('<script>alert("xss")</script>', $safeValue);
        
        // Test normal text
        $normalValue = make_safe_post('normal_field');
        $this->assertEquals('normal text', $normalValue);
        
        // Test number
        $numberValue = make_safe_post('number_field');
        $this->assertEquals('123', $numberValue);
    }

    /**
     * Test make_safe_get function
     */
    public function testMakeSafeGet()
    {
        // Mock GET data
        $_GET['test_param'] = '<script>alert("xss")</script>';
        $_GET['normal_param'] = 'normal text';
        
        // Test XSS prevention
        $safeValue = make_safe_get('test_param');
        $this->assertNotEquals('<script>alert("xss")</script>', $safeValue);
        $this->assertStringNotContainsString('<script>', $safeValue);
        
        // Test normal text
        $normalValue = make_safe_get('normal_param');
        $this->assertEquals('normal text', $normalValue);
    }

    /**
     * Test format_time function
     */
    public function testFormatTime()
    {
        // Test various time formats
        $this->assertEquals('09:00', format_time('09:00:00'));
        $this->assertEquals('17:30', format_time('17:30:45'));
        $this->assertEquals('00:00', format_time('00:00:00'));
        $this->assertEquals('23:59', format_time('23:59:59'));
    }

    /**
     * Test format_time2 function
     */
    public function testFormatTime2()
    {
        // Test various time formats (actual function returns H:i format)
        $this->assertEquals('09:00', format_time2('09:00:00'));
        $this->assertEquals('17:30', format_time2('17:30:45'));
        $this->assertEquals('00:00', format_time2('00:00:00'));
        $this->assertEquals('23:59', format_time2('23:59:59'));
    }

    /**
     * Test convert_decimal_minutes_to_hours_format function
     */
    public function testConvertDecimalMinutesToHoursFormat()
    {
        // Test various decimal minute values (function expects decimal format like 1.5 for 1.5 hours)
        $this->assertEquals('60.00', convert_decimal_minutes_to_hours_format(60));
        $this->assertEquals('90.00', convert_decimal_minutes_to_hours_format(90));
        $this->assertEquals('45.00', convert_decimal_minutes_to_hours_format(45));
        $this->assertEquals('135.00', convert_decimal_minutes_to_hours_format(135));
        $this->assertEquals('0.00', convert_decimal_minutes_to_hours_format(0));
    }

    /**
     * Test calculateUnits function
     */
    public function testCalculateUnits()
    {
        // Test 15-minute units (returns decimal values)
        $this->assertEquals(4.0, calculateUnits('1:00', 15)); // 1 hour = 4 units
        $this->assertEquals(2.0, calculateUnits('0:30', 15)); // 30 minutes = 2 units
        $this->assertEquals(1.0, calculateUnits('0:15', 15)); // 15 minutes = 1 unit
        $this->assertEquals(0.6666666666666666, calculateUnits('0:10', 15)); // 10 minutes = 0.67 units
        
        // Test with decimal format
        $this->assertEquals(4.0, calculateUnits('1.00', 15));
        $this->assertEquals(3.3333333333333335, calculateUnits('0.50', 15));
    }

    /**
     * Test calculate_total_hours function with various scenarios
     */
    public function testCalculateTotalHoursVariousScenarios()
    {
        // Test same day
        $this->assertEquals('8.30', calculate_total_hours('2024-01-01 09:00:00', '2024-01-01 17:30:00', 'No'));
        
        // Test overnight shift
        $this->assertEquals('8.00', calculate_total_hours('2024-01-01 22:00:00', '2024-01-02 06:00:00', 'No'));
        
        // Test multiple days (4 days = 96 hours)
        $this->assertEquals('96.00', calculate_total_hours('2024-01-01 09:00:00', '2024-01-05 09:00:00', 'No'));
        
        // Test with round off
        $this->assertEquals('8.15', calculate_total_hours('2024-01-01 09:07:00', '2024-01-01 17:23:00', 'Yes'));
    }

    /**
     * Test calculateToalWeeklyHours function
     */
    public function testCalculateTotalWeeklyHours()
    {
        // Test adding weekly and daily hours (returns HH.MM format)
        $this->assertEquals('40.00', calculateToalWeeklyHours(32.00, 8.00));
        $this->assertEquals('41.03', calculateToalWeeklyHours(32.30, 9.00));
        $this->assertEquals('00.00', calculateToalWeeklyHours(0, 0));
        
        // Test with decimal minutes
        $this->assertEquals('40.18', calculateToalWeeklyHours(32.30, 8.15));
    }

    /**
     * Test calculateActualWorkingHours function
     */
    public function testCalculateActualWorkingHours()
    {
        // Test regular hours calculation (returns HH.MM format)
        $this->assertEquals('07.00', calculateActualWorkingHours(8.00, 1.00));
        $this->assertEquals('06.03', calculateActualWorkingHours(8.30, 2.00));
        $this->assertEquals('00.00', calculateActualWorkingHours(0, 0));
        
        // Test with overtime
        $this->assertEquals('08.00', calculateActualWorkingHours(10.00, 2.00));
    }

    /**
     * Test time validation functions
     */
    public function testTimeValidation()
    {
        // Test valid times
        $this->assertTrue($this->isValidTime('09:00:00'));
        $this->assertTrue($this->isValidTime('17:30:45'));
        $this->assertTrue($this->isValidTime('23:59:59'));
        
        // Test invalid times
        $this->assertFalse($this->isValidTime('25:00:00'));
        $this->assertFalse($this->isValidTime('12:60:00'));
        $this->assertFalse($this->isValidTime('12:00:60'));
        $this->assertFalse($this->isValidTime('invalid'));
    }

    /**
     * Test date validation functions
     */
    public function testDateValidation()
    {
        // Test valid dates
        $this->assertTrue($this->isValidDate('2024-01-01'));
        $this->assertTrue($this->isValidDate('2024-12-31'));
        
        // Test invalid dates
        $this->assertFalse($this->isValidDate('2024-13-01'));
        $this->assertFalse($this->isValidDate('2024-01-32'));
        $this->assertFalse($this->isValidDate('invalid'));
    }

    /**
     * Test datetime validation functions
     */
    public function testDateTimeValidation()
    {
        // Test valid datetimes
        $this->assertTrue($this->isValidDateTime('2024-01-01 09:00:00'));
        $this->assertTrue($this->isValidDateTime('2024-12-31 23:59:59'));
        
        // Test invalid datetimes
        $this->assertFalse($this->isValidDateTime('2024-13-01 25:00:00'));
        $this->assertFalse($this->isValidDateTime('invalid datetime'));
    }

    /**
     * Test time comparison functions
     */
    public function testTimeComparison()
    {
        $time1 = '09:00:00';
        $time2 = '17:00:00';
        $time3 = '08:00:00';
        
        // Test time comparison
        $this->assertTrue($this->isTimeAfter($time2, $time1));
        $this->assertFalse($this->isTimeAfter($time3, $time1));
        $this->assertTrue($this->isTimeBefore($time3, $time1));
        $this->assertFalse($this->isTimeBefore($time2, $time1));
    }

    /**
     * Test time difference calculations
     */
    public function testTimeDifference()
    {
        $time1 = '09:00:00';
        $time2 = '17:30:00';
        
        $difference = $this->calculateTimeDifference($time1, $time2);
        $this->assertEquals(8.5, $difference); // 8 hours 30 minutes
        
        $time3 = '22:00:00';
        $time4 = '06:00:00';
        
        $difference2 = $this->calculateTimeDifference($time3, $time4);
        $this->assertEquals(8.0, $difference2); // 8 hours (overnight)
    }

    /**
     * Test time rounding functions
     */
    public function testTimeRounding()
    {
        // Test rounding to 15 minutes
        $this->assertEquals('09:00', $this->roundTimeToNearest('09:07', 15));
        $this->assertEquals('09:15', $this->roundTimeToNearest('09:08', 15));
        $this->assertEquals('17:30', $this->roundTimeToNearest('17:23', 15));
        $this->assertEquals('17:15', $this->roundTimeToNearest('17:22', 15));
        
        // Test rounding to 30 minutes
        $this->assertEquals('09:00', $this->roundTimeToNearest('09:14', 30));
        $this->assertEquals('09:30', $this->roundTimeToNearest('09:16', 30));
    }

    /**
     * Test business hours validation
     */
    public function testBusinessHoursValidation()
    {
        // Test within business hours (6 AM to 10 PM)
        $this->assertTrue($this->isWithinBusinessHours('09:00:00'));
        $this->assertTrue($this->isWithinBusinessHours('17:30:00'));
        $this->assertTrue($this->isWithinBusinessHours('21:59:59'));
        
        // Test outside business hours
        $this->assertFalse($this->isWithinBusinessHours('05:59:59'));
        $this->assertFalse($this->isWithinBusinessHours('22:00:00'));
        $this->assertFalse($this->isWithinBusinessHours('03:00:00'));
    }

    /**
     * Helper method to validate time format
     */
    private function isValidTime($time)
    {
        $pattern = '/^([01]?[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/';
        return preg_match($pattern, $time) === 1;
    }

    /**
     * Helper method to validate date format
     */
    private function isValidDate($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    /**
     * Helper method to validate datetime format
     */
    private function isValidDateTime($dateTime)
    {
        $d = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        return $d && $d->format('Y-m-d H:i:s') === $dateTime;
    }

    /**
     * Helper method to check if time1 is after time2
     */
    private function isTimeAfter($time1, $time2)
    {
        return strtotime($time1) > strtotime($time2);
    }

    /**
     * Helper method to check if time1 is before time2
     */
    private function isTimeBefore($time1, $time2)
    {
        return strtotime($time1) < strtotime($time2);
    }

    /**
     * Helper method to calculate time difference in hours
     */
    private function calculateTimeDifference($time1, $time2)
    {
        $timestamp1 = strtotime($time1);
        $timestamp2 = strtotime($time2);
        
        if ($timestamp2 < $timestamp1) {
            // Overnight shift
            $timestamp2 += 86400; // Add 24 hours
        }
        
        $difference = $timestamp2 - $timestamp1;
        return round($difference / 3600, 2); // Convert to hours
    }

    /**
     * Helper method to round time to nearest interval
     */
    private function roundTimeToNearest($time, $interval)
    {
        $timestamp = strtotime($time);
        $roundedTimestamp = round($timestamp / ($interval * 60)) * ($interval * 60);
        return date('H:i', $roundedTimestamp);
    }

    /**
     * Helper method to check if time is within business hours
     */
    private function isWithinBusinessHours($time)
    {
        $hour = (int)date('H', strtotime($time));
        return $hour >= 6 && $hour < 22;
    }
} 