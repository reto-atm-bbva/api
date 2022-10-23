<?php

namespace App\Http\Controllers;

use Google\Cloud\BigQuery\BigQueryClient;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function getData()
    {
        // connect to BigQuery php laravel
        $bigQuery = new BigQueryClient([
            'projectId' => 'bbva-latam-hack22mex-5012',
            'keyFile'=> json_decode(file_get_contents(storage_path('app/keys/bbva-latam-hack22mex-5012-4f3c16ddc6a1.json')), true)
        ]);
        /*// get data from BigQuery
        $query = 'SELECT * FROM `bbva-latam-hack22mex-5012.dev.atm` LIMIT 10';
        $queryJobConfig = $bigQuery->query($query);
        $queryResults = $bigQuery->runQuery($queryJobConfig);
        $rows = $queryResults->rows();
        // return data
        return response()->json($queryResults);*/



        // Get an instance of a previously created table.
        $dataset = $bigQuery->dataset('dev');
        $table = $dataset->table('atm');

// Run a query and inspect the results.
        $queryJobConfig = $bigQuery->query(
            'SELECT * FROM `bbva-latam-hack22mex-5012.dev.atm` LIMIT 10'
        );
        $queryResults = $bigQuery->runQuery($queryJobConfig);


//        return response()->json($queryResults->rows()->toArray());

        /*foreach ($queryResults as $row) {
            print_r($row);
        }*/

        return (collect($queryResults));


    }
}
