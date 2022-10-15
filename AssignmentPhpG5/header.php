
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="<?php echo $cssName ?>.css" />
    <title><?php echo $page_title ?> | Art Society</title>
  </head>
  <body>
    <div class="menu-bar">
        <img class = "logo" src="images/logo.png">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Member<i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="">login</a></li>
                        <li><a href="">register</a></li>
                        <li><a href="">profile</a></li>
                        <li><a href="">search for event</a></li>
                        <li><a href="ticket.php">reserve ticket</a></li>
                </li>
              </div>
        </li>
        <li><a href="#">Admin<i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
            <ul>
              <li><a href="">login</a></li>
              <li><a href="">event management</a></li>
              <li><a href="manager-login.php">member management</a></li>
              <li><a href="">announcement</a></li>
            </li>
          </div>
        </li>
      </ul>
    </div>



