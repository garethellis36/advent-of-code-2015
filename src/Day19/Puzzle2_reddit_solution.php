<?php

$file = [
    "Al => ThF",
    "Al => ThRnFAr",
    "B => BCa",
    "B => TiB",
    "B => TiRnFAr",
    "Ca => CaCa",
    "Ca => PB",
    "Ca => PRnFAr",
    "Ca => SiRnFYFAr",
    "Ca => SiRnMgAr",
    "Ca => SiTh",
    "F => CaF",
    "F => PMg",
    "F => SiAl",
    "H => CRnAlAr",
    "H => CRnFYFYFAr",
    "H => CRnFYMgAr",
    "H => CRnMgYFAr",
    "H => HCa",
    "H => NRnFYFAr",
    "H => NRnMgAr",
    "H => NTh",
    "H => OB",
    "H => ORnFAr",
    "Mg => BF",
    "Mg => TiMg",
    "N => CRnFAr",
    "N => HSi",
    "O => CRnFYFAr",
    "O => CRnMgAr",
    "O => HP",
    "O => NRnFAr",
    "O => OTi",
    "P => CaP",
    "P => PTi",
    "P => SiRnFAr",
    "Si => CaSi",
    "Th => ThCa",
    "Ti => BP",
    "Ti => TiTi",
    "e => HF",
    "e => NAl",
    "e => OMg"
];
$target = "ORnPBPMgArCaCaCaSiThCaCaSiThCaCaPBSiRnFArRnFArCaCaSiThCaCaSiThCaCaCaCaCaCaSiRnFYFArSiRnMgArCaSiRnPTiTiBFYPBFArSiRnCaSiRnTiRnFArSiAlArPTiBPTiRnCaSiAlArCaPTiTiBPMgYFArPTiRnFArSiRnCaCaFArRnCaFArCaSiRnSiRnMgArFYCaSiRnMgArCaCaSiThPRnFArPBCaSiRnMgArCaCaSiThCaSiRnTiMgArFArSiThSiThCaCaSiRnMgArCaCaSiRnFArTiBPTiRnCaSiAlArCaPTiRnFArPBPBCaCaSiThCaPBSiThPRnFArSiThCaSiThCaSiThCaPTiBSiRnFYFArCaCaPRnFArPBCaCaPBSiRnTiRnFArCaPRnFArSiRnCaCaCaSiThCaRnCaFArYCaSiRnFArBCaCaCaSiThFArPBFArCaSiRnFArRnCaCaCaFArSiRnFArTiRnPMgArF";
array_pop($file);

$repl = array_map(function($x) {return explode(' => ', $x);}, $file);

while ($target != 'e')
    foreach ($repl as $r)
        if (($pos = strpos($target, $r[1])) !== false AND @++$z)
            $target = substr_replace($target, $r[0], $pos, strlen($r[1]));

echo $z;