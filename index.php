<?php
 $pdf_file   = 'pdf.pdf';
  $img2 = new imagick($pdf_file);
 

//get num of pages 
 $num_pages = $img2->getNumberImages();

for($i=0;$i<$num_pages;$i++)
{

    
    echo $save_to    = 'demo'.$i.'.jpg';

     $img = new imagick();

//this must be called before reading the image, otherwise has no effect - "-density {$x_resolution}x{$y_resolution}"
//this is important to give good quality output, otherwise text might be unclear
    $img->setResolution(200,200);

//read the pdf
   $img->readImage("{$pdf_file}[$i]");



    //echo json_encode($num_pages);

//reduce the dimensions - scaling will lead to black color in transparent regions
    $img->scaleImage(800,0);

//set new format
    $img->setImageFormat('jpg');

// -flatten option, this is necessary for images with transparency, it will produce white background for transparent regions
    $img = $img->flattenImages();

//save image file
    $img->writeImages($save_to, false);
   
}

?>
<!---->

