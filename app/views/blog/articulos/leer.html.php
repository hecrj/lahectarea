<?php

$this->extend('blog/layouts/main')->set('title', $post->title);

$this->helper('cache')
    ->to($post)
    ->render(
        'full',
        'blog/articulos/_full',
        array('post' => $post)
    );

if(!empty($post->highlight))
	$this->helper('includes')->local('css', "highlight/{$post->highlight}");

$this->render('blog/articulos/_share');
$this->render('blog/articulos/_comments', array('id' => $post->permalink));
