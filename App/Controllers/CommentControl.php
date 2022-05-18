<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\NonContentView;

class CommentControl extends Controller
{
    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->user = new AuthControl();
        $this->view = new NonContentView();
    }

    public function addComment($content_type, $content_id)
    {
        try {
            $userdata = $this->user->getUserData();
            if ($userdata != null) {
                if (isset($_POST['send_comment'], $_POST['comment_text'])) {
                    extract($_POST, EXTR_SKIP);
                    $comment_text = trim($comment_text);
                    if ($comment_text != "") {
                        $this->repo->addComment($comment_text, $content_type, $content_id, $userdata);
                    } else {
                        throw new \Exception("You wrote an empty comment");
                    }
                }
            } else {
                throw new \Exception("You are not logged in");
            }
            header('Location: /' . 'single' . substr($content_type, 0, -1) . '/' . $content_id);
            die();
        } catch (\Exception $e) {
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
            $this->view->render($page_url, $userdata, $exception_message);
        }
    }

    public function deleteComment($content_type, $content_id, $comment_id)
    {
        $userdata = $this->user->getUserData();
        $comment = $this->repo->loadSingleContent("comments", 'App\Models\Comment', $comment_id);
        $comment_array = $comment->getContent();
        try {
            if (
                $userdata['role'] == 'editor' ||
                $userdata['role'] == 'admin' ||
                $comment_array['user_id'] == $userdata['user_id']
            ) {
                if (isset($_POST['delete_comment'])) {
                    $this->repo->deleteComment($comment_id);
                }
            } else {
                throw new \Exception("You can't delete this comment");
            }
            header('Location: /' . 'single' . substr($content_type, 0, -1) . '/' . $content_id);
            die();
        } catch (\Exception $e) {
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
            $this->view->render($page_url, $userdata, $exception_message);
        }
    }

    public function editComment($content_type, $content_id, $comment_id)
    {
        $userdata = $this->user->getUserData();
        $comment = $this->repo->loadSingleContent("comments", 'App\Models\Comment', $comment_id);
        $comment_array = $comment->getContent();
        try {
            if (
                $userdata['role'] == 'editor' ||
                $userdata['role'] == 'admin' ||
                $comment_array['user_id'] == $userdata['user_id']
            ) {
                if (isset($_POST['edit_comment'], $_POST['comment_text'])) {
                    extract($_POST, EXTR_SKIP);
                    $this->repo->editComment($comment_text, $comment_id);
                }
            } else {
                throw new \Exception("You can't edit this comment");
            }
            header('Location: /' . 'single' . substr($content_type, 0, -1) . '/' . $content_id);
            die();
        } catch (\Exception $e) {
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
            $this->view->render($page_url, $userdata, $exception_message);
        }
    }

    public function showPage($comment_id)
    {
        $message = null;
        try {
            $userdata = $this->user->getUserData();
            $comment = $this->repo->loadSingleContent("comments", 'App\Models\Comment', $comment_id);
            $comment_array = $comment->getContent();
            if (
                $userdata['role'] == 'editor' ||
                $userdata['role'] == 'admin' ||
                $comment_array['user_id'] == $userdata['user_id']
            ) {
                $message = $comment_array['body_text'];
                $page_url = '../App/Templates/edit-comment-page.php';
            } else {
                throw new \Exception("You can't edit this comment");
            }
        } catch (\Exception $e) {
            $userdata = null;
            $message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        $this->view->render($page_url, $userdata, $message);
    }
}
