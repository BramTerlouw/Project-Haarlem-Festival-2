<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\AuthService;

class AuthController extends Controller{
    
    private $authService;
    function __construct()
    {
        $this->authService = new AuthService();
    }
    
    public function index() {
        require __DIR__ . '/../../views/cms/login.php';
    }

    // ## temporary login validation
    public function validateAttempt() {
        
        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            
            // get vars
            $userName = $_POST['inputUsername'];
            $password = $_POST['inputPassword'];
            
            $rowCount = $this->authService->getRowCount($userName, $password);

            // when user exists, set session var and go to home
            if ($rowCount == 1) {
                $_SESSION['logginIn'] = true;
                $_SESSION['userName'] = $userName;
                $this->setPermission($this->authService->getRole($userName));
                header('Location: /cms/home');
            } else { // give error
                header('location: /cms/auth?error=loginfailed');
            }
        }
    }


    // public function validateAttempt() {
        
    //     // check for POST var
    //     if (isset($_POST['submit'])) {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            
    //         // get vars
    //         $userName = $_POST['inputUsername'];
    //         $password = $_POST['inputPassword'];
            
    //         $data = $this->service->getCredentials($userName);

    //         if (password_verify($password, $data[0][1])) {
    //             $_SESSION['logginIn'] = true;
    //             $_SESSION['userName'] = $userName;
    //             $this->setPermission($this->service->getRole($userName));
    //             header('Location: /cms');
    //         } else { // give error
    //             header('location: /cms/login?error=loginfailed');
    //         }
    //     }
    // }


    // ## logout function
    public function logout() {
        session_destroy();
        header('Location: /');
    }


    //## email verification
    public function emailVerification() {
        require __DIR__ . '/../../views/cms/user/emailVerification.php';
    }


    // ## get restore token and open view
    public function restorePassword() {
        $code = $_GET['code'];
        $email = $this->authService->getResetMail($code);
        require __DIR__ . '/../../views/cms/user/restorePassword.php';
    }
}
?>