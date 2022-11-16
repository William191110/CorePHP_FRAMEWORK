
<style>
  body {
    background: #00091B;
    color: #fff;
    font-family: 'Courier New', Courier, monospace!important;
  }
  
  
  @keyframes fadeIn {
    from {top: 20%; opacity: 0;}
    to {top: 100; opacity: 1;}
    
  }
  
  @-webkit-keyframes fadeIn {
    from {top: 20%; opacity: 0;}
    to {top: 100; opacity: 1;}
    
  }
  
  .wrapper {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    animation: fadeIn 1000ms ease;
    -webkit-animation: fadeIn 1000ms ease;
    
  }
  
  h1 {
    font-size: 50px;
    margin-bottom: 0;
    line-height: 1;
    font-weight: 700;
  }
  
  .dot {
    color: #4FEBFE;
  }
  
  p {
    text-align: center;
    margin: 18px;
    font-weight: normal;
    
  }
  
  .icons {
    text-align: center;
    
  }
  
  .icons i {
    color: #00091B;
    background: #fff;
    height: 15px;
    width: 15px;
    padding: 13px;
    margin: 0 10px;
    border-radius: 50px;
    border: 2px solid #fff;
    transition: all 200ms ease;
    text-decoration: none;
    position: relative;
  }
  
  .icons i:hover, .icons i:active {
    color: #fff;
    background: none;
    cursor: pointer !important;
    transform: scale(1.2);
    -webkit-transform: scale(1.2);
    text-decoration: none;
    
  }
  
</style>


<body>

<div class="wrapper">
  <h1>Welcome<span class="dot"> To.</span></h1>
  <p>Core PHP FRAMEWORK. <br> </p>
 </div>

 <div class="flex">
 <form action="<?php echo URL('home');?>" method="POST">
  <input type="text" name="name" placeholder="Name" required> <br>
  <input type="email" name="email" placeholder="Email" required> <br>
  <input type="submit" name="send">
 </form>
 </div>


</body>