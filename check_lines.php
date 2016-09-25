<?php

$source_directory = 'source';
$target_directory = 'simplified_chinese';
$target_directory = 'traditional_chinese';
line_verify($source_directory, $target_directory);

function line_verify($source_directory, $target_directory)
{
	$source = array_diff(scandir($source_directory), array('..', '.', 'language.def'));
	foreach($source as $file) {

		//echo $file."\n";
		$source_lines = file($source_directory."/".$file);
		$target_lines = file($target_directory."/".$file);
		if (sizeof($source_lines) != sizeof($target_lines)) {
			echo "$file ".sizeof($source_lines)." != ".sizeof($target_lines)."\n";
		}
		{
			for($i=0; $i<sizeof($source_lines); $i++) {
				$source_lines[$i] = trim($source_lines[$i]);
				$target_lines[$i] = trim($target_lines[$i]);
				if (($source_lines[$i] && !$target_lines[$i]) || (!$source_lines[$i] && $target_lines[$i])) {
					echo "[$i] ".trim($source_lines[$i])."=".trim($target_lines[$i])."\n";
				}
			}
		}
	}
	if (fopen_utf8($source_directory."/".$file)) {
		echo $source_directory."/".$file." is BOM\n";
	}
	if (fopen_utf8($target_directory."/".$file)) {
		echo $target_directory."/".$file." is BOM\n";
	}
}
function fopen_utf8 ($filename) { 
    $file = @fopen($filename, "r"); 
    $bom = fread($file, 3); 
    if ($bom != b"\xEF\xBB\xBF") 
    { 
        return false; 
    } 
    else 
    { 
        return true; 
    } 
} 

?>
