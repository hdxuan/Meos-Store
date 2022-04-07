<?php

use App\Core\Controller;

class CommentsController extends Controller
{
    private $commentModel;

    function __construct()
    {
        $this->commentModel = $this->model('CommentModel');
    }
    function Index()
    {
        $data['comments'] = $this->commentModel->all();
        $this->view("/admin/comment/index", $data);
    }

    function delete($id)
    {
        $result = $this->commentModel->delete($id);
        if ($result === true) {
            $_SESSION['alert']['success'] = true;
            $_SESSION['alert']['messages'] = "Xóa bình luận thành công";
        } else {
            $_SESSION['alert']['success'] = false;
            $_SESSION['alert']['messages'] = $result;
        }
        header("Location: " . DOCUMENT_ROOT . "/admin/comments");
    }
}
