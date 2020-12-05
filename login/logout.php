<?
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['userlevel']);
//logout == session delete ->unset($_SESSION['']);
  echo("
       <script>
          location.href = '../index.html'; 
         </script>
       ");
?>
