<ul class="profile-menu-tabs">
        <li class="@if($t=='agent') active @endif"> <a href="{{route('agent.profile')}}"> My profile </a></li>
    @if((Auth::guard('agent')->user()->user_type)==1)
        <li class="@if($t=='published') active @endif"> <a href="{{route('agent.properties',['agentId' => $agent->id])}}"> My Properties </a></li>
    @endif
        <li> <a href="{{route('agent.select.package')}}"> Add a new property </a></li>
        <li class="@if($t=='favourites') active @endif"> <a href="{{route('agent.favourites',['agentId' => $agent->id])}}"> Favourite properties </a></li>
    @if((Auth::guard('agent')->user()->user_type)==1)
        <!--<li> <a href="my-invoices.html"> Invoices </a></li>-->
    @endif
</ul>