<?php
$mysqli = new mysqli("localhost","root","","login");
if($mysqli->connect_errno){

    echo "failed to connect to mysql. error:".$mysqli->connect_error;
    exit;
} else {
   // echo "coonceted succsefuly";
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    function com1($com1, $user_id) {  
        global $mysqli;  
        if (isset($com1)) {  
            // کوئری برای دریافت شناسه دومین تسک انجام نشده  
            $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1";  
            $stmt = $mysqli->prepare($query);  
            
            if ($stmt === false) {  
                die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
            }  
    
            $stmt->bind_param('i', $user_id);  
            $stmt->execute();  
            $result = $stmt->get_result();  
    
            if ($result->num_rows > 0) {  
                $row = $result->fetch_assoc();  
                $first_id = $row['id'];  
    
                $sql = "DELETE FROM tasks WHERE id = ?";  
                $stmt = $mysqli->prepare($sql);  
                if ($stmt === false) {  
                    die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                }  
    
                $stmt->bind_param('i', $first_id);  
                $stmt->execute();  
                $stmt->close();  
    
                header('Location: /7task/task-manager-ui/dist/completed.php');  
                exit(); // Important to stop further script execution  
            } else {  
                return null;  
            }  
        }  
    }  

    session_start();
            if (isset($_SESSION['id'])){
                $id = $_SESSION['id'];
            } else{
                echo "nooo";
            }

            $com1 = $_GET['com1'];
            com1($com1,$id);


            function com2($com2, $user_id) {  
                global $mysqli;  
                if (isset($com2)) {  
                    // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                    $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 1";  
                    $stmt = $mysqli->prepare($query);  
                    
                    if ($stmt === false) {  
                        die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                    }  
            
                    $stmt->bind_param('i', $user_id);  
                    $stmt->execute();  
                    $result = $stmt->get_result();  
            
                    if ($result->num_rows > 0) {  
                        $row = $result->fetch_assoc();  
                        $first_id = $row['id'];  
            
                        $sql = "DELETE FROM tasks WHERE id = ?";  
                        $stmt = $mysqli->prepare($sql);  
                        if ($stmt === false) {  
                            die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                        }  
            
                        $stmt->bind_param('i', $first_id);  
                        $stmt->execute();  
                        $stmt->close();  
            
                        header('Location: /7task/task-manager-ui/dist/completed.php');  
                        exit(); // Important to stop further script execution  
                    } else {  
                        return null;  
                    }  
                }  
            }  
            $com2 = $_GET['com2'];
            com2($com2,$id);



            function com3($com3, $user_id) {  
                global $mysqli;  
                if (isset($com3)) {  
                    // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                    $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 2";  
                    $stmt = $mysqli->prepare($query);  
                    
                    if ($stmt === false) {  
                        die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                    }  
            
                    $stmt->bind_param('i', $user_id);  
                    $stmt->execute();  
                    $result = $stmt->get_result();  
            
                    if ($result->num_rows > 0) {  
                        $row = $result->fetch_assoc();  
                        $first_id = $row['id'];  
            
                        $sql = "DELETE FROM tasks WHERE id = ?";  
                        $stmt = $mysqli->prepare($sql);  
                        if ($stmt === false) {  
                            die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                        }  
            
                        $stmt->bind_param('i', $first_id);  
                        $stmt->execute();  
                        $stmt->close();  
            
                        header('Location: /7task/task-manager-ui/dist/completed.php');  
                        exit(); // Important to stop further script execution  
                    } else {  
                        return null;  
                    }  
                }  
            }  
               
                  $com3 = $_GET['com3'];
                  com3($com3,$id);


                  
                  function com4($com4, $user_id) {  
                    global $mysqli;  
                    if (isset($com4)) {  
                        // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                        $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 3";  
                        $stmt = $mysqli->prepare($query);  
                        
                        if ($stmt === false) {  
                            die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                        }  
                
                        $stmt->bind_param('i', $user_id);  
                        $stmt->execute();  
                        $result = $stmt->get_result();  
                
                        if ($result->num_rows > 0) {  
                            $row = $result->fetch_assoc();  
                            $first_id = $row['id'];  
                
                            $sql = "DELETE FROM tasks WHERE id = ?";  
                            $stmt = $mysqli->prepare($sql);  
                            if ($stmt === false) {  
                                die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                            }  
                
                            $stmt->bind_param('i', $first_id);  
                            $stmt->execute();  
                            $stmt->close();  
                
                            header('Location: /7task/task-manager-ui/dist/completed.php');  
                            exit(); // Important to stop further script execution  
                        } else {  
                            return null;  
                        }  
                    }  
                }  
               
                  $com4 = $_GET['com4'];
                  com4($com4,$id);


                         
                  function com5($com5, $user_id) {  
                    global $mysqli;  
                    if (isset($com5)) {  
                        // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                        $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 4";  
                        $stmt = $mysqli->prepare($query);  
                        
                        if ($stmt === false) {  
                            die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                        }  
                
                        $stmt->bind_param('i', $user_id);  
                        $stmt->execute();  
                        $result = $stmt->get_result();  
                
                        if ($result->num_rows > 0) {  
                            $row = $result->fetch_assoc();  
                            $first_id = $row['id'];  
                
                            $sql = "DELETE FROM tasks WHERE id = ?";  
                            $stmt = $mysqli->prepare($sql);  
                            if ($stmt === false) {  
                                die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                            }  
                
                            $stmt->bind_param('i', $first_id);  
                            $stmt->execute();  
                            $stmt->close();  
                
                            header('Location: /7task/task-manager-ui/dist/completed.php');  
                            exit(); // Important to stop further script execution  
                        } else {  
                            return null;  
                        }  
                    }  
                }  
               
                  $com5 = $_GET['com5'];
                  com5($com5,$id);


                  function com6($com6, $user_id) {  
                    global $mysqli;  
                    if (isset($com6)) {  
                        // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                        $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 5";  
                        $stmt = $mysqli->prepare($query);  
                        
                        if ($stmt === false) {  
                            die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                        }  
                
                        $stmt->bind_param('i', $user_id);  
                        $stmt->execute();  
                        $result = $stmt->get_result();  
                
                        if ($result->num_rows > 0) {  
                            $row = $result->fetch_assoc();  
                            $first_id = $row['id'];  
                
                            $sql = "DELETE FROM tasks WHERE id = ?";  
                            $stmt = $mysqli->prepare($sql);  
                            if ($stmt === false) {  
                                die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                            }  
                
                            $stmt->bind_param('i', $first_id);  
                            $stmt->execute();  
                            $stmt->close();  
                
                            header('Location: /7task/task-manager-ui/dist/completed.php');  
                            exit(); // Important to stop further script execution  
                        } else {  
                            return null;  
                        }  
                    }  
                }  
                   
                      $com6 = $_GET['com6'];
                      com6($com6,$id);


                       function com7($com7, $user_id) {  
                        global $mysqli;  
                        if (isset($com7)) {  
                            // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                            $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 6";  
                            $stmt = $mysqli->prepare($query);  
                            
                            if ($stmt === false) {  
                                die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                            }  
                    
                            $stmt->bind_param('i', $user_id);  
                            $stmt->execute();  
                            $result = $stmt->get_result();  
                    
                            if ($result->num_rows > 0) {  
                                $row = $result->fetch_assoc();  
                                $first_id = $row['id'];  
                    
                                $sql = "DELETE FROM tasks WHERE id = ?";  
                                $stmt = $mysqli->prepare($sql);  
                                if ($stmt === false) {  
                                    die('Prepare failed: ' . htmlspecialchars($mysqli->error));  
                                }  
                    
                                $stmt->bind_param('i', $first_id);  
                                $stmt->execute();  
                                $stmt->close();  
                    
                                header('Location: /7task/task-manager-ui/dist/completed.php');  
                                exit(); // Important to stop further script execution  
                            } else {  
                                return null;  
                            }  
                        }  
                    }  
                       
                          $com7 = $_GET['com7'];
                          com7($com7,$id);

                    }
                