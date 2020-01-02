<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '..');
include_once("xlsxwriter.class.php");

$sheetName = 'Sheet1';
$writer = new XLSXWriter();
$writer->writeSheetRow($sheetName, ['Name', 'Value']);
$writer->setSheetColumnTypes($sheetName, ['string', 'price']);
$writer->writeSheet([
    ['Roman', 42.12],
    ['Jackie', 43],
    ['Steve', 17],
], $sheetName);
$writer->writeToFile('column-types.xlsx');
