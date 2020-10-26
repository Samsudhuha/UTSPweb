@extends('layouts.app')

@section('style')
<style>
    /*************   STYLE ADDITIONS   **********************
*********************************************************/

    html,
    body {
        display: block;
        min-height: 100%;
    }

    body {
        /*padding: 50px;*/
        -webkit-font-smoothing: antialiased;
        line-height: 50px;
        font-weight: 600;
        background: rgb(250, 250, 250);
        margin: 0;
    }

    ul {
        padding: 0;
    }

    .main-body-wrapper {
        font-family: 'Raleway', arial;
        font-size: 16px;
        font-weight: 400;
        overflow: hidden;
        width: 80vw;
        display: block;
        margin: auto;
        background: rgb(255, 87, 34);
    }

    .maxWidth {
        max-width: 1400px;
        /*  Adjust width of the example  - in this box as its a demo */
    }

    /*  ============  NAV BAR  =============  */
    .navbar-main {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        position: fixed;
        background: #fafafa;
        width: 80vw;
        max-width: 1400px;
        z-index: 10;
        top: 0;
    }

    .navbar-main ul {
        display: flex;
        margin: 0;
        height: 50px;
        align-items: center;
        list-style: none;
    }

    .navbar-main li a {
        text-transform: uppercase;
        text-decoration: none;
        padding-left: 20px;
        padding-right: 20px;
        margin-left: 20px;
        padding-left: 20px;
        font-weight: 700;
        font-size: 0.8em;
        letter-spacing: 0.3em;
        color: rgb(191, 54, 12);
        background: #fafafa;
    }

    body.open {
        overflow: hidden;
    }

    body.open:before {
        visibility: visible;
        opacity: 1;
    }

    body:before {
        content: "";
        position: fixed;
        background-color: rgb(255, 87, 34);
        width: 100%;
        overflow: hidden;
        top: 0;
        left: 0;
        bottom: 60vh;
        visibility: hidden;
        opacity: 0;
        transition: all 0.4s ease;
        z-index: 11;
    }

    .burger {
        position: fixed;
        top: 20px;
    }

    .burger__button {
        display: flex;
        position: relative;
        background: rgb(0, 121, 107);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        text-align: center;
        vertical-align: middle;
        transition: all 0.2s ease;
        box-shadow: -20px 27px 55px 0px rgba(0, 0, 0, 0.5);
    }

    .burger__button.open {
        border: 2px solid #ffffff;
        box-shadow: none;
    }

    .burger__button__icon {
        display: inline-block;
        position: absolute;
        background: #fff;
        margin: 0 auto;
        width: 20px;
        height: 2px;
        top: 50%;
        left: 0;
        right: 0;

    }

    .burger__button__icon:before,
    .burger__button__icon:after {
        content: "";
        position: absolute;
        margin: 0 auto;
        background: #fff;
        width: 20px;
        height: 2px;
        left: 0;
        right: 0;

    }

    .burger__button__icon:before {
        bottom: 10px;
    }

    .burger__button__icon:after {
        top: 10px;
    }

    .burger__button.open .burger__button__icon {
        background: transparent;
    }

    .burger__button.open .burger__button__icon:before,
    .burger__button.open .burger__button__icon:after {
        transform-origin: 0 50%;
        width: 28.28427125px;
    }

    .burger__button.open .burger__button__icon:before {
        transform: rotateZ(0.78539816rad);
    }

    .burger__button.open .burger__button__icon:after {
        transform: rotateZ(-0.78539816rad);
    }

    .burger__menu {
        list-style-type: none;
        width: 100%;
    }

    .burger__menu li {
        display: flex;
        flex-direction: column;
        position: relative;
        visibility: hidden;
        opacity: 0;

    }

    .burger__menu a {
        display: flex;
        justify-content: center;
        text-decoration: none;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: #fff;
        font-size: 4vmax;
        line-height: 8vmax;
        font-weight: 600;
        border-left: 3px solid transparent;
        padding-left: 0;
    }

    .burger__menu li a {
        background: rgb(255, 87, 34);
    }

    .burger__button.open+.burger__menu li {
        visibility: visible;
        opacity: 1;
    }


    #burgerOn {
        display: none;
    }


    nav#burgerOn.burger {
        z-index: 12;
        width: 100vw;
    }

    a#burger-button.burger__button {
        left: 81vw;

    }

    /*  ============  SHADE 1  =============  */

    .shade1 {
        /*  display: none;   */
        position: absolute;
        z-index: 2;
        opacity: 0.1;
        top: 50px;
    }

    /*  ============  LAPTOP &  TITLE COLUMN  & CODE LINK =============  */
    .lappyTitleWrapper {
        display: flex;
        flex-direction: row;
        flex-grow: 2;
        width: 100%;
    }

    .lapy {
        position: absolute;
        z-index: 3;
        opacity: 1;
    }

    #lapytwister {

        transform: rotate(50deg);
        position: relative;
        top: 150px;
        right: 5%;
        z-index: 1;
    }

    .lapy img {
        height: 450px;
        width: 450px;
    }

    /*  ============  TITLE COLUMN  =============  */

    h2 {
        line-height: 1.3em;
        font-size: 1.0em;
        font-weight: 400;
        letter-spacing: 1px;
        color: white;
        padding: 0;
        margin: 0px;
    }

    .titleCol {
        display: flex;
        position: relative;
        height: 450px;
        /*  Adjust height of the example */
        color: white;
        right: -5%;
    }

    .col {
        display: flex;
        position: absolute;
        flex-direction: column;
        line-height: 1.3em;
        font-size: 1.2em;
        font-weight: 400;
        padding-top: 130px;
        text-align: left;
    }

    .col h1 {
        z-index: 1;
        text-align: center;
        background: rgb(255, 87, 34);
        line-height: 0.2em;
        align-content: center;
        text-transform: uppercase;
        font-size: 1.8em;
        letter-spacing: 0.5em;
        font-weight: 300;
        padding: 0;
    }

    .codeLink {
        position: absolute;
        top: 400px;
        left: 65%;
        z-index: 3;
        width: 100px;
        height: 100px;
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3Asvg%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20version%3D%221.1%22%20viewBox%3D%220%200%20300%20300%22%20height%3D%22300%22%20width%3D%22300%22%3E%3Cstyle%3E.s0%7Bfill%3A%23fff%3B%7D%3C/style%3E%3Cdefs%3E%3CclipPath%20clipPathUnits%3D%22userSpaceOnUse%22%3E%3Crect%20height%3D%2247250%22%20width%3D%2228000%22%20y%3D%220%22%20x%3D%220%22/%3E%3C/clipPath%3E%3C/defs%3E%3Cg%20transform%3D%22translate%280%2C-752.36216%29%22%3E%3Cg%20class%3D%22SlideGroup%22%20transform%3D%22matrix%280.01071234%2C0%2C0%2C0.01071234%2C0.02355958%2C665.11255%29%22%3E%3Cg%20clip-path%3D%22url%28%23presentation_clip_path%29%22%20class%3D%22Slide%22%3E%3Cg%20class%3D%22Page%22%3E%3Cg%20class%3D%22com.sun.star.drawing.CustomShape%22%3E%3Cpath%20d%3D%22M14000%2036150%200%2036150%200%208150l28000%200%200%2028000-14000%200z%22%20fill%3D%22%2300796b%22/%3E%3C/g%3E%3Cg%20class%3D%22Group%22%3E%3Cg%20class%3D%22com.sun.star.drawing.PolyPolygonShape%22%3E%3Cpath%20d%3D%22m7171%2021686%20378-19%20356-86%20338-168%20211-189%20146-211%20105-210%20106-316%2042-335%200-2944%2021-590%2042-441%20105-294%20125-315%20232-294%20126-169%20232-127%20252-125%20147-63%20253-64%20315-20%201304%200%2020%201008-524%2022-484%2042-380%20169-210%20230-125%20336-84%20673%200%201451%200%201030-43%20673-62%20610-210%20379-169%20233-147%20147-252%20209-232%20126-421%20127%20274%2084%20335%20168%20211%20125%20210%20274%20274%20379%20169%20441%2042%20632%2042%203049%2019%20358%2064%20315%20105%20210%20252%20230%20169%20106%20252%20105%20337%2044%20588%200%200%201051-504%200-800-21-441-63-399-147-401-274-167-210-146-253-128-210-127-421-41-357-20-1050%200-2252-64-610-105-335-169-274-252-233-358-166-379-106-252-43-105%200%202-1031z%22%20fill%3D%22%23fff%22/%3E%3C/g%3E%3Cg%20class%3D%22com.sun.star.drawing.PolyPolygonShape%22%3E%3Cpath%20d%3D%22m20761%2021688-377-20-357-85-338-169-211-188-146-211-105-211-106-315-41-336%200-2943-22-591-42-440-105-294-125-316-232-293-126-169-232-127-252-126-147-63-253-64-315-19-1304%200-20%201008%20524%2022%20484%2042%20380%20169%20211%20230%20124%20335%2084%20673%200%201452%200%201030%2043%20673%2062%20610%20210%20379%20169%20233%20147%20146%20252%20210%20232%20126%20421%20127-274%2083-335%20169-211%20125-210%20274-274%20379-169%20441-41%20631-42%203050-20%20357-64%20316-104%20210-253%20230-169%20106-252%20105-337%2043-588%200%200%201051%20504%200%20800-20%20441-63%20399-147%20401-275%20167-210%20146-252%20128-211%20127-420%2041-358%2021-1050%200-2251%2063-610%20105-335%20169-275%20252-232%20358-166%20379-106%20252-43%20105%200-2-1031z%22%20fill%3D%22%23fff%22/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E);
        position: absolute;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        transition: all 0.3s ease-in-out;
        box-shadow: -20px 27px 55px 0px rgba(0, 0, 0, 0.75);
    }

    .codeLink:hover {
        transform: scale(1.2);
        background-position: center;
        box-shadow: -64px 67px 85px 0px rgba(0, 0, 0, 0.75);
    }

    /*  ============  ABOUT  =============  */

    .aboutWrapper {
        display: flex;
        flex-direction: column;
        height: auto;
        /*  Adjust height of the example */
        background-color: rgb(255, 255, 255);
        width: 80%;
        padding-left: 10%;
        padding-right: 10%;
        padding-bottom: 50px;
        padding-top: 50px;
        z-index: 4;
    }

    .aboutCol {
        align-content: center;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: auto;
        /*  Adjust height of the example */
        /*background: #138655; */
        color: #111;
        max-width: 100%;
        margin-top: 5vh;
        margin-bottom: 3vh;
        overflow: hidden;

    }

    .ab-col {
        display: flex;
        flex-direction: column;
        flex-basis: auto;
        line-height: 1.3em;
        font-size: 1.2em;
        font-weight: 400;
        text-align: justify;
        /* background: #555;*/
        max-width: 70%;
        /* width od 'Abot' inside its box, so 100% means whole of its box*/
    }

    .ab-col span {

        z-index: 3;
        padding-bottom: 50px;
    }

    .ab-col .about-title {

        line-height: 1em;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8em;
        letter-spacing: 0.3em;
    }

    span.about-title {
        padding: 0px;
        padding-top: 20px;

    }

    /*  ============  SOCIAL BUTTONS  =============  */

    .socialBox {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
        z-index: 7;
    }

    #twitter_logo {
        background-image: url('img/book-icon-png-6.png');
        background-position: center;
        background-size: cover;
    }

    #fcc_logo {
        background-image: url('img/borrow-icon-10.png');
        background-position: center;
        background-size: cover;
    }

    .logo {
        background-repeat: no-repeat;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        margin-left: 40px;
        margin-right: 40px;
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease-in-out;
        box-shadow: -20px 27px 55px 0px rgba(0, 0, 0, 0.75);
        margin-bottom: 50px;
    }

    .logo:hover {
        transform: scale(1.2);
        box-shadow: -64px 67px 85px 0px rgba(0, 0, 0, 0.75);
        background-position: center;
    }

    .logo a {
        text-decoration: none;
        text-transform: uppercase;
        color: #111;
        justify-content: center;
    }

    .logo>a>p {
        margin-top: 200px;
        text-align: center;
        margin-left: -50px;
        margin-right: -50px;
        /* position: absolute; */
        color: white;
    }

    /* code Wrapper  */

    .shade2 {
        position: absolute;
        opacity: 0.1;
    }

    .codeWrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: auto;
        /*  Adjust height of the example */
        background: rgb(255, 87, 34);
        color: white;
        max-width: 100%;
        padding: 100px;
        z-index: 0;
    }

    .tagBox {
        color: white;
        text-align: center;
        line-height: 50px;
        font-weight: 600;
        padding: 0;
        z-index: 1;
    }

    .codeTagBox {
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        justify-content: center;
        z-index: 1;
    }

    .tagBox:nth-child(1) {
        flex-basis: auto;
        font-size: 3em;
        /* This setting for media query for less than 650px*/
        font-weight: 500;
        letter-spacing: 0.5em;
        letter-spacing: 0.2em;
        /* This setting for media query for less than 650px*/
        text-align: left;
        width: 100%;
        /* Adjust to fit ' <CODE> ' in full width  */
        z-index: 1;
    }

    .bracket {
        color: rgb(255, 179, 0);
        z-index: 1;
    }

    .tagBox:nth-child(2) {
        flex-basis: 100px;
        /* controls the height of the box */
        flex-basis: auto;
        /* auto makes the box fit all the text exactly*/
        line-height: 1.3em;
        font-weight: 500;
        font-size: 1.3em;
        width: auto;
        text-align: left;
        z-index: 1;
    }

    /*  ======================  CTA  ==================  */
    /*  ==================================================  */

    .cta {
        flex-direction: column;
        color: white;
        font-size: 20px;
        margin-left: 25%;
        margin-right: 25%;
        text-align: center;
        line-height: 1em;
        margin-bottom: 50px;
    }

    .cta h3 {
        display: flex;
        justify-content: center;
        line-height: 1.em;
        font-size: 1em;
        font-weight: 600;
        flex-wrap: wrap;
    }

    .cta p {
        font-size: 1.2em;
        font-weight: 300;
    }

    /*  ======================  FOOTER  ==================  */

    .footer {
        background: rgb(191, 54, 12);
        color: white;
        z-index: 9;
    }

    .footerBottom {
        display: flex;
        flex-direction: column;
    }

    .item {
        text-align: center;
        line-height: 50px;
        font-weight: 600;
        font-size: 0.9em;
        height: 4em;
        width: auto;
        padding-top: 10px;
        margin-right: 1em;
    }

    .footerLink .chevron {
        opacity: 0.2;
        display: flex;
        flex-direction: row;
        justify-content: center;
        font-size: 4em;
        text-decoration: none;
        color: white;
        margin: auto;
        transition: all 0.3s;
    }

    .footerLink .chevron:hover {
        transform: scale(1.3);
        opacity: 1;
        display: flex;
        flex-direction: row;
        justify-content: center;
        font-size: 4em;
        text-decoration: none;
        margin: auto;
        color: white;
    }

    /*  =====================  MEDIA QUERIES  =====================  */
    /*  ===========================================================  */


    @media screen and (max-width: 1200px) {
        #lapytwister {
            transform: rotate(45deg);
            height: 200px;
            width: 200px;
            z-index: 1;
        }

        .col {
            left: 5vw;
            z-index: 1;
        }

    }

    @media screen and (max-width: 1000px) {
        #burgerOn {
            display: block;
        }

        #navbarOn {
            display: none;
        }

        .main-body-wrapper {
            width: 100vw;
        }

        .navbar-main {
            width: 100vw;
        }

        #lapytwister {
            transform: rotate(45deg);
            height: 100px;
            width: 100px;
            z-index: 1;
        }

        .col {
            left: 15vw;
            z-index: 1;
        }

        span.about-title {
            padding: 0px;
            padding-top: 50px;
        }
    }

    @media screen and (max-width: 700px) {

        #burgerOn {
            display: block;
        }

        #navbarOn {
            display: none;
        }

        .main-body-wrapper {
            width: 100vw;
        }

        span.about-title {
            padding: 0px;
            padding-top: 80px;
        }

        .codeLink {
            width: 70px;
            height: 70px;
        }

        .col {
            left: 90px;
            z-index: 1;
        }

    }

    @media screen and (max-width: 560px) {
        #burgerOn {
            display: block;
        }

        #navbarOn {
            display: none;
        }

        .main-body-wrapper {
            width: 100vw;
        }


        body {
            margin: 0;
            padding: 0;
        }

        #callToAction.cta {
            font-size: 14px;
            font-weight: 600;
        }

        .cta p {
            font-weight: 600;
        }

        .col {
            left: 30px;
            padding-top: 100px;
        }

        .col h1 {
            text-align: left;
        }

        .codeLink {
            width: 70px;
            height: 70px;
        }

    }

    @media screen and (max-width: 480px) {
        #burgerOn {
            display: block;
        }

        #navbarOn {
            display: none;
        }

        .main-body-wrapper {
            width: 100vw;
        }

        .navbar-main {
            transform: translateY(100);
            width: 100vw;
            justify-content: center;
            z-index: 10;
        }

        .navbar-main ul {
            flex-direction: column;
            padding: 0;
            justify-content: space-between;
            height: 200px;
        }

        .navbar-main ul li {
            margin-left: 0em;
            margin-bottom: 10px;
        }

        body {
            margin: 0;
            padding: 0;
        }

        #callToAction.cta {
            font-size: 14px;
            font-weight: 600;
        }

        .cta p {
            font-weight: 600;
        }

        .ab-col span {
            text-align: left;
            font-size: 16px;
        }


        .titleCol {
            right: 0;
            left: 3%;
        }

        .col h1 {
            font-size: 1.3em;
        }


        .codeTagBox {
            margin: 0;
        }

        .tagBox.tagText {
            font-size: 1em;
            font-weight: 600;
        }

        .tagBox.tagTitle {
            width: 220px;
            font-size: 2em;
            top: 50px;
        }

        .codeLink {
            width: 70px;
            height: 70px;
        }

        .codeWrapper {
            padding: 25px;

        }

        .appSize {
            min-width: 110px;
            min-height: 110px;
            margin: 15px;
        }
    }

    @media screen and (max-width: 400px) {
        .titleCol {
            position: relative;
            left: -60px;
        }

        .col {
            padding-top: 70px;
        }

        .col h1 {
            font-size: 1.3em;
        }

        .col h2 {
            font-size: 0.8em;
            font-weight: 600;
        }
    }
</style>
@endsection
@section('content')

<body>
    <div class="main-body-wrapper maxWidth" id="top">
        <div class="lappyTitleWrapper" id="lapTitWrap">
            <canvas id="canvasShade1" class="shade1"></canvas>
            <div class="lapy" id="lapytwister">
                <img src="https://rawgit.com/appijumbo/landingPage/gh-pages/img/laptop.svg" alt="laptop">
            </div>
            <header class="titleCol">
                <div class="col">
                    <h1 class="title">SamsuDhuha</h1>
                    <h1 class="title">RafifRidho</h1>
                    <br>
                    <h2>Hello fellow surfers and welcome to this little corner of the Library Awesome web</h2>
                </div>
            </header>
            <a class="codeLink" href="#codeHere"></a>
        </div>
        <article class="aboutWrapper" id="aboutHere">
            <section class="aboutCol">
                <div class="ab-col"><span class="about-title">About</span><br><span>{"jelasin web ini"}.<br>Thanks for stopping by!</span></div>
            </section>
        </article> <!-- End aboutWrapper  -->

        <canvas id="canvasShade2" class="shade2"></canvas>

        <div id="codeHere" class="codeWrapper">
            <section class="codeTagBox ">
                <div class="tagBox tagTitle">
                    <span class="bracket">&lt;</span>
                    <span>BOOK</span>
                    <span class="bracket">&gt;</span>
                </div>
                <div class="tagBox tagText">
                    “A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one.”
                    <br>The Odin Project― George R.R. Martin, A Dance with Dragons
                </div>
            </section> <!-- End of codeTagBox -->
            <section class="socialBox">
                <div id="twitter_logo" class="logo" style="margin-right: 450px;"><a href="search-book">
                        <p>Search A Books</p>
                    </a>
                </div>
                <div id="fcc_logo" class="logo"><a href=" https://codepen.io/tom_o/">
                        <p>Borrow the Books</p>
                    </a> </div>
            </section> <!-- End of socialBox -->
        </div> <!-- End of Code wrapper  -->

        <footer class="footer">
            <div class="footerLink">
                <a href="#top" class="chevron">&#x2227;</a>
            </div>
            <div class="footerBottom">
                <h4 class="item">&copy; M. Samsu Dhuha & Rafif Ridho 2020</h4>
            </div>
        </footer>
    </div> <!-- End of Main Body Wrapper -->

    <script>
        window.jQuery || document.write('<script src="./js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="./js/main.js"></script>
    <script>
        var burger = document.getElementById("burger-button");

        function close_menu() {
            document.body.classList.toggle("open");
            burger.classList.toggle("open");
        }
        /*
        classList property returns the class name(s) of an element. It's read-only, but to modify use add() remove() and toggle() methods.
        */



        burger.addEventListener("click", function(e) {
            /*  event handler 'click' is attached to the "burger-button" element  */
            e.preventDefault(); /*  the default action of the event will not be triggered when buger clicked */
            close_menu(); /*  then toggle the 'open' class, which closes the menu */
        });

        /*  Use the element.removeEventListener() method remove the 'click' event handlers from "burger-menu" in a more sophisticated design - Good practice  */

        $('a[href^="#"]').on('click', function(event) {

            var target = $($(this).attr('href')); /* assign to 'target' the attributes of the anchor clicked */

            if (target.length) {
                /*  if target length isnt zero */
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                /* animate the body using scrollTop, to the href attribute of the anchor clicked, for 1 second duration */
            }

        });

        /****************** DRAW SHADE TRIANGLE FUNCTION *********************/

        function draw_triangle(ctx_width, ctx_height, top_h, element, x_origin, y_origin, x_shift, y_shift) {

            var c = document.getElementById(element);
            var context = c.getContext("2d");

            $("#" + element).attr({
                width: ctx_width,
                height: ctx_height
            });
            $("#" + element).css({
                width: "ctx_width" + "px",
                height: "ctx_height" + "px",
                top: "top_h" + "px"
            });

            context.beginPath(); // Draw a path

            context.moveTo(x_origin, y_origin); // Top Corner origin
            context.lineTo(x_shift, y_shift); // Bottom Right
            context.lineTo(x_origin, y_shift); // Bottom Left

            context.closePath();
            context.fillStyle = "#000"; // Fill the path
            context.fill();
        }

        /****************** SHADE AND LAPTOP ANGLE *********************/

        function shade1(h1, w1) {
            var top_height = 0;
            draw_triangle(w1, h1, top_height, "canvasShade1", 0, 0, w1, h1);
        }


        function shade2(h1, w1) {
            var half_width = w1 / 2;
            var s_height = $("#codeHere").height() + 270 + $(".cta").height();
            draw_triangle(w1, s_height, h1, "canvasShade2", w1, 0, half_width, s_height);
        }

        var h1 = $("#lapTitWrap").height() + $("#aboutHere").height() + 50;
        var w1 = $("#top").width();

        window.onload = shade1(h1, w1); /*  Draw shades when page loads  */
        window.onload = shade2(h1, w1);

        $(window).resize(function() {
            /* keep redrawing shade when page re-sized */
            var h1 = $("#lapTitWrap").height() + $("#aboutHere").height() + 50;
            var w1 = $("#top").width();
            shade1(h1, w1);
            shade2(h1, w1);
        });
    </script>
</body>
@endsection