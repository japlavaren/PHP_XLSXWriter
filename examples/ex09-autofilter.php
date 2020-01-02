<?php
set_include_path( get_include_path().PATH_SEPARATOR."..");
include_once("xlsxwriter.class.php");

$chars = 'abcdefgh';

$sheetName = 'Sheet1';
$writer = new XLSXWriter();
$writer->writeSheetHeader($sheetName, ['Header' => '@'], ['auto_filter' => 2, 'widths' => [15, 15, 30]]);
$writer->writeSheetRow($sheetName, ['col-string', 'col-numbers', 'col-timestamps']);
$writer->setSheetColumnTypes($sheetName, ['string', 'integer', 'datetime']);

for($i=0; $i<1000; $i++)
{
    $writer->writeSheetRow('Sheet1', array(
        str_shuffle($chars),
        rand()%10000,
        date('Y-m-d H:i:s',time()-(rand()%31536000))
    ));
}
$writer->writeToFile('xlsx-autofilter.xlsx');
echo '#'.floor((memory_get_peak_usage())/1024/1024)."MB"."\n";
