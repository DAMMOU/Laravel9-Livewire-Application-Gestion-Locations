
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Youssad Loacation |Home</title>


<link rel="stylesheet" href="{{mix('css/app.css')}}">
@livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <x-topnav/>

        <x-sidebar-left/> 

        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield("contenu")
                </div>
            </div>
        </div>


        <x-sidebar-right/>


        <x-footer/>
    </div>


<script src={{mix('js/app.js')}} ></script>
@livewireScripts
</body>
</html>
