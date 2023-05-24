<!-- @extends('layouts.app') -->



@section('content') 

<div class="box transaction-box">
                 
        <div class="header-container">
            <h3 class="section-header">Users Lists</h3>
            <div action="#" class="search">
                <svg class="search__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5418 19.25C15.3513 19.25 19.2502 15.3512 19.2502 10.5417C19.2502 5.73223 15.3513 1.83337 10.5418 1.83337C5.73235 1.83337 1.8335 5.73223 1.8335 10.5417C1.8335 15.3512 5.73235 19.25 10.5418 19.25Z" stroke="#596780" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.1668 20.1667L18.3335 18.3334" stroke="#596780" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>         
                <input type="text" class="search__input" placeholder="Search something here">           
            </div>
            <div class="date-selector create_new_user right_side_nav_switch_btn"  data-href="{{ route('users.create') }}" data-method="POST" >                 
                <span>Add New Users</span>       
            </div>                                
        </div>
        <table class="transaction-history">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Prevelages</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->role)->name }}</td>
                        <td>{{ optional($user->privilege)->name }}</td>
                        <td class="inline-items"  >
                        <span class="right_side_nav_switch_btn" data-href="{{ route('users.edit', $user) }}" data-method="POST">
                                @csrf
                                @method('POST')    
                            <svg viewBox="0 0 16 16"  fill="currentColor"  width="20px" height="20px" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 7.3h-1.2v6.3H1.7V3.3H8V2H1.7A1.2 1.2 0 0 0 .5 3.3v10.3A1.2 1.2 0 0 0 1.7 15h12.6a1.2 1.2 0 0 0 1.2-1.3z"/><path d="M10.6 2.9 6.2 7.2l-.4.5h-.1L4.2 11a1 1 0 0 0 1.4 1.4l3.2-1.5.5-.5.4-.4 4.4-4.4.4-.4.3-.3a2.2 2.2 0 0 0 0-3 2.2 2.2 0 0 0-1.6-.7 2.2 2.2 0 0 0-1.5.6l-.7.7-.5.5zm-5 8.1 1-2.4L8 9.8zm2-3.4 3.8-3.9L12.7 5 9 9zm5.6-5.3a1 1 0 0 1 .6.3 1 1 0 0 1 0 1.3l-.2.3-1.3-1.3.2-.3a.9.9 0 0 1 .7-.2z"/></svg>
                        </span>
                      
                            @if ($user->active)
                            
                            <span class="user_ajax_call" data-action="{{ route('users.deactivate', $user) }}" data-method="POST">
                                @csrf
                                @method('POST') 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M7 16h10a5 5 0 0 1 5 5 1 1 0 0 1-2 .1v-.3a3 3 0 0 0-2.8-2.8H7a3 3 0 0 0-3 3 1 1 0 0 1-2 0 5 5 0 0 1 4.8-5H7Zm5-14 1.2.1a1 1 0 1 1-.4 2 4 4 0 1 0 2.4 6.3 1 1 0 0 1 1.6 1.2A6 6 0 1 1 12 2Zm5.7.3L19 3.6l1.3-1.3a1 1 0 0 1 1.3 0h.1c.4.4.4 1 0 1.3v.1L20.4 5l1.3 1.3a1 1 0 1 1-1.4 1.4L19 6.4l-1.3 1.3a1 1 0 0 1-1.3 0h-.1a1 1 0 0 1 0-1.3v-.1L17.6 5l-1.3-1.3a1 1 0 1 1 1.4-1.4Z"/>
                                </svg>
                            </span>

                            @else
                                <span  class="user_ajax_call" data-action="{{ route('users.activate', $user) }}" data-method="POST">
                                    @csrf
                                    @method('POST') 
                                    <span> <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.8462 20C10.1892 20 8.5748 19.4652 7.2343 18.4721C5.8938 17.4791 4.89604 16.0789 4.38402 14.4721C3.87199 12.8654 3.87199 11.1346 4.38402 9.52786C4.89604 7.92112 5.8938 6.52089 7.2343 5.52786C8.5748 4.53484 10.1892 4 11.8462 4C13.5031 4 15.1175 4.53484 16.458 5.52787C17.7985 6.52089 18.7963 7.92112 19.3083 9.52787C19.8203 11.1346 19.8203 12.8654 19.3083 14.4721M18.1667 12.8889L19.2564 14.6667L21 13.3333M13.5897 9.33333C13.5897 10.3152 12.8091 11.1111 11.8462 11.1111C10.8832 11.1111 10.1026 10.3152 10.1026 9.33333C10.1026 8.35149 10.8832 7.55556 11.8462 7.55556C12.8091 7.55556 13.5897 8.35149 13.5897 9.33333ZM10.2872 12.8889H13.4051C13.6856 12.8889 13.8258 12.8889 13.9512 12.9094C14.3853 12.9803 14.7607 13.2294 14.971 13.5862C15.0317 13.6893 15.0761 13.8118 15.1648 14.0568C15.2713 14.3512 15.3246 14.4984 15.3318 14.6171C15.3572 15.0359 15.0612 15.4141 14.6217 15.5243C14.4971 15.5556 14.3287 15.5556 13.9917 15.5556H9.70063C9.36366 15.5556 9.19517 15.5556 9.0706 15.5243C8.63108 15.4141 8.33507 15.0359 8.36049 14.6171C8.3677 14.4984 8.42098 14.3512 8.52754 14.0568C8.61622 13.8118 8.66056 13.6893 8.72133 13.5862C8.93163 13.2294 9.307 12.9803 9.74109 12.9094C9.86652 12.8889 10.0067 12.8889 10.2872 12.8889Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>   
</div>
@endsection