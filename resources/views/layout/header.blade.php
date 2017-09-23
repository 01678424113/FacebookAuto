<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">SHARE.VN</a>
        </div>
        <!-- <ul class="nav navbar-nav">
             <li class="active"><a href="#">Home</a></li>
             <li><a href="#">Page 1</a></li>
             <li><a href="#">Page 2</a></li>
         </ul>-->
        <ul class="nav navbar-nav navbar-right" style="margin-top: 6px;">
            @if(!(Session::has('user_name')))
                <li>
                    <a href="{{route('login')}}"><button class="btn btn-info" id="login">Login now</button></a>
                </li>
            @else
                <li class="btn-group">
                    <button type="button" class="btn btn-success">
                        {{Session::get('user_name')}}
                    </button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="height: 34px;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>
