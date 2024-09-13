<?php
$mysqli = new mysqli("localhost","root","","login");
if($mysqli->connect_errno){

    echo "failed to connect to mysql. error:".$mysqli->connect_error;
    exit;
} else {
    echo "coonceted succsefuly";
}

echo "<br>";
date_default_timezone_set('Asia/Tehran');  

// دریافت تاریخ و زمان فعلی  
$currentDateTime = date('Y-m-d H:i:s');  

// نمایش تاریخ و زمان  
//echo "Current Date and Time: " . $currentDateTime;  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $title = $_POST['title'];  
    $description = $_POST['description'];  
    session_start(); // شروع سشن  
    if (isset($_SESSION['user_id'])) {  
        $user_id = $_SESSION['user_id'];  
        echo "شناسه کاربر: " . htmlspecialchars($user_id);  
    } else {  
        echo "شناسه کاربر موجود نیست.";  
    }  

    // پردازش داده‌ها (ذخیره در پایگاه داده یا هر کار دیگر)  
    echo "Task Title: " . htmlspecialchars($title) . "<br>";  
    echo "Task Description: " . htmlspecialchars($description); 
    $sql = "INSERT INTO tasks(title,description,created_at,user_id) values(?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssi',$title,$description,$currentDateTime,$user_id);
    $stmt->execute();
    $stmt->close();
    header("Location: /7task/task-manager-ui/dist/");
}    

   