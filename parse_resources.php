<?php

$source = "source";
$path = "resources";

mkdir($source);
$files = recursive_files($path);

foreach($files as $file) {
	if (in_array(substr($file, -3), ["cnv", "qst"])) {
		parse_resources($file);
	} else {
		$f = $source."/".basename($file);
		copy($file, $f);
	}
}
echo "done.\n";

function recursive_files($path) {
	$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

	$files = array(); 
	foreach ($rii as $file) {
		if (!$file->isDir())
			$files[] = $file->getPathname();
	}
	return $files;
}

function parse_resources($file)
{
	GLOBAL $source;
	echo $file."\n";
	$bin = new Binary;
	$bin->open($file);
	$pos = $bin->strpos("enUS");
	if ($pos === false) {
		echo "$file $pos error\n";
		return;
	}
	$pos += 4;
	$bin->seek($pos);
	$length = $bin->readn(4);
	if ($length > 1000) {
		echo "$file error\n";
		return;
	}
	for($i=0; $i<$length; $i++) {
		$len = $bin->readn(4);
		$strs[] = str_replace(["\n"], ["{^n}"], $bin->reads($len));
	}
	$f = $source."/".substr(basename($file), 0, -3)."txt";
	file_put_contents($f, implode(PHP_EOL, $strs).PHP_EOL);
}

class Binary {
	var $cur_pos;
	var $handle;
	function pos() {
		return $this->cur_pos;
	}
	function open($file) {
		$this->cur_pos = 0;
		$this->handle = file_get_contents($file);
	}
	function close() {
		$this->cur_pos = 0;
	}
	function readn($length) {
		$r = strrev(substr($this->handle, $this->cur_pos, $length));
		$this->cur_pos += $length;
		if ($length == 4)
			$format = "N";
		else
			$format = "n";
		$buffer = unpack($format, $r);
		return $buffer[1];
	}
	function reads($length) {
		$buffer = substr($this->handle, $this->cur_pos, $length);
		$this->cur_pos += $length;
		return $buffer;
	}
	function seek($length) {
		$this->cur_pos += $length;
	}
	function strpos($s) {
		return strpos($this->handle, $s);
	}
}
?>
