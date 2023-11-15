<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <!-- custom css file link  -->
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>

    <!-- header section starts  -->

    <header>

        <div class="user">
            <img src="{{ asset('images/IMG_20230915_161624.jpg') }}" alt="">
            <h3 class="name">sanjaykumar</h3>
            <p class="post">fullstack developer</p>
        </div>

        <nav class="navbar">
            <ul>
                <li><a href="#home">home</a></li>

                <li><a href="./mainAssement/">Main Assessment</a></li>
                <li><a href="./sampleAssesment/">Sample Assessment</a></li>

                <li><a href="./assignment/">Assignment</a></li>


            </ul>
        </nav>

    </header>

    <!-- header section ends -->

    <!-- content section starts  -->

    <div class="container">

        <section class="home" id="home">

            <h3>hi there...</h3>
            <h3 class="name">my name is <span>sanjaykumar</span></h3>
            <h3 class="post">i am a <span class="typing-text">fullstack developer</span></h3>

            

            <div class="share">
                <a href="https://www.linkedin.com/in/sanjay-kumar-a7a162176" class="fab fa-linkedin" target="_blank"></a>
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="/tweety" class="fab fa-twitter"></a>
                <a href="/amazon/home" class="fab fa-amazon"></a>
                
            </div>

        </section>





    </div>

    <!-- content section ends -->

    <!-- theme toggler  -->

    <div class="theme-toggler">
        <span style="background: linear-gradient(to bottom left, #006699 , #66ff99 );"></span>
        <span style="background: linear-gradient(to bottom left,lightgreen, crimson);"></span>
        <span style="background:linear-gradient(to bottom left, #00ffff 0%, #ff5050 100%);"></span>
        <span style="background:linear-gradient(to bottom right,coral, blueviolet)"></span>
        <span style="background:linear-gradient(#999, #111)"></span>
    </div>




    <script>



        let themeColor = document.querySelectorAll('.theme-toggler span');
        themeColor.forEach(color => color.addEventListener('click', () =>{
            let background = color.style.background;
            document.querySelector('body').style.background = background;
        }));

    </script>

    </body>

</html>
