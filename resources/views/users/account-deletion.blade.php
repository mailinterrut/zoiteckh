@extends('layouts.app')

@section('content')
<div class="box transaction-box">
        <div class="header-container">
            <template>
            <button @click="confirmDeletion" class="delete-button">Delete User</button>
            </template>
        </div>  
    </div>
<script>
export default {
  methods: {
    confirmDeletion() {
      if (confirm('Are you sure you want to delete this user?')) {
        // Call the deletion API or emit an event to the parent component
        this.deleteUser();
      }
    },
    deleteUser() {
      // Implement the user deletion logic here, e.g., make an API request
    },
  },
};
</script>

<style>
.delete-button {
  color: red;
}
</style>
@endsection