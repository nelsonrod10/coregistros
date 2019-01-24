<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Lead;
use App\helpers;
use Respect\Validation\Validator as v;
// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/lead/store', function (Request $request, Response $response, array $args) {
    $validation = $this->validator->validate($request,[
        "firstname"  => v::notEmpty()->alpha(),
        "lastname"   => v::notEmpty()->alpha(),
        "email"      => v::noWhitespace()->notEmpty()->email(),
        "phone"      => v::notEmpty()->alnum(),
        "zipcode"    => v::notEmpty()->alnum(),
    ]);

    if($validation->failed() || $validation->uniqueEmail($request->getParam("email"))){
      return $response->withRedirect($this->router->pathFor(""));
    }

    $arr = helpers::getArray($request->getParams());

    Lead::create([
      'firstname'  =>  $arr["firstname"],
      'lastname'   =>  $arr["lastname"],
      'email'      =>  $arr["email"],
      'zipcode'    =>  $arr["zipcode"],
      'phone'      =>  $arr["phone"],
      'storeID'    =>  $arr["storeID"]
    ]);

    return helpers::post_externo("https://nelsonrod.free.beeceptor.com/public/lead", $arr); //http://demo1.asiventuweb.com/public/lead, http://coregistros.ejercicio/lead
});

$app->post('/lead/{firstname}/{lastname}/{email}/{phone}/{zipcode}/{storeID}', function (Request $request, Response $response, array $args) {
    return $response->withJson($args);
});
