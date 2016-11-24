<?php
$jml_hari = 3;
$date=date_create("10-06-2016");
date_add($date,date_interval_create_from_date_string("$jml_hari days"));
echo date_format($date,"d-m-Y");