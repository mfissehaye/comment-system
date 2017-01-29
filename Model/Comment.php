<?php

/**
 * Comment.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Model;

use Core\MyFramework\Model;
use Core\MyORM\Proxy\ModelProxy;

class Comment extends Model {

    protected $_modelMapper;

    protected $_allowedFields = array(
        'id',
        'user',
        'blog',
        'status',
        'comment'
    );

    public function setId($id) {
        if(!filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 65535)))) {
            throw new \InvalidArgumentException('The entry ID is invalid');
        }
        $this->_values['id'] = $id;
    }

    public function setContent($content)
    {
        if(!is_string($content) || strlen($content) < 2) {
            throw new \InvalidArgumentException('The comment is invalid.');
        }
        $this->_values['content'] = $content;
    }

    public function setUser(ModelProxy $user)
    {
        $this->_values['user'] = $user;
    }

    public function setBlog(ModelProxy $blog)
    {
        $this->_values['blog'] = $blog;
    }
}