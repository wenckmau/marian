<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
  

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">M.C NBS</a>

      <nav class="navbar">
         <a href="home.php">Acasa</a>
         <a href="about.php">Despre</a>
         <a href="contact.php">Contacteaza-ne</a>
      </nav>

      <div class="icons">
         <a href="search.php"><i class="fas fa-search"></i></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profil</a>
            <a href="components/user_logout.php" onclick="return confirm('Vrei sa dai logut');" class="delete-btn">logout</a>
         </div>
      
         <?php
            }else{
         ?>
            <p class="name">Te rog sa te logezi mai intati</p>
            <a href="login.php" class="btn">Logeaza-te</a>
           
         <?php
          }
         ?>
      </div>

 

</header>

