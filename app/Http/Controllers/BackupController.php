<?php
namespace App\Http\Controllers;
use Alert;
use App\Http\Requests;
use Artisan;
use Log;
use Storage;
class BackupController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
   {
       $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);

       $files = $disk->files('copia-seguretat');

       $backups = [];
       // make an array of backup files, with their filesize and creation date
       foreach ($files as $k => $f) {

           // only take the zip files into account
           if (substr($f, -4) == '.zip' && $disk->exists($f)) {
               $backups[] = [
                   'file_path' => $f,
                   'file_name' => str_replace('copia-seguretat' . '/', '', $f),
                   'file_size' => $disk->size($f),
                   'last_modified' => $disk->lastModified($f),
               ];
           }
       }
       // reverse the backups, so the newest one would be on top
       $backups = array_reverse($backups);
       return view("backups.backups")->with(compact('backups'));
   }


    public function create()
    {

        try {
            // start the backup process
            $e=Artisan::call('backup:run');

            //Artisan::call('backup:run');
            $output = Artisan::output();
            // return the results as a response to the ajax call

            return redirect()->back();
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            dd('fail');
            return redirect()->back();
        }
    }
    /**
     * Downloads a backup zip file.
     *
     * TODO: make it work no matter the flysystem driver (S3 Bucket, etc).
     */
    public function download($file_name)
    {
        $file = 'copia-seguretat/' . $file_name;
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
    /**
     * Deletes a backup file.
     */
    public function delete($file_name)
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists('copia-seguretat/' . $file_name)) {
            $disk->delete('copia-seguretat/' . $file_name);
            return redirect()->back();
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
}
