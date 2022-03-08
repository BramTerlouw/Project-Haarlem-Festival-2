<?php
namespace Controllers;
use Controllers\Controller;
use Services\UserService;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller {
    private $userService;

    function __construct()
    {
        $this->userService = new UserService;
    }
    


    // load index view of users
    public function index() {
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/user/index.php';
    }

    public function search() {
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            $filter = $_POST['searchInput'];
            $users = $this->userService->getMany($filter);
            require __DIR__ . '/../views/user/index.php';
        }
    }

    // edit a user
    public function edit() {
        $model = NULL;
        if (isset($_GET['userName'])) {
            $model = $this->userService->getOne($userName = $_GET['userName']);
        } else {
            $model = $this->userService->getOne($userName = $_SESSION['userName']);
        }
        require __DIR__ . '/../views/user/edit.php';
    }



    // add a user
    public function add() {
        require __DIR__ . '/../views/user/add.php';
    }



    // update a user
    public function updateOne() {

        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $userArr = array();
            array_push($userArr, $_POST['userID']);
            array_push($userArr, $_POST['userFullName']);
            array_push($userArr, $_POST['userName']);
            array_push($userArr, $_POST['userPw']);
            array_push($userArr, $_POST['userBD']);
            array_push($userArr, $_POST['gender']);
            array_push($userArr, $_POST['userAddress']);
            array_push($userArr, $_POST['userPostcode']);
            array_push($userArr, $_POST['userCity']);

            if (isset($_POST['userRole'])) // only send when user has permission
                { array_push($userArr, $_POST['userRole']); }
            else 
                {array_push($userArr, $_SESSION['role']->value);}

            array_push($userArr, $_POST['userSuperV']);
            array_push($userArr, $_POST['userEmail']);
            array_push($userArr, $_POST['userPhone']);

            $this->userService->updateOne($userArr);
            if (isset($_POST['userRole']) && $_POST['userName'] == $_SESSION['userName']) { // when user has permission, update role
                $this->setPermission($_POST['userRole']);
            }

            header('Location: /user/edit?userName=' . $_POST['userName']);
        }
    }



    // insert a new user
    public function insertOne() {

        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            $userArr = array();
            array_push($userArr, $_POST['userFullName']);
            array_push($userArr, $_POST['userName']);

            // $pw = $_POST['userPw'];
            // $hash = password_hash($pw, PASSWORD_DEFAULT);
            // array_push($userArr, $hash);
            // !!!!!! adjust update one for the hash !!!!!!
            array_push($userArr, $_POST['userPw']);

            array_push($userArr, $_POST['userBD']);
            array_push($userArr, $_POST['gender']);
            array_push($userArr, $_POST['userAddress']);
            array_push($userArr, $_POST['userPostcode']);
            array_push($userArr, $_POST['userCity']);
            array_push($userArr, $_POST['userRole']);
            array_push($userArr, $_POST['userSuperV']);
            array_push($userArr, $_POST['userEmail']);
            array_push($userArr, $_POST['userPhone']);

            if ($_POST['userPw'] == $_POST['userConfirmPw']) {
                $this->userService->insertOne($userArr);   
            }
        }
    }



    // delete a user
    public function deleteOne() {
        $this->userService->deleteOne($_GET['id']);
    }

    

    // get all event names for nav
    public function getEventNames() {
        return $this->userService->getEventNames();
    }



    // temporary login validation
    public function loginValidation() {
        
        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            
            // get vars
            $userName = $_POST['inputUsername'];
            $password = $_POST['inputPassword'];
            
            $rowCount = $this->userService->getRowCount($userName, $password);

            // when user exists, set session var and go to home
            if ($rowCount == 1) {
                $_SESSION['logginIn'] = true;
                $_SESSION['userName'] = $userName;
                $this->setPermission($this->userService->getRole($userName));
                header('Location: /cms');
            } else { // give error
                header('location: /cms/login?error=loginfailed');
            }
        }
    }

    // public function loginValidation() {
        
    //     // check for POST var
    //     if (isset($_POST['submit'])) {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST
            
    //         // get vars
    //         $userName = $_POST['inputUsername'];
    //         $password = $_POST['inputPassword'];
            
    //         $data = $this->userService->getCredentials($userName);

    //         if (password_verify($password, $data[0][1])) {
    //             $_SESSION['logginIn'] = true;
    //             $_SESSION['userName'] = $userName;
    //             $this->setPermission($this->userService->getRole($userName));
    //             header('Location: /cms');
    //         } else { // give error
    //             header('location: /cms/login?error=loginfailed');
    //         }
    //     }
    // }




    // email verification
    public function emailVerification() {
        require __DIR__ . '/../views/user/emailVerification.php';
    }



    // request reset pw
    public function requestReset()
    {
        if (isset($_POST['inputMail'])) {
            if (!$this->userService->validateEmail($_POST['inputMail'])) {
                
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                $userMail = $_POST['inputMail'];
                $code = uniqid(true);
                $this->userService->setResetCode($userMail, $code);
                
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'haarlemfestival2022@gmail.com';
                    $mail->Password   = 'InhollandisLeuk9!';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('info-haarlemfestival@gmail.com', 'Haarlem Festival');
                    $mail->addAddress($userMail, 'Employee');
                    $mail->addReplyTo('no-reply@gmail.com', 'Information');

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Password recovery';
                    $mail->Body    =
                        '<h1>Password recovery link:</h1>
                        <p>Press link down below to change password.</p><br>
                        <a href="localhost/user/restorePassword?code=' . $code . '">Click me</a>';

                    $mail->send();
                    header('Location: http://localhost/cms/login');

                } catch (Exception $e) {
                    header('Location: /user/emailVerification?error=' . $mail->ErrorInfo);
                }
            } else {
                header('Location: /user/emailVerification?error=EmailDoesNotExist');
            }
        }
    }

    public function restorePassword() {
        $code = $_GET['code'];
        $email = $this->userService->getResetMail($code);
        require __DIR__ . '/../views/user/restorePassword.php';
    }

    public function setPassword() {
        if (isset($_POST['submit'])) {
            if ($_POST['inputPassword'] == $_POST['inputPassword']) {
                $this->userService->setPassword($_GET['email'], $_POST['inputPassword']);
            }
        }
    }
}
?>