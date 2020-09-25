<?php

function debug($arr)
{
  echo "<pre>";
  print_r($arr);
  //exit;
  echo "</pre>";
}

function renderTemplate($path, $arr)
{
  $output = '';

  if (file_exists($path)) {
    extract($arr);

    ob_start();
    include $path;
    $output = ob_get_clean();
  }
  //debug($output);
  return $output;
}

function createTree($arr)
{
  $parents_arr = array();
  foreach ($arr as $key => $item) {
    $parents_arr[$item['pid']][$item['id']] = $item;
  }

  $treeElement = $parents_arr[0];
  generateElementTree($treeElement, $parents_arr);

  return $treeElement;
}

function generateElementTree(&$treeElement, $parents_arr)
{
  if ($treeElement) {
    foreach ($treeElement as $key => $item) {
      if (!isset($item['children'])) {
        $treeElement[$key]['children'] = array();
      }
      if (array_key_exists($key, $parents_arr)) {
        $treeElement[$key]['children'] = $parents_arr[$key];
        generateElementTree($treeElement[$key]['children'], $parents_arr);
      }
    }
  }
}

function redirect($http = false)
{
  if ($http) {
    $redirect = $http;
  } else {
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
  }
  header("Location: $redirect");
  exit;
}
