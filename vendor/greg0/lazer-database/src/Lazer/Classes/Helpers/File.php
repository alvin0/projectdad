<?php

namespace Lazer\Classes\Helpers;

use Lazer\Classes\LazerException;

/**
 * File managing class
 *
 * @category Helpers
 * @author Grzegorz Kuźnik
 * @copyright (c) 2013, Grzegorz Kuźnik
 * @license http://opensource.org/licenses/MIT The MIT License
 * @link https://github.com/Greg0/Lazer-Database GitHub Repository
 */
class File implements FileInterface {

    /**
     * File name
     * @var string
     */
    protected $name;

    /**
     * File type (data|config)
     * @var string
     */
    protected $type;

    public static function table($name) {
        $file       = new File;
        $file->name = $name;

        return $file;
    }

    final public function setType($type) {
        $this->type = $type;
    }

    final public function getPath() {
        if (!defined('LAZER_DATA_PATH')) {
            throw new LazerException('Please define constant LAZER_DATA_PATH (check README.md)');
        } else if (!empty($this->type)) {
            return LAZER_DATA_PATH . $this->name . '.' . $this->type . '.json';
        } else {
            throw new LazerException('Please specify the type of file in class: ' . __CLASS__);
        }
    }

    final public function get($assoc = false) {
        return json_decode(file_get_contents($this->getPath()), $assoc);
    }

    final public function put($data) {
        return file_put_contents($this->getPath(), json_encode($data));
    }

    final public function exists() {
        return file_exists($this->getPath());
    }

    final public function remove() {
        $type = ucfirst($this->type);
        if ($this->exists()) {
            if (unlink($this->getPath())) {
                return TRUE;
            }

            throw new LazerException($type . ': Deleting failed');
        }

        throw new LazerException($type . ': File does not exists');
    }

}
