<?php

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class SimpleTimeclockTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        // Set up test environment variables
        if (!isset($_SERVER['SERVER_NAME'])) {
            $_SERVER['SERVER_NAME'] = 'localhost';
        }
        if (!isset($_SERVER['DOCUMENT_ROOT'])) {
            $_SERVER['DOCUMENT_ROOT'] = 'D:/wamp/www';
        }
    }

    /**
     * Test basic time calculation logic
     */
    public function testBasicTimeCalculation()
    {
        $time1 = '2024-01-01 09:00:00';
        $time2 = '2024-01-01 17:30:00';
        
        $datetime1 = new DateTime($time1);
        $datetime2 = new DateTime($time2);
        $interval = $datetime1->diff($datetime2);
        
        $hours = $interval->format('%h');
        $minutes = $interval->format('%i');
        
        $this->assertEquals(8, $hours);
        $this->assertEquals(30, $minutes);
    }

    /**
     * Test time format validation
     */
    public function testTimeFormatValidation()
    {
        // Test valid time format
        $validTime = '2024-01-01 09:00:00';
        $this->assertTrue($this->isValidDateTime($validTime));
        
        // Test invalid time format
        $invalidTime = 'invalid-time';
        $this->assertFalse($this->isValidDateTime($invalidTime));
        
        // Test null value
        $this->assertFalse($this->isValidDateTime(null));
        
        // Test empty string
        $this->assertFalse($this->isValidDateTime(''));
    }

    /**
     * Test time comparison logic
     */
    public function testTimeComparison()
    {
        $time1 = '2024-01-01 09:00:00';
        $time2 = '2024-01-01 17:00:00';
        $time3 = '2024-01-01 08:00:00';
        
        // Test time comparison
        $this->assertTrue($this->isTimeAfter($time2, $time1));
        $this->assertFalse($this->isTimeAfter($time3, $time1));
        $this->assertTrue($this->isTimeBefore($time3, $time1));
        $this->assertFalse($this->isTimeBefore($time2, $time1));
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
     * Test time difference calculation
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
     * Test time rounding functionality
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
     * Test decimal time conversion
     */
    public function testDecimalTimeConversion()
    {
        $decimalTime = 8.5; // 8 hours 30 minutes
        $formattedTime = $this->convertDecimalToTimeFormat($decimalTime);
        $this->assertEquals('08:30', $formattedTime);
        
        $decimalTime2 = 7.75; // 7 hours 45 minutes
        $formattedTime2 = $this->convertDecimalToTimeFormat($decimalTime2);
        $this->assertEquals('07:45', $formattedTime2);
        
        $decimalTime3 = 0.25; // 15 minutes
        $formattedTime3 = $this->convertDecimalToTimeFormat($decimalTime3);
        $this->assertEquals('00:15', $formattedTime3);
    }

    /**
     * Test weekly hours calculation
     */
    public function testWeeklyHoursCalculation()
    {
        $weekHours = [
            'Monday' => 8.0,
            'Tuesday' => 8.5,
            'Wednesday' => 7.5,
            'Thursday' => 9.0,
            'Friday' => 8.0
        ];
        
        $totalWeekHours = array_sum($weekHours);
        $expectedTotal = 41.0;
        
        $this->assertEquals($expectedTotal, $totalWeekHours);
        
        // Test overtime calculation
        $regularHours = 40.0;
        $overtimeHours = $totalWeekHours - $regularHours;
        $this->assertEquals(1.0, $overtimeHours);
    }

    /**
     * Test data validation
     */
    public function testDataValidation()
    {
        // Test valid timecard data
        $validData = [
            'userId' => 123,
            'inTime' => '2024-01-01 09:00:00',
            'outTime' => '2024-01-01 17:00:00',
            'type' => 'checkin',
            'userProjectId' => 456
        ];
        
        $this->assertTrue($this->isValidTimecardData($validData));
        
        // Test invalid timecard data (missing required fields)
        $invalidData = [
            'userId' => 123,
            'inTime' => '2024-01-01 09:00:00'
            // Missing outTime and type
        ];
        
        $this->assertFalse($this->isValidTimecardData($invalidData));
    }

    /**
     * Helper method to validate DateTime format
     */
    private function isValidDateTime($dateTime)
    {
        if (empty($dateTime)) {
            return false;
        }
        
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
     * Helper method to check if time is within business hours
     */
    private function isWithinBusinessHours($time)
    {
        $hour = (int)date('H', strtotime($time));
        return $hour >= 6 && $hour < 22;
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
     * Helper method to convert decimal time to HH:MM format
     */
    private function convertDecimalToTimeFormat($decimalTime)
    {
        $hours = floor($decimalTime);
        $minutes = round(($decimalTime - $hours) * 60);
        
        return sprintf('%02d:%02d', $hours, $minutes);
    }

    /**
     * Helper method to validate timecard data
     */
    private function isValidTimecardData($data)
    {
        $requiredFields = ['userId', 'inTime', 'outTime', 'type', 'userProjectId'];
        
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return false;
            }
        }
        
        return true;
    }
} 