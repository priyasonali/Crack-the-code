<?php
$guessNum = $_REQUEST['guess'];
$num = [1,1,1,2];
$num1 = implode("",$num);
$ac=null;

if($num1!=$guessNum) {
    $guess = array_map('intval', str_split($guessNum));
    $freqs = array_count_values($num);
    $freqsUser = array_count_values($guess);
    foreach ($guess as $key => $g) {
       $keyAc = array_search($g,$num);
        $val = $num[$key];
        if (in_array($g, $num)) {
            $freq = $freqs[$g];
            $freqUser = $freqsUser[$g];
            if($freq>1 && ($freq > $freqUser)){
                $ac .= 'repeatq.';
            }else if($freq == $freqUser){
                if($g==$val){
                    $ac .= 'good.';
                }else{
                    $ac .= 'notrtpos.';
                }
            }else if($freq < $freqUser){
                if($g==$val){
                    $ac .= 'good.';
                }else{
                    $ac .= 'notrtpos.';
                }
            }else if($g==$val || ($freq>1 && $g==$val)){
                $ac .= 'good.';
            }else{
                $ac .= 'notrtpos.';
            }
        }else{
            $ac .= 'nothr.';
        }
        if($freq == 1 || $freqUser>$freq){
            $num[$keyAc] = null;
        }
    }
    echo $ac;
}else{
    echo 'Correct';
}