<?php

$str = 'chs cbd acd deec cdtc cxeb cbbc dcac cbec';

preg_match_all('/c..c/', $str, $matches);

print_r($matches[0]);

?>