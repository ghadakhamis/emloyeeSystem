

<div class="card">
    <table class="table">
        <tr>
            <th>{{_('Employee Name')}}</th>
            <th>{{_('Email')}}</th>
            <th>Actions</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->fullName}}</td>
                <td>{{$employee->email}}</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="get" action="/employees/{{$employee->id}}/edit" >
                                <input type="submit" value="Edit" class="btn btn-primary"/>                    
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form method="post" action="/employees/{{$employee->id}}" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Delete"   onclick="return confirm('are you sure')" class="btn btn-danger"/>                    
                            </form>
                        </div>
                    </div>
                </td>    
            </tr>
        @endforeach
    </table>
</div>