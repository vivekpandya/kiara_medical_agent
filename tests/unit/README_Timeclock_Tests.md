# Timeclock Module Unit Tests

This directory contains comprehensive unit tests for the Timeclock module of the Adult Foster Care Professional application.

## Test Files Overview

### 1. TimeclockTest.php
Main test file for the Timeclock module functionality including:
- Distance calculation functions
- Time calculation and formatting
- Geo-fencing validation
- Check-in/out validation
- Break time calculations
- Overtime calculations
- Weekly timecard calculations
- Time format conversions
- Edge case testing

### 2. AttendingCareModelTest.php
Tests for the AttendingCare model including:
- Database operation methods
- Data retrieval functions
- Timecard data validation
- User log retrieval
- Client list operations
- HCPC code retrieval
- Approval status processing

### 3. TimeclockHelperTest.php
Tests for helper functions used in the Timeclock module:
- Input sanitization (make_safe_post, make_safe_get)
- Time formatting functions
- Time calculation functions
- Unit calculations
- Date/time validation
- Business hours validation
- Time comparison functions

### 4. TimecardCronjobTest.php
Tests for the automated timecard processing functionality:
- Daily and weekly total calculations
- Cronjob execution timing
- Data aggregation
- Missing timecard detection
- Error handling
- Performance testing

## Running the Tests

### Prerequisites
- PHP 7.4 or higher
- CodeIgniter 4 framework
- PHPUnit testing framework

### Running All Timeclock Tests
```bash
# Run all timeclock tests
vendor/bin/phpunit tests/unit/TimeclockTest.php
vendor/bin/phpunit tests/unit/AttendingCareModelTest.php
vendor/bin/phpunit tests/unit/TimeclockHelperTest.php
vendor/bin/phpunit tests/unit/TimecardCronjobTest.php
```

### Running Specific Test Classes
```bash
# Run only the main timeclock tests
vendor/bin/phpunit tests/unit/TimeclockTest.php

# Run only model tests
vendor/bin/phpunit tests/unit/AttendingCareModelTest.php

# Run only helper function tests
vendor/bin/phpunit tests/unit/TimeclockHelperTest.php

# Run only cronjob tests
vendor/bin/phpunit tests/unit/TimecardCronjobTest.php
```

### Running Specific Test Methods
```bash
# Run a specific test method
vendor/bin/phpunit --filter testDistanceCalculation tests/unit/TimeclockTest.php

# Run multiple specific tests
vendor/bin/phpunit --filter "testDistanceCalculation|testCalculateTotalHours" tests/unit/TimeclockTest.php
```

## Test Coverage

### Core Functionality Tested
1. **Time Calculations**
   - Total hours calculation
   - Break time calculations
   - Overtime calculations
   - Weekly aggregations

2. **Geolocation Functions**
   - Distance calculations
   - Geo-fencing validation
   - Location-based check-in/out

3. **Data Validation**
   - Input sanitization
   - Time format validation
   - Date validation
   - Business rules validation

4. **Database Operations**
   - Model method existence
   - Data structure validation
   - Query parameter validation

5. **Business Logic**
   - Check-in/out validation
   - Break time rules
   - Overtime calculations
   - Approval workflows

### Edge Cases Covered
- Invalid time formats
- Null/empty values
- Future dates
- Overnight shifts
- Multiple day spans
- Invalid coordinates
- XSS prevention
- Performance testing

## Test Data

The tests use realistic test data including:
- Valid time ranges (6 AM - 10 PM business hours)
- Realistic coordinates (New York, Los Angeles)
- Standard work schedules (8-hour days, 40-hour weeks)
- Common time formats and conversions

## Mocking Strategy

Since these are unit tests, we focus on:
- Testing function logic without database dependencies
- Validating input/output transformations
- Testing business rules and calculations
- Ensuring proper error handling

## Continuous Integration

These tests can be integrated into CI/CD pipelines:
```yaml
# Example GitHub Actions workflow
- name: Run Timeclock Tests
  run: |
    vendor/bin/phpunit tests/unit/TimeclockTest.php
    vendor/bin/phpunit tests/unit/AttendingCareModelTest.php
    vendor/bin/phpunit tests/unit/TimeclockHelperTest.php
    vendor/bin/phpunit tests/unit/TimecardCronjobTest.php
```

## Maintenance

### Adding New Tests
When adding new functionality to the Timeclock module:
1. Add corresponding test methods to the appropriate test file
2. Follow the existing naming convention: `test[FunctionalityName]`
3. Include both positive and negative test cases
4. Test edge cases and error conditions

### Updating Tests
When modifying existing functionality:
1. Update corresponding test methods
2. Ensure all test cases still pass
3. Add new test cases for new features
4. Remove obsolete test cases

## Troubleshooting

### Common Issues
1. **Helper functions not found**: Ensure helper files are autoloaded
2. **Database connection errors**: Tests should not require actual database connections
3. **Session issues**: Mock session data for tests
4. **File path issues**: Use relative paths from project root

### Debugging Tests
```bash
# Run tests with verbose output
vendor/bin/phpunit --verbose tests/unit/TimeclockTest.php

# Run tests with coverage report
vendor/bin/phpunit --coverage-html coverage tests/unit/TimeclockTest.php
```

## Best Practices

1. **Test Isolation**: Each test should be independent
2. **Descriptive Names**: Use clear, descriptive test method names
3. **Single Responsibility**: Each test should test one specific functionality
4. **Edge Cases**: Always test boundary conditions and error cases
5. **Performance**: Keep tests fast and efficient
6. **Maintainability**: Write tests that are easy to understand and maintain

## Contributing

When contributing to the Timeclock module:
1. Write tests for new functionality
2. Ensure all existing tests pass
3. Follow the established testing patterns
4. Document any new test requirements
5. Update this README if needed 