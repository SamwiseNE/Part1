<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ApiReadinglistController extends Controller {

    public function __construct($request, $response) {
        $this->setGateway();
        parent::__construct($request, $response);
    }

    protected function setGateway() {
        $this->gateway = new ListGateway();
    }

    /**
     * Checks users authentication status
     * Allows for the addition and removal to the list table
     * Return request
     *
     * IF token invalid
     * THEN display message and set code
     *
     * Only POST request method
     *
     * IF GET request method
     * THEN display message and set code
     *
     * @uses is_null()
     * @uses \Firebase\JWT\JWT
     *
     */
    protected function processRequest() {

        $token = $this->getRequest()->getParameter("token");
        $add = $this->getRequest()->getParameter("add");
        $remove = $this->getRequest()->getParameter("remove");


        if ($this->getRequest()->getRequestMethod() === "POST") {
            if (!is_null($token)) {
                $key = SECRET_KEY;
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $user_id = $decoded->user_id;

                if (isset($add)) {
                    $this->getGateway()->add($user_id, $add);
                } elseif (isset($remove)) {
                    $this->getGateway()->remove($user_id, $remove);
                } else {
                    $this->getGateway()->findAll($user_id);
                }
            } else {
                $this->getResponse()->setMessage("Unauthorized");
                $this->getResponse()->setStatusCode(401);
            }
        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $this->getGateway()->getResult();
    }
}