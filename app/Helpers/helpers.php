<?php

function imageUpload($image, $directory)
{
    $imageExtension = $image->getClientOriginalExtension();
    $imageName = rand(10000,50000) . '.' . $imageExtension;
    $image->move($directory, $imageName);
    return $directory . $imageName;
}
