<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flights') }}
        </h2>
        <a href="{{route('flight.create')}}"><x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                	@if (Session::has('success'))
                	<div class="alert alert-success text-capitalize d-flex justify-content-between" role="alert">
                		{{ Session::get('success') }}
                		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                	</div>
                	@elseif (Session::has('error'))
                	<div class="alert alert-danger text-capitalize d-flex justify-content-between" role="alert">
                		{{ Session::get('error') }}
                		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                	</div>
                	@endif
                	<table class="table-auto border-collapse border border-slate-400">
                		<thead>
                			<tr>
                				<th class="border border-slate-300">No</th>
                				<th class="border border-slate-300">Name</th>
                				<th class="border border-slate-300">Airline</th>
                				<th class="border border-slate-300">#</th>
                			</tr>
                		</thead>
                		<tbody>
                			@foreach ($flights as $key => $flight)
                			<tr>
                				<td class="border border-slate-300">{{ $key+1 }}</td>
                				<td class="border border-slate-300">{{ $flight->name }}</td>
                				<td class="border border-slate-300">{{ $flight->airline }}</td>
                				<td class="border border-slate-300">
                					<a href="{{ route('flight.show', $flight->id) }}">Edit</a>
                					<a href="{{ route('flight.destroy', $flight->id) }}" class="destroy">Delete</a>
                				</td>
                			</tr>
                			@endforeach
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
$(document).on('click', '.destroy', function(event) {
	event.preventDefault();
	const href = $(this).attr('href');
	if (confirm('Are you sure want to delete?')) {
		const form = document.createElement('form');
        form.method = 'POST';
        form.action = href;

        const deleteField = document.createElement('input');
        deleteField.type = 'hidden';
        deleteField.name = '_method';
        deleteField.value = 'delete';

        form.appendChild(deleteField);

        const tokenField = document.createElement('input');
        tokenField.type = 'hidden';
        tokenField.name = '_token';
        tokenField.value = '{{ csrf_token() }}';

        form.appendChild(tokenField);

        document.body.appendChild(form);
        form.submit();
	}
})
</script>

@section('javascript')
<script>
$(document).on('click', '.destroy', function(event) {
	event.preventDefault();
	const href = $(this).attr('href');
	if (confirm('Are you sure want to delete?')) {
		const form = document.createElement('form');
        form.method = 'POST';
        form.action = href;

        const deleteField = document.createElement('input');
        deleteField.type = 'hidden';
        deleteField.name = '_method';
        deleteField.value = 'delete';

        form.appendChild(deleteField);

        const tokenField = document.createElement('input');
        tokenField.type = 'hidden';
        tokenField.name = '_token';
        tokenField.value = '{{ csrf_token() }}';

        form.appendChild(tokenField);

        document.body.appendChild(form);
        form.submit();
	}
})
</script>
@endsection