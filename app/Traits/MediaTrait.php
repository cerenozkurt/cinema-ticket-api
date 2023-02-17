<?php

namespace App\Traits;

use App\Models\Media;
use App\Repository\MediaRepositoryInterface;
use Illuminate\Support\Facades\Storage;

trait MediaTrait
{
    public function upload_media($media, $model = null, $public_path = 'other')
    {
        $disk = Storage::build([
            'driver' => 'local',
            'root' => public_path('uploads/' . $public_path),
        ]);

        $path_with_filename = $disk->put('', $media);

        $filename = basename($path_with_filename);

        if ($model != null  && $model['media_id'] != null) {
            $oldFileName = Media::find($model['media_id'])->filename;
            $media = Media::where('filename', $oldFileName)->first();
            $media->filename = $filename;
            $media->save();
            if ($oldFileName && file_exists(public_path("uploads/" . $public_path . "/" . $oldFileName))) {
                unlink(public_path("uploads/" . $public_path . "/" . $oldFileName));
            }
        } else {
            $media = Media::create([
                'filename' => $public_path . "/" . $filename
            ]);
        }
        return $media;
    }

    public function delete_media($model, $public_path = 'other')
    {
        $media = Media::where('id', $model->media_id)->first();
        if ($media->filename && file_exists(public_path("uploads/" . $public_path . "/" . $media->filename))) {
            unlink(public_path("uploads/" . $public_path . "/" . $media->filename));
        }
        $success = $media->delete(); 
        $model->media_id = null;
        $model->save();
        return $success;
    }
}
