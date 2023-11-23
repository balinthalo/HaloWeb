@if ($user->profile_picture === NULL)
    <img id="profile" src="/images/profile.jpg" alt="profile" class="{{$class}}">
@else
    <img id="profile" src="/images/{{$user->profile_picture}}" alt="profile2" class="{{$class}}">
@endif
