<?php 
        include('component/connect.php');
        session_start();
        if(isset($_POST['post_submit']))
        {
            date_default_timezone_set('Asia/Calcutta');
            $posted_date = date('y-m-d');
            $posted_time = date('h:i:s');
            $date = explode(':',date('h:i:s:a'));
            $meridian =  end($date);

            $heading = $_POST['heading'];
            $description = $_POST['about'];
            $postfile = $_FILES['post'];
            $user_id = $_SESSION['user_data'][0]['user_id'];


            echo $user_id;

            //variable for file operation
            $tmp_name = $postfile['tmp_name'];
            $file_err = $postfile['error'];
            $file_name = $postfile['name'];
            $type = explode('.',$file_name);
            $final_type = end($type);
            $finalfilename = $_SESSION['name'];
            $post_filename = $user_id.uniqid('',true).".".$final_type;
            $standard = ['jpeg','png','jpg','mp4','mkv','pdf','txt'];
            echo $post_filename;
            echo $posted_time;
            echo $posted_date;

            $destination = '/opt/lampp/htdocs/dbms/post/'.$post_filename;
            $sql = "INSERT INTO post(post_file,post_data,post_time,heading,description,likes,user_id,meridian) VALUES('$post_filename','$posted_date','$posted_time','$heading','$description',0,$user_id,'$meridian');";
            if(in_array($final_type,$standard))
            {
                move_uploaded_file($tmp_name,$destination);
                $result = mysqli_query($conn,$sql);
                if(isset($result))
                {
                    $_SESSION['post_error'] = 'success';
                    header('location:'.'postit.php');
                }
                else
                {
                    $_SESSION['post_error'] = 'failed';
                    header('location:'.'postit.php');
                }
            }else
            {
                $_SESSION['post_error'] = 'Invalid file type';
                header('location:'.'postit.php');
            }
 
        }
     ?>
