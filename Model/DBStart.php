<?php
namespace Model;

use Core\Functions\Bcrypt as Bcrypt;
use Lazer\Classes\Database as DB;

/**
 * DBStart
 */
class DBStart
{

    public function boot()
    {
        $this->User();
        $this->CategoryArticle();
        $this->Article();
    }

    public function User()
    {
        $user           = DB::table('users');
        $user->name     = 'admin';
        $user->email    = 'admin@alvinframework.com';
        $user->password = Bcrypt::hashPassword('admin');
        $user->role     = 1;
        $user->save();
    }

    public function CategoryArticle()
    {
        $user       = DB::table('category_articles');
        $user->name = 'Tin tức';
        $user->save();
        $user       = DB::table('category_articles');
        $user->name = 'Máy Tính';
        $user->save();
        $user       = DB::table('category_articles');
        $user->name = 'Di động';
        $user->save();
    }

    public function Article()
    {
        for ($i = 1; $i < 20; $i++) {
            $article                      = DB::table('article');
            $article->category_article_id = 1;
            $article->title               = 'Data test ' . $i;
            $article->image_index         = 'null';
            $article->image_gallery       = 'null';
            $article->snippet             = 'This is data test This is data test This is data test This is data test This is data test This is data test This is data test This is data test ';
            $article->content             = 'Thương vụ Broadcom đề nghị mua lại Qualcomm có thể xem là một trong những sự kiện gây chấn động giới công nghệ năm ngoái. Mặc dù vẫn là hãng phát triển chip di động lớn nhất thế giới, Qualcomm suy yếu khá nhiều khi vướn vào vòng xoáy kiện tụng với Apple cũng như gặp phải sự cạnh tranh ngày càng cao từ các đối thủ. Chính vì vậy mà Broadcom đã tận dụng thời cơ để đưa ra đề xuất mua lại với mức giá tối đa đến 130 triệu USD. Tuy vậy Qualcomm đã từ chối với lý do quá thấp và nhiều nghi vấn về pháp lý. <br> Thương vụ Broadcom đề nghị mua lại Qualcomm có thể xem là một trong những sự kiện gây chấn động giới công nghệ năm ngoái. Mặc dù vẫn là hãng phát triển chip di động lớn nhất thế giới, Qualcomm suy yếu khá nhiều khi vướn vào vòng xoáy kiện tụng với Apple cũng như gặp phải sự cạnh tranh ngày càng cao từ các đối thủ. Chính vì vậy mà Broadcom đã tận dụng thời cơ để đưa ra đề xuất mua lại với mức giá tối đa đến 130 triệu USD. Tuy vậy Qualcomm đã từ chối với lý do quá thấp và nhiều nghi vấn về pháp lý. <br> Thương vụ Broadcom đề nghị mua lại Qualcomm có thể xem là một trong những sự kiện gây chấn động giới công nghệ năm ngoái. Mặc dù vẫn là hãng phát triển chip di động lớn nhất thế giới, Qualcomm suy yếu khá nhiều khi vướn vào vòng xoáy kiện tụng với Apple cũng như gặp phải sự cạnh tranh ngày càng cao từ các đối thủ. Chính vì vậy mà Broadcom đã tận dụng thời cơ để đưa ra đề xuất mua lại với mức giá tối đa đến 130 triệu USD. Tuy vậy Qualcomm đã từ chối với lý do quá thấp và nhiều nghi vấn về pháp lý. <br> Thương vụ Broadcom đề nghị mua lại Qualcomm có thể xem là một trong những sự kiện gây chấn động giới công nghệ năm ngoái. Mặc dù vẫn là hãng phát triển chip di động lớn nhất thế giới, Qualcomm suy yếu khá nhiều khi vướn vào vòng xoáy kiện tụng với Apple cũng như gặp phải sự cạnh tranh ngày càng cao từ các đối thủ. Chính vì vậy mà Broadcom đã tận dụng thời cơ để đưa ra đề xuất mua lại với mức giá tối đa đến 130 triệu USD. Tuy vậy Qualcomm đã từ chối với lý do quá thấp và nhiều nghi vấn về pháp lý. <br>Thương vụ Broadcom đề nghị mua lại Qualcomm có thể xem là một trong những sự kiện gây chấn động giới công nghệ năm ngoái. Mặc dù vẫn là hãng phát triển chip di động lớn nhất thế giới, Qualcomm suy yếu khá nhiều khi vướn vào vòng xoáy kiện tụng với Apple cũng như gặp phải sự cạnh tranh ngày càng cao từ các đối thủ. Chính vì vậy mà Broadcom đã tận dụng thời cơ để đưa ra đề xuất mua lại với mức giá tối đa đến 130 triệu USD. Tuy vậy Qualcomm đã từ chối với lý do quá thấp và nhiều nghi vấn về pháp lý.';
            $article->view                = 0;
            $article->show_boolen         = 1;
            $article->created_at          = date('Y/m/d H:i:s');
            $article->updated_at          = date('Y/m/d H:i:s');
            $article->save();
        }
    }
}
