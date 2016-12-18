<li class="dropdown">
    <a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
        <i class="fa fa-globe fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li>
            <a href="{{ URL::to('language/turkish') }}">{{ trans('app.turkish') }}</a>
            <a href="{{ URL::to('language/english') }}">{{ trans('app.english') }}</a>
        </li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
        <i class="fa fa-exchange fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            @foreach($themes as $k => $v)
                <a href="{{ URL::to('theme/' . $v) }}">{{ trans("themes.{$v}") }}</a>
            @endforeach
        </li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li>
            <a data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">
                <i class="fa fa-sign-in fa-fw"></i> {{ trans('app.sign_in') }}
            </a>
        </li>
        <li>
            <a data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">
                <i class="fa fa-user fa-fw"></i> {{ trans('app.register') }}
            </a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<li>
    <a class="upload" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">
        <span><i class="fa fa-cloud-upload"></i> {{ trans('app.upload') }}</span>
    </a>
</li>
@if(PluginManager::activated('MemeGenerator'))
    {{ PluginManager::get('MemeGenerator')->getNavigationButton() }}
@endif


