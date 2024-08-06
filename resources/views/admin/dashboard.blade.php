@include('admin.nav')
  
    <h3 class="heading p-10">Dashboard - Admin</h3>

    <p class="p-10">Hi {{ Auth::guard('admin')->user()->name }}, welcome to Admin Dashboard!</p>

  </div>
</body>
</html>