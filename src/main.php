<?php

use SebastianBergmann\Diff\Differ;

include __DIR__ . '/../vendor/autoload.php';

$differ = new Differ;
print $differ->diff('foo', 'bar');
