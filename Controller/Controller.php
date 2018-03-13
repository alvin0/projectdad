<?php
namespace Controller;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

// use \GreenCape\Xml\Converter;

// use Vyuldashev\XmlToArray\XmlToArray as XML;

class Controller
{
    public function index()
    {
        $article = DB::table('article')->orderBy('created_at', 'desc')->where('show_boolen', '=', 1)->with('category_articles')->pagination(6);
        $page    = $article->getPage();
        $view    = new View('home/index', ['article' => $article, 'page' => $page]);
        print $view;
    }
    public function categoryArticle($id)
    {

        $article           = DB::table('article')->where('category_article_id', '=', $id)->orderBy('created_at', 'desc')->with('category_articles')->pagination(6);
        $category_articles = DB::table('category_articles')->find($id);
        if ($category_articles) {
            $page        = $article->getPage();
            $view        = new View('home/index', ['article' => $article, 'page' => $page, 'category_articles' => $category_articles]);
            $view->title = $category_articles->name;
            return print $view;
        }
    }
    public function about()
    {
        $about       = DB::table('about')->find(1);
        $view        = new View('home/about', ['about' => $about]);
        $view->title = 'About';
        return print $view;
    }

    public function getContact($staus = null)
    {
        if ($staus) {
            $view = new View('home/contact', ['staus' => $staus]);
        } else {
            $view = new View('home/contact');
        }
        $view->title = 'Contact';
        return print $view;
    }

    public function search()
    {
        $article = DB::table('article')->orderBy('created_at', 'desc')->where('show_boolen', '=', 1);
        if (isset($_GET['keyword']) && strlen(trim($_GET['keyword'])) > 0) {
            $article = $article->where('title', 'LIKE', '%' . $_GET['keyword'] . '%');
        }
        $article = $article->with('category_articles')->pagination(6);
        $page    = $article->getPage();

        // dd($article);
        // if (isset($_GET['keyword']) && strlen(trim($_GET['keyword'])) > 0) {
        //     $view = new View('home/article/search', ['about' => $about], 'key' => $_GET['keyword']);
        // } else {
        $view        = new View('home/article/search', ['article' => $article, 'page' => $page]);
        $view->title = 'Search';
        return print $view;
    }

    public function postContact()
    {
        if ($this->CheckReCAPTCHA($_POST['g-recaptcha-response'])) {
            if ($isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 && $isset($_POST['email']) && strlen(trim($_POST['email'])) > 3 && $isset($_POST['phone']) && strlen(trim($_POST['phone'])) > 3 && $isset($_POST['content']) && strlen(trim($_POST['content'])) > 3 && strlen(trim($_POST['content'])) > 255) {

                $contact             = DB::table('contacts');
                $contact->name       = $_POST['name'];
                $contact->email      = $_POST['email'];
                $contact->phone      = $_POST['phone'];
                $contact->content    = $_POST['content'];
                $contact->created_at = date('Y/m/d H:i:s');
                $contact->updated_at = date('Y/m/d H:i:s');
                $contact->save();
                return Route::callRouteUrl('contact', null, ['status' => 'success']);
            }
        }
        return Route::callRouteUrl('contact', null, ['status' => 'danger']);

    }

    public function CheckReCAPTCHA($gRecaptchaResponse)
    {
        $api_url    = 'https://www.google.com/recaptcha/api/siteverify';
        $secret_key = '6LfgSUoUAAAAAHNBujlMAAG_w23Y1TC7xHxEiBoR';

//kiem tra submit form
        // dd($_POST);
        //lấy dữ liệu được post lên
        $site_key_post = $gRecaptchaResponse;

        //lấy IP của khach
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $remoteip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $remoteip = $_SERVER['REMOTE_ADDR'];
        }

        //tạo link kết nối
        $api_url = $api_url . '?secret=' . $secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
        //lấy kết quả trả về từ google
        $response = file_get_contents($api_url);
        //dữ liệu trả về dạng json
        $response = json_decode($response);
        if (!isset($response->success)) {
            return false;

        }
        if ($response->success == true) {
            return true;
            die;
        } else {
            return false;
        }
    }

    public function soft()
    {
        $typeInFolder = json_decode('["ipa","zip","amv","mp4","css","txt","ODF","ppt","pdf","xls","orther","mp3","viewer","doc","png","dw","jpg","php","apk"]', true);
        if ($handle = opendir('storage/Software/')) {
            $i = 0;
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $type  = explode(".", $entry);
                    $image = $type[1];
                    $image = in_array($image, $typeInFolder) ? $image : 'orther';

                    $arrayFile[$i] = ['name' => $entry, 'urldownload' => '?active=downloadfile&file=' . $entry, 'image' => 'View/home/style/type/' . $image . '.png'];
                    $i++;
                }
            }
            closedir($handle);
        }
        $view        = new View('home/soft', ['arrayFile' => $arrayFile]);
        $view->title = 'Phần Mềm';
        return print $view;
    }

    public function Downloadfile()
    {
        $file = basename($_GET['file']);
        // $file = '/path/to/your/dir/' . $file;

        if (!$file) {
            die('file not found');
        } else {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");

            // read the file from disk
            readfile($file);
        }
    }
}
