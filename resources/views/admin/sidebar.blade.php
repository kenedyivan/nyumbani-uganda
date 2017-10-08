<!-- Sidebar component with st-effect-3 (set on the toggle button within the navbar) -->
<div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-skin-blue sidebar-visible-desktop" id=sidebar-menu data-type=collapse>
  <div class="split-vertical">
    <div class="sidebar-block tabbable tabs-icons">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#sidebar-tabs-menu" data-toggle="tab"><i class="fa fa-bars"></i></a></li>
      </ul>
    </div>
    <div class="split-vertical-body">
      <div class="split-vertical-cell">
        <div class="tab-content">

          <div class="tab-pane active" id="sidebar-tabs-menu">
            <div data-scrollable>

              <ul class="sidebar-menu sm-icons-right sm-icons-block">
                <li class="active"><a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
              </ul>

              <h4 class="category">Components</h4>
              <ul class="sidebar-menu sm-bordered sm-active-item-bg">
                <li class="hasSubmenu @if($menu == "properties") open @endif" >
                  <a href="#components">
                    <i class="fa fa-home"></i>
                    <span class="title">Properties</span>
                  </a>
                  <ul id="components" class="@if($menu == "properties") in @endif">
                    <li class="@if($sub == "property-listings") active @endif">
                      <a href="{{route('admin.property.listings')}}">
                        <i class="fa fa-circle-o"></i> <span>All</span></a></li>
                    <li class="@if($sub == "property-featured") active @endif"><a href="{{route('admin.featured.properties')}}">
                        <i class="fa fa-circle-o"></i> <span>Featured</span></a></li>
                    <li class="@if($sub == "property-expired") active @endif"><a href="{{route('admin.expired.properties')}}">
                        <i class="fa fa-circle-o"></i> <span>Expired</span></a></li>
                    <li class="@if($sub == "property-activate") active @endif"><a href="{{route('admin.property.approval')}}">
                        <i class="fa fa-circle-o"></i> <span>Activate</span></a></li>
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "types") open @endif">
                  <a href="#submenu-types"><i class="fa fa-braille"></i> <span>Types</span></a>
                  <ul id="submenu-types" class="@if($menu == "types") in @endif">
                    <li class="@if($sub == "property-types") active @endif">
                      <a href="{{route('admin.property.types.list')}}">
                        <i class="fa fa-circle-o"></i> <span>Types</span>
                      </a>
                    </li>
                    <li class="@if($sub == "new-type") active @endif">
                      <a href="{{route('admin.property.type.add.form')}}">
                        <i class="fa fa-circle-o"></i> <span>New type</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "packages") open @endif">
                  <a href="#submenu-packages"><i class="fa fa-th-large"></i> <span>Packages</span></a>
                  <ul id="submenu-packages" class="@if($menu == "packages") in @endif">
                    <li class="@if($sub == "property-packages") active @endif">
                      <a href="{{route('admin.packages.listing')}}">
                        <i class="fa fa-circle-o"></i> <span>Packages</span>
                      </a>
                    </li>
                    <!--<li class="@if($sub == "new-package") active @endif">
                      <a href="{{route('admin.property.type.add.form')}}">
                        <i class="fa fa-circle-o"></i> <span>New Package</span>
                      </a>
                    </li>-->
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "agents") open @endif">
                  <a href="#submenu-agents"><i class="fa fa-group"></i> <span>Agents</span></a>
                  <ul id="submenu-agents"  class="@if($menu == "agents") in @endif">
                    <li class="@if($sub == "agent-listings") active @endif">
                      <a href="{{route('admin.agent.listings')}}">
                      <i class="fa fa-circle-o"></i> <span>All</span>
                    </a>
                  </li>
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "users") open @endif">
                  <a href="#submenu-users"><i class="fa fa-group"></i> <span>Users</span></a>
                  <ul id="submenu-users" class="@if($menu == "users") in @endif">
                    <li class="@if($sub == "user-listings") active @endif">
                      <a href="{{route('admin.user.list')}}">
                        <i class="fa fa-circle-o"></i> <span>All</span>
                      </a>
                    </li>
                    <li class="@if($sub == "new-user") active @endif">
                      <a href="{{route('admin.register.form')}}">
                        <i class="fa fa-circle-o"></i> <span>New user</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "blog") open @endif">
                  <a href="#submenu-blog"><i class="fa fa-photo"></i> <span>Blog</span></a>
                  <ul id="submenu-blog" class="@if($menu == "blog") in @endif">
                    <li class="@if($sub == "post-listings") active @endif">
                      <a href="{{route('admin.blog.list')}}">
                      <i class="fa fa-circle-o"></i> <span>All posts</span>
                    </a>
                  </li>
                    <li class="@if($sub == "new-post") active @endif">
                      <a href="{{route('admin.create.post.form')}}">
                      <i class="fa fa-circle-o"></i> <span>New post</span>
                    </a>
                  </li>
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "news-letter") open @endif">
                  <a href="#submenu-news"><i class="fa fa-photo"></i> <span>News letter</span></a>
                  <ul id="submenu-news" class="@if($menu == "news-letter") in @endif">
                  <li class="@if($sub == "subscribers-listings") active @endif">
                      <a href="{{route('admin.subscribers.listings')}}">
                      <i class="fa fa-circle-o"></i> <span>Subscribers</span>
                    </a>
                  </li>
                    <li class="@if($sub == "new-news-letter") active @endif">
                      <a href="{{route('admin.create.news.letter.form')}}">
                      <i class="fa fa-circle-o"></i> <span>Send</span>
                    </a>
                  </li>
                  </ul>
                </li>
                <li class="hasSubmenu @if($menu == "partners") open @endif">
                  <a href="#submenu-partners"><i class="fa fa-handshake-o"></i> <span>Partners</span></a>
                  <ul id="submenu-partners" class="@if($menu == "partners") in @endif">
                    <li class="@if($sub == "partner-listings") active @endif">
                      <a href="{{route('admin.partners.listings')}}">
                      <i class="fa fa-circle-o"></i> <span>All partners</span>
                    </a>
                  </li>
                    <li class="@if($sub == "new-partner") active @endif">
                      <a href="{{route('admin.partners.new.form')}}">
                      <i class="fa fa-circle-o"></i> <span>New partner</span>
                    </a>
                  </li>
                  </ul>
                </li>
              </ul>


            </div>
          </div>
          <!-- // END .tab-pane -->

        </div>
        <!-- // END .tab-content -->

      </div>
      <!-- // END .split-vertical-cell -->

    </div>
    <!-- // END .split-vertical-body -->

    <ul class="sidebar-menu sm-active-item-bg sm-icons-right sm-icons-block">
      <li><a href="{{route('user.home')}}"><i class="fa fa-globe"></i> <span>Website</span></a></li>
    </ul>

  </div>
</div>
