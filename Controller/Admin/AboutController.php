<?php
namespace Controller\Admin;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

/**
 * AboutController
 */
class AboutController {
    public function index() {
        $about = DB::table('about')->find(1);
        $view  = new View('admin/about/about', ['about' => $about]);
        print $view;
    }
    public function postAbout() {
        $about = DB::table('about')->find(1);
        if (!$about) {
            $about = DB::table('about');
        }

        // dd($_POST);
        $about->title = $_POST['title'];
        // if ($_FILES['image_index']['name'] != '') {
        //     $about->image = ImagePost('image_index', 'about') ? ImagePost('image_index', 'about/') : 'null';
        // }
        $about->snippet    = $_POST['snippet'];
        $about->content    = $_POST['content'];
        $about->created_at = date('Y/m/d H:i:s');
        $about->updated_at = date('Y/m/d H:i:s');
        $about->save();
        Route::callRouteUrl('about', 'admin');

    }
}
