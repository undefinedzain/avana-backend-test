<?php

require './vendor/autoload.php';

$inputFileName = 'Type_A.xlsx';

$validationResult = \Src\ValidateSheet::validate($inputFileName);

echo $validationResult;