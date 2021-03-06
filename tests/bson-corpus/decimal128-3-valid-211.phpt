--TEST--
Decimal128: [basx163] Numbers with E
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('180000001364000A00000000000000000000000000523000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "10E+09"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "1.0E+10"}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364000a00000000000000000000000000523000
{"d":{"$numberDecimal":"1.0E+10"}}
{"d":{"$numberDecimal":"1.0E+10"}}
{"d":{"$numberDecimal":"1.0E+10"}}
180000001364000a00000000000000000000000000523000
180000001364000a00000000000000000000000000523000
===DONE===