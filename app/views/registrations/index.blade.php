
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Tickets</th>
			<th>Date &amp; time</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($registrations as $registration)
		<tr>
			<td>{{{ $registration->name() }}}</td>
			<td>{{{ $registration->tickets }}}</td>
			<td>{{{ $registration->created_at }}}</td>
		</tr>
	@endforeach
	</tbody>
</table>

<div class="pull-right">
    {{ $registrations->links() }}
</div>