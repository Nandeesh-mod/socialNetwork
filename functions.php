<?php
function search(string $email,$conn)
{
    $sql = "SELECT * FROM user WHERE email = '$email';";
    $result = mysqli_query($conn,$sql);
    if(isset($result) && mysqli_num_rows($result)>0){
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }else
    {
        $_SESSION['search_error'] = "Not found";
        header('Location:'.'friends.php');
        die();
    }
}

function follow(int $userid,$conn,int $following_id)
{
    $sql = "INSERT INTO friends(user_id,following_id) VALUES($userid,$following_id);";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        return "Following";
    }
    else{
        $_SESSION['search_error'] = 'error';
        header('Location:'.'friends.php');
        die();
    }
}

function following_status(int $following_id,int $user_id,$conn)
{
    $sql = "SELECT * FROM friends WHERE user_id = $user_id AND following_id = $following_id";
    $result = mysqli_query($conn,$sql);
    if(isset($result) && mysqli_num_rows($result)>0)
    {
        $true_result = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return true;
    }else
    {
        return false;
    }
}

function retrive_post($user_id,$conn)
{
    $sql = "SELECT * FROM (post join user on post.user_id = user.user_id) where post.user_id IN (SELECT following_id FROM friends WHERE user_id = $user_id) ORDER BY post_data desc;
    ";
    $result = mysqli_query($conn,$sql);
    if(isset($result) && mysqli_num_rows($result)>0)
    {
        $true_result = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $true_result;
    }else{
        return false;
    }
}


function retrive_userdeatils($user_id,$conn)
{
   $sql = "SELECT * FROM ((user INNER JOIN college ON user.college_id = college.college_id )INNER JOIN department ON user.dept_id=department.dept_id) WHERE user.user_id = $user_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result) && mysqli_num_rows($result)>0)
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }
}

function no_of_post($user_id,$conn)
{
    $sql = "SELECT count(post_id) count FROM post where user_id=$user_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }
}

function following($user_id,$conn)
{
    $sql = "SELECT count(user_id) count FROM friends WHERE user_id = $user_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }

}


function  followers($user_id,$conn)
{
    $sql = "SELECT count(user_id) count FROM friends WHERE following_id = $user_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }
}


function following_friends_details($user_id,$conn)
{
    $sql = "SELECT * FROM user WHERE user_id IN (SELECT following_id count FROM friends WHERE user_id = $user_id);";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }

}


function follower_friends_details($user_id,$conn)
{
    $sql = "SELECT * FROM user WHERE user_id IN (SELECT user_id count FROM friends WHERE following_id = $user_id);";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }

}


function manage_post($user_id,$conn)
{
    $sql = "SELECT * FROM (post join user on post.user_id = user.user_id) WHERE post.user_id = $user_id ORDER BY post_data desc;";
    $result = mysqli_query($conn,$sql);
    if(isset($result) && mysqli_num_rows($result)>0)
    {
        $true_result = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $true_result;
    }else{
        return false;
    }

}


function delete_post($post_id,$post_image,$conn)
{
    $sql = "DELETE FROM post WHERE post_id = $post_id;";
    $result = mysqli_query($conn,$sql);
    unlink('post/'.$post_image);
    if(isset($result))
    {
        return true;
    }else
    {
        false;
    }
}


function unfollow($user_id,$friend_id,$conn)
{
    $sql = "DELETE FROM friends WHERE user_id=$user_id AND following_id=$friend_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        return true;
    }else
    {
        false;
    }
}

function likes($post_id,$conn)
{
    $sql = "SELECT likes FROM post WHERE post_id=$post_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $like = mysqli_fetch_all($result,MYSQLI_ASSOC);
        print_r($like);
        $result_like = $like[0]['likes'] + 1;

        $another_sql = "UPDATE post SET likes=$result_like WHERE post_id=$post_id;";
        $like_result = mysqli_query($conn,$another_sql);
    }
}

function unlikes($post_id,$conn)
{
    $sql = "SELECT likes FROM post WHERE post_id=$post_id;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $like = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $result_like = $like[0]['likes'] - 1;

        $another_sql = "UPDATE post SET likes=$result_like WHERE post_id=$post_id;";
        $like_result = mysqli_query($conn,$another_sql);
    }
}





function retrive_userdeatils_report($conn)
{
   $sql = "SELECT * FROM ((user INNER JOIN college ON user.college_id = college.college_id )INNER JOIN department ON user.dept_id=department.dept_id);";
    $result = mysqli_query($conn,$sql);
    if(isset($result) && mysqli_num_rows($result)>0)
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }
}
function retrive_userdeatils_count($conn)
{
   $sql = "SELECT * FROM ((user INNER JOIN college ON user.college_id = college.college_id )INNER JOIN department ON user.dept_id=department.dept_id);";
    $result = mysqli_query($conn,$sql);
    return mysqli_num_rows($result);
}

function no_of_post_report($conn)
{
    $sql = "SELECT count(post_id) count FROM post;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }
}

function following_report($conn)
{
    $sql = "SELECT count(user_id) count FROM friends;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }

}


function  followers_report($conn)
{
    $sql = "SELECT count(user_id) count FROM friends;";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $trueresult;
    }
}
