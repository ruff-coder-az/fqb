<?php 

function build_image_list($dir){ 
// get the directory contents
$files = scandir($dir);
// initialize an array to store image file paths
$image_files = array();
$i = "0";
// iterate through the files and add image files to the array
foreach ($files as $file) {
  // check if the file is an image (assuming JPG, PNG, and GIF extensions)
  if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'png', 'gif','ico'))) {
    // add the file path to the array
    $i++;
    $image_files[] = $dir . '/' . $file;
  }
}
if ($i >= "1") { 
return $image_files;
} else { return $dir . "/placeholder.png"; }
}

function list_images_dropdown($image_files, $id, $name) { 
    // output the array for use in a dropdown menu
    echo '<div class="w3-container">';
    echo '<label for="' . $id . '">Select an Image:</label>';
    echo '<select class="w3-select w3-border" name="' . $name . '" id="' . $id . '">';
    foreach ($image_files as $file) {
      echo '<option value="' . $file . '">' . $file . '</option>';
    }
    echo '</select>';
    echo '</div>';
  }
  
?>
