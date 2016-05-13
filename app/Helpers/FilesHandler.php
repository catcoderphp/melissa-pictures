<?php
namespace Catcoder\Helpers;


use Intervention\Image\Facades\Image;

class FilesHandler
{
    /**
     * @param $files
     * @return array
     * validation on middleware and request files
     */
    public static function upload($path,$files)
    {
        $uploaded = [];
        if(is_array($files) && !empty($files[0])){
            foreach ($files as $file){
                if($file->isValid()) {
                    $name = md5(time() . $file->getClientOriginalName()) . '.jpg';
                    Image::make($file)->save($path."/". $name)->encode('jpg',60);
                    $uploaded[] = $name;
                }
            }
            return $uploaded;
        }
        return [];
    }
}
