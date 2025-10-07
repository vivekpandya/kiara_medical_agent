# Unit Testing Guide - Adult Foster Care Professional

## 📋 Table of Contents

1. [Overview](#overview)
2. [Test Structure](#test-structure)
3. [Timeclock Module Tests](#timeclock-module-tests)
4. [Running Tests](#running-tests)
5. [Test Coverage](#test-coverage)
6. [Best Practices](#best-practices)
7. [Troubleshooting](#troubleshooting)
8. [Continuous Integration](#continuous-integration)
9. [Test Data Management](#test-data-management)
10. [Performance Testing](#performance-testing)

## 🎯 Overview

This document provides comprehensive guidance for unit testing in the Adult Foster Care Professional application. The testing framework is built on PHPUnit with CodeIgniter 4 integration.

### Key Benefits:
- **Quality Assurance**: Ensures code reliability and functionality
- **Regression Prevention**: Catches bugs before they reach production
- **Documentation**: Tests serve as living documentation
- **Refactoring Safety**: Enables confident code changes
- **Team Collaboration**: Standardized testing approach

## 🏗️ Test Structure

### Directory Organization
```
tests/
├── unit/                    # Unit tests
│   ├── TimeclockTest.php
│   ├── AttendingCareModelTest.php
│   ├── TimeclockHelperTest.php
│   ├── TimecardCronjobTest.php
│   ├── BasicTimeclockTest.php
│   └── README_Timeclock_Tests.md
├── integration/             # Integration tests
├── feature/                # Feature tests
└── _support/               # Test support files
```

### Test File Naming Convention
- **Unit Tests**: `{ClassName}Test.php`
- **Integration Tests**: `{Module}IntegrationTest.php`
- **Feature Tests**: `{Feature}FeatureTest.php`

## ⏰ Timeclock Module Tests

### Test Files Overview

#### 1. **TimeclockTest.php** - Main Functionality Tests
```php
// Core timeclock functionality
- Distance calculations
- Time calculations and formatting
- Geo-fencing validation
- Check-in/out validation
- Break time calculations
- Overtime calculations
```

#### 2. **AttendingCareModelTest.php** - Database Layer Tests
```php
// Model and database operations
- User log retrieval
- Client list operations
- HCPC code retrieval
- Approval status processing
- Data validation
```

#### 3. **TimeclockHelperTest.php** - Helper Functions Tests
```php
// Helper function validation
- Input sanitization (make_safe_post, make_safe_get)
- Time formatting functions
- Time calculation functions
- Unit calculations
- Date/time validation
```

#### 4. **TimecardCronjobTest.php** - Automated Processing Tests
```php
// Cronjob functionality
- Daily and weekly total calculations
- Cronjob execution timing
- Data aggregation
- Missing timecard detection
- Error handling
```

#### 5. **BasicTimeclockTest.php** - Standalone Tests
```php
// Independent test suite
- No external dependencies
- Core PHP functionality
- Basic business logic
- Edge case testing
```

## 🚀 Running Tests

### Prerequisites
```bash
# Required software
- PHP 7.4 or higher
- CodeIgniter 4 framework
- PHPUnit testing framework
- Composer (for dependency management)
```

### Basic Test Execution

#### 1. **Standalone Tests** (Recommended for quick testing)
```bash
# Run basic timeclock tests
php tests/unit/BasicTimeclockTest.php

# Expected Output:
Starting Timeclock Module Tests...
================================

✓ Basic time calculation test passed
✓ Time format validation test passed
✓ Time comparison test passed
✓ Business hours validation test passed
✓ Time difference calculation test passed
✓ Time rounding test passed
✓ Decimal time conversion test passed
✓ Weekly hours calculation test passed
✓ Data validation test passed

================================
🎉 All tests passed successfully!
Total tests run: 9
Failed tests: 0
```

#### 2. **PHPUnit Tests** (Full framework testing)
```bash
# Run all timeclock tests
vendor/bin/phpunit tests/unit/TimeclockTest.php
vendor/bin/phpunit tests/unit/AttendingCareModelTest.php
vendor/bin/phpunit tests/unit/TimeclockHelperTest.php
vendor/bin/phpunit tests/unit/TimecardCronjobTest.php

# Run specific test methods
vendor/bin/phpunit --filter testDistanceCalculation tests/unit/TimeclockTest.php

# Run with verbose output
vendor/bin/phpunit --verbose tests/unit/TimeclockTest.php

# Run with coverage report
vendor/bin/phpunit --coverage-html coverage tests/unit/TimeclockTest.php
```

#### 3. **Test Suites**
```bash
# Run all unit tests
vendor/bin/phpunit tests/unit/

# Run specific test suite
vendor/bin/phpunit --testsuite App

# Run with testdox format
vendor/bin/phpunit --testdox tests/unit/TimeclockTest.php
```

## 📊 Test Coverage

### Core Functionality Coverage

#### 1. **Time Calculations** ✅
```php
// Tested Scenarios:
- Basic time difference calculation
- Break time calculations
- Overtime calculations
- Weekly aggregations
- Multiple day spans
- Overnight shifts
```

#### 2. **Geolocation Functions** ✅
```php
// Tested Scenarios:
- Distance calculations (Haversine formula)
- Geo-fencing validation
- Location-based check-in/out
- Invalid coordinate handling
- Radius validation
```

#### 3. **Data Validation** ✅
```php
// Tested Scenarios:
- Input sanitization (XSS prevention)
- Time format validation
- Date validation
- Business rules validation
- Required field validation
```

#### 4. **Business Logic** ✅
```php
// Tested Scenarios:
- Check-in/out validation
- Break time rules
- Business hours validation (6 AM - 10 PM)
- Overtime calculations
- Approval workflows
```

### Edge Cases Covered

| Test Case | Description | Status |
|-----------|-------------|--------|
| Invalid time formats | Non-standard time strings | ✅ |
| Null/empty values | Missing or empty data | ✅ |
| Future dates | Date validation | ✅ |
| Overnight shifts | 24+ hour calculations | ✅ |
| Multiple day spans | Extended time periods | ✅ |
| Invalid coordinates | Geolocation errors | ✅ |
| XSS prevention | Security validation | ✅ |
| Performance testing | Large dataset handling | ✅ |

## 🎯 Best Practices

### 1. **Test Organization**
```php
// Follow AAA pattern (Arrange, Act, Assert)
public function testTimeCalculation()
{
    // Arrange - Set up test data
    $time1 = '2024-01-01 09:00:00';
    $time2 = '2024-01-01 17:30:00';
    
    // Act - Execute the function
    $result = calculate_total_hours($time1, $time2);
    
    // Assert - Verify the result
    $this->assertEquals('8.30', $result);
}
```

### 2. **Test Naming**
```php
// Use descriptive test names
public function testCalculateTotalHours_WithValidTimes_ReturnsCorrectHours()
public function testCalculateTotalHours_WithOvernightShift_HandlesCorrectly()
public function testCalculateTotalHours_WithInvalidInput_ThrowsException()
```

### 3. **Test Isolation**
```php
// Each test should be independent
protected function setUp(): void
{
    parent::setUp();
    // Set up fresh test environment
    $_SERVER['SERVER_NAME'] = 'localhost';
}
```

### 4. **Data Providers**
```php
/**
 * @dataProvider timeCalculationProvider
 */
public function testTimeCalculation($time1, $time2, $expected)
{
    $result = calculate_total_hours($time1, $time2);
    $this->assertEquals($expected, $result);
}

public function timeCalculationProvider()
{
    return [
        '8 hour shift' => ['09:00:00', '17:00:00', '8.00'],
        '8.5 hour shift' => ['09:00:00', '17:30:00', '8.30'],
        'Overnight shift' => ['22:00:00', '06:00:00', '8.00'],
    ];
}
```

### 5. **Mocking Strategy**
```php
// Mock external dependencies
public function testDatabaseOperation()
{
    $mockModel = $this->createMock(AttendingCare_model::class);
    $mockModel->method('getUserData')
             ->willReturn(['id' => 123, 'name' => 'Test User']);
    
    // Test with mocked dependency
}
```

## 🔧 Troubleshooting

### Common Issues and Solutions

#### 1. **Constants.php Loading Error**
```bash
# Error: Undefined array key "SERVER_NAME"
# Solution: Set environment variables in setUp()
protected function setUp(): void
{
    parent::setUp();
    if (!isset($_SERVER['SERVER_NAME'])) {
        $_SERVER['SERVER_NAME'] = 'localhost';
    }
}
```

#### 2. **Helper Functions Not Found**
```bash
# Error: Function not found
# Solution: Ensure helper files are autoloaded
# Add to composer.json or autoload configuration
```

#### 3. **Database Connection Issues**
```php
// Use test database or mock database
protected function setUp(): void
{
    parent::setUp();
    // Use in-memory database for tests
    $this->db = new SQLite3(':memory:');
}
```

#### 4. **Session Issues**
```php
// Mock session data for tests
protected function setUp(): void
{
    parent::setUp();
    session()->set('user_id', 123);
    session()->set('usr_dcc_id', 456);
}
```

### Debugging Tests
```bash
# Run with verbose output
vendor/bin/phpunit --verbose tests/unit/TimeclockTest.php

# Run with coverage report
vendor/bin/phpunit --coverage-html coverage tests/unit/TimeclockTest.php

# Run specific failing test
vendor/bin/phpunit --filter testDistanceCalculation tests/unit/TimeclockTest.php
```

## 🔄 Continuous Integration

### GitHub Actions Example
```yaml
name: Unit Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    
    steps:
    - uses: actions/checkout@v2
    
    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'
        
    - name: Install dependencies
      run: composer install --prefer-dist --no-progress
        
    - name: Run unit tests
      run: |
        vendor/bin/phpunit tests/unit/TimeclockTest.php
        vendor/bin/phpunit tests/unit/AttendingCareModelTest.php
        vendor/bin/phpunit tests/unit/TimeclockHelperTest.php
        vendor/bin/phpunit tests/unit/TimecardCronjobTest.php
        
    - name: Generate coverage report
      run: vendor/bin/phpunit --coverage-html coverage tests/unit/
      
    - name: Upload coverage to Codecov
      uses: codecov/codecov-action@v1
```

### Jenkins Pipeline Example
```groovy
pipeline {
    agent any
    
    stages {
        stage('Setup') {
            steps {
                sh 'composer install'
            }
        }
        
        stage('Unit Tests') {
            steps {
                sh 'vendor/bin/phpunit tests/unit/'
            }
        }
        
        stage('Coverage Report') {
            steps {
                sh 'vendor/bin/phpunit --coverage-html coverage tests/unit/'
                publishHTML([
                    allowMissing: false,
                    alwaysLinkToLastBuild: true,
                    keepAll: true,
                    reportDir: 'coverage',
                    reportFiles: 'index.html',
                    reportName: 'Coverage Report'
                ])
            }
        }
    }
}
```

## 📊 Test Data Management

### Test Data Strategy
```php
// Use realistic test data
class TimeclockTestData
{
    public static function getValidTimecardData()
    {
        return [
            'userId' => 123,
            'inTime' => '2024-01-01 09:00:00',
            'outTime' => '2024-01-01 17:00:00',
            'type' => 'checkin',
            'userProjectId' => 456
        ];
    }
    
    public static function getInvalidTimecardData()
    {
        return [
            'userId' => 123,
            'inTime' => '2024-01-01 09:00:00'
            // Missing required fields
        ];
    }
}
```

### Database Seeding
```php
// Seed test database with known data
public function setUp(): void
{
    parent::setUp();
    
    // Insert test users
    $this->db->table('users')->insert([
        'id' => 123,
        'name' => 'Test User',
        'email' => 'test@example.com'
    ]);
    
    // Insert test timecards
    $this->db->table('timecards')->insert([
        'user_id' => 123,
        'check_in' => '2024-01-01 09:00:00',
        'check_out' => '2024-01-01 17:00:00'
    ]);
}
```

## ⚡ Performance Testing

### Test Performance Guidelines
```php
// Test execution time limits
public function testLargeDatasetPerformance()
{
    $startTime = microtime(true);
    
    // Process 1000 timecard entries
    for ($i = 0; $i < 1000; $i++) {
        $this->processTimecardEntry($i);
    }
    
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    
    // Should complete within 5 seconds
    $this->assertLessThan(5.0, $executionTime);
}
```

### Memory Usage Testing
```php
// Monitor memory usage
public function testMemoryUsage()
{
    $initialMemory = memory_get_usage();
    
    // Execute memory-intensive operation
    $this->processLargeDataset();
    
    $finalMemory = memory_get_usage();
    $memoryIncrease = $finalMemory - $initialMemory;
    
    // Should not exceed 50MB
    $this->assertLessThan(50 * 1024 * 1024, $memoryIncrease);
}
```

## 📈 Metrics and Reporting

### Test Metrics Dashboard
```php
// Generate test metrics
class TestMetrics
{
    public static function generateReport()
    {
        return [
            'total_tests' => 45,
            'passed_tests' => 43,
            'failed_tests' => 2,
            'coverage_percentage' => 85.5,
            'execution_time' => '2.3s',
            'memory_usage' => '15.2MB'
        ];
    }
}
```

### Coverage Reports
```bash
# Generate HTML coverage report
vendor/bin/phpunit --coverage-html coverage tests/unit/

# Generate XML coverage report
vendor/bin/phpunit --coverage-xml coverage tests/unit/

# Generate text coverage report
vendor/bin/phpunit --coverage-text tests/unit/
```

## 🎯 Conclusion

This unit testing guide provides a comprehensive framework for ensuring code quality and reliability in the Adult Foster Care Professional application. By following these guidelines, developers can:

- ✅ Ensure code reliability
- ✅ Prevent regression bugs
- ✅ Maintain code quality
- ✅ Enable confident refactoring
- ✅ Improve team collaboration

### Quick Start Checklist
- [ ] Set up PHPUnit environment
- [ ] Create test files for new functionality
- [ ] Run tests before committing code
- [ ] Maintain test coverage above 80%
- [ ] Update tests when functionality changes
- [ ] Use realistic test data
- [ ] Follow naming conventions
- [ ] Document test scenarios

---

**Last Updated**: January 2024  
**Version**: 1.0  
**Maintainer**: Development Team 