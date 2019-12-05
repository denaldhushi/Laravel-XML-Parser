<?php
/**
 * @author Denald Hushi
 */
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;
class CreateSchema extends Eloquent
{
    public function Insert($data, $class)
    {
        $newArray = array();
        foreach ($data as $key => $value)
        {
            if (!in_array($key, $newArray))
            {
                array_push($newArray, $key);
            }
        }

        if (!Capsule::Schema()->hasTable($class))
        {
            $this->CreateTable($newArray, $class);
        }

        $s = new $class();
        $d = (array)$data;
        foreach ($d as $k => $val)
        {
            if (is_array($val))
            {
                $values = '';
                foreach ($val as $v)
                {
                    $values .= $v . ";";
                }
                $s->$k = utf8_decode($values);
            }
            else
            {
                $s->$k = utf8_decode($val);
            }
        }
        $s->save();
        return $s;
    }

    public function Delete($tableName, $where, $key)
    {
        Capsule::table($tableName)->where($where, "=", $key)->delete();
    }

    public function CreateTable($data, $tableName)
    {
        Capsule::schema()->create($tableName, function ($table) use ($data, $tableName)
        {
            $table->increments('id');
            foreach ($data as $key => $value)
            {
                $table->string($value);
            }
            $table->rememberToken();
            $table->timestamps();
        });
    }
}

