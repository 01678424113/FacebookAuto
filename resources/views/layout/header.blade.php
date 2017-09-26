<div class="row">
    <nav class="navbar navbar-default">
        <div class="container">

            <!-- <ul class="nav navbar-nav">
                 <li class="active"><a href="#">Home</a></li>
                 <li><a href="#">Page 1</a></li>
                 <li><a href="#">Page 2</a></li>
             </ul>-->
            <ul class="nav navbar-nav navbar-right" >
                @if((Session::has('user_name')))
                    <li>
                        <button type="button" class="btn btn-success" data-toggle="dropdown" style="margin-top: 5px">
                            {{Session::get('user_name')}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
