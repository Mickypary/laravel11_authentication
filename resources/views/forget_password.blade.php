@include('nav')

    <h3 class="heading p-10">Forget Password</h3>

    <form action="{{ route('forget-password__') }}" method="post">
      @csrf
      <label class="p-10" for="">Email</label>
      <div>
        <input class="form-control ms" type="email" name="email">
      </div>

      <div class="mt ms">
        <input class="btn" type="submit" value="Submit">
        <br>
        <a href="{{ route('login') }}">Back to login</a>
      </div>
  </form>




  </div>

</body>
</html>