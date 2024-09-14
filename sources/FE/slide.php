<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title> -->

    <style>
  /* @media screen and (max-width: 990px) {

    #slide2 img {

      display: none;

    }

    #slide3 img {
      display: none;

    }

  } */
</style>
</head>


<body>


  <div class="container py-3">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 ">



      <div id="slideshow" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#slideshow" data-bs-slide-to="2" aria-label="Slide 3"></button>
    
  </div>
  <div class="carousel-inner" id="carouselInner">
    <div class="carousel-item active">
    <a href=""><img id="slide"  src=<?= $linkImgIndex . "slider_5.webp" ?> class="d-block w-100" alt="..."></a>
    <!-- <img id="slide" onclick="changeimg()" src=<?= $linkImgIndex . "slide_1.webp" ?> class="d-block w-100" alt="..."> -->
    </div>
    <div class="carousel-item">
   <a href=""> <img id="slide"  src=<?= $linkImgIndex . "slider_3.webp" ?> class="d-block w-100" alt="..."></a>
    </div>
    <div class="carousel-item">
    <a href=""><img id="slide"   src=<?= $linkImgIndex . "slider_20.webp" ?> class="d-block w-100" alt="..."></a>
    </div>
    
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> 


      </div>
  </div>
</div>








     

<script>
  // Lấy phần tử gốc của carousel có id là "carouselInner"
    var carouselInner = document.getElementById("carouselInner");
    // Lấy danh sách các phần tử con có lớp là "carousel-item"
    var carouselItems = carouselInner.getElementsByClassName("carousel-item");

    // Lấy danh sách các chỉ số của carousel
    var indicators = document.getElementsByClassName("carousel-indicators")[0].getElementsByTagName("button");
    // Khởi tạo biến currentSlideIndex để lưu chỉ số slide hiện tại
    var currentSlideIndex = 0;

    var slideInterval = setInterval(changeSlide, 2000); // Chuyển slide sau mỗi 2 giây
  // Hàm để thay đổi slide
    function changeSlide() {
      currentSlideIndex++;
      if (currentSlideIndex >= carouselItems.length) {
        currentSlideIndex = 0;
      }
  // Xóa lớp "active" khỏi tất cả các slide và chỉ số
      for (var i = 0; i < carouselItems.length; i++) {
        carouselItems[i].classList.remove("active");
        indicators[i].classList.remove("active");
      }
  // Thêm lớp "active" cho slide và chỉ số hiện tại
      carouselItems[currentSlideIndex].classList.add("active");
      indicators[currentSlideIndex].classList.add("active");
    }
  // Xử lý sự kiện khi người dùng nhấp vào nút 'previous'
    var prevButton = document.querySelector(".carousel-control-prev");
    prevButton.addEventListener("click", function() {
      clearInterval(slideInterval); // Dừng chuyển slide tự động khi người dùng nhấp vào nút 'previous'
      // changeSlide();
      slideInterval = setInterval(changeSlide, 2000); // Bắt đầu chuyển slide tự động sau khi người dùng nhấp vào nút 'previous'
    });
  // Xử lý sự kiện khi người dùng nhấp vào nút 'next'
    var nextButton = document.querySelector(".carousel-control-next");
    nextButton.addEventListener("click", function() {
      clearInterval(slideInterval); // Dừng chuyển slide tự động khi người dùng nhấp vào nút 'next'
      // changeSlide();
      slideInterval = setInterval(changeSlide, 2000); // Bắt đầu chuyển slide tự động sau khi người dùng nhấp vào nút 'next'
    });
  </script>