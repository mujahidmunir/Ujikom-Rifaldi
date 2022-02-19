<div class="row align-items-center">
    <div class="col-md-12">
        <div class="heading_tab_header animation" data-animation="fadeInUp" data-animation-delay="0.02s">
            <div class="heading_s1">
                <h2>from Our Menu</h2>
            </div>
            <div class="tab-style1">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <ul id="tabmenubar" class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" onclick="filter('')"  data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="Breakfast" aria-selected="true">All</a>
                    </li>
                    @foreach($categories as $data)
                    <li class="nav-item">
                        <a class="nav-link active" onclick="filter({{$data->id}})" data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="Breakfast" aria-selected="true">{{$data->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>



