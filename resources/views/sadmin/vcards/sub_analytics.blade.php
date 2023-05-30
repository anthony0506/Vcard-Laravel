<ul class="nav nav-tabs overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{(isset($partName) && $partName == 'overview') ? 'active' : ''}}"
           href="{{route('sadmin.vcard.analytics',$vcard->id)}}" >{{__('messages.analytics.overview')}}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{(isset($partName) && $partName == 'country') ? 'active' : ''}}"
           href="{{route('sadmin.vcard.analytics',$vcard->id).'?part=country'}}"
           >{{__('messages.analytics.countries')}}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{(isset($partName) && $partName == 'device') ? 'active' : ''}}"
           href="{{route('sadmin.vcard.analytics',$vcard->id).'?part=device'}}"
           >{{__('messages.analytics.devices')}}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{(isset($partName) && $partName == 'os') ? 'active' : ''}}"
                   href="{{route('sadmin.vcard.analytics',$vcard->id).'?part=os'}}"
                   tabindex="-1">{{__('messages.analytics.os')}}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{(isset($partName) && $partName == 'browser') ? 'active' : ''}}"
           href="{{route('sadmin.vcard.analytics',$vcard->id).'?part=browser'}}"
           tabindex="-1">{{__('messages.analytics.browsers')}}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link  p-0 {{(isset($partName) && $partName == 'language') ? 'active' : ''}}"
           href="{{route('sadmin.vcard.analytics',$vcard->id).'?part=language'}}"
           tabindex="-1">{{__('messages.analytics.languages')}}
        </a>
    </li>
</ul>
