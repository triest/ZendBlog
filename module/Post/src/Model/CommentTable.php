<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 14:31
 */

namespace Comment\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CommentTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getComment($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
     //   var_dump($id);

        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function getCommentsToPost($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['post' => $id]);
        $row = $rowset->current();
        if (! $row) {
           return null;

        }
        return $row;
    }

    public function saveComment(Comment $comment)
    {
        $data = [
            'text' => $comment->text,
            'author'  => $comment->title,
            'post'=>$comment->desc
        ];
     /*   echo $post->title;*/

        $id = (int) $comment->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getPost($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update post with identifier %d; does not exist',
                $id
            ));
        }

     return   $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteComment($id)
    {
       return $this->tableGateway->delete(['id' => (int) $id]);
    }


}