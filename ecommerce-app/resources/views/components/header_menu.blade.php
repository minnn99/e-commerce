<section class="section">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
      <div class="w-container">
        <a href="/" class="w-nav-brand">
          <img src="/images/Educure.png" class="image-4">
        </a>
        <nav role="navigation" class="w-nav-menu">
          <a href="/" class="w-nav-link">Home</a>
          <a href="{{ route('products.index') }}" class="w-nav-link">Item</a>
          @auth
            <a href="{{ route('cart.index') }}" class="w-nav-link">Cart</a>
            <span class="w-nav-link">こんにちは、{{ auth()->user()->name }}さん</span>
            <form action="{{ route('user.logout') }}" method="post" style="display: inline;">
              @csrf
              <button type="submit" class="w-nav-link" style="background: none; border: none; color: inherit; text-decoration: underline; cursor: pointer;">Log out</button>
            </form>
          @else
            <a href="{{ route('user.login') }}" class="w-nav-link">Log in</a>
            <a href="{{ route('user.registration') }}" class="w-nav-link">Sign up</a>
          @endauth
        </nav>
        <div class="w-nav-button">
          <div class="icon-2 w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
</section>
