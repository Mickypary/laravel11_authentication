@include('nav')
  
    <h3 class="heading p-10">Dashboard - User</h3>

    <p class="p-10">Hi {{ Auth::guard('web')->user()->name }}, welcome to User Dashboard!</p>

  </div>
</body>
</html>