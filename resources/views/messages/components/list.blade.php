{{-- <ul> --}}
{{-- <li>{{ $day }}</li> --}}
@if (count($messages) > 0)
    {{-- <ul> --}}
        @foreach ($messages as $message)
            @component('messages.components.message', compact('message'))
            @endcomponent
        @endforeach
    {{-- </ul> --}}
@endif
{{-- </ul> --}}
