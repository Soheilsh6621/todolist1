<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Task manager UI</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"><?php session_start();
    if (isset($_SESSION['hsab'])) {  
      $hsab = $_SESSION['hsab'];  
      echo "شناسه کاربر: " . htmlspecialchars($hsab);  
  } else {  
      echo "شناسه کاربر موجود نیست.";  
  }  
    ?> </i></div>
  
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Navigation</div>
        <ul>
          <li> <i class="fa fa-home"></i>Home</li>
          <li><i class="fa fa-signal"></i>Activity</li>
          <li class="active"> <i class="fa fa-tasks"></i>Manage Tasks</li>
          <li> <i class="fa fa-envelope"></i>Messages</li>
        </ul>
      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active"><a href="/7task/Addtask/dist/">Add task</a></div>
          <div class="button"><a href="/7task/task-manager-ui/dist/">pending</a></div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title"><?php
          date_default_timezone_set('Asia/Tehran');  

          // دریافت تاریخ و زمان فعلی  
          $currentDateTime = date('Y-m-d H:i:s');  
          
          // نمایش تاریخ و زمان  
          echo "today: " . $currentDateTime;  
          ?></div>
          <ul>
            <li class="checked"><i class="fa fa-check-square-o"></i><span>
              <div id="div1" >
              <?php 
            $mysqli = new mysqli("localhost","root","","login");
            if($mysqli->connect_errno){
            
                echo "failed to connect to mysql. error:".$mysqli->connect_error;
                exit;
            } 
            function getfirstRecord($mysqli, $user_id) {  
              // کوئری برای دریافت شناسه دومین تسک انجام نشده  
              $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1";  
              $stmt = $mysqli->prepare($query);  
              $stmt->bind_param('i', $user_id);  
              $stmt->execute();  
              $result = $stmt->get_result();  
          
              if ($result->num_rows > 0) {  
                  $row = $result->fetch_assoc();  
                  $first_id = $row['id'];  
          
                  // اکنون عنوان تسک دوم را دریافت کنید  
                  $sql = "SELECT title FROM tasks WHERE id = ?";  
                  $stmt_title = $mysqli->prepare($sql);  
                  $stmt_title->bind_param('i', $first_id);  
                  $stmt_title->execute();  
                  $result_title = $stmt_title->get_result();  
          
                  if ($result_title->num_rows > 0) {  
                      $tit = $result_title->fetch_assoc();  
                      return $tit['title'];  
                  }  
                  $stmt_title->close();  
              }  
          
              return null; // اگر تسکی وجود نداشت  
          }  
          
          // فرض کنید $id حاوی شناسه کاربر است  
          if (isset($_SESSION['id'])) {  
              $id = $_SESSION['id'];  
              $title = getfirstRecord($mysqli, $id);  
              
              if ($title) {  
                  echo htmlspecialchars($title); // نمایش عنوان تسک دوم  
              } else {  
                  echo " تسکی برای نمایش موجود نیست.";  
              }  
          } else {  
              echo "شناسه کاربر موجود نیست.";  
          }  
           
            ?>
            </div>
            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                <div class="button green"><button type="submit" name="com1">delete</button></div>
                </form>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>
              <?php
            /*$mysqli = new mysqli("localhost","root","","login");
            if($mysqli->connect_errno){
            
                echo "failed to connect to mysql. error:".$mysqli->connect_error;
                exit;
            } if*/
            function getSecondRecord($mysqli, $user_id) {  
              // کوئری برای دریافت شناسه دومین تسک انجام نشده  
              $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 1";  
              $stmt = $mysqli->prepare($query);  
              $stmt->bind_param('i', $user_id);  
              $stmt->execute();  
              $result = $stmt->get_result();  
          
              if ($result->num_rows > 0) {  
                  $row = $result->fetch_assoc();  
                  $second_id = $row['id'];  
          
                  // اکنون عنوان تسک دوم را دریافت کنید  
                  $sql = "SELECT title FROM tasks WHERE id = ?";  
                  $stmt_title = $mysqli->prepare($sql);  
                  $stmt_title->bind_param('i', $second_id);  
                  $stmt_title->execute();  
                  $result_title = $stmt_title->get_result();  
          
                  if ($result_title->num_rows > 0) {  
                      $tit = $result_title->fetch_assoc();  
                      return $tit['title'];  
                  }  
                  $stmt_title->close();  
              }  
          
              return null; // اگر تسکی وجود نداشت  
          }  
          
          // فرض کنید $id حاوی شناسه کاربر است  
          if (isset($_SESSION['id'])) {  
              $id = $_SESSION['id'];  
              $title2 = getSecondRecord($mysqli, $id);  
              
              if ($title2) {  
                  echo htmlspecialchars($title2); // نمایش عنوان تسک دوم  
              } else {  
                  echo " تسکی برای نمایش موجود نیست.";  
              }  
          } else {  
              echo "شناسه کاربر موجود نیست.";  
          }  
                 
                      
            ?>
            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                  <div class="button green"><button type="submit" name="com2">delete</button></div>
                </form>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>
            <?php

                function gettherrRecord($mysqli, $user_id) {  
                  // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                  $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 2";  
                  $stmt = $mysqli->prepare($query);  
                  $stmt->bind_param('i', $user_id);  
                  $stmt->execute();  
                  $result = $stmt->get_result();  

                  if ($result->num_rows > 0) {  
                      $row = $result->fetch_assoc();  
                      $therr_id = $row['id'];  

                      // اکنون عنوان تسک دوم را دریافت کنید  
                      $sql = "SELECT title FROM tasks WHERE id = ?";  
                      $stmt_title = $mysqli->prepare($sql);  
                      $stmt_title->bind_param('i', $therr_id);  
                      $stmt_title->execute();  
                      $result_title = $stmt_title->get_result();  

                      if ($result_title->num_rows > 0) {  
                          $tit = $result_title->fetch_assoc();  
                          return $tit['title'];  
                      }  
                      $stmt_title->close();  
                  }  

                  return null; // اگر تسکی وجود نداشت  
                }  

                // فرض کنید $id حاوی شناسه کاربر است  
                if (isset($_SESSION['id'])) {  
                  $id = $_SESSION['id'];  
                  $title3 = gettherrRecord($mysqli, $id);  
                  
                  if ($title3) {  
                      echo htmlspecialchars($title3); // نمایش عنوان تسک دوم  
                  } else {  
                      echo " تسکی برای نمایش موجود نیست.";  
                  }  
                } else {  
                  echo "شناسه کاربر موجود نیست.";  
                }  
            ?>

            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                  <div class="button green"><button type="submit" name="com3">delete</button></div>
                </form>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>
            <?php

                function getfouerRecord($mysqli, $user_id) {  
                  // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                  $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 3";  
                  $stmt = $mysqli->prepare($query);  
                  $stmt->bind_param('i', $user_id);  
                  $stmt->execute();  
                  $result = $stmt->get_result();  

                  if ($result->num_rows > 0) {  
                      $row = $result->fetch_assoc();  
                      $fouer_id = $row['id'];  

                      // اکنون عنوان تسک دوم را دریافت کنید  
                      $sql = "SELECT title FROM tasks WHERE id = ?";  
                      $stmt_title = $mysqli->prepare($sql);  
                      $stmt_title->bind_param('i', $fouer_id);  
                      $stmt_title->execute();  
                      $result_title = $stmt_title->get_result();  

                      if ($result_title->num_rows > 0) {  
                          $tit = $result_title->fetch_assoc();  
                          return $tit['title'];  
                      }  
                      $stmt_title->close();  
                  }  

                  return null; // اگر تسکی وجود نداشت  
                }  

                // فرض کنید $id حاوی شناسه کاربر است  
                if (isset($_SESSION['id'])) {  
                  $id = $_SESSION['id'];  
                  $title4 = getfouerRecord($mysqli, $id);  
                  
                  if ($title4) {  
                      echo htmlspecialchars($title4); // نمایش عنوان تسک دوم  
                  } else {  
                      echo " تسکی برای نمایش موجود نیست.";  
                  }  
                } else {  
                  echo "شناسه کاربر موجود نیست.";  
                }  
            ?>

            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                  <div class="button green"><button type="submit" name="com4">delete</button></div>
                </form>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>
            <?php

                function getfiveRecord($mysqli, $user_id) {  
                  // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                  $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 4";  
                  $stmt = $mysqli->prepare($query);  
                  $stmt->bind_param('i', $user_id);  
                  $stmt->execute();  
                  $result = $stmt->get_result();  

                  if ($result->num_rows > 0) {  
                      $row = $result->fetch_assoc();  
                      $five_id = $row['id'];  

                      // اکنون عنوان تسک دوم را دریافت کنید  
                      $sql = "SELECT title FROM tasks WHERE id = ?";  
                      $stmt_title = $mysqli->prepare($sql);  
                      $stmt_title->bind_param('i', $five_id);  
                      $stmt_title->execute();  
                      $result_title = $stmt_title->get_result();  

                      if ($result_title->num_rows > 0) {  
                          $tit = $result_title->fetch_assoc();  
                          return $tit['title'];  
                      }  
                      $stmt_title->close();  
                  }  

                  return null; // اگر تسکی وجود نداشت  
                }  

                // فرض کنید $id حاوی شناسه کاربر است  
                if (isset($_SESSION['id'])) {  
                  $id = $_SESSION['id'];  
                  $title5 = getfiveRecord($mysqli, $id);  
                  
                  if ($title5) {  
                      echo htmlspecialchars($title5); // نمایش عنوان تسک دوم  
                  } else {  
                      echo " تسکی برای نمایش موجود نیست.";  
                  }  
                } else {  
                  echo "شناسه کاربر موجود نیست.";  
                }  
            ?>

            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                  <div class="button green"><button type="submit" name="com5">delete</button></div>
                </form>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>
            <?php

                function getsexRecord($mysqli, $user_id) {  
                  // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                  $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 5";  
                  $stmt = $mysqli->prepare($query);  
                  $stmt->bind_param('i', $user_id);  
                  $stmt->execute();  
                  $result = $stmt->get_result();  

                  if ($result->num_rows > 0) {  
                      $row = $result->fetch_assoc();  
                      $sex_id = $row['id'];  

                      // اکنون عنوان تسک دوم را دریافت کنید  
                      $sql = "SELECT title FROM tasks WHERE id = ?";  
                      $stmt_title = $mysqli->prepare($sql);  
                      $stmt_title->bind_param('i', $sex_id);  
                      $stmt_title->execute();  
                      $result_title = $stmt_title->get_result();  

                      if ($result_title->num_rows > 0) {  
                          $tit = $result_title->fetch_assoc();  
                          return $tit['title'];  
                      }  
                      $stmt_title->close();  
                  }  

                  return null; // اگر تسکی وجود نداشت  
                }  

                // فرض کنید $id حاوی شناسه کاربر است  
                if (isset($_SESSION['id'])) {  
                  $id = $_SESSION['id'];  
                  $title6 = getsexRecord($mysqli, $id);  
                  
                  if ($title6) {  
                      echo htmlspecialchars($title6); // نمایش عنوان تسک دوم  
                  } else {  
                      echo " تسکی برای نمایش موجود نیست.";  
                  }  
                } else {  
                  echo "شناسه کاربر موجود نیست.";  
                }  
            ?>

            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                  <div class="button green"><button type="submit" name="com6">delete</button></div>
                </form>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>
            <?php

                function getsevenRecord($mysqli, $user_id) {  
                  // کوئری برای دریافت شناسه دومین تسک انجام نشده  
                  $query = "SELECT id FROM tasks WHERE user_id = ? AND status = 'completed' ORDER BY created_at LIMIT 1 OFFSET 6";  
                  $stmt = $mysqli->prepare($query);  
                  $stmt->bind_param('i', $user_id);  
                  $stmt->execute();  
                  $result = $stmt->get_result();  

                  if ($result->num_rows > 0) {  
                      $row = $result->fetch_assoc();  
                      $seven_id = $row['id'];  

                      // اکنون عنوان تسک دوم را دریافت کنید  
                      $sql = "SELECT title FROM tasks WHERE id = ?";  
                      $stmt_title = $mysqli->prepare($sql);  
                      $stmt_title->bind_param('i', $seven_id);  
                      $stmt_title->execute();  
                      $result_title = $stmt_title->get_result();  

                      if ($result_title->num_rows > 0) {  
                          $tit = $result_title->fetch_assoc();  
                          return $tit['title'];  
                      }  
                      $stmt_title->close();  
                  }  

                  return null; // اگر تسکی وجود نداشت  
                }  

                // فرض کنید $id حاوی شناسه کاربر است  
                if (isset($_SESSION['id'])) {  
                  $id = $_SESSION['id'];  
                  $title7 = getsevenRecord($mysqli, $id);  
                  
                  if ($title7) {  
                      echo htmlspecialchars($title7); // نمایش عنوان تسک دوم  
                  } else {  
                      echo " تسکی برای نمایش موجود نیست.";  
                  }  
                } else {  
                  echo "شناسه کاربر موجود نیست.";  
                }  
            ?>

            </span>
              <div class="info">
                <form method="" action="/7task/back-end.php/delete-button.php" >
                  <div class="button green"><button type="submit" name="com7">delete</button></div>
                </form>
              </div>
            </li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
  <script>  
    function showTooltip(event) {  
        const tooltip = document.getElementById('tooltip');  
        const x = event.pageX + 10; // موقعیت x  
        const y = event.pageY + 10; // موقعیت y  
        
        // درخواست AJAX به سرور برای دریافت داده  
        fetch('get_data.php')  
            .then(response => response.text())  
            .then(data => {  
                tooltip.innerHTML = data;  
                tooltip.style.display = 'block';  
                tooltip.style.left = x + 'px';  
                tooltip.style.top = y + 'px';  
            });  
    }  

    function hideTooltip() {  
        const tooltip = document.getElementById('tooltip');  
        tooltip.style.display = 'none';  
    }  
</script>  
</body>
</html>
