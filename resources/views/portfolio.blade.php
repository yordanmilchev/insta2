<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('css/portfolio.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <title>Portfolio</title>
</head>
<body>
<div class="col-md-5">
    <div class="y">
        <img src="{{ asset('backgrounds/file3.png')}}" alt="img">
        <button type="button" class="btn btn-primary" id="btn3" onclick="window.location='{{ Route("auth.login")}}'">Go back</button>
        <hr>
    </div>

<div class="content">
    <div class="title">
        I<span style="color: #3e8f3e">'</span>M<br>
        YORDAN<br>
        MILCHEV<span style="color: #3e8f3e">.</span>
    </div>
    <div class="title2" data-aos="fade-right">
        SOFTWARE AND INTERNET<br>
        TECHNOLOGIES STUDENT
    </div>
    <div class="title3" data-aos="fade-left">
        <img src="{{ asset('backgrounds/file3.png')}}" alt="Y">
        <p>I am competent in computer software and programming. I am able to
        familiarise myself with new software and the functionalities of programmes with
        the skills I have acquired with all various types of computer programming and
            technology I've learned throughout the years.</p>
    </div>
    <div class="title4" data-aos="fade-right">
        <h1>Knowledge level in software</h1>

            <h3 id="h3">C++</h3><span class="bar"><span class="c"></span> </span>

            <h3 id="h3">LARAVEL</h3><span class="bar"><span class="laravel"></span> </span>

            <h3 id="h3">MYSQL</h3><span class="bar"><span class="mysql"></span> </span>

            <h3 id="h3">JAVASCRIPT</h3><span class="bar"><span class="javascript"></span> </span>

            <h3 id="h3">HTML&CSS</h3><span class="bar"><span class="html"></span> </span>

            <h3 id="h3">AJAX&jQuery</h3><span class="bar"><span class="ajax"></span> </span>

        <h2 style="margin-bottom: 30px; margin-top: 30px">Knowledge level in hardware</h2>
            <span class="bar"><span class="hardware"></span> </span>
    </div>
    <div class="title5" data-aos="fade-left">
        <h1 style="text-align: center">Experience</h1><br>
        <p id="h43">2021<br>
            Building two projects<br>
            using laravel as <br>
            main programing<br>
            language/framework</p>
        <p id="h44">2020-2021<br>
            Delivering smiles<br>
            for Amazon and some<br>
            others in England<br>
        </p>
        <p id="h45">2017-2019<br>
            Currency exchanges<br>
            for the summer<br>
            in Sunny beach<br>
        </p>
    </div>
    <div class="title6" data-aos="fade-right">
        <img src="{{ asset('backgrounds/file3.png')}}" alt="img">
        <p>Working for a currency exchange company has given me excellent
            mathematical and analytical skills. My communication and
            language skills have vastly improved. I am able to speak fluent
            English. Compassionate and love helping people . Being in a
            foreign country has given me the ability to constantly use critical
            thinking and problem solving skills . This has improved my confidence,
            listening, speaking and multitasking skills.</p>
    </div>
</div>
</div>
<script>
    AOS.init({
        offset: 200,
        duration: 1000
    });
</script>
</body>
</html>
