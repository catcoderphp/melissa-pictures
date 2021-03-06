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
        if(is_array($files)){
            foreach ($files as $file){
                if($file->isValid()) {
                    $name = md5(time() . $file->getClientOriginalName()) . '.jpg';
                    Image::make($file)->save($path."/". $name)->encode('jpg',100);
                    $uploaded[] = $name;
                }
            }
            return $uploaded;
        }
        return [];
    }
}
