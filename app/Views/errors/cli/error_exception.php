<?php
/**
 * CLI Error Exception View
 */

echo "ERROR: " . $exception->getMessage() . "\n";
echo "File: " . $exception->getFile() . "\n";
echo "Line: " . $exception->getLine() . "\n\n";
echo "Stack Trace:\n";
echo $exception->getTraceAsString() . "\n";
?>
