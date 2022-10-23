<?php

namespace App\Utils;

trait GeneratorSQLBigQuery
{
    public static function whereSQL($field, $operation, $value)
    {
        return " WHERE `$field` $operation '$value'";
    }


    public static function whereAndSQL($field, $operation, $value)
    {
        return " AND " . self::whereSQL($field, $operation, $value);
    }

    public static function whereOrSQL($field, $operation, $value)
    {
        return " OR " . self::whereSQL($field, $operation, $value);
    }


    public static function whereMultipleSQL($params, $comparation = 'AND')
    {
        $where = "";
        if (is_array($params)) {

            foreach ($params as $index => $param) {

                $field = $param['field'];
                $operation = $param['operation'] ?? '=';
                $value = $param['value'];

                if ($index === 0) {
                    $where .= self::whereSQL($field, $operation, $value);
                } else {
                    if ($comparation == "AND") {
                        $where .= self::whereAndSQL($field, $operation, $value);
                    } else {
                        $where .= self::whereOrSQL($field, $operation, $value);

                    }
                }
            }
            return $where;
        }

        return "";
    }

    public static function limitSQL($limit)
    {
        $queryLimit = "";
        if ($limit) {
            $queryLimit = " LIMIT $limit";
        }
        return $queryLimit;
    }

    public static function selectSQL($table, $fields = "*")
    {
        $str_fields = "";
        if (is_array($fields)) {
            $str_fields = implode(",", $fields);
        } else {
            $str_fields = $fields;
        }

        return " SELECT " . $str_fields . " FROM " . $table . "";
    }


}
