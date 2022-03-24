<?php

function getMax()
{
    $arr = [5,2,1,43,3,6,2,12];
   // return ['second'=>$secondMax,'max'=>$max,'third'=>$thirdMax];
}

$arr = [5,2,1];

function bubbleSort($arr)
{
     $len = count($arr);

    for($i = 1; $i < $len; $i++) {
        for($k = 0; $k < $len - $i; $k++) {
            if($arr[$k] > $arr[$k + 1]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }
    return $arr;
}

function maxGet($arr){

    $max = $arr[0]; //43
    $second = PHP_INT_MIN; //5
    $third = PHP_INT_MIN; //2

    // Traverse array elements to
    // find the third Largest
    for ($i = 1; $i < sizeof($arr) ; $i ++)
    {
        /* If current element is greater
        than max, then update max,
        second and third */
        if ($arr[$i] > $max) // 43>5
        {
            $third = $second;  //thir=2
            $second = $max; //second=5
            $max = $arr[$i];  //$max = 43
        }

        /* If arr[i] is in between
        max and second */
        else if ($arr[$i] > $second)  //1>2
        {
            $third = $second; //0=0
            $second = $arr[$i]; //$sec=2
        }

        /* If arr[i] is in between
        second and third */
        else if ($arr[$i] > $third) //1>0
            $third = $arr[$i];
    }


    $array = ['max' => $max, 'second' => $second,'third' => $third];
    return $array;


// Driver Code
/*
    $secondMax = $arr[0];
    for ($i=1;$i<sizeof($arr);$i++) {
        if ($arr[$i]<$max && $arr[$i]>$secondMax ){
            $secondMax = $arr[$i];
        }
    }

    $third = $arr[0];
    for ($i=1;$i<sizeof($arr);$i++) {
        if ($arr[$i]<$secondMax && $arr[$i]>$third ){
            $third = $arr[$i];
        }
    }*/

  //  $secondMax = 0;
   // $thirdMax = 0;

}

var_dump(bubbleSort($arr));
