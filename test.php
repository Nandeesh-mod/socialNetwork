<?php 
    class userdata
    {
       var  $username;
        var $email;
        var $password;
        var $repassword;
        var $dob;
        var $gender;
        var $submit;
        var $policy;
        function userdata()
        {
            $this->username = $_POST['username'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->repassword = $_POST['re_password'];
            $this->dob = $_POST['dob'];
            $this->gender = $_POST['gender'];
            $this->submit = $_POST['signup'];
            $this->policy = $_POST['policy'];
        }
    }
?>

<?php 
            $user = new userdata;
            var_dump($user);
?>