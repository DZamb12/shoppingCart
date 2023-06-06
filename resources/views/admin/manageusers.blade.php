<x-layout>
    <div class="container">
        <h1>User Table</h1>

        @if(session()->has('success'))
            <x-notify type="success" title="Success" content="{{session('success')}}"/>
        @endif

        @unless($users->isEmpty())
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['created_at']}}</td>
                                <td>{{$user['role']}}</td>
                                <td>{{$user['status']}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
										<form action="/user/{{$user['id']}}/edit" method="post">
											@csrf
											@method('PUT')
											<input name="name" type="hidden" value="{{$user['name']}}">
											<input name="email" type="hidden" value="{{$user['email']}}">
											<input name="created_at" type="hidden" value="{{$user['created_at']}}">
											<input name="status" type="hidden" value='{{$user->status == "activated" ? "deactivated" : "activated"}}'>
											<input name="role" type="hidden" value='{{$user['role'] == 'user' ? '2' : '0'}}"'>
											<button class="btn btn-primary" type="submit"><i class="bi bi-power"></i></button>
										</form>										
                                        <form method="POST" action="/user/{{$user['id']}}/delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-primary ms-2" type="submit"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="row">
                <h3>No Users Found</h3>
            </div>
        @endunless

        <div class="d-flex justify-content-center mt-3">
            {{$users->links()}}
        </div>
    </div>
</x-layout>
