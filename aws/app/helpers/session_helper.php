
<?php
  session_start();

  // Flash message helper
  function flash($name = '', $message = '', $class = ''){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
        }

        if(!empty($_SESSION[$name. '_class'])){
          unset($_SESSION[$name. '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;
      } elseif(empty($message) && !empty($_SESSION[$name])){
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
        echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
        if(empty($_SESSION['password'])){
          ?>
          <script> document.getElementById("password").style.borderColor = "red"; </script>
          <?php } 
          if(empty($_SESSION['username'])){
          ?>
          <script> document.getElementById("username").style.borderColor = "red"; </script>
          <?php
          }
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
      }
    }
  }

  // Check User is logged with Session
  function isLoggedIn(){
    if(isset($_SESSION['AWSession'])){
      return true;
    } else {
      return false;
    }
  }


