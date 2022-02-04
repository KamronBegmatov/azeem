
<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link elevation-4">
         <img src="{{asset('/img/logo.png')}}" class="brand-image" style="opacity: .8">
         <span> Muslim</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent " data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="{{route('allah_names.index')}}" class="nav-link {{request()->is('allahNames') ? 'active' : '' }} ">
                         <i class=" fas fa-sort-alpha-up nav-icon"></i>

                         <p>Allah names</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('allah_name_langs.index')}}" class=" nav-link {{request()->is('allahNameLangs') ? 'active' : '' }}">
                         <i class="fas fa-sort-alpha-up nav-icon"></i>
                         <p>Allah names translations</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('shahadas.index')}}" class="nav-link {{request()->is('shahadas') ? 'active' : '' }}">
                         <i class="fas fa-praying-hands nav-icon"></i>
                         <p>Shahada</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('reciters.index')}}" class="nav-link">
                         <i class="fas fa-book-reader nav-icon"></i>
                         <p>Reciters</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('reciter_langs.index')}}" class="nav-link">
                         <i class="fas fa-book-reader nav-icon"></i>
                         <p>Reciter Languages</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('system_words.index')}}" class="nav-link  {{request()->is('systemWords') ? 'active' : '' }}">
                         <i class="fas fa-list-ol nav-icon"></i>
                         <p>System words</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('languages.index')}}" class="nav-link  {{request()->is('suraTrans') ? 'active' : '' }}">
                         <i class="fas fa-list-ol nav-icon"></i>
                         <p>Suras' translation</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('languages.index')}}" class="nav-link  {{request()->is('languages') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Languages</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('select_from_lists.index')}}" class="nav-link  {{request()->is('select_from_lists') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Selects</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('styles.index')}}" class="nav-link  {{request()->is('styles') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Styles</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link ">
                         <i class="nav-icon fa fa-language"></i>
                         <p>
                             Dropdown
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview nav-child-indent">
                         <li class="nav-item">
                             <a href="../mailbox/mailbox.html" class="nav-link">
                                 <p>Uzbek</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="../mailbox/compose.html" class="nav-link">
                                 <p>Russian</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="../mailbox/read-mail.html" class="nav-link">
                                 <p>English</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-circle"></i>
                         <p>
                             Multilevel
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview nav-child-indent">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Level 2</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Level 2
                                     <i class="right fas fa-angle-left"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview nav-child-indent">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <i class="far fa-dot-circle nav-icon"></i>
                                         <p>Level 3</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <i class="far fa-dot-circle nav-icon"></i>
                                         <p>Level 3</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <i class="far fa-dot-circle nav-icon"></i>
                                         <p>Level 3</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Level 2</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
