<?php
namespace Controller\Admin;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

class ArticleController
{
    public function getlist()
    {
        $article = DB::table('article')->findAll();
        $view    = new View('admin/article/list', ['article' => $article]);
        print $view;
    }

    public function getcreate()
    {
        $view = new View('admin/article/create');
        print $view;
    }
    public function postcreate()
    {
        $article                      = DB::table('article');
        $article->category_article_id = 1;
        $article->title               = $_POST['title'];
        $article->image_index         = $this->ImagePost('image_index', 'article') ? $this->ImagePost('image_index', 'article/') : 'null';
        $article->image_gallery       = 'null';
        $article->snippet             = $_POST['snippet'];
        $article->content             = $_POST['content'];
        $article->view                = 0;
        $article->show_boolen         = isset($_POST['show_boolen']) ? 1 : 0;
        $article->created_at          = date('Y/m/d H:i:s');
        $article->updated_at          = date('Y/m/d H:i:s');
        $article->save();
        Route::callRouteUrl('articlelist', 'admin');
    }

    public function ImagePost($input, $path = '')
    {
        $errors = 0;
        // lấy tên file upload

        $image = $_FILES[$input]['name'];
        // Nếu nó không rỗng
        if ($image) {
            // Lấy tên gốc của file
            $filename = stripslashes($_FILES[$input]['name']);
            //Lấy phần mở rộng của file
            $extension = $this->getExtension($filename);
            $extension = strtolower($extension);
            // Nếu nó không phải là file hình thì sẽ thông báo lỗi
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
                "png") && ($extension != "gif")) {
                // xuất lỗi ra màn hình
                echo '<h1>This is not an image file!</h1>';
                $errors = 1;
            } else {
                //Lấy dung lượng của file upload
                $size = filesize($_FILES[$input]['tmp_name']);
                if ($size > 1024 * 2000) {
                    echo '<h1>File is too large!</h1>';
                    $errors = 1;
                }

                // đặt tên mới cho file hình up lên
                $image_name = time() . '.' . $extension;
                // gán thêm cho file này đường dẫn
                $pathfolder = "storage/" . str_replace('.', '/', $path);
                if (!file_exists($pathfolder)) {
                    mkdir($pathfolder, 0777, true);
                }
                $newname = $pathfolder . '/' . $image_name;
                // kiểm tra xem file hình này đã upload lên trước đó chưa
                $copied = copy($_FILES[$input]['tmp_name'], $newname);
                if (!$copied) {
                    echo '<h1> This image file already exists </h1>';
                    $errors = 1;
                }}}

        if (!$errors) {
            return $newname;
        }
        return false;
    }
    // hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
    // file này có phải là file hình hay không .
    public function getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) {return "";}
        $l   = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    //This variable is used as a flag. The value is initialized with 0 (meaning no
    // error  found)
    //and it will be changed to 1 if an errro occures.
    //If the error occures the file will not be uploaded.
}
