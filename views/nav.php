<?php 
  $online = $_REQUEST['ONLINE'];
  $USER = null;
  if($online){
    $USER = $_REQUEST['USER'];
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: rgb(63,95,255);
background: radial-gradient(circle, rgba(63,95,255,1) 20%, rgba(11,3,125,1) 58%);">
  <a class="navbar-brand" href="home"><i class="fab fa-korvue" style="font-size: 26px;position: relative;right: 5px;color: white"></i>ingwin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php 
        if($online){
      ?>
      <li class="nav-item ">
        <a class="nav-link" href="profile">
          <?php 
            echo $USER->full_name;
          ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addcar">Add Car</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout">Logout</a>
      </li>
      <?php 
        }else{
      ?>
      <li class="nav-item ">
        <a class="nav-link" href="home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
      <?php
        }
      ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>