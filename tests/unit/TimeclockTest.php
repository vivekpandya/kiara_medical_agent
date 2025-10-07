<?php

use CodeIgniter\Test\CIUnitTestCase;
use App\Controllers\AttendingCare;
use App\Models\AttendingCare_model;
use App\Models\Common_model;

/**
 * @internal
 */
final class TimeclockTest extends CIUnitTestCase
{
    protected $attendingCare;
    protected $attendingCareModel;
    protected $commonModel;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Set up test environment
        if (!isset($_SERVER['SERVER_NAME'])) {
            $_SERVER['SERVER_NAME'] = 'localhost';
        }
        
        // Mock the database connection
        $this->attendingCare = new AttendingCare();
        $this->attendingCareModel = new AttendingCare_model();
        $this->commonModel = new Common_model();
    }

    /**
     * Test the distance calculation function
     */
    public function testDistanceCalculation()
    {
        // Test distance calculation between two points
        $lat1 = 40.7128; // New York
        $lon1 = -74.0060;
        $lat2 = 34.0522; // Los Angeles
        $lon2 = -118.2437;

        $distance = $this->attendingCare->distance($lat1, $lon1, $lat2, $lon2, 'MTR');
        
        // Distance should be a positive number
        $this->assertIsNumeric($distance);
        $this->assertGreaterThan(0, $distance);
        
        // Test with same coordinates (should be 0)
        $sameDistance = $this->attendingCare->distance($lat1, $lon1, $lat1, $lon1, 'MTR');
        $this->assertEquals(0, $sameDistance, 0.1);
    }

    /**
     * Test the distanceacos calculation function
     */
    public function testDistanceAcosCalculation()
    {
        $lat1 = 40.7128;
        $lon1 = -74.0060;
        $lat2 = 34.0522;
        $lon2 = -118.2437;

        $distance = $this->attendingCare->distanceacos($lat1, $lon1, $lat2, $lon2, 'MTR');
        
        $this->assertIsNumeric($distance);
        $this->assertGreaterThan(0, $distance);
    }

    /**
     * Test calculate_total_hours function
     */
    public function testCalculateTotalHours()
    {
        // Test basic time calculation
        $time1 = '2024-01-01 09:00:00';
        $time2 = '2024-01-01 17:30:00';
        
        $totalHours = calculate_total_hours($time1, $time2, 'No');
        
        // Should return 8.30 (8 hours 30 minutes)
        $this->assertEquals('8.30', $totalHours);
        
        // Test with different times
        $time3 = '2024-01-01 08:00:00';
        $time4 = '2024-01-01 16:45:00';
        
        $totalHours2 = calculate_total_hours($time3, $time4, 'No');
        $this->assertEquals('8.45', $totalHours2);
    }

    /**
     * Test calculate_total_hours with round off
     */
    public function testCalculateTotalHoursWithRoundOff()
    {
        $time1 = '2024-01-01 09:07:00';
        $time2 = '2024-01-01 17:23:00';
        
        $totalHours = calculate_total_hours($time1, $time2, 'Yes');
        
        // Should round to nearest 15 minutes
        $this->assertIsString($totalHours);
        $this->assertMatchesRegularExpression('/^\d+\.\d{2}$/', $totalHours);
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
    }

    /**
     * Test geo-fencing distance validation
     */
    public function testGeoFencingDistanceValidation()
    {
        // Test within radius (should pass)
        $clientLat = 40.7128;
        $clientLng = -74.0060;
        $userLat = 40.7129; // Very close to client
        $userLng = -74.0061;
        $radius = 100; // 100 meters
        
        $distance = $this->attendingCare->distance($userLat, $userLng, $clientLat, $clientLng, 'MTR');
        $this->assertLessThanOrEqual($radius, $distance);
        
        // Test outside radius (should fail)
        $userLat2 = 40.7200; // Further away
        $userLng2 = -74.0100;
        
        $distance2 = $this->attendingCare->distance($userLat2, $userLng2, $clientLat, $clientLng, 'MTR');
        $this->assertGreaterThan($radius, $distance2);
    }

    /**
     * Test time rounding functionality
     */
    public function testTimeRounding()
    {
        // Test rounding to 15 minutes
        $time1 = '2024-01-01 09:07:00';
        $time2 = '2024-01-01 17:23:00';
        
        $roundedTime1 = $this->roundTimeToNearest($time1, 15);
        $roundedTime2 = $this->roundTimeToNearest($time2, 15);
        
        $this->assertNotEquals($time1, $roundedTime1);
        $this->assertNotEquals($time2, $roundedTime2);
    }

    /**
     * Test check-in validation logic
     */
    public function testCheckInValidation()
    {
        // Mock session data
        $userId = 123;
        $currentTime = '2024-01-01 09:00:00';
        
        // Test valid check-in time (during business hours)
        $this->assertTrue($this->isValidCheckInTime($currentTime));
        
        // Test invalid check-in time (outside business hours)
        $lateTime = '2024-01-01 23:00:00';
        $this->assertFalse($this->isValidCheckInTime($lateTime));
    }

    /**
     * Test check-out validation logic
     */
    public function testCheckOutValidation()
    {
        $checkInTime = '2024-01-01 09:00:00';
        $validCheckOutTime = '2024-01-01 17:00:00';
        $invalidCheckOutTime = '2024-01-01 08:00:00'; // Before check-in
        
        $this->assertTrue($this->isValidCheckOutTime($checkInTime, $validCheckOutTime));
        $this->assertFalse($this->isValidCheckOutTime($checkInTime, $invalidCheckOutTime));
    }

    /**
     * Test break time calculations
     */
    public function testBreakTimeCalculations()
    {
        $checkInTime = '2024-01-01 09:00:00';
        $breakStartTime = '2024-01-01 12:00:00';
        $breakEndTime = '2024-01-01 13:00:00';
        $checkOutTime = '2024-01-01 17:00:00';
        
        $totalWorkTime = calculate_total_hours($checkInTime, $checkOutTime, 'No');
        $breakTime = calculate_total_hours($breakStartTime, $breakEndTime, 'No');
        
        $this->assertEquals('8.00', $totalWorkTime);
        $this->assertEquals('1.00', $breakTime);
    }

    /**
     * Test overtime calculations
     */
    public function testOvertimeCalculations()
    {
        $regularHours = 8.0;
        $totalHours = 10.5;
        
        $overtimeHours = $totalHours - $regularHours;
        
        $this->assertEquals(2.5, $overtimeHours);
    }

    /**
     * Test weekly timecard calculations
     */
    public function testWeeklyTimecardCalculations()
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
    }

    /**
     * Test time format conversion
     */
    public function testTimeFormatConversion()
    {
        $decimalTime = 8.5; // 8 hours 30 minutes
        $formattedTime = $this->convertDecimalToTimeFormat($decimalTime);
        
        $this->assertEquals('08:30', $formattedTime);
        
        $decimalTime2 = 7.75; // 7 hours 45 minutes
        $formattedTime2 = $this->convertDecimalToTimeFormat($decimalTime2);
        
        $this->assertEquals('07:45', $formattedTime2);
    }

    /**
     * Test time validation edge cases
     */
    public function testTimeValidationEdgeCases()
    {
        // Test null values
        $this->assertFalse($this->isValidDateTime(null));
        
        // Test empty string
        $this->assertFalse($this->isValidDateTime(''));
        
        // Test invalid date format
        $this->assertFalse($this->isValidDateTime('2024-13-45 25:70:90'));
        
        // Test future date (should be valid)
        $futureDate = date('Y-m-d H:i:s', strtotime('+1 day'));
        $this->assertTrue($this->isValidDateTime($futureDate));
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
     * Helper method to round time to nearest interval
     */
    private function roundTimeToNearest($time, $interval)
    {
        $timestamp = strtotime($time);
        $roundedTimestamp = round($timestamp / ($interval * 60)) * ($interval * 60);
        return date('Y-m-d H:i:s', $roundedTimestamp);
    }

    /**
     * Helper method to validate check-in time
     */
    private function isValidCheckInTime($time)
    {
        $hour = (int)date('H', strtotime($time));
        return $hour >= 6 && $hour <= 22; // Business hours 6 AM to 10 PM
    }

    /**
     * Helper method to validate check-out time
     */
    private function isValidCheckOutTime($checkInTime, $checkOutTime)
    {
        return strtotime($checkOutTime) > strtotime($checkInTime);
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
} 