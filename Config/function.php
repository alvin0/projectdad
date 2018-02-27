<?php
function dd($data, $label = '', $return = false)
{

    $debug           = debug_backtrace();
    $callingFile     = $debug[0]['file'];
    $callingFileLine = $debug[0]['line'];

    ob_start();
    var_dump($data);
    $c = ob_get_contents();
    ob_end_clean();

    $c = preg_replace("/\r\n|\r/", "\n", $c);
    $c = str_replace("]=>\n", '] = ', $c);
    $c = str_replace("<", '&lt', $c);
    $c = str_replace(">", '&gt', $c);
    $c = preg_replace('/= {2,}/', '= ', $c);
    $c = preg_replace("/\[\"(.*?)\"\] = /i", "[$1] = ", $c);
    $c = preg_replace('/  /', "    ", $c);
    $c = preg_replace("/\"\"(.*?)\"/i", "\"$1\"", $c);
    $c = preg_replace("/(int|float)\(([0-9\.]+)\)/i", "$1() <span class=\"number\">$2</span>", $c);

// Syntax Highlighting of Strings. This seems cryptic, but it will also allow non-terminated strings to get parsed.
    $c = preg_replace("/(\[[\w ]+\] = string\([0-9]+\) )\"(.*?)/sim", "$1<span class=\"string\">\"", $c);
    $c = preg_replace("/(\"\n{1,})( {0,}\})/sim", "$1</span>$2", $c);
    $c = preg_replace("/(\"\n{1,})( {0,}\[)/sim", "$1</span>$2", $c);
    $c = preg_replace("/(string\([0-9]+\) )\"(.*?)\"\n/sim", "$1<span class=\"string\">\"$2\"</span>\n", $c);

    $regex = array(
        // Numberrs
        'numbers'  => array('/(^|] = )(array|float|int|string|resource|object\(.*\)|\&amp;object\(.*\))\(([0-9\.]+)\)/i', '$1$2(<span class="number">$3</span>)'),
        // Keywords
        'null'     => array('/(^|] = )(null)/i', '$1<span class="keyword">$2</span>'),
        'bool'     => array('/(bool)\((true|false)\)/i', '$1(<span class="keyword">$2</span>)'),
        // Types
        'types'    => array('/(of type )\((.*)\)/i', '$1(<span class="type">$2</span>)'),
        // Objects
        'object'   => array('/(object|\&amp;object)\(([\w]+)\)/i', '$1(<span class="object">$2</span>)'),
        // Function
        'function' => array('/(^|] = )(array|string|int|float|bool|resource|object|\&amp;object)\(/i', '$1<span class="function">$2</span>('),
    );

    foreach ($regex as $x) {
        $c = preg_replace($x[0], $x[1], $c);
    }

    $style = '
/* outside div - it will float and match the screen */
.dumpr {
    margin: 2px;
    padding: 2px;
    background-color: #fbfbfb;
    float: left;
    clear: both;
}
/* font size and family */
.dumpr pre {
    color: #000000;
    font-size: 9pt;
    font-family: "Courier New",Courier,Monaco,monospace;
    margin: 0px;
    padding-top: 5px;
    padding-bottom: 7px;
    padding-left: 9px;
    padding-right: 9px;
}
/* inside div */
.dumpr div {
    background-color: #fcfcfc;
    border: 1px solid #d9d9d9;
    float: left;
    clear: both;
}
/* syntax highlighting */
.dumpr span.string {color: #c40000;}
.dumpr span.number {color: #ff0000;}
.dumpr span.keyword {color: #007200;}
.dumpr span.function {color: #0000c4;}
.dumpr span.object {color: #ac00ac;}
.dumpr span.type {color: #0072c4;}
';

    $style = preg_replace("/ {2,}/", "", $style);
    $style = preg_replace("/\t|\r\n|\r|\n/", "", $style);
    $style = preg_replace("/\/\*.*?\*\//i", '', $style);
    $style = str_replace('}', '} ', $style);
    $style = str_replace(' {', '{', $style);
    $style = trim($style);

    $c = trim($c);
    $c = preg_replace("/\n<\/span>/", "</span>\n", $c);

    if ($label == '') {
        $line1 = '';
    } else {
        $line1 = "<strong>$label</strong> \n";
    }

    $out = "\n<!-- Dumpr Begin -->\n" .
        "<style type=\"text/css\">" . $style . "</style>\n" .
        "<div class=\"dumpr\">
    <div><pre>$line1 $callingFile : $callingFileLine \n$c\n</pre></div></div><div style=\"clear:both;\">&nbsp;</div>" .
        "\n<!-- Dumpr End -->\n";
    if ($return) {
        return $out;
    } else {
        echo $out;
        die;
    }
}

function ImagePost($input, $path = '')
{
    $errors = 0;
    // lấy tên file upload

    $image = $_FILES[$input]['name'];
    // Nếu nó không rỗng
    if ($image) {
        // Lấy tên gốc của file
        $filename = stripslashes($_FILES[$input]['name']);
        //Lấy phần mở rộng của file
        $extension = getExtension($filename);
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
            $pathfolder = "storage/www/" . str_replace('.', '/', $path);
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
function getExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {return "";}
    $l   = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
