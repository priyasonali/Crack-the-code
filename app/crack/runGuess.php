<?php
session_start();
$num1 = $_SESSION["number"];
$guessNum = $_REQUEST['guess'];
$num  = array_map('intval', str_split($num1));
$ac=null;

if($num1!=$guessNum) {
    $perv=0;
    $i=1;
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
                $ac .= '<span class="glyphicon glyphicon-repeat text-info"></span>';
            }else if($freq == $freqUser){
                if($g==$val){
                    $ac .= '<span class="glyphicon glyphicon-ok text-success"></span>';
                }else{
                    $ac .= '<span class="glyphicon glyphicon-transfer text-warning"></span>';
                }
            }else if($freq < $freqUser){
                if($g==$val){
                    $ac .= '<span class="glyphicon glyphicon-ok text-warning"></span>';
                    $i++;
                }else{
                    if($freq==1 && $i==1 && $g==$val){
                        $ac .= '<span class="glyphicon glyphicon-ok text-success"></span>';
                    }else if($freq==1 && $i==1 && $g!=$val){
                        $ac .= '<span class="glyphicon glyphicon-transfer text-warning"></span>';
                    }else if($i<=$freq && $g!=$val) {
                        $ac .= '<span class="glyphicon glyphicon-remove text-danger"></span>';
                        $i++;
                    }else  if($i<=$freq && $g==$val) {
                          $ac .= '<span class="glyphicon glyphicon-ok text-success"></span>';
                          $i++;
                      }
                    else if($i<=$freqUser && $g!=$val){
                        $ac .= '<span class="glyphicon glyphicon-remove text-danger"></span>'; //prob
                    }else if($i<=$freqUser && $g==$val){
                        $ac .= '<span class="glyphicon glyphicon-transfer text-danger"></span>'; //prob
                    }
                }
            }else if($g==$val || ($freq>1 && $g==$val)){
                $ac .= '<span class="glyphicon glyphicon-ok text-success"></span>';
            }else{
                $ac .= '<span class="glyphicon glyphicon-transfer text-warning"></span>';
            }
        }else{
            $ac .= '<span class="glyphicon glyphicon-remove text-danger"></span>';
        }
    }
    echo $ac.','.$num1;
}else{
    echo 'Correct'.','.$num1;
}