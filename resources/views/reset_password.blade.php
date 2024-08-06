@include('nav')

    <h3 class="heading p-10">Reset Password</h3>

    <form action="{{ route('reset-password__') }}" method="post">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="email" value="{{ $email }}">
      <label class="p-10" for="">New Password</label>
      <div>
        <input class="form-control ms" type="password" name="new_password">
      </div>

      <label class="p-10" for="">Retype Password</label>
      <div>
        <input class="form-control ms" type="password" name="retype_password">
      </div>

      <div class="mt ms">
        <input class="btn" type="submit" value="Update">
      </div>
  </form>




  </div>

</body>
</html>