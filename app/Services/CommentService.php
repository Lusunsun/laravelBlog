<?php
namespace App\Services;

use App\Models\Comment;
use DB;

class  CommentService {

    private $comment;

    function __construct(comment $comment)
    {
        $this->comment = $comment;
    }

    public function getCommentList($page, $limit)
    {
        return $this->comment->getAllComment($page, $limit);
    }

    public function getComment($id)
    {
        return $this->comment->getComment($id);
    }

    public function editCategory($param)
    {
        return $this->comment->editCategory($param);
    }

    public function deleteCategory($id)
    {
        return $this->comment->deleteCategory($id);
    }

    public function getAddComment($param)
    {
        return $this->comment->addComment($param);
    }

}