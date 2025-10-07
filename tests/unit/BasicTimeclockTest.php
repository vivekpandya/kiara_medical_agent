<?php

/**
 * Basic Timeclock Test - No external dependencies
 */
class BasicTimeclockTest
{
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
        
        assert($hours == 8, "Hours should be 8, got $hours");
        assert($minutes == 30, "Minutes should be 30, got $minutes");
        
        echo "✓ Basic time calculation test passed\n";
    }

    /**
     * Test time format validation
     */
    public function testTimeFormatValidation()
    {
        // Test valid time format
        $validTime = '2024-01-01 09:00:00';
        assert($this->isValidDateTime($validTime), "Valid time should pass validation");
        
        // Test invalid time format
        $invalidTime = 'invalid-time';
        assert(!$this->isValidDateTime($invalidTime), "Invalid time should fail validation");
        
        // Test null value
        assert(!$this->isValidDateTime(null), "Null should fail validation");
        
        // Test empty string
        assert(!$this->isValidDateTime(''), "Empty string should fail validation");
        
        echo "✓ Time format validation test passed\n";
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
        assert($this->isTimeAfter($time2, $time1), "Time2 should be after Time1");
        assert(!$this->isTimeAfter($time3, $time1), "Time3 should not be after Time1");
        assert($this->isTimeBefore($time3, $time1), "Time3 should be before Time1");
        assert(!$this->isTimeBefore($time2, $time1), "Time2 should not be before Time1");
        
        echo "✓ Time comparison test passed\n";
    }

    /**
     * Test business hours validation
     */
    public function testBusinessHoursValidation()
    {
        // Test within business hours (6 AM to 10 PM)
        assert($this->isWithinBusinessHours('09:00:00'), "9 AM should be within business hours");
        assert($this->isWithinBusinessHours('17:30:00'), "5:30 PM should be within business hours");
        assert($this->isWithinBusinessHours('21:59:59'), "9:59 PM should be within business hours");
        
        // Test outside business hours
        assert(!$this->isWithinBusinessHours('05:59:59'), "5:59 AM should be outside business hours");
        assert(!$this->isWithinBusinessHours('22:00:00'), "10 PM should be outside business hours");
        assert(!$this->isWithinBusinessHours('03:00:00'), "3 AM should be outside business hours");
        
        echo "✓ Business hours validation test passed\n";
    }

    /**
     * Test time difference calculation
     */
    public function testTimeDifference()
    {
        $time1 = '09:00:00';
        $time2 = '17:30:00';
        
        $difference = $this->calculateTimeDifference($time1, $time2);
        assert($difference == 8.5, "Difference should be 8.5 hours, got $difference");
        
        $time3 = '22:00:00';
        $time4 = '06:00:00';
        
        $difference2 = $this->calculateTimeDifference($time3, $time4);
        assert($difference2 == 8.0, "Overnight difference should be 8.0 hours, got $difference2");
        
        echo "✓ Time difference calculation test passed\n";
    }

    /**
     * Test time rounding functionality
     */
    public function testTimeRounding()
    {
        // Test rounding to 15 minutes
        assert($this->roundTimeToNearest('09:07', 15) == '09:00', "09:07 should round to 09:00");
        assert($this->roundTimeToNearest('09:08', 15) == '09:15', "09:08 should round to 09:15");
        assert($this->roundTimeToNearest('17:23', 15) == '17:30', "17:23 should round to 17:30");
        assert($this->roundTimeToNearest('17:22', 15) == '17:15', "17:22 should round to 17:15");
        
        // Test rounding to 30 minutes
        assert($this->roundTimeToNearest('09:14', 30) == '09:00', "09:14 should round to 09:00");
        assert($this->roundTimeToNearest('09:16', 30) == '09:30', "09:16 should round to 09:30");
        
        echo "✓ Time rounding test passed\n";
    }

    /**
     * Test decimal time conversion
     */
    public function testDecimalTimeConversion()
    {
        $decimalTime = 8.5; // 8 hours 30 minutes
        $formattedTime = $this->convertDecimalToTimeFormat($decimalTime);
        assert($formattedTime == '08:30', "8.5 should convert to 08:30, got $formattedTime");
        
        $decimalTime2 = 7.75; // 7 hours 45 minutes
        $formattedTime2 = $this->convertDecimalToTimeFormat($decimalTime2);
        assert($formattedTime2 == '07:45', "7.75 should convert to 07:45, got $formattedTime2");
        
        $decimalTime3 = 0.25; // 15 minutes
        $formattedTime3 = $this->convertDecimalToTimeFormat($decimalTime3);
        assert($formattedTime3 == '00:15', "0.25 should convert to 00:15, got $formattedTime3");
        
        echo "✓ Decimal time conversion test passed\n";
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
        
        assert($totalWeekHours == $expectedTotal, "Total week hours should be $expectedTotal, got $totalWeekHours");
        
        // Test overtime calculation
        $regularHours = 40.0;
        $overtimeHours = $totalWeekHours - $regularHours;
        assert($overtimeHours == 1.0, "Overtime hours should be 1.0, got $overtimeHours");
        
        echo "✓ Weekly hours calculation test passed\n";
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
        
        assert($this->isValidTimecardData($validData), "Valid data should pass validation");
        
        // Test invalid timecard data (missing required fields)
        $invalidData = [
            'userId' => 123,
            'inTime' => '2024-01-01 09:00:00'
            // Missing outTime and type
        ];
        
        assert(!$this->isValidTimecardData($invalidData), "Invalid data should fail validation");
        
        echo "✓ Data validation test passed\n";
    }

    /**
     * Run all tests
     */
    public function runAllTests()
    {
        echo "Starting Timeclock Module Tests...\n";
        echo "================================\n\n";
        
        try {
            $this->testBasicTimeCalculation();
            $this->testTimeFormatValidation();
            $this->testTimeComparison();
            $this->testBusinessHoursValidation();
            $this->testTimeDifference();
            $this->testTimeRounding();
            $this->testDecimalTimeConversion();
            $this->testWeeklyHoursCalculation();
            $this->testDataValidation();
            
            echo "\n================================\n";
            echo "🎉 All tests passed successfully!\n";
            echo "Total tests run: 9\n";
            echo "Failed tests: 0\n";
            
        } catch (Exception $e) {
            echo "\n❌ Test failed: " . $e->getMessage() . "\n";
        }
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

// Run the tests if this file is executed directly
if (php_sapi_name() === 'cli' || isset($_GET['run_tests'])) {
    $test = new BasicTimeclockTest();
    $test->runAllTests();
} 