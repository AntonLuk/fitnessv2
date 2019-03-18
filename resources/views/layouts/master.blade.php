<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">--}}
    {{--<meta name="generator" content="Jekyll v3.8.5">--}}
    <title>Фитнес клуб</title>
{{--<script>--}}
    {{--import YmapPlugin from 'node_modules/vue-yandex-maps'--}}
    {{--const options = { // you may define your apiKey, lang and version or skip this.--}}
        {{--apiKey: 'ACgndlwBAAAAAaaMAQIAchQc-dzZEDalNfztwka3Xd2Bh5cAAAAAAAAAAAB_8Snm3f6hAlwf-9cyXovzoLCVuw==', // '' by default--}}
        {{--lang: 'ru_RU', // 'ru_RU' by default--}}
        {{--version: '2.1' // '2.1' by default--}}
    {{--}--}}
    {{--Vue.use(YmapPlugin, options)--}}
{{--</script>--}}
    <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{ URL::asset('css/somestylesheet.css') }}" />--}}
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    {{--<link href="../../css/dashboard.css" rel="stylesheet">--}}
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">KA4ok</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Поиск">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Выйти') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <br>
    <br>
    <div class="row">
        @include('layouts.menu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            {{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">--}}
                {{--<h1 class="h2">Dashboard</h1>--}}
                {{--<div class="btn-toolbar mb-2 mb-md-0">--}}
                    {{--<div class="btn-group mr-2">--}}
                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
                    {{--</div>--}}
                    {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>--}}
                        {{--This week--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1075" height="453" style="display: block; width: 1075px; height: 453px;"></canvas>--}}

            @yield('content')
        </main>
    </div>
</div>
{{--<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFvGr9GxhDT3n8vqqZ46twP5lgex+raTCfICQy73NLhN7ZqSfCtfSn4mLA2EFA" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{--<script src="../../js/dashboard.js"></script>--}}

</body></html>
