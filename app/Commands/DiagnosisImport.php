<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Models\Common_model; // Assuming CommonModel is used for DB operations

class DiagnosisImport extends BaseCommand
{
    protected $group = 'Import';
    protected $name = 'import:diagnosis';
    protected $description = 'Import diagnosis data from an Excel file';

    // Method to run the command
    public function run(array $params)
    {
        // Validate that we have the correct number of parameters
        if (count($params) < 2) {
            CLI::error('Invalid arguments. You must provide the file path and batch size.');
            return;
        }

        $filePath = $params[0];
        $batchSize = (int) $params[1];

        if (!file_exists($filePath)) {
            CLI::error('The specified file does not exist: ' . $filePath);
            return;
        }

        // Increase memory limit for large files
        ini_set('memory_limit', '512M');

        // Initialize reader
        $reader = new Xlsx();
        
        try {
            // Load the spreadsheet
            $spreadsheet = $reader->load($filePath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            // Start processing in chunks (batch processing)
            $totalRows = count($sheetData);
            $batchData = [];
            $row = 1; // Start from row 2 (skip header)
            
            for ($startRow = 2; $startRow <= $totalRows; $startRow += $batchSize) {
                $endRow = min($startRow + $batchSize - 1, $totalRows);

                // Process the chunk
                $chunkData = array_slice($sheetData, $startRow - 1, $batchSize);
                foreach ($chunkData as $csvdata) {
                    if($csvdata[0] != '')
                    {                        
                        $batchData[] = [
                            'dia_idc_code' => $csvdata[0] ?? '',
                            'dia_name' => $csvdata[1] ?? '',
                            'dia_status' => 'ACTIVE',
                            'dia_billing' => 'yes',
                            'dia_created_on' => date('Y-m-d H:i:s'), // Or use constant `TODAY_DATE_TIME`
                        ];
                    }
                }

                // Insert or update records
                if (!empty($batchData)) {
                    $this->insertOrUpdate(TBL_DIAGNOSIS, $batchData);
                    CLI::write('Processed ' . count($batchData) . ' records from row ' . $startRow . ' to ' . $endRow);
                    $batchData = []; // Reset batch data for next iteration
                }
            }

            CLI::success('Diagnosis import completed successfully!');
        } catch (\Exception $e) {
            CLI::error('Error processing the file: ' . $e->getMessage());
        }
    }

    // Insert or Update records in batch
    public function insertOrUpdate($table, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);

        // Loop through the data and either insert or update
        foreach ($data as $record) {
            // Check if the record already exists using getWhere()
            $query = $builder->getWhere(['dia_idc_code' => $record['dia_idc_code']]);
            $existingRecord = $query->getRow();

            if ($existingRecord) {
                // If the record exists, update it // As per discussion with anish do not Update it
                //$builder->update($record, ['dia_idc_code' => $record['dia_idc_code']]);
            } else {
                // If the record does not exist, insert it
                $builder->insert($record);
            }
        }
    }

}
