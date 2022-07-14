<body>
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel" style="width: 667px;margin: 0 auto;">
  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="index.php"><img src="./img/welcome.png" alt="Los Angeles" class="d-block rounded" style="width:100%; height:232px;"></a>
    </div>
    <div class="carousel-item">
      <a href="?do=vote_result&id=16"><img src="./img/animal.png" alt="animal" class="d-block rounded" style="width:100%; height:232px;"></a>
    </div>
    <div class="carousel-item">
      <a href="?do=vote_result&id=11"><img src="./img/food.png" alt="New York" class="d-block rounded" style="width:100%; height:232px;"></a>
    </div>
    <div class="carousel-item">
      <a href="?do=vote_result&id=14"><img src="./img/travel.png" alt="New York" class="d-block rounded" style="width:100%; height:232px;"></a>
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</body>