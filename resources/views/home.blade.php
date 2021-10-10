<x-header title="Home"/>
@auth
    <x-app-layout></x-app-layout>
@else
    <x-guest-layout name="Home"></x-guest-layout>
@endauth
<x-footer/>
