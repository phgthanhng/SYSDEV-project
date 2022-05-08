<head><link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<style>
body{
  background-color: #ffffff;
}
.container{
  position: absolute;
  right: 30px;
}
.message{
  font-family: 'Poppins', sans-serif;
  font-size: 30px;
  color: black;
  font-weight: 500;
  position: absolute;
  top: 230px;
  left: 40px;
}
.message2{
  font-family: 'Poppins', sans-serif;
  font-size: 18px;
  color: black;
  font-weight: 300;
  width: 360px;
  position: absolute;
  top: 280px;
  left: 40px;
}

.neon{
  text-align: center;
  width: 300px;
  margin-top: 30px;
  margin-bottom: 10px;
  font-family: 'Varela Round', sans-serif;
  font-size: 90px;
  color: #E05B5B;
  letter-spacing: 3px;
  text-shadow: 0 0 5px #E05B5B;
  animation: flux 2s linear infinite;
  
}
.trash{
  width: 170px;
  height: 220px;
  background-color: #585F67;
  top: 300px;
}
.can{
  width: 190px;
  height: 30px;
  background-color: #6B737C;
  border-radius: 15px 15px 0 0;
}
.door-frame {
  height: 495px;
  width: 295px;
  border-radius: 90px 90px 0 0;
  background-color: #8594A5;
  display: flex;
  justify-content: center;
  align-items: center;
}

.door{
  height: 450px;
  width: 250px;
  border-radius: 70px 70px 0 0;
  background-color: #A0AEC0;
}

.eye{
  top: 15px;
  left: 25px;
  height: 5px;
  width: 15px;
  border-radius: 50%;
  background-color: white;
  animation: eye 7s ease-in-out infinite;
  position: absolute;
 }
.eye2{
  left: 65px;
}

.window{
  height: 40px;
  width: 130px;
  background-color: #1C2127;
  border-radius: 3px;
  margin: 80px auto;
  position: relative;
}

.leaf{
  height: 40px;
  width: 130px;
  background-color: #8594A5;
  border-radius: 3px;
  margin: 80px auto;
  animation: leaf 7s infinite;
  transform-origin: right;
}

.handle {
  height: 8px;
  width: 50px;
  border-radius: 4px;
  background-color: #EBF3FC;
  position: absolute;
  margin-top: 250px;
  margin-left: 30px;
}

.rectangle {
  height: 70px;
  width: 25px;
  background-color: #CBD8E6;
  border-radius: 4px;
  position: absolute;
  margin-top: 220px;
  margin-left: 20px;
}

@keyframes leaf {
  0% {
    transform: scaleX(1);
  }
  5% {
    transform: scaleX(0.2);
  } 
  70%{
    transform: scaleX(0.2);
  }
  75%{
    transform: scaleX(1);
  }
  100% {
    transform: scaleX(1);
  }
}

@keyframes eye {
  0% {
    opacity: 0;
    transform: translateX(0)
  }
  5% {
    opacity: 0;
  }
  15%{
    opacity: 1;
    transform: translateX(0)
  }
  20% {
    transform: translateX(15px)
  }
  35%{
    transform: translateX(15px)
  }
  40%{
    transform: translateX(-15px)
  }
  60%{
    transform: translateX(-15px)
  }
  65% {
    transform: translateX(0)
  }
}

@keyframes flux {
  0%,
  100% {
    text-shadow: 0 0 5px #E05B5B, 0 0 15px #E05B5B, 0 0 50px #E05B5B, 0 0 50px #E05B5B, 0 0 2px #B9FFE8, 2px 2px 3px #12E29C;
    color: #4BFFEF;
  }
  50% {
    text-shadow: 0 0 3px #E05B5B, 0 0 7px #E05B5B, 0 0 25px #E05B5B, 0 0 25px #E05B5B, 0 0 2px #E05B5B, 2px 2px 3px #006A60;
    color: #63D3AE;
  }
}

</style>
<body>
  <div class="message">Safely Logging out...
  </div>
  <div class="message2">Remember to clear cookies and caches.</div>
  <div class="container">
    <div class="neon">EXIT</div>
    <div class="door-frame">
      <div class="door">
        <div class="rectangle">
      </div>
        <div class="handle">
          </div>
        <div class="window">
          <div class="eye">
          </div>
          <div class="eye eye2">
          </div>
          <div class="leaf">
          </div> 
        </div>
      </div>  
    </div>
  </div>
</body>
</html>