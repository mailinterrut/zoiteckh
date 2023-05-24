@section('dashboard-content')
    @if (in_array('admin', $roles))
        <h2>Admin Privileges</h2>
        <!-- Display admin-specific content -->
    @endif

    @if (in_array('editor', $roles))
        <h2>Editor Privileges</h2>
        <!-- Display editor-specific content -->
    @endif

    @if (in_array('user_management', $privileges))
        <h2>User Management Privileges</h2>
        <!-- Display user management-specific content -->
    @endif  
<!-- /#wrapper-->
@endsection
