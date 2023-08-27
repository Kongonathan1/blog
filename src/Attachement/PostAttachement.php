<?php 
namespace App\Attachement;

use App\Model\Post;

class PostAttachement {

    public static function upload(Post $post)
    {
        $image = $post->getImage();
        if(empty($post->getImage()) || $post->MustUpload() === false) {
            return;
        }
        $directory = UPLOAD_PATH . DIRECTORY_SEPARATOR . 'posts';
        if(file_exists($directory) === false) {
            mkdir($directory, 0777, true);
        }
        $oldimage = $post->getOldImage();
        $oldfile = $directory . DIRECTORY_SEPARATOR . $oldimage;
        if(!empty($oldimage)) {
            if(file_exists($oldfile)) {
                unlink($oldfile);
            }
        }
        $imageFile = uniqid("", true) . '.jpg';
        move_uploaded_file($image, $directory . DIRECTORY_SEPARATOR . $imageFile );
        $post->setImage($imageFile);
    }

    public static function detachImage(Post $post)
    {
        $image = $post->getImage();
        $directory = UPLOAD_PATH . DIRECTORY_SEPARATOR . 'posts';
        if(file_exists($directory) === false) {
            mkdir($directory, 0777, true);
        }
        $file = $directory . DIRECTORY_SEPARATOR . $image;
        if(!empty($image)) {
            if(file_exists($file)) {
                unlink($file);
            }
        }
    }

}