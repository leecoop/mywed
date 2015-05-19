<?php
function createThumbsForAll( $pathToImages, $pathToThumbs, $thumbWidth ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
  //  $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
	
	$file_ext = preg_split("/\./",$fname);
	$filetype = end($file_ext);
  
      echo "Creating thumbnail for {$fname} <br />";

      // load image and get image size
      
	  switch($filetype){
		case "gif":
			$img = imagecreatefromgif( "{$pathToImages}{$fname}" );
			break;
		case "jpg":
			$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
		    break;
		case "jpeg":
			$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
			break;
		case "png":
			$img = imagecreatefrompng( "{$pathToImages}{$fname}" );
			break;
	}
	  
	  //$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
     // $new_height = floor( $height * ( $thumbWidth / $width ) );
		$new_height = $thumbWidth;
      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
		switch($filetype){
			case "gif":
				imagegif( $tmp_img, "{$pathToThumbs}{$fname}");
			break;
			case "jpg":
				imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}");
			break;
			case "jpeg":
				imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}");
			break;
			case "png":
				imagepng( $tmp_img, "{$pathToThumbs}{$fname}");
			break;
		}      
	  
	 // imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
    
  }
  // close the directory
  closedir( $dir );
}
// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links

//createThumbs("images/","thumbnail/",70);

function createThumb($pathToImages, $fname, $pathToThumbs, $thumbWidth ) 
{
 	
    
      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      //$new_height = floor( $height * ( $thumbWidth / $width ) );
	  $new_height = $thumbWidth;
      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
    
 
  // close the directory
  closedir( $dir );
}
?>