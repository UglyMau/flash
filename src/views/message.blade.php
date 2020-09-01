@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
		<div class="uk-alert-{{ $message['level'] }} uk-animation-slide-top" uk-alert>
			<a class="uk-alert-close" uk-close></a>
			<p @if($message['important']) style="font-weight: bold;" @endif>{!! $message['message'] !!}</p>
		</div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}