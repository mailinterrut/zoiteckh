 @extends('layouts.app')
@section('content')
     
    <div class="box transaction-box">
        <div class="header-container">
            <h3 class="section-header">Privileges Lists</h3>
            <div class="date-selector create_new_user right_side_nav_switch_btn"  data-href="{{ route('privileges.create') }}" data-method="POST" >                 
                <span>Add New Privileges</span>       
            </div>                                
        </div>
        <table class="transaction-history">
            <thead>
                <tr>
                    <th>Name</th> 
                    <th>Created Time</th>
                    <th>Last Updated</th> 
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($privileges as $privilge)
                    <tr>
                        <td>{{ $privilge->name }}</td> 
                        <td>{{ $privilge->created_at }}</td> 
                        <td>{{ $privilge->updated_at }}</td> 
                        <td class="inline-items" >
                            
                          
                            <span class="right_side_nav_switch_btn" data-href="{{ route('privileges.edit', $privilge) }}" data-method="POST">
                                @csrf
                                @method('POST') 
                                <svg viewBox="0 0 16 16"  fill="currentColor"  width="20px" height="20px" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 7.3h-1.2v6.3H1.7V3.3H8V2H1.7A1.2 1.2 0 0 0 .5 3.3v10.3A1.2 1.2 0 0 0 1.7 15h12.6a1.2 1.2 0 0 0 1.2-1.3z"/><path d="M10.6 2.9 6.2 7.2l-.4.5h-.1L4.2 11a1 1 0 0 0 1.4 1.4l3.2-1.5.5-.5.4-.4 4.4-4.4.4-.4.3-.3a2.2 2.2 0 0 0 0-3 2.2 2.2 0 0 0-1.6-.7 2.2 2.2 0 0 0-1.5.6l-.7.7-.5.5zm-5 8.1 1-2.4L8 9.8zm2-3.4 3.8-3.9L12.7 5 9 9zm5.6-5.3a1 1 0 0 1 .6.3 1 1 0 0 1 0 1.3l-.2.3-1.3-1.3.2-.3a.9.9 0 0 1 .7-.2z"/></svg>
                            </span> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>   
 
@endsection