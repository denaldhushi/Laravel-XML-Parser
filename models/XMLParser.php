<?php
/**
 * @author Denald Hushi
 */
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;
class XMLParser extends CreateSchema
{
    function __construct($xml)
    {
        $this->xml = $xml;
    }
    function parser($key)
    {
        $file = simplexml_load_file($this->xml);
        $data = array();
        foreach ($file as $k => $v)
        {
            foreach ($v->$key as $i => $j)
            {
                array_push($data, $j);
            }
        }
        $cs = new CreateSchema();
        foreach ($data as $l => $m)
        {
            $cs->Insert($m, $key);
        }
        return true;
    }
}
?>
