<?php

function imageUpload($image, $path)
{
    $imgName = $path . time() . rand() . '.' . $image->extension();
    $directory =  'upload/'.$path . '/' ;
    $image->move($directory, $imgName);
    return $directory . $imgName;
}
