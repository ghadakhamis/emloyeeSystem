<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','employeeSystem')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet"  href="{{asset('css/app.css')}}" />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>     
    </head>
    <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">
                    {{ config('app.name', 'employeeSystem') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                </div>  
            </div>
        </nav>
        <div class="container"> 
            @yield('content')
        </div>  
    </body>  
    <script type="text/javascript">
        $(document).ready(function() {
            var tagApi =$(".tm-input").tagsManager();

            @if(isset($employee))
                @foreach($employee->skills as $skill)
                    var skill = "{{$skill->name}}";
                    tagApi.tagsManager("pushTag",skill);
                 @endforeach
            @endif 

            var path = "{{ route('autocomplete') }}";
            $("input.typeahead").typeahead({

                source:  function (query, process) {

                    return $.get(path, { query: query }, function (data) {
                        return process(data);
                    });
                },
                afterSelect :function (item){
                    tagApi.tagsManager("pushTag",item.name);
                }   
            });
            
        });    
    </script>
</html>      