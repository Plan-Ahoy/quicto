@extends( 'layout' )


@section( 'content' )
    
   	<form action="/" method="post" class="picto-form">
   		{{ csrf_field() }}

   		<input 
   			type="text" 
   			name="search"
   			class="picto-search"
   			placeholder="Search for a picto"
   			required
   		>

   		<span class="search-btn"></span>

   	</form>

   	
   	@if( !empty( $pictos ) )

   		<div class="picto-wrapper">

   		@foreach( $pictos as $picto )

   			<div class="picto">
   				<div class="picto-img">
   					<img src="{{ $picto->full }}"/>
   					<h4>{{ $picto->title }}</h4>
   				</div>
   				<div class="picto-tags">

   				</div>
   			</div>

   		@endforeach

   		</div>

   	@endif

@stop