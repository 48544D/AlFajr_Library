@php
	// preserve backwards compatibility with Widgets in Backpack 4.0
	if (isset($widget['wrapperClass'])) {
		$widget['wrapper']['class'] = $widget['wrapperClass'];
	}
@endphp

@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start')
	<div class="jumbotron mb-2">

	  @if (isset($widget['heading']))
	  <p class="display-3" style="font-size: 2.8rem;">{!! $widget['heading'] !!}</p>
	  @endif
	  

	  @if (isset($widget['content']))
	  <p>{!! $widget['content'] !!}</p>
	  @endif

	  @if (isset($widget['button_link']))
	  <p class="lead">
	    <a class="btn btn-primary" href="{{ $widget['button_link'] }}" role="button">{{ $widget['button_text'] }}</a>
	  </p>
	  @endif
	</div>
@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end')