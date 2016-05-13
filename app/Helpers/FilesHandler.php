<?php
namespace Catcoder\Helpers;


class FilesHandler
{
    /**
     * @param $files
     * @return array
     * validation on middleware and request files
     */
    public static function upload($path,$files,$imageOptimizer)
    {
        $uploaded = [];
        if(is_array($files) && !empty($files[0])){
            foreach ($files as $file){
                if($file->isValid()) {
                    $imageOptimizer->optimizeUploadedImageFile($file);
                    $name = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                    $uploaded[] = $name;
                    $file->move($path, $name);
                }
            }
            return $uploaded;
        }
        return [];
    }
}
