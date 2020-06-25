<?php

use SebastianBergmann\Diff\Parser;
use SebastianBergmann\Git\Git;

include __DIR__ . '/../vendor/autoload.php';

$git = new Git(realpath(__DIR__ . '/..'));

$diff = $git->getDiff(
  'a084544a7b6164c2f1d64fed25b5e09d00154332',
  '4f2144960c77302562e9796ad94802f687703565'
);

$parser = new Parser;

print_r($parser->parse($diff));
