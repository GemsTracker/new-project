<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/* @var $app \Zend\Expressive\Application */

//$app->get('/', Gems\Rest\Action\HomePageAction::class, 'home');
//$app->get('/api/ping', Gems\Rest\Action\PingAction::class, 'api.ping');
//$app->get('/test', Gems\Rest\Action\TestModelAction::class, 'test');
//$app->get('/dev', [\Gems\Rest\Auth\AuthorizeGemsAndOauthMiddleware::class, \Dev\Action\DevAction::class], 'dev');

/*$app->get('/organizations/structure', Gems\Rest\Action\OrganizationController::class, 'api.organizations.structure');
// Show one/all
$app->get('/organizations[/{id:\d+}]', Gems\Rest\Action\OrganizationController::class, 'api.organizations.get');
// Create
$app->post('/organizations', Gems\Rest\Action\OrganizationController::class, 'api.organizations.post');
// Update
$app->patch('/organizations/[{id:\d+}]', Gems\Rest\Action\OrganizationController::class, 'api.organizations.patch');
// Delete
$app->delete('/organizations/[{id:\d+}]', Gems\Rest\Action\OrganizationController::class, 'api.organizations.delete');*/

$app->injectRoutesFromConfig();