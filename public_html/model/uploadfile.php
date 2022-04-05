<?php

function secure_save_file($file){
  $allowedTypes = [
   'image/png' => 'png',
   'image/jpeg' => 'jpg',
   'image/gif' => 'gif'
  ];

  $filePath = $file['tmp_name'];
  $fileSize = filesize($filePath);
  $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
  $fileType = finfo_file($fileInfo, $filePath);

  if($fileSize == 0){
    die("The file is empty.");
  }
  if($fileSize > 10*1024*1024){
    die("The file is too large.");
  }
  if(!in_array($fileType, array_keys($allowedTypes))){
    die("File not allowed.");
  }
  $fileName = sha1(rand()) ."." . $allowedTypes[$fileType];
  $newFilePath = __DIR__."/../uploads/". $fileName;
  move_uploaded_file($filePath, $newFilePath);
  return $fileName;
}


?>
