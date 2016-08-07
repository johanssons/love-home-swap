<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		@if(count($dates) >= '0')

			<table>
				<tr>
					<th>Month Name</th>
					<th>1st expenses day</th>
					<th>2nd expenses day</th>
					<th>Salary day</th>
				</tr>

				@foreach($dates as $date)
					<tr>
						<td>{{ $date['month'] }}</td>
						<td>{{ $date['1st_expensses_date'] }}</td>
						<td>{{ $date['2nd_expensses_date'] }}</td>
						<td>{{ $date['salary_day'] }}</td>
					</tr>
				@endforeach
			</table>

		@else
			This file is empty!	
		@endif
	</body>
</html>


