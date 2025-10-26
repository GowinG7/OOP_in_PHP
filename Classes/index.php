<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>

<body>
    <form action="../includes/signup.inc.php" method="post">

        <input type="text" name="username" placeholder="Enter username" required>
        <br><br>
        <input type="password" name="pwd" placeholder="Enter password" required>
        <br><br>
        <button type="submit" name="submit">Signup</button>
    </form>

    <?php
    require_once "Dbh.php";
    // Dbh class ko function connect() protected xa so aba eutai class ma navayeC child class banayera inherit garna parcha
    class Signup extends Dbh
    {
        private $username;
        private $pwd;
        public function __construct($username, $pwd)
        {
            $this->username = $username;
            $this->pwd = $pwd;
        }

        private function insertUser()
        {
            $query = "Insert into users (username, pwd) 
                        values (:username, :pwd);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":pwd", $this->pwd);
            $stmt->execute();
        }

        private function isEmptySubmit()
        {
            if (!empty($this->username) && !empty($this->pwd)) {
                return false;
            } else {
                return true;
            }
        }

        public function signupUser()
        {
            // Error handlers
            if ($this->isEmptySubmit()) {
                header("Location: " . $_SERVER['PHP_SELF']);
                die();
            }

            // If no errors, signup user
            $this->insertUser();
            // Redirect to same page after successful signup to prevent resubmission
            header("Location: " . $_SERVER['PHP_SELF'] . "?signup=success");
            exit();

        }

    }

    // Display success message if signup was successful and hide it after 2 seconds 
    //and also prevent resubmission on page refresh
    if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo '<p id="successMsg" style="color: green;">Signup successful!</p>';
        echo '<script>
        setTimeout(function() {
            var msg = document.getElementById("successMsg");
            if (msg) msg.style.display = "none";
            window.history.replaceState(null, "", window.location.pathname);
        }, 2000);
    </script>';
    }

    ?>
</body>

</html>
