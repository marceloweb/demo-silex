<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

$app->get('/user', function () use ($app) {
    return new Response('Success', 200);
});

$app->get('/user/{id}', function () use ($app) {
    return new Response('Success', 200);
});

$app->post('/user', function (Request $request) {
    return new Response('Created!', 201);
});

$app->put('/user/{id}', function ($id) {
    return new Response('Thank you for your feedback!', 201);
});
$app->delete('/blog/{id}', function ($id) {
    return new Response('Thank you for your feedback!', 201);
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
