<?php

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($date_format);    
}