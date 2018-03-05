<?php
namespace Controller;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

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

    public function otherNews()
    {
        $html = file_get_html("http://vnexpress.net");
        // echo $html;
        $tins = $html->find("section.container section.sidebar_home_1 article.list_news");
        // echo count($tins);
        foreach ($tins as $t) {
            $h3a = $t->find("h3 a", 0);

            $divthumb_art = $t->find('div.thumb_art a.thumb_5x3 img', 0);
            echo $divthumb_art->attr["src"];
            echo "<br>";

            if (isset($h3a->attr["title"])) {
                echo $title = $h3a->attr["href"];
                echo "<br>";
                echo $title = $h3a->attr["title"];
                echo "<hr>";
            }
            // dd($title);
            // $href  = $a->href
            // $title = htmlentities($title, ENT_QUOTES, "UTF-8");
            // echo $title;
            // echo "----";
            // echo $t->href;
            // echo $t->description;
            // echo "<hr/>";
        }
        die;
        // dd($tins);
        // $view        = new View('home/othernews');
        // $view->title = 'Tin Khác';
        // return print $view;
    }
}
