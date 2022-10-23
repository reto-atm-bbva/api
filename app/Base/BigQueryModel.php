<?php

namespace App\Base;


use App\Utils\GeneratorSQLBigQuery;
use GPBMetadata\Google\Api\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class BigQueryModel extends Model
{
    use GeneratorSQLBigQuery;

    public $table = '';
    public $dataset = '';


    protected $bigQuery;
    protected $table_id;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table_id = '`' . env('GCP_PROJECT_ID') . '.' . $this->dataset . '.' . $this->table . '`';


        $this->bigQuery = new \Google\Cloud\BigQuery\BigQueryClient([
            'projectId' => env('GCP_PROJECT_ID'),
            'keyFile' => json_decode(file_get_contents(storage_path(env('GCP_KEY_FILE'))), true)
        ]);
    }


    public function execute($query, $options = [])
    {

        \Illuminate\Support\Facades\Log::info($query);
        $queryJobConfig = $this->bigQuery->query($query, $options);
        $queryResults = $this->bigQuery->runQuery($queryJobConfig);
        return collect($queryResults);
    }


    /**
     * @param $fields
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public static function all($fields = '*', $limit = null)
    {
        $query = self::selectSQL((new static)->table_id, $fields) . self::limitSQL($limit);
        $query = trim($query);
        return (new static())->execute($query);
    }

    public static function find($id)
    {
        $constrains = self::whereSQL((new static())->primaryKey, '=', $id) . self::limitSQL(1);
        $result = self::select('*', $constrains);
        if ($result->count()) {
            return $result->first();
        }
        throw new \Exception("Record not found", 404);
    }

    public static function select($fields = '*', $constrains = "")
    {
        $query = self::selectSQL((new static)->table_id, $fields) . $constrains;
        return (new static())->execute($query);
    }

    /**
     * @param $field
     * @param $operation
     * @param $value
     * @return \Illuminate\Support\Collection
     */
    public static function where($field, $operation, $value)
    {
        $queryWhere = self::whereSQL($field, $operation, $value);

        $query = "SELECT * FROM " . (new static)->table_id . " " . $queryWhere;
        $query = trim($query);
        return (new static())->execute($query);

    }


}
