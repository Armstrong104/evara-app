<?php

function imageUpload($image, $path)
{
    $imgName = $path . time() . rand(0,500000) . '.' . $image->extension();
    $directory =  'upload/'.$path . '/' ;
    $image->move($directory, $imgName);
    return $directory . $imgName;
}
