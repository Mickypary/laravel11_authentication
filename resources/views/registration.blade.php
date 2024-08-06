@include('nav')

    <h3 class="heading p-10">Register</h3>

    <form action="{{ route('registration__') }}" method="post">
      @csrf
        <label class="p-10" for="">Name</label>
        <div>
          <input class="form-control ms" type="text" name="name">
        </div>

        <label class="p-10" for="">Email</label>
        <div>
          <input class="form-control ms" type="email" name="email">
        </div>

        <label class="p-10" for="">Password</label>
        <div>
          <input class="form-control ms" type="password" name="password">
        </div>

        <label class="p-10" for="">Retype Password</label>
        <div>
          <input class="form-control ms" type="password" name="retype_password">
        </div>

        <div class="mt ms">
          <input class="btn" type="submit" value="Register">
        </div>
    </form>




  </div>

</body>
</html>