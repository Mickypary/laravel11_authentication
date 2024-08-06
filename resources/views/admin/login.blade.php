
    <h3 class="heading p-10">Admin Login</h3>

    <form action="{{ route('admin_login__') }}" method="post">
      @csrf
      <label class="p-10" for="">Email</label>
      <div>
        <input class="form-control ms" type="email" name="email">
      </div>

      <label class="p-10" for="">Password</label>
      <div>
        <input class="form-control ms" type="password" name="password">
      </div>

      <div class="mt ms">
        <input class="btn" type="submit" value="Login">
      </div>
  </form>




  </div>

</body>
</html>