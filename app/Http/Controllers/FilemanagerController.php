<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilemanagerController extends Controller
{
    //
	public function getConnectors()
    {
        $extraConfig = array('dir_filemanager'=>'/admin');
        $f = FilemanagerLaravel::Filemanager($extraConfig);
        $f->connector_url = url('/').'/admin/filemanager/connectors';
        $f->run();
    }
    public function postConnectors()
    {
        $extraConfig = array('dir_filemanager'=>'/admin');
        $f = FilemanagerLaravel::Filemanager($extraConfig);
        $f->connector_url = url('/').'/admin/filemanager/connectors';
        $f->run();
    }
}
