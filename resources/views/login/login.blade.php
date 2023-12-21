<link href="/masterpage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<style>
    .btn-color{
  background-color: #0e1c36;
  color: #fff;

}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}
</style>
<!-- Custom styles for this template-->
<link href="/masterpage/css/sb-admin-2.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">TRANG ĐĂNG NHẬP</h2>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="{{ route('route.login.process') }}" method="POST">
            @csrf
            <a href="{{ route('route.master') }}" class="btn">Trở về trang chủ</a>
            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                placeholder="Email">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Đăng nhập</button></div>
          </form>
        </div>

      </div>
    </div>
  </div>
