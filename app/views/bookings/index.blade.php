
<div class="pull-right">
    <a class="btn" data-toggle="collapse" data-target="#filter">
        @if ($filtered)
        <span class="glyphicon glyphicon-warning-sign"></span>
        @endif
        Filter bookings
        <span class="caret"></span>
    </a>
</div>

<div class="clearfix"></div>

<div id="filter" class="filter collapse">

    <div class="col-sm-3"></div>

    {{ Form::open(array('route' => array('bookings.filter'))) }}

    <div class="col-sm-9 panel panel-default">

        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::label('filter_name', 'Customer name', array ('class' => 'control-label')) }}
                <div>
                	{{ Form::text('filter_name', $filter_name, array ('class' => 'form-control')) }}
                </div>
      		      <p class="help-block">You can enter a full or partial first or last name, but not both</p>
            </div>
        </div>

        <div class="col-sm-4">
             <div class="form-group">
                 {{ Form::label('filter_day', 'Day(s)', array('class' => 'control-label')) }}
                 <div>
                   	{{ Form::select('filter_day', $days, $filter_day, array ('class' => 'form-control')) }}
                 </div>
             </div>
         </div>

        <div class="col-sm-4">
             <div class="form-group">
                 {{ Form::label('filter_source', 'Source', array('class' => 'control-label')) }}
                 <div>
                 	<label class="checkbox-inline">{{ Form::checkbox('filter_church', true, $filter_church) }} Church</label><br/>
                 	<label class="checkbox-inline">{{ Form::checkbox('filter_eventbrite', true, $filter_eventbrite) }} EventBrite</label><br/>
                 </div>
             </div>
         </div>

        <div class="col-sm-4 col-sm-offset-8">
            {{ Form::submit('Apply filters', array('class' => 'btn btn-info')) }}

            {{ link_to_route(
                'bookings.resetfilter',
                'Reset filters',
                $parameters = array( ),
                $attributes = array( 'class' => 'btn btn-default' ) ) }}

        </div>

    </div>

    {{ Form::close() }}

</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Last name</th>
			<th>First name</th>
			<th>Tickets booked</th>
			<th>Registrations</th>
			<th>Ticket numbers</th>
      <th>Day(s)</th>
			<th>Source</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($bookings as $booking)
		<tr>
			<td>{{{ $booking->last }}}</td>
			<td>{{{ $booking->first }}}</td>
			<td>{{{ $booking->tickets }}}</td>
			<td>{{{ $booking->registration_count() }}}</td>
			<td>{{{ $booking->numbers }}}</td>
      <td>{{{ $booking->day_or_days() }}}</td>
			<td>{{{ $booking->source }}}</td>
		</tr>
	@endforeach
	</tbody>
</table>

<div class="pull-right">
    {{ $bookings->links() }}
</div>
