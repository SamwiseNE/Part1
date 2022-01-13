<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

use firebase\jwt\jwt;

class ApiAuthenticateController extends Controller {

    public function __construct($request, $response) {
        $this->setGateway();
        parent::__construct($request, $response);
    }

    protected function setGateway() {
        $this->gateway = new UserGateway();
    }

    /**
     * Check the user credentials against the database table
     * Return token information to console
     *
     * IF token invalid
     * THEN display message and set code
     *
     * Only POST request method
     *
     * IF GET request method
     * THEN display message and set code
     *
     * @uses count()
     * @uses password_verify()
     * @uses time()
     * @uses \Firebase\JWT\JWT
     * @uses array_key_exists()
     *
     */
    protected function processRequest() {

        $data = [];
        $email = $this->getRequest()->getParameter("email");
        $password = $this->getRequest()->getParameter("password");


        if ($this->getRequest()->getRequestMethod() === "POST") {

            if (isset($email) && isset($password)) {
                $this->getGateway()->findPassword($email);

                if (count($this->getGateway()->getResult()) == 1) {
                    $hashpassword = $this->getGateway()->getResult()[0]['password'];

                    if (password_verify($password, $hashpassword)) {
                        $key = SECRET_KEY;
                        $timeIssuedAt = time();
                        $notBefore = $timeIssuedAt + 25;
                        $expireTime = $notBefore + 7776000;
                        $serverName = $_SERVER["SERVER_NAME"];


                        $payload = array(
                            "user_id" => $this->getGateway()->getResult()[0]['id'],
                            "exp" => time() + 7776000
                        );

                        $jwt = JWT::encode($payload, $key, 'HS256');

                        $data = array(
                            'token' => $jwt,
                            'tia' => $timeIssuedAt,
                            'nbf' => $notBefore,
                            'exp' => $expireTime,
                            'iss' => $serverName
                        );
                    }
                }
            }

            if (!array_key_exists('token', $data)) {
                $this->getResponse()->setMessage("Unauthorized");
                $this->getResponse()->setStatusCode(401);
            }

        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $data;
    }
}
