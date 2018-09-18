<?php


function binToDec($binaryStr) {
    $res = 0;

    $it = $binaryStr->getIterator();
    
    while ($it->valid()) {
        $cur = $it->current();
        
        $res = ($res * 2) + ($cur == "1" ? 1 : 0);
        
        $it->next();
    }
    
    return $res;
}

function binToHex($binaryStr) {
    $dec = binToDec($binaryStr);
    $res = "";
    
    while ($dec > 0) {
        $rem = $dec % 16;
        $rem = ($rem > 9 ? chr(ord('A') + ($rem - 10)) : chr((ord('0') +  $rem)));
        $res = $rem . $res;
        $dec = floor($dec / 16);
    }
    
    
    return $res;
}

function binToOnes($binaryStr) {
    $val = "";
    
    for ($i = 0; $i < count($binaryStr); $i++) {
        $val = $val .  ($binaryStr[$i] == "1" ? "0" : "1");
    }
    
    return $val;
}

function binToTwos($binaryStr) {
    $vals = array();
    
    for ($i = 0; $i < count($binaryStr); $i++) {
        $vals[] =  ($binaryStr[$i] == "1" ? 0 : 1);
    } 
    
    $vals[7] += 1;
    
    $carry = floor($vals[7] / 2);
    $rem = ($vals[7] % 2);
    
    if ($carry == 1) {
        $vals[7] = $rem;
    }
    
    $i = 6;
    
    while ($i >= 0 && $carry != 0) {
        $vals[$i] += $carry;
        $rem = $vals[$i] % 2;
        $carry = $vals[$i] / 2;
        $vals[$i] = $rem;
        $i--;
    }
    
    if (carry == 1) {
        array_unshift($vals, array(carry));
    }
    
    $res = "";
    
    for ($i = 0; $i < count($vals); $i++) {
        $res = $res . ($vals[$i] == 0 ? "0" : "1");
    }
    
    return $res;
}


function displayImages($sources) {
    echo "<div id = 'binStr'>";
    for ($i = 1; $i <= count($sources); ++$i) {
        $bin = $sources[$i - 1];
        echo "<div class = 'container'>";
        echo "<img id = 'num' src = 'imgs/" . $bin . ".png' alt = '" . substr($bin, 0, 1) . "'/>";
            echo "<div class = 'overlay'>";
                $val = pow(2, 8 - $i);
                // " <br />" . $val . " * " . $bin . " = " . ($bin == 0 ? 0 : $val) .
                echo "<div class = 'text'>" . $val . "</div>";
            echo "</div>";
        echo "</div>";
    }
    
    echo "</div>";
}

function displayDec($dec) {
    echo "<div id = 'dec'> Decimal: " . $dec . "</div>";
}

function displayHex($hex) {
    echo "<div id = 'hex'> Hexadecimal: " . $hex . "</div>";
}

function displayOnes($ones) {
    echo "<div id = 'ones'> 1's Complement: " . $ones . "</div>";
}

function displayTwos($twos) {
    echo "<div id = 'twos'> 2's Complement: " . $twos . "</div>";
}


function makeString() {
    $res = array(0, 8, -1);
    
    for ($i = 0; $i < 8; ++$i) {
        $num = rand(0, 1);
        $res[$i] = strval($num);
    }
    
    return new ArrayObject($res);
}

function binaryStrtoStr($binaryStr) {
    $res = "";
    
    for ($i = 0; $i < count($binaryStr); $i++) {
        $res = $res . $binaryStr[$i];
    }
    
    return $res;
}

function writeToFile($binaryStr, $dec, $hex, $ones, $twos) {
    $file = fopen("binaryInfo.txt", "w");
    
    fwrite($file, "Binary String: " . $binaryStr . "\n");
    fwrite($file, "Decimal: " . $dec . "\n");
    fwrite($file, "Hexadecimal: " . $hex . "\n");
    fwrite($file, "1's Complement: " . $ones . "\n");
    fwrite($file, "2's Complement: " . $twos . "\n");
    fclose($file);
}

function main() {
    $binaryStr = makeString();
    displayImages($binaryStr);
    
    return $binaryStr;
}



?>