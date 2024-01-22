@foreach ($messages as $message)
    @component('messages.components.message', compact('message'))
    @endcomponent
@endforeach
