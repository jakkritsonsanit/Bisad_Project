<body>
    <div class="boxleft">
            <div class="container">
                    <div class='mySlides'>
                        <img src="src/img/profile.jpg" class='picbig' style="width:100%">
                    </div>
                    <div class='mySlides'>
                        <img src="src/img/palmdeath.jpg" class='picbig' style="width:100%">
                    </div>
                    <div class='mySlides'>
                        <img src="src/img/palmgod.jpg" class='pigbig' style="width:100%">
                    </div>
            </div>
            <div class="row">
                    <a class="prev cursor" onclick="plusSlides(-1)">&#10094;</a>
                    <div class="columnlft">
                      <img src="src/img/profile.jpg" alt="manu1" class='demo cursor pic1' onclick="currentSlide(1)";>
                    </div>
                    <div class="columnlft">
                      <img src="src/img/palmdeath.jpg" alt="manu2" class='demo cursor pic1' onclick="currentSlide(2)";>
                    </div>
                    <div class="columnlft">
                      <img src="src/img/palmgod.jpg" alt="manu3" class='demo cursor pic1' onclick="currentSlide(3)";>
                    </div>
                    <a class="next cursor" onclick="plusSlides(1)">&#10095;</a>
                  </div>
        </div>
        <div class=boxright>
                <div class="container2">
                        <label for="shopnm" class='shopinfonm'><b>Shop Name</b></label><br>
                        <input type="text" name="shopnm" class='shopinfoinput'><br>
                        <label for="Phone" class='shopinfophn'><b>Phone</b></label><br>
                        <input type="text" name="Phone" class='inputphone'><br>
                </div>
                <div class="container3">
                        <img src="src/img/profile.jpg" alt="">
                </div>
                <div class="infoabtshop">
                        <label class="infoabtshoptxt"><b>About Shop</b></label><br>
                        <textarea name="desc" id="infoarea" ></textarea>
                </div>
        </div>
        <script>
                var slideIndex = 1;
                        showSlides(slideIndex);

                function plusSlides(n) {
                        showSlides(slideIndex += n);
                        }

                function currentSlide(n) {
                        showSlides(slideIndex = n);
                }

                function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("demo");
                        if (n > slides.length) {slideIndex = 1}
                        if (n < 1) {slideIndex = slides.length}
                        for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";
                        dots[slideIndex-1].className += " active";
                        }
        </script>
</body>
</html>