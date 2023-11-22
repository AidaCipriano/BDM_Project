<?php
 include ('controlador.php');
  

?>


<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Aetna</title>
    <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../css/estilos.css">
    <link rel="stylesheet" href="../../../css/estilosmodals.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.JPG">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/dropdowns.css" rel="stylesheet">
  </head>
  <body>
  <?php  include("header.php"); ?>
    <div class="body">
    <div class="container1 clearfix">
        <div class="people-list" id="people-list">
          <div class="search">
            <input type="text" placeholder="search" />
            <i class="fa fa-search"></i>
          </div>
          <ul class="list">
            <li class="clearfix">
              <img src="/img/avatar.jpg" height="50px" alt="avatar" />
              <div class="about">
                <div class="name">Usuario</div>
                <div class="status">
                  <i class="fa fa-circle online"></i> online
                </div>
              </div>
            </li>
            
           
          </ul>
        </div>
        
        <div class="chat">
          <div class="chat-header clearfix">
            <img src="/img/avatar.jpg" height="50px" alt="avatar" />
            
            <div class="chat-about">
              <div class="chat-with">Usuario</div>
            </div>
          </div> <!-- end chat-header -->
          
          <div class="chat-history">
            <ul>
             
              
            </ul>
            
          </div> <!-- end chat-history -->
          
          <div class="chat-message clearfix">
            <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
                    
            <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
            <i class="fa fa-file-image-o"></i>
            
            <button>Send</button>

          </div> <!-- end chat-message -->
          
        </div> <!-- end chat -->
        
      </div> 
    </div>


<script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> Usuario</span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
</script>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script><script  src="../../js/chat.js"></script>
<script src="../../../js/menu.js"></script>
<script src="../../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
