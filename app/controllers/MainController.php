<?php

namespace app\controllers;


use app\models\Main;
use vendor\core\base\View;

class MainController extends AppController
{

  public function indexAction()
  {
    $model = new Main;

    $menus = $model->findAll()->fetchAll();
    if ($menus) {
      $catalog = false;
    } else {
      $catalog = true;
    }

    $cats = createTree($menus);

    $this->set(compact('cats', 'catalog'));
  }

  public function addAction()
  {
    $model = new Main;

    $title = $_POST['title'];
    $pid = $_POST['pid'];
    if ($title == '') {
      $_SESSION['error'] = "Enter the title";
    } else {
      $model->add($title, $pid);
    }

    redirect('/');
  }

  public function editAction()
  {
    $model = new Main;
    $Id = $_GET['edit'];

    $oneCat = $model->findOne($Id)->fetchAll();

    $this->set(compact('oneCat'));
  }

  public function updateAction()
  {
    $model = new Main;

    $title = $_POST['title'];
    $pid = $_POST['pid'];
    $sid = $_POST['id'];

    $res = $model->edit($title, $pid, $sid);
    //debug($res);
    redirect('/');
  }

  public function deleteAction()
  {
    $model = new Main;

    $id = $_POST['del'];

    if ($id) {
      if ($id == 1) {
        redirect(BLOG . '/main/delAll');
      }
      $res = $model->delete($id);
    }
    redirect();
  }

  public function delAllAction()
  {
    $model = new Main;
    if ($_POST['name'] == 5) {
      $model->delAll();
      redirect('/');
    }
  }
}
