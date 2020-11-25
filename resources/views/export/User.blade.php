<table>
    <thead>
    <tr>
        <th><b>Username</b></th>
        <th><b>Email</b></th>
        <th><b>Danh số</b></th>
        <th><b>Họ và tên</b></th>
        {{-- <th>Giới Tính</th> --}}
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->danhso}}</td>
            <td>{{$user->hoten}}</td>
            {{-- <td>{{($user->gioitinh == 0)? 'Nam':'Nữ'}}</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>
