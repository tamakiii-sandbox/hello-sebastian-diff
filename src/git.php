<?php

use SebastianBergmann\Diff\Diff;
use SebastianBergmann\Diff\Chunk;
use SebastianBergmann\Diff\Line;
use SebastianBergmann\Diff\Parser;
use SebastianBergmann\Git\Git;

include __DIR__ . '/../vendor/autoload.php';

function map(array $array, callable $callable): array {
  return array_map($callable, $array);
}

$git = new Git(realpath(__DIR__ . '/..'));

$diff = $git->getDiff(
  'a084544a7b6164c2f1d64fed25b5e09d00154332',
  '4f2144960c77302562e9796ad94802f687703565'
);

$parser = new Parser;
$result = $parser->parse($diff);

// echo json_encode($result); #=> [{},{},{}]

$json = map($result, function(Diff $diff) {
  return [
    'from' => $diff->getFrom(),
    'to' => $diff->getTo(),
    'chunks' => map($diff->getChunks(), function(Chunk $chunk) {
      return [
        'start' => $chunk->getStart(),
        'end' => $chunk->getEnd(),
        'start_range' => $chunk->getStartRange(),
        'end_range' => $chunk->getEndRange(),
        'lines' => map($chunk->getLines(), function(Line $line) {
          return [
            'type' => $line->getType(),
            'content' => $line->getContent(),
          ];
        }),
      ];
    }),
  ];
});

echo json_encode($json);
