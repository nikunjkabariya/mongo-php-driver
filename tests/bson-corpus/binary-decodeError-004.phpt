--TEST--
Binary type: subtype 0x02 length too short
--XFAIL--
Depends on CDRIVER-1876
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('13000000057800060000000201000000FFFF00');

throws(function() use ($bson) {
    var_dump(toPHP($bson));
}, 'MongoDB\Driver\Exception\UnexpectedValueException');

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\UnexpectedValueException
===DONE===