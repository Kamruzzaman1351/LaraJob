<?php
  namespace App\lib;

  class FileUploader {
    
    public function fileName ($file) {
      $fileName = $file->getClientOriginalName();
      $fileN = pathinfo($fileName, PATHINFO_FILENAME);
      $fileExtention = $file->getClientOriginalExtension();
      $fileNameToStore = $fileN . '_' . time(). '.' . $fileExtention;
      return $fileNameToStore;
    }
}