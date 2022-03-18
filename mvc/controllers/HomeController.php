<?php
Class HomeController extends Controller {
    function getName() {
        $user = $this->model("User");
        echo $user->getUser();

        $this->view("home", [
            'user' => $this->model("User")
        ]);
    }
}