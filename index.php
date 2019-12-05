<?php
/**
 * @author Denald Hushi
 */
require_once 'vendor/autoload.php';
require_once 'models/Configuration.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$f = new FileReader('storage/');
$files = $f->Read();

foreach ($files as $key => $value)
{
    $def = new XMLParser($value);
    $details = $def->parser('detailsData');
    $header = $def->parser('headerData');
    if ($details) {
    	echo "Inserted!<BR>";
    }    
}
