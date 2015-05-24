
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Last name</th>
			<th>First name</th>
			<th>Tickets booked</th>
			<th>Registrations</th>
			<th>Ticket numbers</th>
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
			<td>{{{ $booking->source }}}</td>
		</tr>
	@endforeach
	</tbody>
</table>

<div class="pull-right">
    {{ $bookings->links() }}
</div>