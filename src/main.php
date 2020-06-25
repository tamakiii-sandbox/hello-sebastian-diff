<?php

use SebastianBergmann\Diff\Differ;

include __DIR__ . '/../vendor/autoload.php';

$a = 'foo';
$b = 'bar';

$differ = new Differ;
print $differ->diff($a, $b);
