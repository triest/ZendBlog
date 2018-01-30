<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 13:01
 */

namespace Post\Controller;


// Add the following import:

use Post\Form\CommentForm;
use Post\Form\PostForm;
use Post\Model\Post;
use Post\Model\Comment;
use Post\Model\PostTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class PostController  extends AbstractActionController
{

    /**
     * Execute the request
     *
     * @param  MvcEvent $e
     * @return mixed
     */
    protected $table;

    // Add this constructor:
    public function __construct(PostTable $table)
    {
        $this->table = $table;
    }



    public function indexAction()
    {

        return  new ViewModel([
            'posts' => $this->table->fetchAll()
        ]);

    }

    public function addAction()
    {
        $form = new PostForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }
//        echo 'test';

        $post = new Post();
      //  $form->setInputFilter($post->getInputFilter());
       $form->setData($request->getPost());

    //    echo 'before valid';
       if (!$form->isValid()) {

           return ['form' => $form];
        }

        $post->exchangeArray($form->getData());
        $this->table->savePost($post);

       return $this->redirect()->toRoute('post');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('post', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $album = $this->table->getPost($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('album', ['action' => 'index']);
        }

        $form = new PostForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($album->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->savePost($album);

        // Redirect to album list
        return $this->redirect()->toRoute('post', ['action' => 'index']);
    }

    public function deleteAction()
    {

        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('post');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deletePost($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('post');
        }

        return [
            'id'    => $id,
            'post' => $this->table->getPost($id),
        ];
    }

    public function viewAction()
    {
       $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            $this->flashMessenger()->addErrorMessage('Blogpost id doesn\'t set');
            return $this->redirect()->toRoute('post');
        }
        try {
            $post = $this->table->getPost($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('post', ['action' => 'index']);
        }
        $form=new CommentForm();

        if($this->getRequest()->isPost()) {

         /*   // Get POST data.
            $data = $this->params()->fromPost();

            // Fill form with data.
            $form->setData($data);
            if($form->isValid()) {

                // Get validated form data.
                $data = $form->getData();

                // Use post manager service to add new comment to post.
                $this->postManager->addCommentToPost($post, $data);

                // Redirect the user again to "view" page.
                return $this->redirect()->toRoute('posts', ['action'=>'view', 'id'=>$id]);
            }*/

        }


        return  new ViewModel([
            'post' => $post,
            'form' => $form
        ]);
    }

    public function addcommentAction(){

        $request = $this->getRequest();
    /*var_dump($request);*/
        $postVar = $this->params()->fromPost('name', 'default_val');
        if (! $request->isPost()) {
            echo 'is not post';
        }
        $comment=new  Comment();
        $comment->exchangeArray($request->getData());
        $this->table->saveComment($comment);
     /*   $request = $this->getRequest();*/

        /*$comment->exchangeArray($request->getContent());*/
   /*     var_dump($comment);*/
        /*$request->getComment();
        $comment=new Comment();
        var_dump($request);*/


    }

}