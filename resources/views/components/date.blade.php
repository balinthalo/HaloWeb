@if(\Carbon\Carbon::parse($data->created_at)->diffInDays(\Carbon\Carbon::now(), false) < 1)
Today at {{date('G:i', strtotime($data->created_at))}}
@elseif (\Carbon\Carbon::parse($data->created_at)->diffInDays(\Carbon\Carbon::now(), false) < 7)
{{date('l', strtotime($data->created_at))}}
@else
{{date('Y.m.d.', strtotime($data->created_at))}}
@endif
