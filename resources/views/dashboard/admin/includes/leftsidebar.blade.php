<div class="sl-logo"><a href="{{ route('dashboard') }}">DASHBOARD</a></div>
<div class="sl-sideleft">
  <div class="card">
    <div class="">
        <div class="">
            <div class="text-center">
                <img src="{{asset('/')}}admin/assets/img/img9.jpg" class="" alt="..." style="width:100px;border-radius:50%;height:100px;">
              </div>
            <h6 class="text-center my-1">Super Admin</h6>
            {{-- <h5>Role</h5> --}}
        </div>
    </div>
  </div>

  <div class="sl-sideleft-menu mt-4">
    <a href="{{ route('supplier.view') }}" class="sl-menu-link  {{ request()->is('supplier*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <img src="{{asset('/')}}admin/assets/img/delivery-box.png" style="width:30px; height:30px; color:white;">
        <span class="menu-item-label">SUPPLIER</span>
      </div>
    </a>
    <a href="{{ route('customer.view') }}" class="sl-menu-link {{ request()->is('customer*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <img src="{{asset('/')}}admin/assets/img/customer.png" style="width:30px; height:30px; color:white;">
        <span class="menu-item-label">CUSTOMER</span>
      </div>
    </a>

      <a href="{{ route('product.index') }}" class="sl-menu-link {{ request()->is('product*') ? 'active' : '' }}">
        <div class="sl-menu-item">
          <img src="{{asset('/')}}admin/assets/img/product.png" style="width:30px; height:30px; color:white;">
          <span class="menu-item-label">PRODUCT</span>
        </div>
      </a>
      <a href="{{ route('buyproduct.index') }}" class="sl-menu-link {{ request()->is('buyproduct*') ? 'active' : '' }}">
        <div class="sl-menu-item">
          <img src="{{asset('/')}}admin/assets/img/buy.png" style="width:30px; height:30px; color:white;">
          <span class="menu-item-label">BUY PRODUCT</span>
        </div>
      </a>
      <a href="{{ route('sellproduct.index') }}" class="sl-menu-link {{ request()->is('sellproduct*') ? 'active' : '' }}">
        <div class="sl-menu-item">
          <img src="{{asset('/')}}admin/assets/img/sell.png" style="width:30px; height:30px; color:white;">
          <span class="menu-item-label">SELL PRODUCT</span>
        </div>
      </a>

      <a href="{{ route('report.index') }}" class="sl-menu-link {{ request()->is('report*') ? 'active' : '' }}">
        <div class="sl-menu-item">
          <img src="{{asset('/')}}admin/assets/img/report.png" style="width:30px; height:30px; color:white;">
          <span class="menu-item-label">REPORT</span>
        </div>
      </a>

      <a href="{{ route('friends.index') }}" class="sl-menu-link {{ request()->is('friends*') ? 'active' : '' }}">
        <div class="sl-menu-item">
          <img src="{{asset('/')}}admin/assets/img/report.png" style="width:30px; height:30px; color:white;">
          <span class="menu-item-label">ADD FRIENDS</span>
        </div>
      </a>

      <a href="{{ route('lends.index') }}" class="sl-menu-link {{ request()->is('lends*') ? 'active' : '' }}">
        <div class="sl-menu-item">
          <img src="{{asset('/')}}admin/assets/img/report.png" style="width:30px; height:30px; color:white;">
          <span class="menu-item-label">LENDS</span>
        </div>
      </a>

  </div>

  <br>
</div>
