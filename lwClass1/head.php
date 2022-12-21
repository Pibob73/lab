<?php
require_once 'File.php';
require_once 'Disk.php';
require_once 'Direct.php';
require_once 'Interface.php';
$folder = new File('gig');
$disk = new Disk('C');
$file2 = new File('dwarf');
$direct = new Direct();
$direct->record('C:/dif/ads/', [$folder, $file2]);
echo $file2->render() . "\n";
echo $direct->render() . "\n";
$disk->addElement($direct);
$disk->addElement($direct);
$disk->addElement($direct);
echo $disk->render() . "\n";