<?php
/**
 * @author Denald Hushi
 */
require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
   "driver" => "mysql",
   "host" =>"localhost",
   "database" => "",
   "username" => "",
   "password" => ""
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();