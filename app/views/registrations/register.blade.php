

<div class="row">

    <div class="col-sm-8">

    	@if (Session::has('info'))
        <div class="alert alert-info alert-dismissable">
            <p>{{ Session::get('info') }}</p>
        </div>
        @elseif (isset($info))
        <div class="alert alert-info alert-dismissable">
            <p>{{{ $info }}}</p>
        </div>
        @endif

        @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissable">
            <p>{{ Session::get('message') }}</p>
        </div>
        @elseif (isset($message))
        <div class="alert alert-danger alert-dismissable">
            <p>{{{ $message }}}</p>
        </div>
        @endif

        <p>Enter a ticket number or a customer name (the name on the booking) to search for a booking:</p>

        {{ Form::open(array('route' => 'register.search')) }}

        <div class="form-group">
            {{ Form::label('ticket', 'Ticket number', array ('class' => 'control-label')) }}
            <div class="row">
                <div class="col-xs-6">
                    <div class="input-group">
                        {{ Form::text('ticket', Input::get('ticket'), array ('class' => 'form-control')) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Customer name', array ('class' => 'control-label')) }}
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::text('name', Input::get('name'), array ('class' => 'form-control')) }}
                </div>
            </div>
            <p class="help-block">
                <em><strong>Hint:</strong> Try the customer's first or last name, but not both. <br/>
                If you're not sure of the correct spelling try putting in just part of the name. </em>
            </p>
        </div>

        {{ Form::submit('Search', array ('class' => 'btn btn-default')) }}

        {{ Form::close() }}

        @if (isset($bookings))

        <p style="margin-top: 20px;">The following bookings have matched the search criteria. Pick one to continue or search again.</p>

        	@foreach ($bookings as $booking)
          <div class="panel panel-info panel-search-result">
            <div class="panel-heading">
                <h3 class="panel-title text-uppercase">{{{ $booking->name() }}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-6">
                	<dl class="dl-horizontal">
                		<dt>Source</dt>
                		<dd>{{{ $booking->source }}}</dd>
                		<dt>Ticket numbers</dt>
                		<dd>{{{ $booking->numbers }}}</dd>
                    <dt>Day(s)</dt>
                    <dd>{{{ $booking->day_or_days() }}}</dd>
                		<dt>Booked</dt>
                		<dd>{{{ $booking->tickets }}}</dd>
                		<dt>Registered</dt>
                		<dd>{{{ $booking->registration_count() }}}</dd>
                	</dl>
                </div>
        				<div class="col-xs-6">
        					<div class="pull-right">
                    @if ($booking->registered())
                    <span class="text-muted">
                      This booking is already fully registered.
                    </span>
                    @else
                      @if ($booking->can_register_today())
          						{{ Form::open(array('route' => 'register.booking', 'class' => 'form-inline')) }}
          						{{ Form::hidden('booking_id', $booking->id) }}
          						<div class="form-group">
  		            		      {{ Form::label('tickets', 'Tickets', array ('class' => 'control-label')) }}
      	                		{{ Form::text('tickets', $booking->tickets - $booking->registration_count(), array ('class' => 'form-control tickets')) }}
  	                	</div>
          						{{ Form::submit('Register', array ('class' => 'btn btn-primary')) }}
          						{{ Form::close() }}
                      @else
                      <span class="text-muted">
                        This booking cannot be registered today.
                      </span>
                      @endif
                    @endif
        					</div>
        				</div>
              </div>
            </div>
          </div>
          @endforeach

        @endif

    </div>

    <div class="col-sm-4">

    	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Registration counters</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
				    <li class="list-group-item">Today <span class="badge alert-info">{{{ $registration_count_today }}}</span></li>
				    <li class="list-group-item">Total <span class="badge alert-info">{{{ $registration_count_total }}}</span></li>
				    <li class="list-group-item">Expected <span class="badge alert-info">{{{ $expected_count }}}</span></li>
				</ul>
			</div>
		</div>

        <div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">On the day booking &amp; registration</h3>
			</div>

			<div class="panel-body">

		        @if ($errors->any())
		        <div class="panel panel-danger">
		            <div class="panel-heading">Validation Errors</div>
		            <div class="panel-body">
		                <ul>
		                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
		                </ul>
		            </div>
		        </div>
		        @endif

		        <p class="text-danger">
		        	<span class="strong">Note:</span> Only use this if you cannot find a booking to register the delegate against.
		        </p>

		        {{ Form::open(array('route' => 'register.nobooking')) }}

		        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		            {{ Form::label('name', 'Delegate name', array ('class' => 'control-label')) }}
		            <div class="row">
		                <div class="col-xs-12">
		                    {{ Form::text('name', '', array ('class' => 'form-control')) }}
		                </div>
		            </div>
		        </div>

		        <div class="form-group {{ $errors->has('tickets') ? 'has-error' : '' }}">
		            {{ Form::label('tickets', 'Tickets', array ('class' => 'control-label')) }}
		            <div class="row">
		                <div class="col-xs-4">
		                    <div class="input-group">
		                        {{ Form::text('tickets', '', array ('class' => 'form-control')) }}
		                    </div>
		                </div>
		            </div>
		        </div>

		        {{ Form::submit('Register', array ('class' => 'btn btn-info')) }}

		        {{ Form::close() }}
	        </div>

	    </div>

    </div>

</div>
