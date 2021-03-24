<?php
// Phone number preprocessing
$phone = '0001092283312';
$pTempArr = str_split($phone);
$nonZeroFound = false;
$idxToBeRemoved = array();

$res[] = "CP3";
echo "Starting number: " . $phone;
var_dump($pTempArr);

// Get the indexes of wrongfully placed '0'
for ($i = 0; $i < sizeof($pTempArr); $i++) {
    $item = $pTempArr[$i];

    echo "CP1-- Item: " . $item . "<br>";

    if ($item != "0"){
        $nonZeroFound = true;
        echo "CP2-- Item is not Zero" . "<br>";
    }
    if (!$nonZeroFound){
        echo "CP3-- Zero Found. Item:" . $item . "<br>";
        if ($item == "0"){
            $idxToBeRemoved[] = $i;
            echo "CP4-- Index For Removal:" . $i . "<br>";
        }
    }

    echo "<br>";
}

echo "idxTBR :";
var_dump($idxToBeRemoved);

$res[] = "CP5";

// Make new array without those '0's
$newpTempArr = array();
$removeCount = sizeof($idxToBeRemoved);
for ($i = 0; $i < sizeof($pTempArr); $i++) {
    $item = $pTempArr[$i];
    echo "Item in pTemp: " . $item . " || Index: " . $i . "<br>";

    if (sizeof($idxToBeRemoved) < 1) {
        $newpTempArr[] = $item;
    }
    else{
        // Iterate through the wrong number indexes
        for ($j = 0; $j < sizeof($idxToBeRemoved); $j++) {
            echo "Iterating through wrong number index, with $removeCount indexes to be removed...<br>";

            $wrongNumIdx = $idxToBeRemoved[$j];
            echo "Wrong number index: " . $wrongNumIdx . "<br>";

            // Add if item isn't in the wrong number index
            if ($i != $wrongNumIdx) {
                echo "Comparing to Wrong index || i: " . $i . ", Wrong number index: " . $wrongNumIdx . "<br>";
                if ($removeCount < 1) {
                    echo "Adding $item, with an index of $i to newPhoneNumTempArr...";
                    $newpTempArr[] = $item;
                    break;
                }
            }
            else{
                echo "Same Index - Comparing to Wrong index || i: " . $i . ", Wrong number index: " . $wrongNumIdx . "<br>";
                $removeCount--;
                break;
            }
        }
    }

    echo "<br>";
}
echo "Array Without starting 0s:";
var_dump($newpTempArr);
$cleanPhnNum = implode("", $newpTempArr);
echo "Clean Phone Number: " . $cleanPhnNum . "<br>";
?>